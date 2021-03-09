
<html>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<style>
*{margin:0;
padding: 0;
font-family: Arial, Helvetica, sans-serif;
}
h1{width: 500px;
	text-align: center;
	background-color: #ff0;
padding: 0 0 25px 0;}
form{padding: 25px 0 0 0;}
.przycisk{width: 25vh;
height: 10vh;
font-size: 30px;
background-color: aqua;
color:blueviolet;
transition: 0.3s;}

.przycisk:hover{background-color: blueviolet;
color:aqua;}

</style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>
	
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>


<h1>Kalkulator kredytowy</h1>
    <form action="<?php print(APP_URL);?>/app/calc.php" method="post">
<label for="id_x">Kwota kredytu:</label>
<input id="id_x" type="text" name="x" value="<?php if (isset($x)) print($x); ?>" /> </br>
 <label for="id_per">Liczba </label>
<select name="per">
<option value="months"<?php if ($period == 'months') echo'selected' ?> > miesięcy</option>
<option value="years"<?php if ($period == 'years') echo'selected' ?> > lat</option>
</select> 
<label for="id_y"> </label>
<input id="id_y" type="text" name="y"  value="<?php if(isset($y)&&($period == 'months')){ print($y);} else {print($y/12);} ?>" /> </br>
<label for="id_z">Oprocentowanie: </label>
<input id="id_z" type="text" name="z" value="<?php if(isset($z)) print($z); ?>" /> </br>
<input class="przycisk" type="submit" value="Oblicz"  class="pure-button pure-button-primary"/>
</form>

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo $time."kwota spłaty kredytu z odsetkami: " .$result."zł"; ?></br>
<?php echo 'Całkowite oprocentowanie kredytu: '.$interest.'zł'; ?>
</div>

<?php } ?>

</body>
</html>