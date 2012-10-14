<?php
namespace Clamz\CdsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder {
	private $factory;
	
	/**
	 * @param FactoryInterface $factory
	 */
	public function __construct(FactoryInterface $factory)
	{
		$this->factory = $factory;
	}
	
	public function createMainMenu(Request $request,$name)
	{
		
		$menu = $this->factory->createItem('root');
	
		$menu->addChild('About Me', array(
            'route' => 'clamz_cds_homepage'
        ));
		// ... add more children
		;
		return $menu;
	}
}
