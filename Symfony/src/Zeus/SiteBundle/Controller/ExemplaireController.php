<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Zeus\SiteBundle\Entity\Exemplaire;
use Zeus\SiteBundle\Form\ExemplaireType;

class ExemplaireController extends Controller {

    public function indexAction(Request $request) 
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Exemplaire');
        $liste_exemplaires = $repository->findBy(array(), array('dateAjout' => 'asc'));

        return $this->render('ZeusSiteBundle:Exemplaire:page_gestion.html.twig', array(
                    'exemplaires' => $liste_exemplaires,
                ));
    }

    public function ajouterAction(Request $request) 
    {
        $exemplaire = new Exemplaire();
        $form = $this->createForm(new ExemplaireType(), $exemplaire);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($exemplaire);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($exemplaire);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Exemplaire:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function modifierAction(Request $request, $idExemplaire) 
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaire = $repository->find($idExemplaire);
        $form = $this->createForm(new ExemplaireType(), $exemplaire);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($exemplaire);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($exemplaire);
                $entity_manager->flush();
                
                return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Exemplaire:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function supprimerAction(Request $request, $idExemplaire) 
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaire = $repository->find($idExemplaire);
        $em->remove($exemplaire);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
    }
    
    public function rafraichirEditionsDispoAction(Request $request)
    {
        if($request->isXmlHttpRequest()){
               
           
            $data = $request->request->all();
            $em = $this->getDoctrine()->getManager();
            $repositoryParution = $em->getRepository('ZeusSiteBundle:Parution');
            $parution = $repositoryParution->find($data['idParution']);
            //echo $data['idParution'];
             //echo $parution->getTitre();
            //echo "ohla !!";
            
            $repositoryEdition = $em->getRepository('ZeusSiteBundle:Edition');
           
            $editionsDispos = $repositoryEdition->findAllByParution($parution);
            foreach ($editionsDispos as $elem){
                echo $elem->getNumero();
            }
            
           /* $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new GetSetMethodNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $formSerializedJSON = $serializer->serialize($editionsDispos, 'json');
            $response = new Response($formSerializedJSON);
            $response->headers->set('Content-Type', 'application/json');
          
            return $response;*/
        }
    }

}

