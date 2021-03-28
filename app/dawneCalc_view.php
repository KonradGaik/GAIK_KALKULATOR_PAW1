<?php

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div >
	<a href="<?php print(APP_ROOT); ?>/app/inna_chroniona.php" >Inne projekty</a>
	<a href="<?php print(APP_ROOT); ?>/app/security/logout.php" >Wyloguj</a>
</div>

<div>

<form action="<?php print(APP_ROOT); ?>/app/calc.php" method="post" >
	<legend>Kalkulator</legend>
	<fieldset>
		<label for="wysokosc_kredytu">Wysokość kredytu: </label>
		<input id="wysokosc_kredytu" type="text" name="x" value="<?php if (isset($x)) print($x); ?>"" /><br />
		<label for="id_op">Czas trwania kredytu w  </label>
		<select name="per">	
			<option value="months" <?php if ($period_of_time == 'months') echo'selected' ?> >miesiącach.</option>
			<option value="years"<?php if ($period_of_time == 'years') echo'selected' ?> >latach.</option>
		</select> 
		<label for="id_y"> </label>
		<input id="id_y" type="text" name="y" value="<?php if (isset($y)) print($y); ?>" /><br />
		<label for="id_z">Oprocentowanie: </label>
		<input id="id_z" type="text" name="z" value="<?php if (isset($z)) print($z); ?>" />
	</fieldset>	
	<input type="submit" value="Oblicz"  />
</form>	

<?php
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo "$time kwota spłaty kredytu wynosi $result złotych."; ?>
<?php echo "Całkowite oprocentowanie kredytu wynosi $interest"; ?>
</div>
<?php } ?>

</div>

</body>
</html>