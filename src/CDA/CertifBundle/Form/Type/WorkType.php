<?php

namespace CDA\CertifBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class WorkType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
  {
		$builder
			->add('title')
			->add('summary')
			->add('description')
			->add('length')
			->add('height')
			->add('pictures', 'collection', array(
								'type'					=> new PictureType,
								'by_reference' 	=> false,
								'allow_add'			=> true,
					));
	}
	
	/**
	 * 
	 */
  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
   	$resolver->setDefaults(array(
    			'data_class' => 'CDA\CertifBundle\Entity\Work',
   	));
  }
	
	public function getName()
	{
		return 'cda_worktype';
	}

}
