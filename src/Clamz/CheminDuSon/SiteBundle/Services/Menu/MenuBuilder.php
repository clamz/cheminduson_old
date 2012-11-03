<?php
// src/Acme/MainBundle/Menu/MenuBuilder.php

namespace Clamz\CheminDuSon\SiteBundle\Services\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Accueil', array('route' => '_welcome'));
        $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
        $menu->addChild('Inscription', array('route' => 'fos_user_registration_register'));
        // ... add more children

        return $menu;
    }
}