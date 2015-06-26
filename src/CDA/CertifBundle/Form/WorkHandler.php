<?php

namespace CDA\CertifBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

/**
 * Description of WorkHandler
 *
 * @author fba
 */
class WorkHandler
{
  protected $form;
  protected $request;

  public function __construct(Form $form, Request $request)
  {
    $this->form    = $form;
    $this->request = $request;
  }

  public function process()
  {
    if( $this->request->getMethod() == 'POST' )
    {
    	$this->form->bind($this->request);
    	 
      if( $this->form->isValid() )
      {
      	
        return true;
      }
    }

    return false;
  }
}
