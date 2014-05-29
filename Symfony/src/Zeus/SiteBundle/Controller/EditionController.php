<?php
/**
 * Class EditionController
 *
 * @category   Class
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\SiteBundle\Controller;

/**
 * Import des class
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Zeus\SiteBundle\Entity\Edition;
use Zeus\SiteBundle\Form\EditionType;

/**
 * Class EditionController
 *
 *
 * @category   EditionController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class EditionController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page qui affiche la liste des editions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Edition');
        $query_builder_editions = $repository->findAllPagination();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                          $query_builder_editions,
                          $this->get('request')->query->get('page', 1));

        return $this->render('ZeusSiteBundle:Edition:page_gestion.html.twig', array(
                'pagination' => $pagination,
        ));
    }
    /**
     * Fonction ajouterAction
     *
     * Permet l'affichage de la page qui permet l'ajout des editions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function ajouterAction(Request $request)
    {
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
    /**
     * Fonction modifierAction
     *
     * Permet l'affichage de la page qui permet la modiciation des editions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idEdition Id de l'edition à modifier
    */
    public function modifierAction(Request $request, $idEdition)
    {
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
    /**
     * Fonction supprimerAction
     *
     * Permet l'affichage de la page qui permet la suppréssion des editions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idEdition Id de l'edition à supprimer
    */
    public function supprimerAction(Request $request, $idEdition)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Edition');
        $edition = $repository->find($idEdition);
        $em->remove($edition);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_edition_tableau'), 301);
    }

    /**
     * Fonction visualiserAction
     *
     * Permet l'affichage de la page de visualisation (fiche) de l'edition
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idEdition Id de l'exemplaire à visualiser
     */
    public function visualiserAction(Request $request, $idEdition)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Edition');
        $edition     = $repository->find($idEdition);

        return $this->render('ZeusSiteBundle:Edition:page_visualisation.html.twig', array(
                    'edition' => $edition,
                ));
    }
}
