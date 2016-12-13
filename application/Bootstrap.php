<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	
	protected function _initConfig() {
		$config = new Zend_Config ( $this->getOptions () );
		Zend_Registry::set ( 'ApplicationConfig', $config );
	}
	
	protected function _initLogger() {
		$this->bootstrap ( "log" );
		$logger = $this->getResource ( "log" );
		$config = Zend_Registry::get ( 'ApplicationConfig' );
		Zend_Registry::set ( "logger", $logger );
	}
	protected function _initMultidb() {
		try {
			$multidb = $this->getPluginResource ( 'multidb' );
			$multidb->init ();
			Zend_Registry::set ( 'db', $multidb->getDb ( 'db' ) );
		} catch ( Exception $e ) {
			Zend_Registry::get ( 'logger' )->log ( 'Exception : Error while connecting to database ' . $e->getMessage () . PHP_EOL . $e->getTraceAsString (), LOG_ERR );
		}
	}
}

