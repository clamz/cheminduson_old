<?php
namespace Clamz\CheminDuSon\BandBundle\Controller;
use Monolog\Logger;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Clamz\CheminDuSon\BandBundle\Entity\Band;
use Clamz\CheminDuSon\BandBundle\Entity\Tag;
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
     */
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();

        $template = ($this->container->get('request')->isXmlHttpRequest())?"accueil_content":"accueil";
        
        $bands = $em->getRepository('CdsBandBundle:Band')->findNewBands();
        $tags = $em->getRepository('CdsBandBundle:Tag')->getTags();
       
        return $this->render('CdsBandBundle:Band:'.$template.'.html.twig', array(
            'bands' => $bands,
        		'tags' => $tags,
    			'select' => 'new'
        ));
    }
    
    /**
     * Lists all Band entities.
     *
     * @Route("/new_bands", name="new_bands")
     * @Template()
     */
    public function listNewBandsAction()
    {
    	$em = $this->getDoctrine()->getManager();   
    	
    	$bands = $em->getRepository('CdsBandBundle:Band')->findNewBands();
    	$tags = $em->getRepository('CdsBandBundle:Tag')->getTags();
    	
    	$template = ($this->container->get('request')->isXmlHttpRequest())?"/List:bands":":accueil";
    	return $this->render('CdsBandBundle:Band'.$template.'.html.twig', array(
    			'bands' => $bands,
    			'tags' => $tags,
    			'select' => 'new'
    	));
    }
    
    /**
     * Lists all Band entities.
     *
     * @Route("/recommended_bands", name="recommended_bands")
     * @Template()
     */
    public function listRecommendedBandsAction()
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$bands = $em->getRepository('CdsBandBundle:Band')->findAll();
    	$tags = $em->getRepository('CdsBandBundle:Tag')->getTags();
    	
    	$template = ($this->container->get('request')->isXmlHttpRequest())?"/List:recommended_bands":":accueil";
    	return $this->render('CdsBandBundle:Band'.$template.'.html.twig', array(
    			'bands' => $bands,
    			'tags' => $tags,
    			'select' => 'recommended'
    	));
    }
    
    /**
     * @Route("/tag/{id}", name="tag_bands", requirements={"id" = "\d+"},options={"expose"=true})
     * @ParamConverter("post", class="CdsBandBundle:Tag")
     * @param Tag $tag
     */
    public function bandsByTagAction(Tag $tag){
    	$em = $this->getDoctrine()->getManager();
    	
    	$tags = $em->getRepository('CdsBandBundle:Tag')->getTags();
    	
    	$lstTagBand = $em->getRepository('CdsBandBundle:BandTag')->findByTag($tag->getId());  
    	
    	$bands = array();
    	foreach ($lstTagBand as $tagBand){
    		array_push($bands,$tagBand->getBand());
    	}
    	
    	$template = ($this->container->get('request')->isXmlHttpRequest())?"tag_bands_content":"tag_bands";
    	return $this->render('CdsBandBundle:Band:'.$template.'.html.twig',array(
    				'bands' => $bands,
    				'tags' => $tags
    			));
    }
    
    /**
     * Lists all Band entities.
     *
     * @Route("/new", name="band_new")
     * @Secure(roles="ROLE_USER")
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
    	$template = ($this->container->get('request')->isXmlHttpRequest())?"/include:form-new-band.inc":":new_band";
    	return $this->render('CdsBandBundle:Band'.$template.'.html.twig',array(
    				'form' => $form
    			));
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
