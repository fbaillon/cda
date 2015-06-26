<?php

namespace CDA\CertifBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ArtistType
 *
 * @author fba
 */
class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text')
            ->add('lastname', 'text')
            ->add('surname', 'text')
            ->add('contacts', 'collection', array('type' => new ContactType,
                                                   'allow_add' => true,
                                                   'allow_delete' => true,
            																			 'by_reference' => false,
            		));
    }
    
    public function getName()
    {
        return 'cda_certifbundle_artisttype';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'CDA\CertifBundle\Entity\Artist',
    	));
    }
}
