<?php

namespace CDA\CertifBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use CDA\CertifBundle\Entity\Artist;
use CDA\CertifBundle\Form\ArtistType;

/**
 * Artist controller.
 *
 * @Route("/artist")
 */
class ArtistController extends Controller
{
    /**
     * Lists all Artist entities.
     *
     * @Route("/", name="artist")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CDACertifBundle:Artist')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Artist entity.
     *
     * @Route("/{id}/show", name="artist_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CDACertifBundle:Artist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Artist entity.
     *
     * @Route("/new", name="artist_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Artist();
        $form   = $this->createForm(new ArtistType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Artist entity.
     *
     * @Route("/create", name="artist_create")
     * @Method("POST")
     * @Template("CDACertifBundle:Artist:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Artist();
        $form = $this->createForm(new ArtistType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artist_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Artist entity.
     *
     * @Route("/{id}/edit", name="artist_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CDACertifBundle:Artist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artist entity.');
        }

        $editForm = $this->createForm(new ArtistType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Artist entity.
     *
     * @Route("/{id}/update", name="artist_update")
     * @Method("POST")
     * @Template("CDACertifBundle:Artist:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CDACertifBundle:Artist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Artist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArtistType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('artist_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Artist entity.
     *
     * @Route("/{id}/delete", name="artist_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CDACertifBundle:Artist')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Artist entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('artist'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }


  /**
   * Route("/contact", name="contact")
   * Template()
  */
  public function contactAction_old()
  {
    $em = $this->getDoctrine()->getEntityManager();
    $artist = $em->getRepository('CDACertifBundle:Artist')->find(5);
        
    return array('artist' => $artist);
  }

  /**
   * Route("/test", name="test")
   * Template()
   */
  public function testAction_old()
  {
  	$em = $this->getDoctrine()->getEntityManager();
  	
  	$work = $em->getRepository("CDACertifBundle:Work")->find(1);

		return array('work'=> $work);
  }

    /**
     * Route("/create", name="create")
     * Method("get")
     * Template()
     */
    public function createAction_old()
    {
        $artist = new Artist;
        
        $form = $this->createForm(new ArtistType, $artist);

        return array('form' => $form->createView());
    }


    /**
     * Route("/add", name="add")
     * Method("post")
     * Template("CDACertifBundle:Default:create.html.twig")
     */
    public function addAction_old()
    {
        $artist = new Artist;
        
        $form = $this->createForm(new ArtistType, $artist);

        $formHandler = new ArtistHandler(
                                $form, 
                                $this->getRequest(),
                                $this->getDoctrine()->getEntityManager());
        
        if( $formHandler->process() )
        {
            return $this->redirect($this->generateUrl('homepage'));
        }

        return array('form' => $form->createView());
    }

    /**
     * Route_old("/update", name="update")
     * Method("get")
     * Template("CDACertifBundle:Default:create.html.twig")
     */
    public function updateAction_old()
    {
    	$artist = new Artist;
    
      $form = $this->createForm(new ArtistType, $artist);
    	
      return array('form' => $form->createView());
    }

}
