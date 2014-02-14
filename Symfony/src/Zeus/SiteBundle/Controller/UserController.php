<?php

namespaceZeus\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
  public function indexAction()
  {
    return new Response("Hello World !"); 
  }
}