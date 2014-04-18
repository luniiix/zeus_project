<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Groupe;
use Zeus\SiteBundle\OtherClass\GroupesCollection;
use Zeus\SiteBundle\Form\GroupesCollectionType;
use Zeus\SiteBundle\Form\GroupeAjoutType;
use Zeus\SiteBundle\Form\GroupeModifType;

class GroupeController extends Controller {

    public function indexAction(Request $request) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Groupe');
        $liste_groupes = $repository->findBy(array(), array('nom' => 'asc'));

        return $this->render('ZeusSiteBundle:Groupe:page_gestion.html.twig', array(
                    'groupes' => $liste_groupes,
                ));
        /* $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Groupe');
          $liste_groupes = $repository->findBy(array(), array('nom' => 'asc'));
          $groupes = new GroupesCollection();
          $groupes->setGroupes($liste_groupes);
          $form = $this->createForm(new GroupesCollectionType(), $groupes);
          $validator = $this->get('validator');

          if($request->isMethod('POST')){

          $form->handleRequest($request);
          $liste_erreurs = $validator->validate($groupes);

          if(count($liste_erreurs) === 0){

          foreach ($groupes->getGroupes() as $groupe){
          $entity_manager = $this->getDoctrine()->getManager();
          $entity_manager->persist($groupe);
          }
          $entity_manager->flush();
          }
          }

          return $this->render('ZeusSiteBundle:Groupe:page_gestion.html.twig', array(
          'form' => $form->createView(),
          )); */
    }

    public function ajouterAction(Request $request) {
        $groupe = new Groupe();
        $form = $this->createForm(new GroupeAjoutType(), $groupe);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($groupe);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($groupe);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_groupe_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Groupe:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function modifierAction(Request $request, $idGroupe) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Groupe');
        $groupe = $repository->find($idGroupe);
        $form = $this->createForm(new GroupeModifType(), $groupe);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($groupe);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($groupe);
                $entity_manager->flush();
                
                return $this->redirect($this->generateUrl('zeus_site_groupe_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Groupe:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function supprimerAction(Request $request, $idGroupe) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Groupe');
        $groupe = $repository->find($idGroupe);
        $em->remove($groupe);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_groupe_tableau'), 301);
    }

}

