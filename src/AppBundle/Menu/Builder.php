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

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
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

    /**
     * Builder constructor.
     *
     * @param FactoryInterface     $factory
     * @param AuthorizationChecker $authorizationChecker
     */
    public function __construct(FactoryInterface $factory, AuthorizationChecker $authorizationChecker)
    {
        $this->factory = $factory;
        $this->authorizationChecker = $authorizationChecker;
    }

    public function createMainMenu(array $options)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'navigation navigation-main navigation-accordion');

        $menu->addChild('Main', [
            'label' => '<span>Menu</span> <i class="icon-menu" title="Main pages"></i>',
            'extras' => ['safe_label' => true],
        ])->setAttribute('class', 'navigation-header');

        $menu->addChild('Clients', [
            'uri' => '/app/client/collaborateurs',
            'label' => '<i class="icon-users4"></i> <span>Collaborateurs</span>',
            'extras' => ['safe_label' => true],
        ]);

        $menu->addChild('Plannings', [
            'uri' => '#',
            'label' => '<i class="icon-users"></i> <span>Collaborateurs affectation</span>',
            'extras' => ['safe_label' => true],
        ]);

        $menu->addChild('Gestion du Cabinet', [
            'uri' => '#',
            'label' => '<i class="icon-file-text3"></i> <span>Gestion du Cabinet</span>',
            'extras' => ['safe_label' => true],
        ]);

        $menu->addChild('Formalités', [
            'uri' => '#',
            'label' => '<i class="icon-books"></i> <span>Comptes</span>',
            'extras' => ['safe_label' => true],
        ]);
        $menu->addChild('Suivi de projet', [
            'uri' => '#',
            'label' => '<i class="icon-home5"></i> <span>Journaux</span>',
            'extras' => ['safe_label' => true],
        ]);

        $menu->addChild('CRM', [
                'uri' => '#',
                'label' => '<i class="icon-collaboration"></i> <span>import CFONB</span>',
                'extras' => ['safe_label' => true],
        ]);

        $settings = $menu->addChild('Parametrage', [
                 'uri' => '#',
                 'label' => '<i class="icon-cog5"></i> <span>Suivi CEB</span>',
                 'extras' => ['safe_label' => true],
        ]);
        $settings = $menu->addChild('Parametragee', [
            'uri' => '#',
            'label' => '<i class="icon-cog5"></i> <span>Facturation</span>',
            'extras' => ['safe_label' => true],
        ]);

        $this->paramaetrageItem($settings);

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
         'label' => '<i class="icon-user-tie position-left"></i>Détails du client',
         'extras' => ['safe_label' => true],
     ]);

        if ($this->authorizationChecker->isGranted('ROLE_ADVISORY')) {
            $menu->addChild('Sinistres', [
             'uri' => '#',
             'routeParameters' => [
                 'id' => $options['customerId'],
             ],
             'label' => '<i class="icon-folder position-left"></i>Sinistres',
             'extras' => ['safe_label' => true],
         ]);

            $menu->addChild('Contrats', [
             'uri' => '#',
             'routeParameters' => [
                 'id' => $options['customerId'],
             ],
             'label' => '<i class="icon-file-text3 position-left"></i>Contrats',
             'extras' => ['safe_label' => true],
         ]);
            $menu->addChild('Relations client', [
             'uri' => '#',
             'routeParameters' => [
                 'id' => $options['customerId'],
             ],
             'label' => '<i class="icon-users4 position-left"></i>Relations client',
             'extras' => ['safe_label' => true],
         ]);
        }

        return $menu;
    }

    private function paramaetrageItem(ItemInterface $menu)
    {
        $menu->addChild('Type Staff', [
         'uri' => '#',
         'label' => '<i class="icon-arrow-right14"></i> <span>Type de Clients</span>',
         'extras' => ['safe_label' => true],
     ]);
        $menu->addChild('Type Contrats', [
         'uri' => '#',
         'label' => '<i class="icon-arrow-right14"></i> <span>Type de Contrats</span>',
         'extras' => ['safe_label' => true],
     ]);
        /*$menu->addChild('Type de garanties', array(
            'route' => 'warrantytype_index',
            'label' => "<i class=\"icon-arrow-right14\"></i> <span>Type de garanties</span>",
            'extras'    => array('safe_label' => true)
        ));*/
        $menu->addChild('Produits', [
            'uri' => '#',
            'label' => '<i class="icon-arrow-right14"></i> <span>Produits</span>',
            'extras' => ['safe_label' => true],
        ]);
        $menu->addChild('Product Family', [
            'uri' => '#',
            'label' => '<i class="icon-arrow-right14"></i> <span>Famile de Produits</span>',
            'extras' => ['safe_label' => true],
        ]);

        /*
        $menu->addChild('Type Client', array(
            'route' => 'client_index',
            'label' => "<i class=\"icon-arrow-right14\"></i> <span>Type Client</span>",
            'extras'    => array('safe_label' => true)
        ));*/
    }
}
