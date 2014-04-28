<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Auteur;
use Zeus\SiteBundle\OtherClass\AuteursCollection;
use Zeus\SiteBundle\Form\AuteursCollectionType;
use Zeus\SiteBundle\Form\AuteurType;

class AuteurController extends Controller {

    public function indexAction(Request $request) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
        $liste_auteurs = $repository->findBy(array(), array('nom' => 'asc'));

        return $this->render('ZeusSiteBundle:Auteur:page_gestion.html.twig', array(
                    'auteurs' => $liste_auteurs,
                ));
        /* $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
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

          return $this->render('ZeusSiteBundle:Auteur:page_gestion.html.twig', array(
          'form' => $form->createView(),
          )); */
    }

    public function ajouterAction(Request $request) {
        $auteur = new Auteur();
        $form = $this->createForm(new AuteurType(), $auteur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($auteur);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($auteur);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_auteur_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Auteur:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function modifierAction(Request $request, $idAuteur) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
        $auteur = $repository->find($idAuteur);
        $form = $this->createForm(new AuteurType(), $auteur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($auteur);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($auteur);
                $entity_manager->flush();
                
                return $this->redirect($this->generateUrl('zeus_site_auteur_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Auteur:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function supprimerAction(Request $request, $idAuteur) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Auteur');
        $auteur = $repository->find($idAuteur);
        $em->remove($auteur);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_auteur_tableau'), 301);
    }

}
