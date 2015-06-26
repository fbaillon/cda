<?php

namespace CDA\CertifBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

use cda\CertifBundle\Entity\Artist;

/**
 * Description of ArtistHandler
 *
 * @author fba
 */
class ArtistHandler
{
    protected $form;
    protected $request;
    protected $em;

    public function __construct(Form $form, Request $request, EntityManager $em)
    {
        $this->form    = $form;
        $this->request = $request;
        $this->em      = $em;
    }

    public function process()
    {
        if( $this->request->getMethod() == 'POST' )
        {
            $this->form->bindRequest($this->request);

            if( $this->form->isValid() )
            {
                $this->onSuccess($this->form->getData());

                return true;
            }
        }

        return false;
    }

    public function onSuccess(Artist $artist)
    {
      $artist->setContacts($artist->getContacts());
    	foreach($artist->getContacts() as $contact)
      {
      	$this->em->persist($contact);
      }
      $this->em->persist($artist);
      $this->em->flush();
    }
    
}
