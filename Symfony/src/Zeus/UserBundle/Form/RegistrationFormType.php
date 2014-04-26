<?php
 
namespace Zeus\UserBundle\Form;
 
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
 
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('nom','text',array('label' => 'Nom'))
            ->add('prenom','text',array('label' => 'Prénom'))
            ->add('service','text',array('label' => 'Service'))
        ;
    }
 
    public function getName()
    {
        return 'zeus_userbundle_registration';
    }
}