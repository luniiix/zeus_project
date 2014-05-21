<?php
/**
 * Class ZeusUserBundle
 *
 *
 * @category   class
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\UserBundle;

/**
 * Import des class
 */
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * ZeusSiteBundle
 *
 * @category   ZeusSiteBundle
 * @package    Bundle
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class ZeusUserBundle extends Bundle
{
    /**
     * Fonction getParent
     *
     *
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return string renvoie le bundle parent
    */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
