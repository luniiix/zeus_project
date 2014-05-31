<?php
/**
 * Class ParutionController
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
use Zeus\SiteBundle\Entity\Parution;
use Zeus\SiteBundle\Entity\ExemplaireRepository;
use Zeus\SiteBundle\Form\ParutionType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Debug\Debug;

/**
 * Class ParutionController
 *
 *
 * @category   ParutionController
 * @package    Controller
 * @author FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class ParutionController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page qui affiche la liste des parutions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function indexAction(Request $request)
    {
            $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Parution');
            $query_builder_parutions = $repository->findAllPagination();

            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query_builder_parutions,
                $this->get('request')->query->get('page', 1)
            );

            return $this->render('ZeusSiteBundle:Parution:page_gestion.html.twig', array(
                    'pagination' => $pagination,
            ));
    }
    /**
     * Fonction ajouterAction
     *
     * Permet l'affichage de la page qui permet l'ajout des parutions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function ajouterAction(Request $request)
    {
        $parution = new Parution();
        $form = $this->createForm(new ParutionType(), $parution);
        $alert = $this->get('session')->getFlashBag();

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($parution);
                $entity_manager->flush();
                $alert->add('success',
                        'La parution a bien été ajoutée.');

                return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Parution:page_ajout.html.twig', array(
                        'form' => $form->createView(),
        ));
    }
    /**
     * Fonction modifierAction
     *
     * Permet l'affichage de la page qui permet les modifications des parutions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idParution Id de la parution à modifier
    */
    public function modifierAction(Request $request, $idParution)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Parution');
        $parution = $repository->find($idParution);
        $form = $this->createForm(new ParutionType(), $parution);
        $alert = $this->get('session')->getFlashBag();

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($parution);
                $entity_manager->flush();
                $alert->add(
                    'success',
                    'La parution a bien été modifiée.'
                );

                return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:Parution:page_modif.html.twig', array(
                'form' => $form->createView(),
                'image' => $parution->getImageParution()
        ));
    }
    /**
     * Fonction supprimerAction
     *
     * Permet l'affichage de la page qui permet la suppréssion des parutions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idParution Id de la parution à supprimer
    */
    public function supprimerAction(Request $request, $idParution)
    {
        $em_parution = $this->getDoctrine()->getManager();
        $repository_parution = $em_parution->getRepository('ZeusSiteBundle:Parution');
        $parution = $repository_parution->find($idParution);

        $repository_exemplaire = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaires = $repository_exemplaire->findByParution($parution);

        $alert = $this->get('session')->getFlashBag();

        if(count($exemplaires) !== 0){
            $alert->add('error',
                        'Impossible de supprimer cette parution car elle est utilisée dans un exemplaire.');
        }
        else{
            foreach($parution->getAuteurs() as $auteur){
                $parution->removeAuteur($auteur);
            }
            foreach($parution->getTraducteurs() as $traducteur){
                $parution->removeTraducteur($traducteur);
            }
            $em_parution->persist($parution);
            $em_parution->flush();

            $em_parution->remove($parution);
            $em_parution->flush();
            $alert->add('success',
                        'La parution a bien été supprimée.');
        }

         return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
    }

    /**
     * Fonction visualiserAction
     *
     * Permet l'affichage de la page de visualisation (fiche) de la parution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idParution Id de la parution parution à visualiser
     */
    public function visualiserAction(Request $request, $idParution)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:Parution');
        $parution = $repository->findOneById($idParution);

        // On récupère la liste des editions
        $repository = $this->getDoctrine()
        ->getRepository('ZeusSiteBundle:Exemplaire');
        $exemplaires = $repository->getListeExemplaire($idParution);

        return $this->render('ZeusSiteBundle:Parution:page_visualisation.html.twig', array(
                    'parution' => $parution,
                    'exemplaires' => $exemplaires,
                ));
    }

    /**
     * Fonction rafraichirSousCategoriesDispoAction
     *
     * Permet de raffraichir les Catégories pour cet parution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function rafraichirSousCategoriesDispoAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {

            $data = $request->request->all();
            $em = $this->getDoctrine()->getManager();
            $repositoryCategorie = $em->getRepository('ZeusSiteBundle:Categorie');
            $categorie = $repositoryCategorie->find($data['ref']);
            //var_dump($categorie);

            $repositorySousCategorie = $em->getRepository('ZeusSiteBundle:SousCategorie');
            $sousCategoriesDispos = $repositorySousCategorie->findAllByCategorie($categorie);

            $liste_sous_categories = array();

            foreach ($sousCategoriesDispos as $cle => $sousCategorie) {
                $liste_sous_categories[$cle]['value'] = $sousCategorie->getId();
                $liste_sous_categories[$cle]['option'] = $sousCategorie->__toString();
            }

            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new GetSetMethodNormalizer());
            $serializer = new Serializer($normalizers, $encoders);

            $formSerializedJSON = $serializer->serialize($liste_sous_categories, 'json');
            $response = new Response($formSerializedJSON);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }

    }
}
