<?php

namespace Zeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use Zeus\SiteBundle\Entity\User;

class UserController extends Controller
{
	public function editAction()
	{
		return $this->render('ZeusSiteBundle:User:edit.html.twig', array('titre' => 'Informations personnelles'));
	}
		
}