<?php

namespace CDA\CertifBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PictureType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
  {
		$builder
			->add('file')
			->add('pictureCategory', 'entity', array(
					'class' 		=> 'CDA\CertifBundle\Entity\PictureCategory',
					'required'	=> true,
					'label'			=> 'Type d\'image',
					'property'	=> 'text',
					))
			->add('comment');
	}
	
	/**
	 * 
	 */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
   	$resolver->setDefaults(array(
    			'data_class' => 'CDA\CertifBundle\Entity\Picture',
   	));
  }
	
	public function getName()
	{
		return 'cda_picturetype';
	}

}
