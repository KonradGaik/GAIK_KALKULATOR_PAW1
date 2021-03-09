<?php 
require_once dirname(__FILE__).'/../config.php';

include ROOT_PATH.'/app/security/check.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<style></style>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona chroniona</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
    <div class=""> <a href="<?php print(APP_ROOT); ?>/app/calc.php" class="pure-button">Powrót do kalkulatora</a></div>

    <div class=""><a href="<?php print(APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a></div>

    <div style="width:90%; margin: 2em auto;">
	    <p>To jest inna chroniona strona aplikacji internetowej</p>
</div>	
</body>
</html>



