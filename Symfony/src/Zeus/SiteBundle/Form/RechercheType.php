<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RechercheType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('titre', 'text')
        	->add('auteur', 'text')
                ->add('keys', 'text')
                ->add('type', 'text')
                ->add('categorie', 'text')
                ->add('date', 'date')
                ->add('dispo', 'integer')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_recherche';
    }
}
