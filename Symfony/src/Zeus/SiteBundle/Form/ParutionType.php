<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;


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
                    'multiple' => true,
                    'expanded' => false,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('parution_auteur')
                                ->orderBy('parution_auteur.nom, parution_auteur.prenom', 'ASC');
                    }
                ))
                ->add('traducteurs', 'genemu_jqueryselect2_entity', array(
                    'class' => 'ZeusSiteBundle:Traducteur',
                    'multiple' => true,
                    'expanded' => false,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('parution_traducteur')
                                ->orderBy('parution_traducteur.nom, parution_traducteur.prenom', 'ASC');
                    }
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
        
        $builder->addEventSubscriber(new AddSubmitFormSubscriber());
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
