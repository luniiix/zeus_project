<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Edition;
use Zeus\SiteBundle\Form\EditionType;

class EditionController extends Controller {

    public function indexAction(Request $request) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Edition');
        $liste_editions = $repository->findBy(array(), array('date' => 'asc'));

        return $this->render('ZeusSiteBundle:Edition:page_gestion.html.twig', array(
                    'editions' => $liste_editions,
                ));
    }

    public function ajouterAction(Request $request) {
        $edition = new Edition();
        $form = $this->createForm(new EditionType(), $edition);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($edition);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($edition);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_edition_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Edition:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function modifierAction(Request $request, $idEdition) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Edition');
        $edition = $repository->find($idEdition);
        $form = $this->createForm(new EditionType(), $edition);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($edition);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($edition);
                $entity_manager->flush();
                
                return $this->redirect($this->generateUrl('zeus_site_edition_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Edition:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function supprimerAction(Request $request, $idEdition) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Edition');
        $edition = $repository->find($idEdition);
        $em->remove($edition);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_edition_tableau'), 301);
    }

}

