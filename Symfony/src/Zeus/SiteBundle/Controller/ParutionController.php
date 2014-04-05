<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Parution;
use Zeus\SiteBundle\Form\ParutionAjoutType;
use Zeus\SiteBundle\Form\ParutionModifType;

class ParutionController extends Controller
{
	public function indexAction(Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Parution');
		$liste_parution = $repository->findBy(array(), array('dateAjout' => 'desc'));
		
		return $this->render('ZeusSiteBundle:Parution:page_gestion.html.twig', array(
			'parutions' => $liste_parution,
		));
	}
	
	public function ajouterAction(Request $request)
	{	
		$parution = new Parution();
		$form = $this->createForm(new ParutionAjoutType(), $parution);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$list_erreurs = $validator->validate($parution);
			
			if(count($list_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($parution);
				$entity_manager->flush();
			}
		}
		
		return $this->render('ZeusSiteBundle:Parution:page_ajout.html.twig', array(
				'form' => $form->createView(),
		));
	}
	
	public function modifierAction(Request $request, $idParution)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Parution');
		$parution = $repository->find($idParution);
		
		$form = $this->createForm(new ParutionModifType(), $parution);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($parution);
			
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($parution);
				$entity_manager->flush();
			}	
		}
		
		return $this->render('ZeusSiteBundle:Parution:page_modif.html.twig', array(
			'form' => $form->createView(), 
			'image' => $parution->getImageParution() 	
		));
	}
	
}
