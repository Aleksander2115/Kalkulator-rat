<?php
/* Smarty version 4.1.0, created on 2022-04-09 18:19:30
  from 'F:\STUDIA\XAMPP\htdocs\Kalkulator\app\views\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6251b212a6e4b0_92634206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4116cfaf10157d671df113e96673db7c779b68ac' => 
    array (
      0 => 'F:\\STUDIA\\XAMPP\\htdocs\\Kalkulator\\app\\views\\CalcView.html',
      1 => 1649521083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6251b212a6e4b0_92634206 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7824342646251b212a47311_02755523', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_7824342646251b212a47311_02755523 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7824342646251b212a47311_02755523',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form class="https://unpkg.com/purecss@2.0.6/build/pure-min.css" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post">
	<fieldset>
		<label for="amount">Kwota kredytu: </label>
		<input id="amount" type="text" placeholder = "Wpisz kwotę" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" class = "pure-input-rounded" style="background-color: Black; color: Red" /><br />
		<label for="interest">Oprocentowanie: </label>
		<input id="interest" type="text" placeholder = "Wpisz oprocentowanie" name="interest" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
" class = "pure-input-rounded" style="background-color: Black; color: Red" /><br />
		<label id="years">Ile lat: </label>
		<input id="years" type="text" placeholder = "Wpisz ilość lat" name="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
" class = "pure-input-rounded" style="background-color: Black; color: Red" /><br />
	</fieldset>
	<button type="submit" class="https://unpkg.com/purecss@2.0.6/build/pure-min.css" style="background-color: Black; color: Red" />Oblicz</button>
</form>

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
<div class="messages info">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}
