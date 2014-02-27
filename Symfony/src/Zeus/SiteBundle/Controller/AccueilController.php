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
        
    	$parution = $repositoryParution->find(1);
    	
    	//var_dump($parution);
    	
       return $this->render('ZeusSiteBundle:Default:index.html.twig'
       		, array(
         				'parution'   => $parution,
						'tab_menu' => array('Accueil','Onglet1','Onglet2','Onglet3')
        		));
    }
}
