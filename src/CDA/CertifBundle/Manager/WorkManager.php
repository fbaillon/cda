<?php

namespace CDA\CertifBundle\Manager;


use Doctrine\ORM\EntityManager;

use CDA\CertifBundle\Manager\BaseManager;
use CDA\CertifBundle\Entity\Work;

class WorkManager extends BaseManager
{
    protected $em;
    private $selection = 'D';
	
	
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
	
    /**
     * Load the work matching slug parameter
     * 
     * @param string $slug
     * @return Work work
     */
    public function loadWork($slug)
    {
        return $this->getRepository()	->findWorkBySlug($slug);
    }
	
    /**
     * Load all works for a given artist
     * 
     * @param integer $artistId
     * @return Work $works
     */
    public function loadArtistWorks($artistId, $workId)
    {
        return $this->getRepository()	->findArtistWorks($artistId, $workId);
    }
	
    /**
     * Load all pictures of drafts for a given work
     * 
     * @param integer $workId
     * @return array
     */
    public function loadWorkDrafts($workId)
    {
        return $this->getRepository()->findWorkPicturesByType(
                                                $workId,
                                                array("Ebauche")
                                                );
    }
	
    /**
     * Load all pictures of authentications for a given work
     * 
     * @param integer $workId
     * @return array
     */
    public function loadWorkAuthentications($workId)
    {
        return $this->getRepository()->findWorkPicturesByType(
                                                $workId,
                                                array("Authentification")
                                                );
    }
	
    /**
     * Load all comments for a given work
     * 
     * @param integer $workId
     * @return array
     */
    public function loadCommentsWork($workId)
    {
        return $this->getRepositoryComment()->findCommentsWork($workId);
    }
	
    /**
     * Save Work entity
     * 
     * @param Work $work
     */
    public function saveWork(Work $work)
    {
        if( $work->getId() === null)
        {
            // Attribue un numéro d'oeuvre uniquement lors de la création
            $work->setNumber($this->getNumberOfWorksByArtist() + 1);
            // Attribue un slug uniquement lors de la création
            $work->setSlug('Frédéric' . "-" 
                        . 'BAILLON' . "-"
                        . $work->getTitle());
/*
    $work->setSlug($work->getArtist()->getFirstname() . "-" 
                                                                    . $work->getArtist()->getLastname() . "-"
                                                                    . $work->getTitle());
*/
        }
        foreach($work->getPictures() as $picture)
        {
            $this->em->persist($picture);
        }

        $this->em->persist($work);
        $this->em->flush();
    }
	
    /**
     * Retrieve the max number of works for the current artist
     * 
     * @return integer numberOfWorks
     */
    public function getNumberOfWorksByArtist()
    {
        return $this->getRepository()
                    ->getNumberOfWorks()
                    ->getSingleScalarResult();
    }
	
    /**
     * Retrieve all works from all artists with the given parameters.
     * Try to return at least one work
     * 
     * @params string selection
     * @params string rating
     * @return arrayCollection
     */
    public function getWorks($selection='D', $rating='R')
    {
        do
        {
            switch ($rating)
            {
                case 'V':   $works = $this->getRepository()
                                            ->findWorksByView($selection);
                            break;

                case 'D':   $works = $this->getRepository()
                                            ->findWorksByDate($selection);
                            break;

                case 'R':
                default:    $works = $this->getRepository()
                                            ->findWorksByRate($selection);
            };
			
            $this->selection = $selection;
            $selection = $this->incrementSelection($selection);
        } while (!$works && $selection != null);
		
        return $works;
    }
	
    /**
     * 
     */
    public function getTitle()
    {
        switch ($this->selection)
        {
            case 'D':   return date("l j F Y");
            case 'W':	return 'depuis une semaine';
            case 'M':	return 'depuis un mois';
            case 'Y':	return 'depuis un an';
            default:
            case 'A':	return 'depuis le début';
        }
    }
	
    public function getRepository()
    {
        return $this->em->getRepository('CDACertifBundle:Work');
    }

    public function getRepositoryComment()
    {
        return $this->em->getRepository('CDACertifBundle:Comment');
    }

    private function incrementSelection($selection)
    {
        switch ($selection)
        {
            case 'D':   return 'W';
            case 'W':	return 'M';
            case 'M':	return 'Y';
            case 'A':	return null;
            default:
            case 'Y':	return 'A';
        }
    }
}
