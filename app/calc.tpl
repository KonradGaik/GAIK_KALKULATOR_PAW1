{extends file="../template/main.tpl"}

{block name=footer} Kalkulator 2021{/block}

{block name=content}


<div >
	<a href="<?php print(APP_ROOT); ?>/app/inna_chroniona.php" >Inne projekty</a>
	<a href="<?php print(APP_ROOT); ?>/app/security/logout.php" >Wyloguj</a>
</div>

<div>

<form action="{$app_url}/app/calc.php" method="post" >
	<legend>Kalkulator</legend>
	<fieldset>
		<label for="wysokosc_kredytu">Wysokość kredytu: </label>
		<input id="wysokosc_kredytu" type="text" name="x" value="{$form['x']}" /><br />
		<label for="id_op">Czas trwania kredytu w  </label>
		<select name="per">	
			<option value="months" <?php if ($period_of_time == 'months') echo'selected' ?> >miesiącach.</option>
			<option value="years"<?php if ($period_of_time == 'years') echo'selected' ?> >latach.</option>
		</select> 
		<label for="id_y"> </label>
		<input id="id_y" type="text" name="y" value="{$form['y']}" /><br />
		<label for="id_z">Oprocentowanie: </label>
		<input id="id_z" type="text" name="z" value="{$form['z']}" />
	</fieldset>	
	<input type="submit" value="Oblicz"  />
</form>	

<?php
{if isset($messages)} 
	{if (count ( $messages ) > 0)} 
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	
{/if}
{/if}
?>

<?php if (isset($result)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo "$time kwota spłaty kredytu wynosi $result złotych."; ?>
<?php echo "Całkowite oprocentowanie kredytu wynosi $interest"; ?>
</div>
<?php } ?>



</div>
{/block}