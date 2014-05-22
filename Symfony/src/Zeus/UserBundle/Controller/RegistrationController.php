<?php

/**
 * Class RegistrationController
 *
 *
 * @category   Class
 * @author     GUICHERD Kévin <kevinguicherd@gmail.com>
*/

/**
 * Déclaration du namespace
 */
namespace Zeus\UserBundle\Controller;

/**
 * Import des class
 */
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class DefaultController
 *
 *
 * @category   RegistrationController
 * @package    Controller
 * @author     GUICHERD Kévin <kevinguicherd@gmail.com>
 * @copyright  2013-2014 projet-zeus.fr
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: 1
 */
class RegistrationController extends BaseController
{
    /**
     * Fonction registerAction
     *
     * Permet d'enregistrer un nouvel utilisateur
     *
     * @author GUICHERD Kévin <kevinguicherd@gmail.com>
     * @copyright  2013-2014 projet-zeus.fr
     * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
     * @version    Release: 1
     * @return Emprunt Renvoie la liste des emprunts
    */
    public function registerAction(Request $request)
    {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->container->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->container->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $session = $request->getSession();

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $form->setData($user);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $userManager->updateUser($user);
                    $notification['class']   = 'success';
                    $notification['message'] = "L'utilisateur a été ajouté";
                    $session->getFlashBag()->add(
                        'notification',
                        $notification
                    );
					
				$url = $this->container->get('router')->generate('zeus_site_homepage');
				$response = new RedirectResponse($url);
                return $response;
            }
                $notification['class']   = 'danger';
                $notification['message'] = "Un problème est survenu";
                $session->getFlashBag()->add(
                    'notification',
                    $notification
                );
        }
        
        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }
}
