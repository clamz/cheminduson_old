<?php

namespace Clamz\CheminDuSon\BandBundle\Controller;

use Clamz\CheminDuSon\BandBundle\Entity\Tag;

use Monolog\Logger;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Clamz\CheminDuSon\BandBundle\Entity\Band;
use Clamz\CheminDuSon\BandBundle\Form\BandType;

/**
 * Band controller.
 *
 * @Route("/band")
 */
class BandController extends Controller
{
    /**
     * Lists all Band entities.
     *
     * @Route("/", name="band")
     * @Template()
     */
    public function listBandsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bands = $em->getRepository('CdsBandBundle:Band')->findAll();

        return array(
            'bands' => $bands,
        );
    }
    
    /**
     * Lists all Band entities.
     *
     * @Route("/new", name="band_new")
     * @Secure(roles="ROLE_USER")
     * @Template()
     */
    public function newBandAction()
    {
    	$band = new Band();
    	$tag = new Tag();
    	$tag->setName("test");
    	$tag2 = new Tag();
    	$tag2->setName("hey");
    	$band->addTag($tag);
    	$band->addTag($tag2);
    	$form=$this->getBandForm($band)->createView();
    	return array('form' => $form);
    }
    
    /**
     * Displays a form to create a new Band entity without layout. <br />
     * This method is useful to display the form in dialog box
     *
     * @Route("/newForm", name="band_new_form",options={"expose" = true})
     * @Secure(roles="ROLE_USER")
     * @Template("CdsBandBundle:Band/include:form-new-band.inc.html.twig")
     */
    public function newBandFormAction(){
    	$band = new Band();
    	return array('form' => $this->getBandForm($band)->createView());
    }
    
    /**
     * @Route("/create", name="band_create")
     * @Method("POST")
     * @Secure(roles="ROLE_USER")
     * @Template("CdsBandBundle:Band/include:form-new-band.inc.html.twig")
     */
    public function createBandAction(Request $request){
    	$band = new Band();
    	$form =  $this->getBandForm($band);
    	$form->bind($request);
    	$data = $form->getData();
    	
    	$repoBand = $this->getDoctrine()->getManager()->getRepository('CdsBandBundle:Band');
    	
    	$tags = $request->get("tags");
    	
    	$repoBand->createBand($band, $tags);
    	
    	return $this->redirect($this->generateUrl('band_new'));
    }
    
    /**
     * Lists all Band entities.
     *
     * @Route("/{id}/show", name="band_show")
     * @Template()
     */
    public function showBandAction(Band $band)
    {    	
    	return array('band'=>$band);
    }
    
    /**
     * Return the band form
     *
     * @return Form
     */
    private function getBandForm($band){
    	
    	$form = $this->createForm(new BandType(),$band);
    	
    	return $form;
    }
}
