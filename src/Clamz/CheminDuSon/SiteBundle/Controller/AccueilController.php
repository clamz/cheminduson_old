<?php
namespace Clamz\CheminDuSon\SiteBundle\Controller;



use Symfony\Component\HttpKernel\Tests\Logger;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccueilController extends Controller{

	/**
	 * 
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function accueilAction(){
		ini_set('xdebug.show_local_vars', 1);
		
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('ClamzCheminDuSonUserBundle:User')->findOneByUsername("clamz2");
		
		$template = ($this->container->get('request')->isXmlHttpRequest())?"accueil_content":"accueil";
		$logger = $this->get('logger');
		$logger->debug('template : '.$template);
		return $this->render('ClamzCdsSiteBundle:Accueil:'.$template.'.html.twig',array('user'=>$user));
	}
	

}
