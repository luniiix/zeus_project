<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class EmpruntAjoutType extends EmpruntType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
        	->add('ajouter', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_empruntajout';
    }
}
