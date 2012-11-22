<?php
namespace Clamz\CheminDuSon\UserBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Clamz\CheminDuSon\UserBundle\Entity\User;

use Clamz\CheminDuSon\SiteBundle\Entity\Coordonnees;

use Clamz\CheminDuSon\SiteBundle\Form\CoordonneesType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;


class RegistrationController extends BaseController {

	public function registerAction(){
		$form = $this->container->get('fos_user.registration.form');
		$formHandler = $this->container->get('fos_user.registration.form.handler');
		$confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');
		
		$process = $formHandler->process($confirmationEnabled);
		if ($process) {
			$user = $form->getData();
		
			/*****************************************************
			 * Add new functionality (e.g. log the registration) *
			*****************************************************/
			$this->container->get('logger')->info(
					sprintf('New user registration: %s', $user)
			);
		
			if ($confirmationEnabled) {
				$this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
				$route = 'fos_user_registration_check_email';
			} else {
				$this->authenticateUser($user);
				$route = 'fos_user_registration_confirmed';
			}
		
			$this->setFlash('fos_user_success', 'registration.flash.user_created');
			$url = $this->container->get('router')->generate('clamz_chemin_du_son_user_preference',array('id'=>$user->getId()));
		
			return new RedirectResponse($url);
		}
		$template = ($this->container->get('request')->isXmlHttpRequest())?"register_content":"register";
		return $this->container->get('templating')->renderResponse('ClamzCheminDuSonUserBundle:Registration:'.$template.'.html.'.$this->getEngine(), array(
				'form' => $form->createView()
		));
	}

	/**
	 * @Route("/edit-preferences/{id}",name="clamz_chemin_du_son_user_preference")
	 * @Template()
	 * @return multitype:
	 */
	public function editPreferencesAction(User $user){
         $coordonnees = new Coordonnees();
         $coordonneesType = $this->container->get('coordonnees_type');
         $form = $this->container->get('form.factory')->create($coordonneesType, $coordonnees);
         $request = $this->container->get('request');
         if ($request->isMethod('POST')) {
         	$form->bind($request);
         	$data = $form->getData();
         	$coordonneesRepo = $this->container->get('doctrine')->getRepository('ClamzCdsSiteBundle:Coordonnees');
         	$coordonnee = $coordonneesRepo->createCoordonnee($data);
         	
         	$userRepo = $this->container->get('doctrine')->getRepository('ClamzCheminDuSonUserBundle:User');
         	$userRepo->updateCoordonnee($user->getId(),$coordonnee);
         }
		 return array('form' => $form->createView(),'userId' => $user->getId());
	}
}
