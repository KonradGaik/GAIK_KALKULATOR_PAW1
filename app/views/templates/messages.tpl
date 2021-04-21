{if $msgs->isError()}
<div class="messages err">
	<ol>
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
{if $msgs->isInfo()}
<div class="messages inf bottom-margin">
	<ol>
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
</div>
{/if}
