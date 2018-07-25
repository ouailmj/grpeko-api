<?php

/*
 * This file is part of the Instan't App project.
 *
 * (c) Instan't App <contact@instant-app.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Action;


use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use AppBundle\AppEvents;
use AppBundle\Entity\Event;
use AppBundle\Entity\Mission;
use AppBundle\Entity\User;
use AppBundle\Event\NewMediaUploadedEvent;
use AppBundle\Form\API\MissionSettingType;
use AppBundle\Model\MediaManager;
use AppBundle\Model\UserManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;


/**
 * @Security("has_role('ROLE_USER')")
 */
class MissionSettingAction extends Controller
{
    private $validator;
    private $factory;

    /** @var EventDispatcher */
    private $eventDispatcher;


    public function __construct( FormFactoryInterface $factory, ValidatorInterface $validator,EventDispatcher $eventDispatcher)
    {
        $this->validator = $validator;
        $this->factory = $factory;
        $this->eventDispatcher = $eventDispatcher;

    }

    /**
     * @param Mission $mission
     * @param Request $request
     * @return null
     */
    public function __invoke(Mission $mission, Request $request)
    {
        $form = $this->factory->create(MissionSettingType::class, $mission);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return null;
        }
        // This will be handled by API Platform and returns a validation error.
        throw new ValidationException($this->validator->validate($form));
    }

}