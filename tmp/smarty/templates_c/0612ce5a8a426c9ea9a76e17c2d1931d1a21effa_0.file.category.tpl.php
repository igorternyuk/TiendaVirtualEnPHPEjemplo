<?php
/* Smarty version 3.1.33, created on 2019-02-26 17:51:58
  from '/opt/lampp/htdocs/myshop.local/views/default/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c756eaf003399_61869561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0612ce5a8a426c9ea9a76e17c2d1931d1a21effa' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/category.tpl',
      1 => 1551199915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c756eaf003399_61869561 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['rsChildren']->value) {?>
    <h1>Подкатегории <?php echo $_smarty_tpl->tpl_vars['selectedCategory']->value['name'];?>
</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildren']->value, 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
        <h2><a href="/products/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a></h2>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<?php if ($_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    <?php if (count($_smarty_tpl->tpl_vars['rsProducts']->value) == 0) {?>
        <h1>Товары данной категории отсутствуют</h1>
    <?php } else { ?>
        <h1>Товары категории <?php echo $_smarty_tpl->tpl_vars['selectedCategory']->value['name'];?>
</h1>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'product', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
        <div style="float:left; padding: 0px 30px 40px 0px">
            <a href="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/" >
                <img src="/images/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='100'/>
            </a><br />
            <a href="/products/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/" > <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 </a>        
        </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
            <div style="clear: both;"></dic>
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>    
<?php }?>

<?php }
}
