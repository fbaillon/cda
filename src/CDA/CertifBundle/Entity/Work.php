<?php

namespace CDA\CertifBundle\Entity;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CDA\CertifBundle\Entity\Work
 *
 * @ORM\Table(name="work")
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\WorkRepository")
 */
class Work
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
     * @var string $title
     * @Assert\NotBlank(message="Title must not be empty")
		 * @Assert\GreaterThanOrEqual(
		 *      value=3,
		 *      message="Title should have at least {{ limit }} characters."
		 * )
		 * @Assert\LessThanOrEqual(255)
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;
    
    /**
     * @var text $summary
     * @Assert\NotBlank()
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var text $description
     * @Assert\NotBlank()
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer $number
     * @Assert\GreaterThan(value = "0", message = "Work's number must be positive")
		 * @Assert\LessThanOrEqual(value = "200000", message = "Work's max number is 200.000")
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var integer $length
     * @Assert\GreaterThan(value = "0", message = "Work's length must be positive")
		 * @Assert\LessThanOrEqual(value = "10000", message = "The max value for the length is 10000 (millimeter)")
     * @ORM\Column(name="length", type="integer", nullable=true)
     */
    private $length;

    /**
     * @var integer $height
     * @Assert\GreaterThan(value = "0", message = "Work's height must be positive")
		 * @Assert\LessThanOrEqual(value = "10000", message = "The max value for the height is 10000 (millimeter)")
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;

    /**
     * @var decimal $note
     * @Assert\GreaterThan(value = "0", message = "Work's note must be positive")
		 * @Assert\LessThanOrEqual(value = "5", message = "The max value for the note is 5")
     * @ORM\Column(name="note", type="decimal", nullable=true)
     */
    private $note;

    /**
     * @var integer $voteCount
     *
     * @ORM\Column(name="vote_count", type="integer", nullable=true)
     */
    private $voteCount;

    /**
     * @var datetime $createdAt
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var boolean $isEnabled
     * 
     * @ORM\Column(name="is_enabled", type="boolean")
     */
    private $isEnabled;

		/**
	 	 * @ORM\OneToMany(targetEntity="Comment", mappedBy="work", cascade={"persist"})
	 	 */
		private $comments;
	
    /**
	 	 * @ORM\OneToMany(targetEntity="Picture", mappedBy="work", cascade={"persist"})
	 	 */
		private $pictures;
	
		/**
		 * @ORM\ManyToOne(targetEntity="Artist", inversedBy="works")
		 * @ORM\JoinColumn(nullable=false)
		 */
		private $artist;
		
		
    /**
     * Constructor
     *
     * @return void 
     */
    public function __construct()
    {
        $this->voteCount = 0;
        $this->createdAt = new \DateTime('now');
        $this->isEnabled = false;

        $this->comments = new ArrayCollection();
        $this->pictures = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Work
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param text $summary
     * @return Work
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Work
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get summary
     *
     * @return text 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return Work
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return Work
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Work
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set note
     *
     * @param decimal $note
     * @return Work
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Get note
     *
     * @return decimal 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set voteCount
     *
     * @param integer $voteCount
     * @return Work
     */
    public function setVoteCount($voteCount)
    {
        $this->voteCount = $voteCount;
        return $this;
    }

    /**
     * Get voteCount
     *
     * @return integer 
     */
    public function getVoteCount()
    {
        return $this->voteCount;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     * @return Work
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     * @return Work
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     * @return Work
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return boolean 
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }
    
		/**
		 * Add comment
		 *
		 * @param CDA\CertifBundle\Entity\Comment $comments
		 */
    public function addComment(Comment $comments)
    {
        $this->comments[] = $comments;
        $comments->setWork($this);
        return $this;
    }

		/**
		 * Remove comment
		 *
		 * @param CDA\CertifBundle\Entity\Comment $comments
		 */
    public function removeComment(Comment $comments)
    {
        $this->comments->removeElement($comments);
        $comments->setWork(null);
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
    
    /**
		 * Add picture
		 *
		 * @param CDA\CertifBundle\Entity\Picture $pictures
		 */
    public function addPicture(Picture $pictures)
    {
        $this->pictures[] = $pictures;
        $pictures->setWork($this);
        return $this;
    }

		/**
     * Remove picture
     *
     * @param CDA\CertifBundle\Entity\Picture $picture
     */
    public function removePicture(Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
        $pictures->setWork(null);
    }

    /**
     * Get pictures
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getPictures()
    {
    	return $this->pictures;
    }
    

    /**
     * Set number
     *
     * @param integer $number
     * @return Work
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set artist
     *
     * @param CDA\CertifBundle\Entity\Artist $artist
     * @return Work
     */
    public function setArtist(\CDA\CertifBundle\Entity\Artist $artist)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * Get artist
     *
     * @return CDA\CertifBundle\Entity\Artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }
}
