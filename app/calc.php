<?php
require_once dirname(__FILE__).'/../config.php';
require_once ROOT_PATH.'/lib/smarty/Smarty.class.php';
//include ROOT_PATH.'/app/security/check.php';

function getParams(&$form){
	$form['x'] = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$form['y'] = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$form['z'] = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;	
	$form['period_of_time'] = isset($_REQUEST['per']) ? $_REQUEST['per'] : null;	

}

function validate(&$form,&$messages){

	if ( ! (isset($form['x']) && isset($form['y']) && isset([$form['z']) && isset($form['period_of_time'])))
	 

		return false;
	
	$hide_intro = true;

	if ( $form['x'] == "") {
		$messages [] = 'Nie podano kwoty kredytu.';
	}
	if ( $form['y'] == "") {
		$messages [] = 'Nie podano okresu czasu.';
	}
	if ( [$form['z'] == "") {
		$messages [] = 'Nie podano oprocentowania.';
	}

	if (count ( $messages ) != 0) return false;
	

	if (! is_numeric( $form['x'] )) {
		$messages [] = 'Wartość kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $form['y'] )) {
		$messages [] = 'Okres czasu nie jest liczbą całkowitą';
	}	
	if (! is_numeric( $form['z'] )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	


	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$form,&$messages,&$result,&$interest,&$time){
	global $role;
	
	$form['x'] = intval(['x']);
	$form['y'] = intval('y');
	$form['z'] = intval('z');

	$form['x'];
	$form['y'];
	$form['z'];


	switch ($form['period_of_time']) {
		case 'months' :
		//	if ($role == 'admin'){
				$result = $form['x'] *(1+($form['z']*($form['y']/12))/100)/$form['y'];
				$interest = $form['x'] *(1+($form['z']*($form['y']/12))/100)-$form['x'] ;
				$time= 'Miesięczna';
		//	} else {
		//		$messages [] = 'Tylko administrator moze uzyc kalkulatora kredytowego!';
		//	}
			break;
		case 'years' :
		//	if ($role == 'admin'){
				$result = $form['x'] *(1+(($form['z']*$form['y'])/100))/$form['y'];
				$interest = $form['x']*(1+(($form['z']*$form['y'])/100))-$form['x'] ;
				$time= 'Roczna';
		//	} else {
		//		$messages [] = 'Tylko administrator moze uzyc kalkulatora kredytowego!';
		//	}
			break;
	}
}

$form = null;
$result = null;
$messages = array();
$hide_intro = null;

getParams($form);
if ( validate($form,$messages) ) {
	process($form,$messages,$result,$interest,$time);
}

$smarty = new Smarty();

$smarty->assign('app_url',APP_URL);
$smarty->assign('root_path',ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Profesjonalne narzedzie do wyliczania rat kredytu.');
$smarty->assign('page_header','Z wykorzystaniem szablonu Smarty');

$smarty->assign('hide_intro',$hide_intro);

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

$smarty->display(ROOT_PATH.'/app/calc.html');


include 'calc_view.php';