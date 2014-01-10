<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function indexAction()
    {
    	$repositoryParution = $this->getDoctrine()
    					->getManager()
    					->getRepository('ZeusSiteBundle:Parution');
    	$parution = $repositoryParution->aaLasts();
    	
    	
        return $this->render('ZeusSiteBundle:Default:index.html.twig'
        		, array(
         				'parution'   => $parution,
        				'url_logo' => 'http://www.nasa.gov/images/content/711375main_grail20121205_4x3_946-710.jpg',
						'tab_menu' => array('Accueil','Onglet1','Onglet2','Onglet3')
        		));
    }
}
