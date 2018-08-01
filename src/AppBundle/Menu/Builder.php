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

namespace AppBundle\Menu;

use AppBundle\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

/**
 * Class Builder.
 */
class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /** @var FactoryInterface */
    protected $factory;

    /** @var AuthorizationChecker */
    protected $authorizationChecker;

    private $tokenStorage;

    private $em;

    /**
     * Builder constructor.
     *
     * @param FactoryInterface     $factory
     * @param AuthorizationChecker $authorizationChecker
     */
    public function __construct(FactoryInterface $factory, AuthorizationChecker $authorizationChecker, TokenStorage $tokenStorage, EntityManagerInterface $em)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenStorage = $tokenStorage;
        $this->em = $em;
    }

    public function getAutenticatedUserID()
    {
        return $this->tokenStorage->getToken()->getUser()->getId();
    }

    public function getCostumerId()
    {
        $customer = $this->em->getRepository(Customer::class)->findById($this->getAutenticatedUserID());

        return reset($customer)->getId();
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'navigation navigation-main navigation-accordion');

        $menu->addChild('Main', [
            'label' => '<span>Menu</span> <i class="icon-menu" title="Main pages"> </i>',
            'extras' => ['safe_label' => true],
        ])->setAttribute('class', 'navigation-header');

        $menu->addChild('Dashboard', [
            'route' => 'dashboard',
            'label' => '<i class="icon-home5"> </i> <span>Dashboard</span>',
            'extras' => ['safe_label' => true],
        ]);

        if ($this->authorizationChecker->isGranted('ROLE_PROSPECT')) {
            $menu->addChild('Télécharger le modèle', [
                'route' => 'model_upload',
                'routeParameters' => ['company' => $this->getCostumerId()],
                'label' => '<i class="icon-download"> </i> <span>Fiche Patrimoniale</span>',
                'extras' => ['safe_label' => true],
            ]);
        }

        if (!$this->authorizationChecker->isGranted('ROLE_PROSPECT')) {
            $menu->addChild('Clients', [
                'route' => 'company_index',
                'label' => '<i class="icon-users4"> </i> <span>Clients</span>',
                'extras' => ['safe_label' => true],
            ]);

            $menu->addChild('Plannings', [
                'uri' => '/app/client/planning',
                'label' => '<i class="icon-users"> </i> <span>Plannings</span>',
                'extras' => ['safe_label' => true],
            ]);

            $menu->addChild('Gestion du Cabinet', [
                'route' => 'employee_index',
                'label' => '<i class="icon-file-text3"> </i> <span>Gestion du Cabinet</span>',
                'extras' => ['safe_label' => true],
            ]);

            $menu->addChild('Formalités', [
                'uri' => '/app/client/formalites',
                'label' => '<i class="icon-books"> </i> <span>Formalités</span>',
                'extras' => ['safe_label' => true],
            ]);
            $menu->addChild('Suivi de projet', [
                'uri' => '#',
                'label' => '<i class="icon-folder-open"> </i> <span>Suivi de projet</span>',
                'extras' => ['safe_label' => true],
            ]);

            $settings = $menu->addChild('Settings', [
                'uri' => '#',
                'label' => '<i class="icon-cog5"> </i> <span>Paramètrages</span>',
                'extras' => ['safe_label' => true],
            ]);

            $this->settingItem($settings);
        }

        return $menu;
    }

    public function createCustomerMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-tabs nav-tabs-highlight');

        $menu->addChild('Main', [
            'uri' => '#',
            'routeParameters' => [
                'id' => $options['customerId'],
            ],
            'label' => '<i class="icon-user-tie position-left"> </i>Détails du client',
            'extras' => ['safe_label' => true],
        ]);

        if ($this->authorizationChecker->isGranted('ROLE_ADVISORY')) {
            $menu->addChild('Sinistres', [
                'uri' => '#',
                'routeParameters' => [
                    'id' => $options['customerId'],
                ],
                'label' => '<i class="icon-folder position-left"> </i>Sinistres',
                'extras' => ['safe_label' => true],
            ]);

            $menu->addChild('Contrats', [
                'uri' => '#',
                'routeParameters' => [
                    'id' => $options['customerId'],
                ],
                'label' => '<i class="icon-file-text3 position-left"> </i>Contrats',
                'extras' => ['safe_label' => true],
            ]);
            $menu->addChild('Relations client', [
                'uri' => '#',
                'routeParameters' => [
                    'id' => $options['customerId'],
                ],
                'label' => '<i class="icon-users4 position-left"> </i>Relations client',
                'extras' => ['safe_label' => true],
            ]);
        }

        return $menu;
    }

    public function createCabinetMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav nav-tabs nav-tabs-highlight');

        $menu->addChild('Main', [
            'uri' => '#',
            'routeParameters' => [
                'id' => $options['customerId'],
            ],
            'label' => '<i class="icon-user-tie position-left"> </i>Détails du client',
            'extras' => ['safe_label' => true],
        ]);

        if ($this->authorizationChecker->isGranted('ROLE_ADVISORY')) {
            $menu->addChild('Sinistres', [
                'uri' => '#',
                'routeParameters' => [
                    'id' => $options['customerId'],
                ],
                'label' => '<i class="icon-folder position-left"> </i>Sinistres',
                'extras' => ['safe_label' => true],
            ]);

            $menu->addChild('Contrats', [
                'uri' => '#',
                'routeParameters' => [
                    'id' => $options['customerId'],
                ],
                'label' => '<i class="icon-file-text3 position-left"> </i>Contrats',
                'extras' => ['safe_label' => true],
            ]);
            $menu->addChild('Relations client', [
                'uri' => '#',
                'routeParameters' => [
                    'id' => $options['customerId'],
                ],
                'label' => '<i class="icon-users4 position-left"> </i>Relations client',
                'extras' => ['safe_label' => true],
            ]);
        }

        return $menu;
    }

    private function settingItem(ItemInterface $menu)
    {
        $menu->addChild('Planning', [
            'route' => 'setting_planning',
            'label' => '<i class="icon-arrow-right14"> </i> <span>Planning</span>',
            'extras' => ['safe_label' => true],
        ]);
        $menu->addChild('Quotation', [
            'route' => 'setting_quotations',
            'label' => '<i class="icon-arrow-right14"> </i> <span>Devis</span>',
            'extras' => ['safe_label' => true],
        ]);
        $menu->addChild('Emails', [
            'route' => 'setting_emails',
            'label' => '<i class="icon-arrow-right14"> </i> <span>Emails</span>',
            'extras' => ['safe_label' => true],
        ]);
        $menu->addChild('Commissions', [
            'route' => 'setting_commissions',
            'label' => '<i class="icon-arrow-right14"> </i> <span>Commissions</span>',
            'extras' => ['safe_label' => true],
        ]);
        $menu->addChild('Analytics', [
            'route' => 'setting_analytics',
            'label' => '<i class="icon-arrow-right14"> </i> <span>Catégories Analytiques</span>',
            'extras' => ['safe_label' => true],
        ]);
    }
}
