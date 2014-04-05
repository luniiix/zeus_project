<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Traducteur;
use Zeus\SiteBundle\Form\TraducteurType;

class TraducteurController extends Controller
{
    public function indexAction(Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
		$liste_traducteurs = $repository->findBy(array(), array('nom' => 'asc'));
		
		return $this->render('ZeusSiteBundle:Traducteur:page_gestion.html.twig', array(
			'traducteurs' => $liste_traducteurs,
		));
		/*$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
		$liste_traducteurs = $repository->findBy(array(), array('nom' => 'asc'));
		$traducteurs = new TraducteursCollection(); 
		$traducteurs->setTraducteurs($liste_traducteurs);
		$form = $this->createForm(new TraducteursCollectionType(), $traducteurs);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($traducteurs);
			
			if(count($liste_erreurs) === 0){
				
				foreach ($traducteurs->getTraducteurs() as $traducteur){
					$entity_manager = $this->getDoctrine()->getManager();
					$entity_manager->persist($traducteur);
				}
				$entity_manager->flush();
			}
		}
		
		return $this->render('ZeusSiteBundle:Traducteur:page_gestion.html.twig', array(
			'form' => $form->createView(),
		));*/
	}
	
	public function ajouterAction(Request $request)
	{	
		$traducteur = new Traducteur();
		$form = $this->createForm(new TraducteurType(), $traducteur);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){

			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($traducteur);
		
			if(count($liste_erreurs) === 0){
                            $entity_manager = $this->getDoctrine()->getManager();
                            $entity_manager->persist($traducteur);
                            $entity_manager->flush();
			}
		}
		
		return $this->render('ZeusSiteBundle:Traducteur:page_ajout.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	public function modifierAction(Request $request, $idTraducteur)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
		$traducteur = $repository->find($idTraducteur);
		$form = $this->createForm(new TraducteurType(), $traducteur);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($traducteur);
			
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($traducteur);
				$entity_manager->flush();
			}	
		}
		
		return $this->render('ZeusSiteBundle:Traducteur:page_modif.html.twig', array(
			'form' => $form->createView(),	
		));
	}
	
}
