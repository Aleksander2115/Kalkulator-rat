<?php
/* Smarty version 4.1.0, created on 2022-03-28 10:44:17
  from 'F:\STUDIA\XAMPP\htdocs\Kalkulator\app\calc\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62417561455d96_70924621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca474e011c4dd9a5a895d972f2afd4b740924378' => 
    array (
      0 => 'F:\\STUDIA\\XAMPP\\htdocs\\Kalkulator\\app\\calc\\CalcView.html',
      1 => 1648457042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62417561455d96_70924621 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155171111762417561446d29_86942332', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4431759462417561447560_26529813', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'footer'} */
class Block_155171111762417561446d29_86942332 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_155171111762417561446d29_86942332',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa treść stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_4431759462417561447560_26529813 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4431759462417561447560_26529813',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator rat</h2>


<form class="https://unpkg.com/purecss@2.0.6/build/pure-min.css" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
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
