<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class TypeParutionAjoutType extends TypeParutionType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
    	
        $builder
            ->add('ajouter', 'submit');
        ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_typeparutionajout';
    }
}
