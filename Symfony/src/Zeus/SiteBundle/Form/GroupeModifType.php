<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class GroupeModifType extends GroupeType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('modifier', 'submit')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_groupemodif';
    }
}
