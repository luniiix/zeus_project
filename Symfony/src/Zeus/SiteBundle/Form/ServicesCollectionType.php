<?php

namespace Zeus\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ServicesCollectionType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('services', 'collection', array('type' => new ServiceType()))
			->add('enregistrer', 'submit')
		;
	}
	
	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => 'Zeus\SiteBundle\OtherClass\ServicesCollection'
		));
	}
	
	/**
	 * @return string
	 */
	public function getName()
	{
		return 'zeus_sitebundle_servicescollection';
	}
}
