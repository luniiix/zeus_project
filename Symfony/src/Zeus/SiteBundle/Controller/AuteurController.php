<?php

/**
 * Class AuteurController
 *
 *
 * @category Class
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
use Zeus\SiteBundle\Entity\Auteur;
use Zeus\SiteBundle\OtherClass\AuteursCollection;
use Zeus\SiteBundle\Form\AuteursCollectionType;
use Zeus\SiteBundle\Form\AuteurType;

/**
 * Class AuteurController
 *
 *
 * @category   AuteurController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class AuteurController extends Controller
{

    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la liste des auteurs
     *
     * @author FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param Request $request
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
        $liste_auteurs = $repository->findBy(array(), array('nom' => 'asc'));

        return $this->render('ZeusSiteBundle:Auteur:page_gestion.html.twig', array(
                    'auteurs' => $liste_auteurs,
                ));
        /* $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
          $liste_auteurs = $repository->findBy(array(), array('nom' => 'asc'));
          $auteurs = new AuteursCollection();
          $auteurs->setAuteurs($liste_auteurs);
          $form = $this->createForm(new AuteursCollectionType(), $auteurs);
          $validator = $this->get('validator');

          if($request->isMethod('POST')){

          $form->handleRequest($request);
          $liste_erreurs = $validator->validate($auteurs);

          if(count($liste_erreurs) === 0){

          foreach ($auteurs->getAuteurs() as $auteur){
          $entity_manager = $this->getDoctrine()->getManager();
          $entity_manager->persist($auteur);
          }
          $entity_manager->flush();
          }
          }

          return $this->render('ZeusSiteBundle:Auteur:page_gestion.html.twig', array(
          'form' => $form->createView(),
          )); */
    }

    /**
     * Fonction ajouterAction
     *
     * Permet d'ajouter un auteur
     *
     * @author FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Request $request
     */
    public function ajouterAction(Request $request)
    {
        $auteur = new Auteur();
        $form = $this->createForm(new AuteurType(), $auteur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
           // $liste_erreurs = $validator->validate($auteur);

           // if (count($liste_erreurs) === 0) {
            if ($form->isValid()) {
                echo "ok";
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($auteur);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_auteur_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Auteur:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    /**
     * Fonction modifierAction
     *
     * Permet de modifier un auteur
     *
     * @author FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Request $request
     * @param integer $idAuteur : id de l'auteur que l'on veut modifier
     */
    public function modifierAction(Request $request, $idAuteur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
        $auteur = $repository->find($idAuteur);
        $form = $this->createForm(new AuteurType(), $auteur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($auteur);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($auteur);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_auteur_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Auteur:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    /**
     * Fonction supprimerAction
     *
     * Permet de supprimer un auteur
     *
     * @author FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Request $request
     * @param integer $idAuteur : id de l'auteur que l'on veut supprimer
     */
    public function supprimerAction(Request $request, $idAuteur)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Auteur');
        $auteur = $repository->find($idAuteur);
        $em->remove($auteur);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_auteur_tableau'), 301);
    }

    /**
     * Fonction visualiserAction
     *
     * Permet de visualiser un auteur
     *
     * @author FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @param Request $request
     * @param integer $idAuteur : id de l'auteur que l'on veut afficher
     */
    public function visualiserAction(Request $request, $idAuteur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Auteur');
        $auteur = $repository->find($idAuteur);

        return $this->render('ZeusSiteBundle:Auteur:page_visualisation.html.twig', array(
                    'auteur' => $auteur,
                ));
    }
}
