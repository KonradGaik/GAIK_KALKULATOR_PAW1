<?php
require_once 'init.php';

switch ($action) {
	default : // 'calcView'  // akcja NIEPUBLICZNA
		include 'check.php'; // KONTROLA
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'login': // akcja PUBLICZNA - brak check.php
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogin();
	break;
	case 'calcCompute' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
	case 'logout' : // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		$ctrl = new app\controllers\LoginCtrl();
		$ctrl->doLogout();
	break;
	case 'action1' : // akcja PUBLICZNA - brak check.php
		// zrób coś innego publicznego ...
		print('reakcja na akcję publiczną ....');
	break;
	case 'action2': // akcja NIEPUBLICZNA
		include 'check.php';  // KONTROLA
		// zrób coś innego wymagającego logowania ...
		print('reakcja na akcję niepubliczną ....');
	break;
}
