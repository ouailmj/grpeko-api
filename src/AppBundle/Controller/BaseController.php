<?php

/*
 * This file is part of the Napier project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\Event;

class BaseController extends Controller
{
    public function addSuccessFlash()
    {
        $this->addFlash('success', 'Votre opération a été exécutée avec succès');
    }

    public function addErrorFlash()
    {
        $this->addFlash('error', 'Votre opération n\' a pas pu être exécutée.');
    }

    public function addWarningFlash()
    {
        $this->addFlash('warning', 'Votre opération n\' a pas pu être exécutée.');
    }

    /**
     * @param string $name
     *
     * @return \Doctrine\Common\Persistence\ObjectManager|object
     */
    public function getEntityManager($name = 'default')
    {
        return $this->getDoctrine()->getManager($name);
    }

    protected function dispatchEvent($eventName, Event $eventObject = null)
    {
        $this->get('event_dispatcher')->dispatch($eventName, $eventObject);
    }
}
