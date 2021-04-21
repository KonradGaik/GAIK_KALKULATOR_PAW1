<?php
require_once 'init.php';
// Brak zmian - init inicjuje system i przygotowuje dokładnie to co w projekcie 6b.
// Jets zatem nowa struktura, przestrzenie nazw i pomocnicze obiekty i funkcje.

// Poniżej wybór akcji pobranej jako parametr z żądania (zmienna $action inicjowana automatycznie w init.php)

// Zauważmy, iż w wybranych akcjach zawarto kontrolę dostępu
// (check.php, ajk w projekcie nr 2, przekierowuje na stronę logowania jeśli użytkownik nie jest zalogowany)
// Pozostałe akcje są publiczne, czyli nie wymagają logowania, dlatego brak w nich check.php (są to: login oraz action1)

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
