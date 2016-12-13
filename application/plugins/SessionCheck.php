<?php
class Application_Plugin_SessionCheck extends Zend_Controller_Plugin_Abstract {
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
		try{
			$session = new Zend_Session_Namespace ( 'details' );
		}
		catch (Exception $e){
			Zend_Registry::get ( 'logger' )->log ( 'Exception : ' . $e->getMessage () . PHP_EOL . $e->getTraceAsString () . PHP_EOL , LOG_ERR );
		}
	}
}
?>