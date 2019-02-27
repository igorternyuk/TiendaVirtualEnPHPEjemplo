<?php
/* Smarty version 3.1.33, created on 2019-02-27 17:53:57
  from '/opt/lampp/htdocs/myshop.local/views/default/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c76c0a56fba55_81150057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c49061206b631ebca89e7cbac5b951242d97bece' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/product.tpl',
      1 => 1551286210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c76c0a56fba55_81150057 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3><?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['name'];?>
</h3>

<img width="200" src="/images/product/<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['image'];?>
"/>
<br /><br /><b>Цена: <?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['price'];?>
 </b>
<a id="addToCart_<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
); return false;" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?>><i>Добавить в корзину<i></a>
<a id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
" href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
); return false;" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?>><i>Удалить из корзины</i></a>
<p><strong>Описание:</strong> <br /><?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['description'];?>
</p>
<br />
<a href="/category/<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['category_id'];?>
/">Вернуться</a>
<?php }
}
