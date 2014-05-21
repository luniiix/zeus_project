<?php
/**
 * Class TypeParutionController
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
use Zeus\SiteBundle\Entity\TypeParution;
use Zeus\SiteBundle\Form\TypeParutionAjoutType;
use Zeus\SiteBundle\Form\TypeParutionModifType;

/**
 * Class TypeParutionController
 *
 *
 * @category   TypeParutionController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class TypeParutionController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page qui affiche la liste des type de parutions
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function indexAction(Request $request)
    {
            $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:TypeParution');
            $liste_typesparutions = $repository->findBy(array(), array('libelle' => 'asc'));

            return $this->render('ZeusSiteBundle:TypeParution:page_gestion.html.twig', array(
                    'typesparutions' => $liste_typesparutions,
            ));
    }
    /**
     * Fonction ajouterAction
     *
     * Permet l'affichage de la page qui affiche la page d'ajout de parution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
    */
    public function ajouterAction(Request $request)
    {
        $typeParution = new TypeParution();
        $form = $this->createForm(new TypeParutionAjoutType(), $typeParution);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($typeParution);

            if (count($liste_erreurs) === 0) {
                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($typeParution);
                    $entity_manager->flush();

                    return $this->redirect($this->generateUrl('zeus_site_typeparution_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:TypeParution:page_ajout.html.twig', array(
                'form' => $form->createView(),
        ));
    }
    /**
     * Fonction modifierAction
     *
     * Permet l'affichage de la page qui affiche la page de modification de parution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idTypeParution Id du type de la parution à modifier
    */
    public function modifierAction(Request $request, $idTypeParution)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:TypeParution');
        $typeParution = $repository->find($idTypeParution);
        $form = $this->createForm(new TypeParutionModifType(), $typeParution);
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $liste_erreurs = $validator->validate($typeParution);

            if (count($liste_erreurs) === 0) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($typeParution);
                $entity_manager->flush();

                return $this->redirect($this->generateUrl('zeus_site_typeparution_tableau'), 301);
            }
        }

        return $this->render('ZeusSiteBundle:TypeParution:page_modif.html.twig', array(
                'form' => $form->createView(),
        ));
    }
    /**
     * Fonction supprimerAction
     *
     * Permet l'affichage de la page qui affiche la page de supprimession de parution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idTypeParution Id du type de la parution à supprimer
    */
    public function supprimerAction(Request $request, $idTypeParution)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ZeusSiteBundle:TypeParution');
        $typeparution = $repository->find($idTypeParution);
        $em->remove($typeparution);
        $em->flush();
        return $this->redirect($this->generateUrl('zeus_site_typeparution_tableau'), 301);
    }
    /**
     * Fonction visualiserAction
     *
     * Permet l'affichage de la page qui affiche la page de visualisation de parution
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @param integer $idTypeParution Id du type de la parution à visualiser
    */
    public function visualiserAction(Request $request, $idTypeParution)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('ZeusSiteBundle:TypeParution');
        $typeParution = $repository->find($idTypeParution);

        return $this->render('ZeusSiteBundle:TypeParution:page_visualisation.html.twig', array(
                    'typeParution' => $typeParution,
                ));
    }
}
