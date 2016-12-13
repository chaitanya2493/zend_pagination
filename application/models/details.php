<?php

class Application_Model_details extends Zend_Db_Table_Abstract {
	public function init(){
		$db = Zend_Registry::get ( 'db' );
	}
    public function details() {
    	$select = $this->_db->select ()->from ( 'country' )->query ()->fetchAll ();
    	return $select;
    }
}

