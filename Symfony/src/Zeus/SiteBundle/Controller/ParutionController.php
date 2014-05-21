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
            $liste_parution = $repository->findBy(array(), array('dateAjout' => 'desc'));

            return $this->render('ZeusSiteBundle:Parution:page_gestion.html.twig', array(
                    'parutions' => $liste_parution,
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
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $list_erreurs = $validator->validate($parution);

            if (count($list_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($parution);
                $entity_manager->flush();

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

        $form = $this->createForm(new ParutionType($parution->getCategorie()), $parution);
        $validator = $this->get('validator');
        if ($request->isMethod('POST')) {

            //$task = $form->getData();
            //var_dump($request->getData());
            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($parution);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($parution);
                $entity_manager->flush();

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
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:Parution');
        $parution = $repository->find($idParution);
        $em->remove($parution);
        $em->flush();

        return $this->redirect($this->generateUrl('zeus_site_parution_tableau'), 301);
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
