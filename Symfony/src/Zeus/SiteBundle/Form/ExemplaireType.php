<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;

class ExemplaireType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeReference', 'text', array(
                'label' => 'Code référencement'
            ))
            ->add('isDispo', 'checkbox', array(
                'label' => 'Disponible',
                'required' => false
            ))
            ->add('parution', 'genemu_jqueryselect2_entity', array(
                'label' => 'Parution',
                'empty_data' => 'Toutes les parution',
                'class' => 'ZeusSiteBundle:Parution',
                'property' => 'titre',
                'multiple' => false,
                'expanded' => false,
                'mapped' => false
            ))
            ->add('edition', 'genemu_jqueryselect2_entity', array(
                'label' => 'Edition',
                'class' => 'ZeusSiteBundle:Edition',
                'multiple' => false,
                'expanded' => false,
            ))
        ;
        
        $builder->addEventSubscriber(new AddSubmitFormSubscriber());
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Exemplaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_exemplaire';
    }
}
