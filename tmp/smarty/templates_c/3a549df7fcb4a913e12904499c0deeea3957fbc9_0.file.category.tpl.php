<?php
/* Smarty version 3.1.33, created on 2019-03-28 13:04:06
  from '/opt/lampp/htdocs/myshop.local/views/texturia/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9cb8368032f0_62138228',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a549df7fcb4a913e12904499c0deeea3957fbc9' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/category.tpl',
      1 => 1553774632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:galery.tpl' => 1,
  ),
),false)) {
function content_5c9cb8368032f0_62138228 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['rsChildren']->value) {?>
    <h1>Подкатегории <?php echo $_smarty_tpl->tpl_vars['selectedCategory']->value['name'];?>
</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildren']->value, 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
        <h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a></h2>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
    <?php if ($_smarty_tpl->tpl_vars['rsProducts']->value) {?>
    <h1>Товары категории <?php echo $_smarty_tpl->tpl_vars['selectedCategory']->value['name'];?>
</h1>
        <div id="results">
           <?php $_smarty_tpl->_subTemplateRender('file:galery.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        
    <?php } else { ?> 
        <h1>Товары данной категории отсутствуют</h1>
    <?php }
}
}
}
