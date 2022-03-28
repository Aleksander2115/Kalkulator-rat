<?php
/* Smarty version 4.1.0, created on 2022-03-26 15:17:26
  from 'F:\STUDIA\XAMPP\htdocs\Kalkulator\app\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_623f2076ae2a57_07281384',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5f85c513d89b97713208a8fd6bdd51c7c994df6' => 
    array (
      0 => 'F:\\STUDIA\\XAMPP\\htdocs\\Kalkulator\\app\\CalcView.html',
      1 => 1648304193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623f2076ae2a57_07281384 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_842222489623f2076ad2a48_66119540', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_638767131623f2076ad3320_47751036', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_842222489623f2076ad2a48_66119540 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_842222489623f2076ad2a48_66119540',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa treść stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_638767131623f2076ad3320_47751036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_638767131623f2076ad3320_47751036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator rat</h2>


<form class="https://unpkg.com/purecss@2.0.6/build/pure-min.css" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
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

<div class="messages">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
