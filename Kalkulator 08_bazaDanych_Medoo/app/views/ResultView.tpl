{extends file="main.html"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
{if count($conf->roles)>0}
	<a href="{$conf->action_root}logout" class="pure-menu-heading pure-menu-link">Wyloguj</a>
{else}
	<a href="{$conf->action_root}login" class="pure-menu-heading pure-menu-link">Zaloguj</a>
{/if}
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
{if count ($conf->roles)>0}
	<a class="pure-button button-success" href="{$conf->action_root}calcCompute">+ Nowa kalkulacja</a>
{else}
	<a class="pure-button button-success" href="{$conf->action_root}login">+ Nowa kalkulacja</a>
{/if}
</div>

<table id="tab_results" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Kwota</th>
		<th>Oprocentowanie</th>
		<th>Lata</th>
    <th>Rata</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $results as $r}
{strip}
	<tr>
		<td>{$r["Kwota"]}</td>
		<td>{$r["Oprocentowanie"]}</td>
		<td>{$r["Lata"]}</td>
    <td>{$r["Rata"]}</td>
		<td>
			<a class="button-small pure-button button-warning" href="{$conf->action_url}resultDelete&id={$r['idkalkulacja']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
