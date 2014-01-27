<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ParutionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text')
            ->add('resume', 'textarea', array('required' => false))
            ->add('isActif', 'checkbox', array('required' => false))
          	->add('auteurs', 'entity', array(
        			'class'    => 'ZeusSiteBundle:Auteur',
        			'multiple' => true,
        			'expanded' => false,
          			'query_builder' => function(EntityRepository $er) {
          				return $er->createQueryBuilder('auteur')
          						  ->orderBy('auteur.nom, auteur.prenom', 'ASC');
          			}
     		 ))
            ->add('image', new ImageType(), array('required' => false))
            ->add('categorie', 'entity', array(
     		 		'class'		=> 'ZeusSiteBundle:CategorieParution',
            		'property' => 'libelle',		// si pas property ou plusieur alors créer fonction __toString() dans TypeParution
            		'multiple' 	=> false,
            		'expanded'	=> false,
            		'query_builder' => function(EntityRepository $er) {
          				return $er->createQueryBuilder('categorie_parution')
          						  ->orderBy('categorie_parution.libelle', 'ASC');
          			}
     		 ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Zeus\SiteBundle\Entity\Parution'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'zeus_sitebundle_parution';
    }
}
