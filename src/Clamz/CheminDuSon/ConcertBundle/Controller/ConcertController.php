<?php
namespace Clamz\CheminDuSon\ConcertBundle\Controller;


use Symfony\Component\HttpFoundation\RedirectResponse;

use Clamz\CheminDuSon\ConcertBundle\Form\ConcertType;

use Clamz\CheminDuSon\ConcertBundle\Entity\Concert;

use Symfony\Component\DependencyInjection\ContainerAware;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/concert");
 * @author clamzdev
 *
 */
class ConcertController extends ContainerAware {

	/**
	 * Concert create form
	 * 
	 * @Route("/new",name="concert_new")
	 */
	public function createAction(){
		
		$concertEntity = new Concert();
		$form = $this->container->get('form.factory')->create(new ConcertType(),$concertEntity);
		$request = $this->container->get('request');
		if ($request->isMethod('POST')) {
			$form->bind($request);
		
			if ($form->isValid()) {
				// perform some action, such as saving the task to the database
		
				return new RedirectResponse($this->container->get('router')->generate('_welcome'));
			}
		}
		
		$template = ($this->container->get('request')->isXmlHttpRequest())?"create_concert_content":"create_concert";
		return $this->container->get('templating')->renderResponse('CdsConcertBundle:Concert:'.$template.'.html.twig',
				array('form' => $form->createView())
		);
	}
}
