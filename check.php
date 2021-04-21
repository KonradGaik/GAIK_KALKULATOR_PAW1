<?php

use app\transfer\User;

//inicjacja mechanizmu sesji
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// próba pobrania danych użytkownika z sesji

//$l = isset($_SESSION['user_login']) ? $_SESSION['user_login'] : null;
//$r = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
//$user = new User($l,$r);

// LUB pobranie całego obiektu z sesji
$user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

//jeśli brak parametru lub danych (niezalogowanie) to wyświetl stronę logowania
if ( ! (isset($user) && isset($user->login) && isset($user->role)) ){
	$ctrl = new app\controllers\LoginCtrl();
	$ctrl->generateView();
	
	//i zatrzymaj dalsze przetwarzanie skryptów
	exit();
}
//jeśli ok to idź dalej, a system ma do dyspozycji obiekt klasy User
