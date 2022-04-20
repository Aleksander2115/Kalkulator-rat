<?php
/* Smarty version 4.1.0, created on 2022-04-20 16:33:21
  from 'F:\STUDIA\XAMPP\htdocs\Kalkulator\app\views\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_626019b1e5a949_36011920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4116cfaf10157d671df113e96673db7c779b68ac' => 
    array (
      0 => 'F:\\STUDIA\\XAMPP\\htdocs\\Kalkulator\\app\\views\\CalcView.html',
      1 => 1650464945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_626019b1e5a949_36011920 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1895637223626019b1e51d21_69417397', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_1895637223626019b1e51d21_69417397 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1895637223626019b1e51d21_69417397',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
resultList" class="pure-menu-heading pure-menu-link">Lista</a>
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
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
