<?php
/* Smarty version 3.1.33, created on 2019-03-26 15:16:39
  from '/opt/lampp/htdocs/myshop.local/views/texturia/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9a344710f3b9_37299434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73aa8afbac0574c7396923c27ca35fed69f8cccc' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/index.tpl',
      1 => 1553609792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9a344710f3b9_37299434 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="results">
<div class="joomcat">
    <div class="joomcat96_row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'product', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <!-- open joomcat image container div -->
            <div class="joomcat96_imgct" style="width:210px !important;margin-right:10px;">
                <div class="joomcat96_img cat_img">
                    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/" >
                        <img src="/images/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='100'/>
                    </a>
                </div>
                 <div class="joomcat96_row_txt" style="padding-bottom:10px;padding-top:0px;">
                    <ul>
                      <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 Цена: $<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</a></li>
                    </ul>
                </div>
            </div>

            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
                <div class="joomcat96_clr"></div>
                </div>
                <div class="joomcat96_row">
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>
</div><?php }
}
