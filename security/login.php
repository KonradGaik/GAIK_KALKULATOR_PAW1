<?php
require dirname(__FILE__).'../../config.php';

function getParamsLogin(&$form){
$form['login'] = isset($_REQUEST['login']) ? $_REQUEST['login'] : null;
$form['pass'] = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
}
function validateLogin(&$form,&$messages){
if(!(isset($form['login'])&&(isset($form['pass'])))){

return false;
}

if($form['login'] ==""){}
$messages[] = 'Nie podano loginu';
}

if($form['pass'] ==""){}
$messages[] = 'Nie podano hasła';
}
if (count ( $messages ) > 0) return false;

	if ($form['login'] == "admin" && $form['pass'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}
	if ($form['login'] == "user" && $form['pass'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}
	
	$messages [] = 'Niepoprawny login lub hasło';
	return false; 
}

$form = array();
$messages = array();

getParamsLogin($form);

if (!validateLogin($form,$messages)) {
	include ROOT_PATH.'/app/security/login_view.php';
} else { 
	header("Location: ".APP_URL);
}
?>
