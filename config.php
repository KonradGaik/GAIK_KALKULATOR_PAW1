<?php
define('SERVER_NAME', '192.168.64.2');
define('SERVER_URL', 'http://'.SERVER_NAME);
define('APP_ROOT', '/GAIK_KALKULATOR_PAW1');
define('APP_URL', SERVER_URL.APP_ROOT);
define('ROOT_PATH', dirname(__FILE__));

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}

?>