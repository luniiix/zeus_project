<?php
/**
 * Class ServiceController
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
use Zeus\SiteBundle\Entity\Traducteur;
use Zeus\SiteBundle\Form\TraducteurType;

/**
 * Class TraducteurController
 *
 *
 * @category   TraducteurController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class TraducteurController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page qui affiche la liste des traducteurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
        $liste_traducteurs = $repository->findBy(array(), array('nom' => 'asc'));

        return $this->render('ZeusSiteBundle:Traducteur:page_gestion.html.twig', array(
                    'traducteurs' => $liste_traducteurs,
                ));
        /* $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
          $liste_traducteurs = $repository->findBy(array(), array('nom' => 'asc'));
          $traducteurs = new TraducteursCollection();
          $traducteurs->setTraducteurs($liste_traducteurs);
          $form = $this->createForm(new TraducteursCollectionType(), $traducteurs);
          $validator = $this->get('validator');

          if($request->isMethod('POST')){

          $form->handleRequest($request);
          $liste_erreurs = $validator->validate($traducteurs);

          if(count($liste_erreurs) === 0){

          foreach ($traducteurs->getTraducteurs() as $traducteur){
          $entity_manager = $this->getDoctrine()->getManager();
          $entity_manager->persist($traducteur);
          }
          $entity_manager->flush();
          }
          }

          return $this->render('ZeusSiteBundle:Traducteur:page_gestion.html.twig', array(
          'form' => $form->createView(),
          )); */
    }
    /**
     * Fonction ajouterAction
     *
     * Permet l'affichage de la page qui affiche la page d'ajout des traducteurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function ajouterAction(Request $request)
    {
        $traducteur = new Traducteur();
        $form = $this->createForm(new TraducteurType(), $traducteur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($traducteur);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($traducteur);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_traducteur_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Traducteur:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }
    /**
     * Fonction modifierAction
     *
     * Permet l'affichage de la page qui affiche la page de modification des traducteurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idTraducteur Id du traducteur de la parution à modifier
    */
    public function modifierAction(Request $request, $idTraducteur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
        $traducteur = $repository->find($idTraducteur);
        $form = $this->createForm(new TraducteurType(), $traducteur);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($traducteur);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($traducteur);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_traducteur_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Traducteur:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }
    /**
     * Fonction supprimerAction
     *
     * Permet l'affichage de la page qui affiche la page de suppréssion des traducteurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idTraducteur Id du traducteur de la parution à supprimer
    */
    public function supprimerAction(Request $request, $idTraducteur)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Traducteur');
        $traducteur = $repository->find($idTraducteur);
        $em->remove($traducteur);
        $em->flush();

        return $this->redirect($this->generateUrl('zeus_site_traducteur_tableau'), 301);
    }
    /**
     * Fonction visualiserAction
     *
     * Permet l'affichage de la page qui affiche la page de visualisation des traducteurs
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idTraducteur Id du traducteur de la parution à visualiser
    */
    public function visualiserAction(Request $request, $idTraducteur)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Traducteur');
        $traducteur = $repository->find($idTraducteur);

        return $this->render('ZeusSiteBundle:Traducteur:page_visualisation.html.twig', array(
                    'traducteur' => $traducteur,
                ));
    }
}
