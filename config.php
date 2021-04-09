<?php
require_once 'Conf.class.php';

$conf = new Config();

$conf->root_path =dirname(__FILE__);
$conf->server_name = '192.168.64.2';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/GAIK_KALKULATOR_PAW1';
$conf->app_url = $conf->server_url.$conf->app_root;

$conf->action_root = $conf->app_root.'/app/ctrl.php?action=';
$conf->action_url = $conf->server_url.$conf->action_root;
?>