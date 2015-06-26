<?php

namespace CDA\CertifBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * CDA\CertifBundle\Entity\PictureCategory
 *
 * @ORM\Table(name="picture_category")
 * @ORM\Entity(repositoryClass="CDA\CertifBundle\Repository\PictureCategoryRepository")
 */
class PictureCategory
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
     * @var string $text
     * @Assert\NotBlank(message="Must not be empty")
		 * @Assert\GreaterThanOrEqual(
		 *      value=3,
		 *      message="Should have at least {{ limit }} characters."
		 * )
		 * @Assert\LessThanOrEqual(30)
     * @ORM\Column(name="text", type="string", length=30)
     */
    private $text;


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
     * Set text
     *
     * @param string $text
     * @return PictureType
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
}
