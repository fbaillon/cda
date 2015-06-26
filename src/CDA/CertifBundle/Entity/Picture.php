<?php

namespace CDA\CertifBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use CDA\CertifBundle\Entity\Work;


/**
 * CDA\CertifBundle\Entity\Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\PictureRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Picture
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
     * @var string $path
     * 
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @Assert\File(maxSize="4096k")
     */
    private $file;

    /**
     * @var text $comment
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var string $pictureCategory
     * 
     * @ORM\Column(name="picture_category", type="string", length=30)
     */
    private $pictureCategory;

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
     * @var boolean $mainView
     *
     * @ORM\Column(name="main_view", type="boolean")
     */
    private $mainView;
    
    /**
     * @var boolean $isEnabled
     *
     * @ORM\Column(name="is_enabled", type="boolean")
     */
    private $isEnabled;
    
    /**
     * @ORM\ManyToOne(targetEntity="Work", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $work;
    

    /**
     * Constructor
     *
     * @return void 
     */
    public function __construct()
    {
        $this->isEnabled	= false;
        $this->exposed		= false;
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
     * Set path
     *
     * @param string $path
     * @return Picture
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }
    
    /**
     * Get file
     *
     * @return 
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * Set file
     *
     * @return 
     */
    public function setFile($file)
    {
      $this->file = $file;
    	return $this;
    }
    
    /**
     * Set comment
     *
     * @param text $comment
     * @return Picture
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Get comment
     *
     * @return text 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set pictureCategory
     *
     * @param string $pictureCategory
     * @return Picture
     */
    public function setPictureCategory($pictureCategory)
    {
        $this->pictureCategory = $pictureCategory;
        return $this;
    }

    /**
     * Get pictureCategory
     *
     * @return string 
     */
    public function getPictureCategory()
    {
        return $this->pictureCategory;
    }
    
    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     * @return Picture
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
     * @return Picture
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
     * Set mainView
     *
     * @param boolean $mainView
     * @return Picture
     */
    public function setMainView($mainView)
    {
        $this->mainView = $mainView;
        return $this;
    }

    /**
     * Get mainView
     *
     * @return boolean 
     */
    public function getMainView()
    {
        return $this->mainView;
    }
    
    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     * @return Picture
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
     * Set work
     *
     * @param CDA\CertifBundle\Entity\Work $work
     * @return Picture
     */
    public function setWork(Work $work)
    {
        $this->work = $work;
        return $this;
    }

    /**
     * Get work
     *
     * @return CDA\CertifBundle\Entity\Work 
     */
    public function getWork()
    {
        return $this->work;
    }

		/**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if( null !== $this->file )
        {
            // Génération d'un nom unique associé à l'extension 
            $this->path = uniqid() . '.' . $this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if( null === $this->file )
        {
            return;
        }

        // s'il y a une erreur lors du déplacement du fichier, une exception
        // va automatiquement être lancée par la méthode move(). Cela va empêcher
        // proprement l'entité d'être persistée dans la base de données si
        // erreur il y a
        $this->file->move($this->getUploadRootDir(), $this->path);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if( $file = $this->getAbsolutePath() )
        {
            unlink($file);
        }
    }

    public function getAbsolutePath()
    {
    	return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }
    
    public function getWebPath()
    {
    	return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }
    
    protected function getUploadRootDir()
    {
    	// le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
    	return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }
    
    protected function getUploadDir()
    {
    	// on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
    	// une image de l'oeuvre dans la vue.
    	return 'uploads/pictures';
    }
    

}
