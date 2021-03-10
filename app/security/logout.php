<?php
require_once dirname(__FILE__).'/../../config.php';

session_start();
session_destroy();

header("Location: ".APP_URL);
