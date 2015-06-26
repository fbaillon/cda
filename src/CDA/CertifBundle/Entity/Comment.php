<?php

namespace CDA\CertifBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * CDA\CertifBundle\Entity\Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\CommentRepository")
 */
class Comment
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
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var datetime $createdAt
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     * @ORM\ManyToOne(targetEntity="Work", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $work;

    /**
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;
    
    
    /**
     * Constructor
     *
     * @return void 
     */
    public function __construct()
    {
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
     * Set description
     *
     * @param text $description
     * @return Comment
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
     * Set submissionIp
     *
     * @param string $submissionIp
     * @return Comment
     */
    public function setSubmissionIp($submissionIp)
    {
        $this->submissionIp = $submissionIp;
        return $this;
    }

    /**
     * Get submissionIp
     *
     * @return string 
     */
    public function getSubmissionIp()
    {
        return $this->submissionIp;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     * @return Comment
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
     * Set work
     *
     * @param CDA\CertifBundle\Entity\Work $work
     * @return Comment
     */
    public function setWork(\CDA\CertifBundle\Entity\Work $work)
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
     * Set member
     *
     * @param CDA\CertifBundle\Entity\Member $member
     * @return Comment
     */
    public function setMember(\CDA\CertifBundle\Entity\Member $member)
    {
        $this->member = $member;
        return $this;
    }

    /**
     * Get member
     *
     * @return CDA\CertifBundle\Entity\Member 
     */
    public function getMember()
    {
        return $this->member;
    }
}
