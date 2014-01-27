<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Auteur;
use Zeus\SiteBundle\OtherClass\AuteursCollection;
use Zeus\SiteBundle\Form\AuteursCollectionType;
use Zeus\SiteBundle\Form\AuteurAjoutType;
use Zeus\SiteBundle\Form\AuteurModifType;

class AuteurController extends Controller
{
	public function indexAction(Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
		$liste_auteurs = $repository->findBy(array(), array('nom' => 'asc'));
		$auteurs = new AuteursCollection(); 
		$auteurs->setAuteurs($liste_auteurs);
		$form = $this->createForm(new AuteursCollectionType(), $auteurs);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($auteurs);
			
			if(count($liste_erreurs) === 0){
				
				foreach ($auteurs->getAuteurs() as $auteur){
					$entity_manager = $this->getDoctrine()->getManager();
					$entity_manager->persist($auteur);
				}
				$entity_manager->flush();
			}
		}
		
		return $this->render('ZeusSiteBundle:Auteur:tableau.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	public function ajouterAction(Request $request)
	{	
		$auteur = new Auteur();
		$form = $this->createForm(new AuteurAjoutType(), $auteur);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){

			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($auteur);
		
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($auteur);
				$entity_manager->flush();
			}
		}
		
		return $this->render('ZeusSiteBundle:Auteur:ajouter.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	public function modifierAction(Request $request, $idAuteur)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
		$auteur = $repository->find($idAuteur);
		$form = $this->createForm(new AuteurModifType(), $auteur);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($auteur);
			
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($auteur);
				$entity_manager->flush();
			}	
		}
		
		return $this->render('ZeusSiteBundle:Auteur:modifier.html.twig', array(
			'form' => $form->createView(),	
		));
	}
	
}
