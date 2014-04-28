<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Service;
use Zeus\SiteBundle\OtherClass\ServicesCollection;
use Zeus\SiteBundle\Form\ServicesCollectionType;
use Zeus\SiteBundle\Form\ServiceType;

class ServiceController extends Controller {

    public function indexAction(Request $request) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Service');
        $liste_services = $repository->findBy(array(), array('nom' => 'asc'));

        return $this->render('ZeusSiteBundle:Service:page_gestion.html.twig', array(
            'services' => $liste_services,
            )
        );
        /* $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Service');
          $liste_services = $repository->findBy(array(), array('nom' => 'asc'));
          $services = new ServicesCollection();
          $services->setServices($liste_services);
          $form = $this->createForm(new ServicesCollectionType(), $services);
          $validator = $this->get('validator');

          if($request->isMethod('POST')){

          $form->handleRequest($request);
          $liste_erreurs = $validator->validate($services);

          if(count($liste_erreurs) === 0){

          foreach ($services->getServices() as $service){
          $entity_manager = $this->getDoctrine()->getManager();
          $entity_manager->persist($service);
          }
          $entity_manager->flush();
          }
          }

          return $this->render('ZeusSiteBundle:Service:page_gestion.html.twig', array(
          'form' => $form->createView(),
          )); */
    }

    public function ajouterAction(Request $request) {
        $service = new Service();
        $form = $this->createForm(new ServiceType(), $service);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($service);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($service);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_service_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Service:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function modifierAction(Request $request, $idService) {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Service');
        $service = $repository->find($idService);
        $form = $this->createForm(new ServiceType(), $service);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($service);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($service);
                $entity_manager->flush();
                
                return $this->redirect($this->generateUrl('zeus_site_service_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Service:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function supprimerAction(Request $request, $idService) {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Service');
        $service = $repository->find($idService);
        $em->remove($service);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_service_tableau'), 301);
    }

}
