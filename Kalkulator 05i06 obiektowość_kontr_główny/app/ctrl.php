<?php
require_once dirname(__FILE__).'/../config.php';
//załaduj kontroler
//1. pobierz nazwę aplikacji
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
//2.wykonanie akcji
switch ($action) {
	default : // 'calcView'
	    // załaduj definicję kontrolera
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
		// zrób coś innego ...
	break;
	case 'action2' :
		// zrób coś innego ...
	break;
}
