<?php

/**
 * Class EditeurController
 *
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
use Zeus\SiteBundle\Entity\Editeur;
use Zeus\SiteBundle\OtherClass\EditeurCollection;
use Zeus\SiteBundle\Form\EditeurCollectionType;
use Zeus\SiteBundle\Form\EditeurAjoutType;
use Zeus\SiteBundle\Form\EditeurModifType;

/**
 * Class EditeurController
 *
 *
 * @category   EditeurController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class EditeurController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page qui affiche la liste des editeurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function indexAction(Request $request)
    {
            $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Editeur');
            $liste_editeur = $repository->findBy(array(), array('nom' => 'asc'));

            return $this->render('ZeusSiteBundle:Editeur:page_gestion.html.twig', array(
                    'editeurs' => $liste_editeur,
            ));
    }
    /**
     * Fonction ajouterAction
     *
     * Permet l'ajout d'un editeur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function ajouterAction(Request $request)
    {
        $editeur = new Editeur();
        $form = $this->createForm(new EditeurAjoutType(), $editeur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($editeur);

            if (count($liste_erreurs) === 0) {
                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($editeur);
                    $entity_manager->flush();
            }

            return $this->redirect($this->generateUrl('zeus_site_editeur_tableau'), 301);
        }

        return $this->render('ZeusSiteBundle:Editeur:page_ajout.html.twig', array(
                'form' => $form->createView(),
        ));
    }
    /**
     * Fonction modifierAction
     *
     * Permet la modification d'un editeur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idEditeur Id de l'editeur à modifier
    */
    public function modifierAction(Request $request, $idEditeur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Editeur');
        $editeur = $repository->find($idEditeur);
        $form = $this->createForm(new EditeurModifType(), $editeur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($editeur);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($editeur);
                $entity_manager->flush();
            }

            return $this->redirect($this->generateUrl('zeus_site_editeur_tableau'), 301);
        }

        return $this->render('ZeusSiteBundle:Editeur:page_modif.html.twig', array(
                'form' => $form->createView(),
        ));
    }
    /**
     * Fonction supprimerAction
     *
     * Permet la suppression d'un editeur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idEditeur Id de l'editeur à supprimer
    */
    public function supprimerAction(Request $request, $idEditeur)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Editeur');
        $editeur = $repository->find($idEditeur);
        $em->remove($editeur);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_editeur_tableau'), 301);
    }
    /**
     * Fonction visualiserAction
     *
     * Permet la visualisation d'un editeur
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idEditeur Id de l'editeur à visualiser
    */
    public function visualiserAction(Request $request, $idEditeur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Editeur');
        $editeur = $repository->find($idEditeur);

        return $this->render('ZeusSiteBundle:Editeur:page_visualisation.html.twig', array(
                    'editeur' => $editeur,
                ));
    }
}
