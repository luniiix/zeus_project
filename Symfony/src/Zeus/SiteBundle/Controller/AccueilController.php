<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Controller par défault
 */
class AccueilController extends Controller {

    /**
     * 
     * @return type appelle la page d'accueil
     */
    public function indexAction() {
        $repoParution = $this->getDoctrine()
                ->getManager()
                ->getRepository('ZeusSiteBundle:Parution');
        $parutions = $repoParution->findAll('DESC', 5);

//        $form = $this->createForm(new \Zeus\SiteBundle\Form\RechercheType());
//        $validator = $this->get('validator');

//        if ($request->isMethod('POST')) {
//
//            $form->handleRequest($request);
//            $list_erreurs = $validator->validate(new RechercheType());
//
//            if (count($list_erreurs) === 0) {
//                $entity_manager = $this->getDoctrine()->getManager();
//                $entity_manager->persist(new RechercheType());
//                $entity_manager->flush();
//            }
//        }
        return $this->render('ZeusSiteBundle:Default:index.html.twig', array(
                    'parutions' => $parutions,
//                    'form' => $form->createView(),
        ));
    }

}
