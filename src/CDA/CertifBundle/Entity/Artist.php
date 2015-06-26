<?php

namespace CDA\CertifBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

use CDA\CertifBundle\Entity\Contact;

/**
 * @author fba
 *
 */

/**
 * CDA\CertifBundle\Entity\Artist
 *
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\ArtistRepository")
 * @ORM\Table(name="artist")
 */
class Artist
{
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @var string $firstname
	 *
	 * @ORM\Column(name="firstname", type="string", length=255)
	 * @Assert\GreaterThanOrEqual(4)
	 */
	private $firstname;
	
	/**
	 * @var string $lastname
	 *
	 * @ORM\Column(name="lastname", type="string", length=255)
	 * @Assert\GreaterThanOrEqual(4)
	 */
	private $lastname;
	
	/**
	 * @var string $surname
	 *
	 * @ORM\Column(name="surname", type="string", length=255)
	 * @Assert\GreaterThanOrEqual(2)
	 */
	private $surname;
	
	/**
	 * @ORM\OneToMany(targetEntity="Contact", mappedBy="artist", cascade={"persist"})
	 */
	private $contacts;
	
	/**
	 * @ORM\OneToMany(targetEntity="Work", mappedBy="artist", cascade={"persist"})
	 */
	private $works;
	
	
    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->works = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Artist
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Artist
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Artist
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set contacts
     *
     * @param ArrayCollection $contacts
     */
    public function setContacts(ArrayCollection $contacts)
    {
      foreach ($contacts as $contact)
      {
      	$contact->setArtist($this);
      }  
    	$this->contacts = $contacts;
    }

    /**
     * Remove contacts
     *
     * @param Contact $contacts
     */
    public function removeContact(Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }


    /**
     * Add contacts
     *
     * @param CDA\CertifBundle\Entity\Contact $contacts
     * @return Artist
     */
    public function addContact(Contact $contacts)
    {
        $this->contacts[] = $contacts;
        return $this;
    }

    /**
     * Get contacts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Add works
     *
     * @param CDA\CertifBundle\Entity\Work $works
     * @return Artist
     */
    public function addWork(\CDA\CertifBundle\Entity\Work $works)
    {
        $this->works[] = $works;
        return $this;
    }

    /**
     * Remove works
     *
     * @param CDA\CertifBundle\Entity\Work $works
     */
    public function removeWork(\CDA\CertifBundle\Entity\Work $works)
    {
        $this->works->removeElement($works);
    }

    /**
     * Get works
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getWorks()
    {
        return $this->works;
    }
}
