<?php

/**
 * Class ExemplaireController
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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Zeus\SiteBundle\Entity\Exemplaire;
use Zeus\SiteBundle\Form\ExemplaireType;

/**
 * Class ExemplaireController
 *
 *
 * @category   ExemplaireController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class ExemplaireController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page qui affiche la liste des exemplaires
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Exemplaire');
        $liste_exemplaires = $repository->findBy(array(), array('dateAjout' => 'asc'));

        return $this->render('ZeusSiteBundle:Exemplaire:page_gestion.html.twig', array(
                    'exemplaires' => $liste_exemplaires,
                ));
    }
    /**
     * Fonction ajouterAction
     *
     * Permet l'affichage de la page qui affiche la page d'ajout des exemplaires
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function ajouterAction(Request $request)
    {
        $exemplaire = new Exemplaire();
        $form = $this->createForm(new ExemplaireType(), $exemplaire);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($exemplaire);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($exemplaire);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Exemplaire:page_ajout.html.twig', array(
                    'form' => $form->createView(),
                ));
    }
    /**
     * Fonction modifierAction
     *
     * Permet l'affichage de la page qui affiche la page de modification des exemplaires
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idExemplaire Id de l'exemplaire à modifier
    */
    public function modifierAction(Request $request, $idExemplaire)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaire = $repository->find($idExemplaire);
        $form = $this->createForm(new ExemplaireType(), $exemplaire);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($exemplaire);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($exemplaire);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Exemplaire:page_modif.html.twig', array(
                    'form' => $form->createView(),
                ));
    }
    /**
     * Fonction supprimerAction
     *
     * Permet l'affichage de la page qui affiche la page de suppréssion des exemplaires
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idExemplaire Id de l'exemplaire à supprimer
    */
    public function supprimerAction(Request $request, $idExemplaire)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaire = $repository->find($idExemplaire);
        $em->remove($exemplaire);
        $em->flush();
         return $this->redirect($this->generateUrl('zeus_site_exemplaire_tableau'), 301);
    }
    /**
     * Fonction rafraichirEditionsDispoAction
     *
     * Permet de raffraichir les editions disponibles pour cet exemplaire
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function rafraichirEditionsDispoAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            $data = $request->request->all();
            $em = $this->getDoctrine()->getManager();
            $repositoryParution = $em->getRepository('ZeusSiteBundle:Parution');
            $parution = $repositoryParution->find($data['ref']);

            $repositoryEdition = $em->getRepository('ZeusSiteBundle:Edition');
            $editionsDispos = $repositoryEdition->findAllByParution($parution);

            $liste_editions = array();

            foreach ($editionsDispos as $cle => $edition) {
                $liste_editions[$cle]['value'] = $edition->getId();
                $liste_editions[$cle]['option'] = $edition->__toString();
            }

            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new GetSetMethodNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $formSerializedJSON = $serializer->serialize($liste_editions, 'json');
            $response = new Response($formSerializedJSON);
            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }
    }
}
