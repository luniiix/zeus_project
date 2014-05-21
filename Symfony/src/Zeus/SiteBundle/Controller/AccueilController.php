<?php

/**
 * Class AccueilController
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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Zeus\SiteBundle\Form\RechercheType;
use Zeus\SiteBundle\Model\Recherche;

/**
 * Controller par défault
 *
 * @category   EmpruntController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class AccueilController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page d'accueil
     *
     * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     *
     * @return type appelle la page d'accueil
     */
    public function indexAction(Request $request)
    {
        $repoParution = $this->getDoctrine()
                ->getManager()
                ->getRepository('ZeusSiteBundle:Parution');
        $parutions = $repoParution->findAll('DESC', 5);

        //Formulaire
        $form = $this->createForm(new RechercheType());
        $validator = $this->get('validator');

        if ($request->isMethod('POST')) {

            $form->handleRequest($request);
            $list_erreurs = $validator->validate($form);

            if (count($list_erreurs) === 0) {
                $recherche = new Recherche($this->getDoctrine()->getManager(), $form->getData());
                return $this->render('ZeusSiteBundle:Default:results.html.twig', array(
                    'results' => $recherche->getExemplaires(),
                ));
            }
        }
        return $this->render('ZeusSiteBundle:Default:index.html.twig', array(
                    'parutions' => $parutions,
                    'form' => $form->createView(),
        ));
    }
}
