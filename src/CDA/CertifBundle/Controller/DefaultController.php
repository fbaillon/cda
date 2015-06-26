<?php

namespace CDA\CertifBundle\Controller;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

# use CDA\CertifBundle\Entity\Artist;
# use CDA\CertifBundle\Entity\Contact;
# use CDA\CertifBundle\Form\ArtistType;
# use CDA\CertifBundle\Form\ArtistHandler;
# use CDA\CertifBundle\Entity\Work;
# use CDA\CertifBundle\Entity\Comment;

class DefaultController extends Controller
{
    /**
     * @Route("/rss", name="_rss")
     * @Template()
     */
    public function rssAction()
    {
      return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/mobile", name="_mobile")
     * @Template()
     */
    public function mobileAction()
    {
      return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/techniques", name="techniques")
     * @Template()
     */
    public function techniquesAction()
    {
      return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/termofservices", name="terms_of_service")
     * @Template()
     */
    public function termsOfServiceAction()
    {
      return $this->redirect($this->generateUrl('homepage'));
    }

    /**
     * @Route("/{selection}/{rating}", requirements={"selection" = "D|W|M|Y|A", "rating" = "V|R|D"}, defaults={"selection" = "D", "rating" = "R"}, name="homepage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction($selection, $rating)
    {
    	$works = $this->get('cda.work_manager')->getWorks($selection, $rating);
    	$title = $this->get('cda.work_manager')->getTitle();

        return array(
    		'works' => $works,
    		'title' => $title,
    		);
    }
    
}
