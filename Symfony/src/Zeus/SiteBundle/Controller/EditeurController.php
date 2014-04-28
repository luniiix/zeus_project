<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Editeur;
use Zeus\SiteBundle\OtherClass\EditeurCollection;
use Zeus\SiteBundle\Form\EditeurCollectionType;
use Zeus\SiteBundle\Form\EditeurAjoutType;
use Zeus\SiteBundle\Form\EditeurModifType;

class EditeurController extends Controller
{
	public function indexAction(Request $request)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Editeur');
		$liste_editeur = $repository->findBy(array(), array('nom' => 'asc'));
		
		return $this->render('ZeusSiteBundle:Editeur:page_gestion.html.twig', array(
			'editeurs' => $liste_editeur,
		));
	}
	
	public function ajouterAction(Request $request)
	{	
		$editeur = new Editeur();
		$form = $this->createForm(new EditeurAjoutType(), $editeur);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){

			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($editeur);
		
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($editeur);
				$entity_manager->flush();
			}
                        
                        return $this->redirect($this->generateUrl('zeus_site_editeur_tableau'), 301);
		}
		
		return $this->render('ZeusSiteBundle:Editeur:page_ajout.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	public function modifierAction(Request $request, $idEditeur)
	{
		$repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Editeur');
		$editeur = $repository->find($idEditeur);
		$form = $this->createForm(new EditeurModifType(), $editeur);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($editeur);
			
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($editeur);
				$entity_manager->flush();
			}
                        
                        return $this->redirect($this->generateUrl('zeus_site_editeur_tableau'), 301);
		}
		
		return $this->render('ZeusSiteBundle:Editeur:page_modif.html.twig', array(
			'form' => $form->createView(),	
		));
	}
        
        public function supprimerAction(Request $request, $idEditeur) {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('ZeusSiteBundle:Editeur');
            $editeur = $repository->find($idEditeur);
            $em->remove($editeur);
            $em->flush();
             return $this->redirect($this->generateUrl('zeus_site_editeur_tableau'), 301);
    }
	
}
