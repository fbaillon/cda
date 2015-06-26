<?php

namespace CDA\CertifBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of ContactType
 *
 * @author fba
 */
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'text')
            ->add('text', 'text');
    }
    
    public function getName()
    {
        return 'cda_certifbundle_contacttype';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'CDA\CertifBundle\Entity\Contact',
    	));
    }
}
