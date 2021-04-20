{extends file="..\template\main.html"}

{block name=footer} Kalkulator 2021{\block}

{block name=content}


<div>

<form action="{$conf->action_root}calcCompute" method="post" >
	<legend>Kalkulator</legend>
	<fieldset>
		<label for="wysokosc_kredytu">Wysokość kredytu: </label>
		<input id="wysokosc_kredytu" type="text" name="x" value="{$form['x']}" /><br />
		<label for="id_op">Czas trwania kredytu w  </label>
		<select name="per">	
			<option value="months" {if ($period_of_time == 'months')} 'selected' {/if} >miesiącach.</option>
			<option value="years" {if ($period_of_time == 'years')}'selected' {/if} >latach.</option>
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
		{strip}	echo '<li>'.$msg.'</li>';{/strip}
		}
		echo '</ol>';
	
{/if}
{/if}
?>

{if (isset($result))}{ 
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo "$time kwota spłaty kredytu wynosi $result złotych."; ?>
<?php echo "Całkowite oprocentowanie kredytu wynosi $interest"; ?>

</div>
{/if}
</div>
{/block}