<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 6/28/18
 * Time: 12:06
 */

namespace AppBundle\EventListener;


use AppBundle\Event\AppEvents;
use AppBundle\Event\RendezVousCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use AppBundle\Mailer;

class RendezVousLIstener implements EventSubscriberInterface
{

    private $mailer;
    /**
     * ClientListener constructor.
     */
    public function __construct(Mailer\Mailer $mailer)
    {
        $this->mailer=$mailer;
    }

    public static function getSubscribedEvents()
    {
        return array(
            AppEvents::RENDEZVOUS_CREATED     => 'onAppointmentCreated'
        );
    }

    public function onAppointmentCreated(RendezVousCreatedEvent $prospect)
    {
        $this->mailer->sendEmailCLient($prospect);

    }
}