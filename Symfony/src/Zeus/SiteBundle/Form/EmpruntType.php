<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;

class EmpruntType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datedebut', 'date', array(
                'label' => 'date de début',
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
            ))
            ->add('datefin', 'date', array(
                'label' => 'date de fin',
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
            ))
        ;

        /*->add('utilisateur', 'entity', array(
                'label' => 'Utilisateur',
                'class' => 'ZeusUserBundle:Utilisateur',
                'property' => 'id',
            ))
            ->add('exemplaire', 'entity', array(
                'label' => 'Exemplaire',
                'class' => 'ZeusSiteBundle:Exemplaire',
                'property' => 'id',
            ))*/
        $builder->addEventSubscriber(new AddSubmitFormSubscriber());
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Emprunt'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_emprunt';
    }
}
