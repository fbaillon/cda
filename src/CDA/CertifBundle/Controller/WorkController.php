<?php

namespace CDA\CertifBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use CDA\CertifBundle\Entity\Work;
use CDA\CertifBundle\Form\Type\WorkType;
use CDA\CertifBundle\Form\WorkHandler;

/**
 * @Route("/work")
 */
class WorkController extends Controller
{

	/**
	 * @Route("/{slug}", name="work_show")
	 * @Method("get")
	 * @Template()
	 */
	public function showAction($slug)
	{
		if (!$work = $this->get('cda.work_manager')->loadWork($slug))
		{
    	throw new NotFoundHttpException($this->get('translator')
    					->trans('This work does not exist.'));
    }
    $drafts = $this->get('cda.work_manager')->loadWorkDrafts($work[0]['id']);
    $authentications = $this->get('cda.work_manager')->loadWorkAuthentications($work[0]['id']);
    $comments = $this->get('cda.work_manager')->loadCommentsWork($work[0]['id']);
    
    return array(
    				'work' 						=> $work[0],
    				'drafts' 					=> $drafts,
    				'authentications' => $authentications,
    				'comments'				=> $comments,
    );
	}
	
	/**
	 * @Route("/create", name="work_create")
   * @Method("get")
	 * @Template()
	 */
	public function createAction()
	{
		$form = $this->createForm(new WorkType, new Work);		// Création du formulaire d'ajout d'une oeuvre
		
		return array('form' => $form->createView()); // On passe à Twig l'objet form
	}

	/**
	 * @Route("/add", name="work_add")
	 * @Method("post")
	 * @Template("CDACertifBundle:Work:create.html.twig")
	 */
	public function addAction()
	{
		$work = new Work();
		$form = $this->createForm(new WorkType, $work);		// Création du formulaire d'ajout d'une oeuvre
		// Gère les retours du formulaire work
		$formHandler = new WorkHandler( $form, $this->getRequest());
	
		if( $formHandler->process() )
		{
      // Save data through work manager service
      $this->get('cda.work_manager')->saveWork($form->getData());
      	
			// On envoi un 'flash' pour indiquer à l'utilisateur que l'oeuvre est ajouté
			$this->get('session')->setFlash('notice',
					$this->get('translator')->trans('Work added')
			);
				
			// On redirige vers la page de modification de l'oeuvre
			return new RedirectResponse($this->generateUrl('work_edit', array(
					'workId' => $work->getId()
			)));
		}
	
		return array('form' => $form->createView()); // On passe à Twig l'objet form
	}
	
	/**
	 * @Route("/edit/{workId}", name="work_edit")
   * @Template("CDACertifBundle:Work:add.html.twig")
	 */
	public function editAction($workId)
	{
		$request = $this->get('request');
	
		// On vérifie que l'ID de l'oeuvre existe
		if (!$work = $this->get('cda.work_manager')->loadWork($workId))
		{
			throw new NotFoundHttpException(
					$this->get('translator')->trans('This work does not exist.')
			);
		}
	
		// On bind l'oeuvre récupéré depuis la BDD au formulaire pour modification
		$form = $this->createForm(new WorkType(), $work);
	
		// Si l'utilisateur soumet le formulaire
		if ('POST' == $request->getMethod())
		{
			$form->bindRequest($request);
			if ($form->isValid())
			{
				$this->get('cda.work_manager')->saveWork($work);
	
				$this->get('session')->setFlash('notice',
						$this->get('translator')->trans('Work updated.')
				);
	
				return new RedirectResponse($this->generateUrl('work_edit', array(
						'workId' => $work->getId()
				)));
			}
		}
	
		return array('form' => $form->createView(), 'work' => $work); // On change le template par défaut et on réutilise celui de add qui est le même
	}

	/**
	 * Display all works from a given artist
	 * No route for this action, only used as a sub action
	 *
	 * @Template()
	 */
	public function artistWorksAction($artistId, $workId = null)
	{
		return array('works' => $this->get('cda.work_manager')->loadArtistWorks($artistId, $workId));
	}
	
}
