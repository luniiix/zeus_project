<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupeCollectionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groupes', 'collection', array('type' => new GroupeType()))
            ->add('enregistrer', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => 'Zeus\SiteBundle\OtherClass\GroupesCollection'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_groupescollection';
    }
}
