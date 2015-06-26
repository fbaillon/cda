<?php

namespace CDA\CertifBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * CDA\CertifBundle\Entity\Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\MemberRepository")
 */
class Member
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
     * @ORM\Column(name="firstname", type="string", length=100)
		 * @Assert\GreaterThanOrEqual(4)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=100)
		 * @Assert\GreaterThanOrEqual(4)
     */
    private $lastname;

    /**
     * @var string $surname
     *
     * @ORM\Column(name="surname", type="string", length=100)
		 * @Assert\GreaterThanOrEqual(4)
     */
    private $surname;


	/**
	 * @ORM\OneToMany(targetEntity="Contact", mappedBy="member", cascade={"persist"})
	 */
	private $contacts;
	
	/**
	 * @ORM\OneToMany(targetEntity="Comment", mappedBy="member", cascade={"persist"})
	 */
	private $comments;
	
	
    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->comments = new ArrayCollection();
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
     * @return Member
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
     * @return Member
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
     * @return Member
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
     * Add contacts
     *
     * @param CDA\CertifBundle\Entity\Contact $contacts
     * @return Member
     */
    public function addContact(\CDA\CertifBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;
        return $this;
    }

    /**
     * Remove contacts
     *
     * @param CDA\CertifBundle\Entity\Contact $contacts
     */
    public function removeContact(\CDA\CertifBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
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
     * Add comments
     *
     * @param CDA\CertifBundle\Entity\Comment $comments
     * @return Member
     */
    public function addComment(\CDA\CertifBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
        return $this;
    }

    /**
     * Remove comments
     *
     * @param CDA\CertifBundle\Entity\Comment $comments
     */
    public function removeComment(\CDA\CertifBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
