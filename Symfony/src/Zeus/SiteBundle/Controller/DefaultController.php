<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $repoParution = $this->getDoctrine()
     					->getManager()
     					->getRepository('ZeusSiteBundle:Parution');
        $parutions = $repoParution->findAll('DESC', 5);
        return $this->render('ZeusSiteBundle:Default:index.html.twig' , array(
            'parutions' => $parutions,
        ));
    }
}
