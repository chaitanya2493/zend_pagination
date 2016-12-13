<?php

class IndexController extends Zend_Controller_Action
{
    public function init()
    {
      $this->_model = new Application_Model_details ();
    }

    public function indexAction()
    {
		$result = $this->_model->details ();
		$request = $this->getRequest ();
		$items = 10;
		$page = $request->getParam ( 'page' );
		$paginator = Zend_Paginator::factory ( $result );
		$paginator->setCurrentPageNumber (  $page );
		$paginator->setItemCountPerPage ( $items );
		$this->view->paginator = $paginator;
    }
}

