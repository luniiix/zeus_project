<?php

/**
 * Class DefaultController
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

/**
 * Class DefaultController
 *
 *
 * @category   DefaultController
 * @package    Controller
 * @author     FAIDIDE Amandine <amandinefaidide@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class DefaultController extends Controller
{
    /**
     * Fonction indexAction
     *
     * Permet l'affichage de la page d'accueil
     *
     * @author     Basset Vanessa <vanessa.basset@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     */
    public function indexAction()
    {
        $repoParution = $this->getDoctrine()
     					->getManager()
     					->getRepository('ZeusSiteBundle:Parution');
        $parutions = $repoParution->findAll('DESC', 5);
        return $this->render('ZeusSiteBundle:Default:index.html.twig', array(
            'parutions' => $parutions,
        ));
    }
}
