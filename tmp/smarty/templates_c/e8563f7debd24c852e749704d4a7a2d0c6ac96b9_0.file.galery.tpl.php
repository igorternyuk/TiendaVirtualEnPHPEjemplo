<?php
/* Smarty version 3.1.33, created on 2019-04-01 16:46:40
  from '/opt/lampp/htdocs/myshop.local/views/texturia/galery.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca22450cf8c68_41317872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8563f7debd24c852e749704d4a7a2d0c6ac96b9' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/galery.tpl',
      1 => 1554129996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:pagination.tpl' => 1,
  ),
),false)) {
function content_5ca22450cf8c68_41317872 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="joomcat">
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
    <?php if (isset($_smarty_tpl->tpl_vars['paginator']->value)) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
    
</div><?php }
}
