
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>

<h1>Kalkulator kredytowy</h1>
    <form action="<?php print(APP_URL);?>/app/calc.php" method="post">
<label for="id_x">Kwota kredytu:</label>
<input id="id_x" type="text" name="x" value="<?php if (isset($x)) print($x); ?>" /> </br>
 <label for="id_per">Liczba </label>
<select name="per">
<option value="months"<?php if ($period_of_time == 'months') echo'selected'; ?> > miesięcy</option>
<option value="years"<?php if ($period_of_time == 'years') echo'selected'; ?> > lat</option>
	 </select> 
<label for="id_y"> </label>
<input id="id_y" type="text" name="y"  value="<?php if(isset($y)) print($y); ?>" /> </br>
<label for="id_z">Oprocentowanie: </label>
<input id="id_z" type="text" name="z" value="<?php if(isset($z)) print($z); ?>" /> </br>
<input type="submit" value="Oblicz" />
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
<?php echo $time.'kwota spłaty kredytu: '.$result; ?>
<?php echo 'Całkowita kwota odsetek kredytu: '.$interest ?>
</div>
<?php } ?>


</body>
</html>