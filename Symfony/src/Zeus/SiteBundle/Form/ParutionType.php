<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Zeus\SiteBundle\Form\EventListener\AddSubmitFormSubscriber;
use Zeus\SiteBundle\Entity\Categorie;


class ParutionType extends AbstractType {
    
    private $categorie;
    
    public function __construct(Categorie $categorie = null){
        $this->categorie = $categorie;   
    }

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
            ->add('categorie', 'genemu_jqueryselect2_entity', array(
                'class' => 'ZeusSiteBundle:Categorie',
                'mapped' => false,
                'multiple' => false,
                'expanded' => false,
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('categorie')
                            ->orderBy('categorie.codeClassification', 'ASC');
                }
            ))
        ;
                
            if($this->categorie !== null){
                $builder
                    ->add('sousCategorie', 'genemu_jqueryselect2_entity', array(
                        'class' => 'ZeusSiteBundle:SousCategorie',
                        'multiple' => false,
                        'expanded' => false,
                        'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('sc')
                                       ->where('sc.categorie = :idCategorie')
                                       ->setParameter('idCategorie', $this->categorie->getId())
                                       ->orderBy('sc.codeClassification', 'ASC');
                        }
                    ));
            }
            else{ 
                $builder
                    ->add('sousCategorie', 'genemu_jqueryselect2_entity', array(
                        'class' => 'ZeusSiteBundle:SousCategorie',
                        'multiple' => false,
                        'expanded' => false,
                    ));  
            }
                        
        $builder    
            ->add('imageParution', new ImageParutionType(), array('required' => false))
            ->add('type', 'genemu_jqueryselect2_entity', array(
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
