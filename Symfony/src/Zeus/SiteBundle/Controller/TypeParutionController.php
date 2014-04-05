<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\TypeParution;
use Zeus\SiteBundle\Form\TypeParutionAjoutType;
use Zeus\SiteBundle\Form\TypeParutionModifType;

class TypeParutionController extends Controller
{
	public function indexAction(Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:TypeParution');
		$liste_typesparutions = $repository->findBy(array(), array('libelle' => 'asc'));
		
		return $this->render('ZeusSiteBundle:TypeParution:page_gestion.html.twig', array(
			'typesparutions' => $liste_typesparutions,
		));
	}
	
	public function ajouterAction(Request $request)
	{	
		$typeParution = new TypeParution();
		$form = $this->createForm(new TypeParutionAjoutType(), $typeParution); 
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){

			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($typeParution);
		
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($typeParution);
				$entity_manager->flush();
			}
		}
		
		return $this->render('ZeusSiteBundle:TypeParution:page_ajout.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	public function modifierAction(Request $request, $idTypeParution)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:TypeParution');
		$typeParution = $repository->find($idTypeParution);
		$form = $this->createForm(new TypeParutionModifType(), $typeParution);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($typeParution);
			
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($typeParution);
				$entity_manager->flush();
			}	
		}
		
		return $this->render('ZeusSiteBundle:TypeParution:page_modif.html.twig', array(
			'form' => $form->createView(),	
		));
	}
	
}
