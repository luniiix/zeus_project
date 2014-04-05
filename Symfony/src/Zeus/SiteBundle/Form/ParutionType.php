<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ParutionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('titre', 'text')
                ->add('resume', 'textarea', array('required' => false))
                ->add('auteurs', 'genemu_jqueryselect2_entity', array(
                    'class' => 'ZeusSiteBundle:Auteur',
                    'property' => 'nom', 
                    'multiple' => true,
                    'expanded' => false,
                ))
                ->add('traducteur', 'genemu_jqueryselect2_entity', array(
                    'class' => 'ZeusSiteBundle:Traducteur',
                    'property' => 'nom',
                    'multiple' => false,
                    'expanded' => false,
                ))
                ->add('sousCategorie', 'genemu_jqueryselect2_entity', array(
                    'class' => 'ZeusSiteBundle:SousCategorie',
                    'property' => 'codeClassification',
                    'multiple' => false,
                    'expanded' => false,
                ))
                ->add('imageParution', new ImageParutionType(), array('required' => false))
                ->add('type', 'entity', array(
                    'class' => 'ZeusSiteBundle:TypeParution',
                    'property' => 'libelle', // si pas property ou plusieur alors créer fonction __toString() dans TypeParution
                    'multiple' => false,
                    'expanded' => false,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('type_parution')
                                ->orderBy('type_parution.libelle', 'ASC');
                    }
                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Parution'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'zeus_sitebundle_parution';
    }

}
