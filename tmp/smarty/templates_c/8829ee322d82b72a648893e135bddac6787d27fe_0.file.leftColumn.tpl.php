<?php
/* Smarty version 3.1.33, created on 2019-02-27 11:25:53
  from '/opt/lampp/htdocs/myshop.local/views/default/leftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7665b12a9678_87198709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8829ee322d82b72a648893e135bddac6787d27fe' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/leftColumn.tpl',
      1 => 1551263130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c7665b12a9678_87198709 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">
<div id="leftMenu">
<div class="menuCaption">Меню:</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
    <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
            ---><a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>        
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div>
</div><?php }
}