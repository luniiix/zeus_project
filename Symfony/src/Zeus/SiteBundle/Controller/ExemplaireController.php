<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Exemplaire;
use Zeus\SiteBundle\Form\ExemplaireType;

class ExemplaireController extends Controller {

    public function indexAction(Request $request) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Exemplaire');
        $liste_exemplaires = $repository->findBy(array(), array('dateAjout' => 'asc'));

        return $this->render('ZeusSiteBundle:Exemplaire:page_gestion.html.twig', array(
                    'exemplaires' => $liste_exemplaires,
                ));
    }

    public function ajouterAction(Request $request) {
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

    public function modifierAction(Request $request, $idExemplaire) {
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

    public function supprimerAction(Request $request, $idExemplaire) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaire = $repository->find($idExemplaire);
        $em->remove($exemplaire);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
    }

}

