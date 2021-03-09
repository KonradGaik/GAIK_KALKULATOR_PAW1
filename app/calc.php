<?php
require_once dirname(__FILE__).'/../config.php';
include ROOT_PATH.'/app/security/check.php';



function getParams(&$x,&$y,&$z,&$period_of_time){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;
	$period_of_time = isset($_REQUEST['per']) ? $_REQUEST['per'] : null;	
}

function validate(&$x,&$y,&$z,&$messages){
	if ( ! (isset($x) && isset($y) && isset($z)&& isset($messages))) {
		return false;
	}

	if ( $x == "") {
		$messages [] = 'Nie podano kwoty kredytu';
	}
	if ( $y == "") {
		$messages [] = 'Czasu trwania kredytu';
	}

	if ( $z == "") {
		$messages [] = 'Nie podano oprocentowania';
	}

	if (count ( $messages ) != 0) {return false;}
	

	if (! is_numeric( $x )) {
		$messages [] = 'Wartość wysokości kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Długość trwania kredytu nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $y )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	

	if(count ( $messages ) != 0) return false;
	else return true;
}

function process(&$x,&$y,&$z,&$period_of_time,&$messages,&$result,&$interest,&$time){
	
	global $role;
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);
	$time = intval($time);

	switch ($period_of_time) {
		case 'months' :
			if ($role == 'admin'){
				$result = $x*(1+($z*($y/12))/100)/$y;
				$interest = $x*(1+($z*($y/12))/100)-$x;
				$time = 'Miesięczna ';
			} else {
				$messages [] = 'Tylko administrator moze uzyc kalkulatora !';
			}
			break;
	
		case 'years' :
			if ($role == 'admin'){
				$result = $x*(1+(($z*$y)/100))/$y;
				$interest = $x*(1+(($z*$y)/100))-$x;
				$time = 'Roczna ';
			} else {
				$messages [] = 'Tylko administrator moze uzyc kalkulatora!';
			}
			break;
	
	}
}
$x = null;
$y = null;
$period_of_time = null;
$result = null;
$messages = array();
getParams($x,$y,$z,$period_of_time);
if ( validate($x,$y,$z,$messages) ) { 
	process($x,$y,$z,$period_of_time,$messages,$result,$interest,$time);
}
include 'calc_view.php'; ?>