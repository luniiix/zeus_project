<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;

class EditionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero', 'text')
            ->add('date', 'date', array(
                'label' => 'date d\'édition',
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
            ))
            ->add('parution', 'genemu_jqueryselect2_entity', array(
                'label' => 'Parution',
                'class' => 'ZeusSiteBundle:Parution',
                'property' => 'titre',
                'multiple' => false,
                'expanded' => false
            ))
            ->add('editeur', 'genemu_jqueryselect2_entity', array(
                'label' => 'Editeur',
                'class' => 'ZeusSiteBundle:Editeur',
                'property' => 'nom',
                'multiple' => false,
                'expanded' => false
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
            'data_class' => 'Zeus\SiteBundle\Entity\Edition'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_edition';
    }
}
