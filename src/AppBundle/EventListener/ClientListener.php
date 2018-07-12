<?php

/*
 * This file is part of the Moddus project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\EventListener;

use AppBundle\Event\AppEvents;
use AppBundle\Event\ClientCreatedEvent;
use AppBundle\Mailer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ClientListener implements EventSubscriberInterface
{
    private $mailer;

    /**
     * ClientListener constructor.
     */
    public function __construct(Mailer\Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            AppEvents::CLIENT_CREATED => 'onClientCreated',
        ];
    }

    public function onClientCreated(ClientCreatedEvent $client)
    {
        $this->mailer->sendEmailCLient($client);
    }
}
