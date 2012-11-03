<?php
namespace Clamz\CheminDuSon\SiteBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AccueilController extends Controller{

	/**
	 * @Template()
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function accueilAction(){
		ini_set('xdebug.show_local_vars', 1);
		
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('ClamzCheminDuSonUserBundle:User')->findOneByUsername("clamz2");
	
		return array('user'=>$user);
	}
	

}
