<?php

namespace CDA\CertifBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;

use CDA\CertifBundle\Entity\Artist;

/**
 * @author fba
 *
 */

/**
 * CDA\CertifBundle\Entity\Contact
 *
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\ContactRepository")
 * @ORM\Table(name="contact")
 */
class Contact
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=50)
     * @Assert\GreaterThanOrEqual(5)
     */
    private $type;


    /**
     * @var string $text
     *
     * @ORM\Column(name="text", type="string", length=255)
     * @Assert\GreaterThanOrEqual(2)
     */
    private $text;
    

    /**
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="contacts") 
     */
    private $artist;

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
     * Set type
     *
     * @param string $type
     * @return Contact
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Contact
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set artist
     *
     * @param Artist $artist
     * @return Contact
     */
    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * Get artist
     *
     * @return Artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }
}
