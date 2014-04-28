<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Zeus\SiteBundle\Entity\Parution;
use Zeus\SiteBundle\Form\ParutionType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Zeus\SiteBundle\Form\Type\SousCategorieDispoType;
use Zeus\SiteBundle\Entity\SousCategorie;

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
		$form = $this->createForm(new ParutionType(), $parution);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$list_erreurs = $validator->validate($parution);
			
			if(count($list_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
				$entity_manager->persist($parution);
				$entity_manager->flush();
                                
                                return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
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
		
		$form = $this->createForm(new ParutionType(), $parution);
		$validator = $this->get('validator');
		
		if($request->isMethod('POST')){
			
			$form->handleRequest($request);
			$liste_erreurs = $validator->validate($parution);
			
			if(count($liste_erreurs) === 0){
				$entity_manager = $this->getDoctrine()->getManager();
                               // print_r($parution);  
				$entity_manager->persist($parution);
                                $entity_manager->flush();
                                
                                return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
			}	
		}
		
		return $this->render('ZeusSiteBundle:Parution:page_modif.html.twig', array(
			'form' => $form->createView(), 
			'image' => $parution->getImageParution() 	
		));
	}
        
        public function supprimerAction(Request $request, $idParution) {
            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('ZeusSiteBundle:Parution');
            $parution = $repository->find($idParution);
            $em->remove($parution);
            $em->flush();

            return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
        }
        
        public function rafraichirSousCategorieDispoAction(Request $request)
        {
            if($request->isXmlHttpRequest()){
               
                $data = $request->request->all();
                $em = $this->getDoctrine()->getManager();
                $repositoryCategorie = $em->getRepository('ZeusSiteBundle:Categorie');
                $categorie = $repositoryCategorie->find($data['idCategorie']);

                $repositorySousCategorie = $em->getRepository('ZeusSiteBundle:SousCategorie');
                $sousCategoriesDispos = $repositorySousCategorie->findAllByCategorie($categorie);

                $encoders = array(new XmlEncoder(), new JsonEncoder());
                $normalizers = array(new GetSetMethodNormalizer());
                $serializer = new Serializer($normalizers, $encoders);

                $formSerializedJSON = $serializer->serialize($sousCategoriesDispos, 'json');
                $response = new Response($formSerializedJSON);
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }
            
        }
	
}
