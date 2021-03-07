<?php
require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x']; //kwota
$y = $_REQUEST ['y']; //czas
$z = $_REQUEST ['z']; //oprocentowanie
$period_of_time = $_REQUEST['per'];


if ( ! (isset($x) && isset($y) && isset($z))) {
	$messages [] = 'Brak jednego z parametrów.';
}

if ( $x == "") {
	$messages [] = 'Nie podano wysokości udzielonego kredytu.';
}
if ( $y == "") {
	$messages [] = 'Nie podano czasu trwania kredytu.';
}

if ( $z == "") {
	$messages [] = 'Nie podano oprocentowania kredytu.';
}

if (empty( $messages )) {
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
    if (! is_numeric( $z )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}	

}

if (empty ( $messages )) {

	$x = intval($x);
	$y = floatval($y);
    $z = floatval($z);
    
	switch($period_of_time){
case 'months':
    $result = $x*(1+($z*($y/12))/100)/$y;
   $interest = $x*(1+($z*($y/12))/100)-$x;
   $time = 'Miesięczna ';
	break;
case 'years':
   $result = $x*(1+(($z*$y)/100))/$y;
   $interest = $x*(1+(($z*$y)/100))-$x;
   $time = 'Roczna ';
	break;
}    
}
include 'calc_view.php';
?>