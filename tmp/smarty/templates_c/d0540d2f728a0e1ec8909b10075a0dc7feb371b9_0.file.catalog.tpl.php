<?php
/* Smarty version 3.1.33, created on 2019-03-28 08:25:23
  from '/opt/lampp/htdocs/myshop.local/views/default/catalog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9c76e387bee8_66937464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0540d2f728a0e1ec8909b10075a0dc7feb371b9' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/catalog.tpl',
      1 => 1553756783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9c76e387bee8_66937464 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'product', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
    <div style="float:left; padding: 0px 30px 40px 0px">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/" >
            <img src="/images/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='100'/>
        </a><br />
         <b> Цена: $<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 </b><br />
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/" > <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>        
    </div>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
        <div style="clear: both;"></div>
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   <?php }
}
