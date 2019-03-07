<?php
/* Smarty version 3.1.33, created on 2019-03-07 17:29:34
  from '/opt/lampp/htdocs/myshop.local/views/default/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8146ee61dce2_06656944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78e182b5d879875be31ab13c4a7dd21cbbfe0827' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/index.tpl',
      1 => 1551976169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8146ee61dce2_06656944 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="searchBox">
    <input type="text" id="searchFilter" name="searchFilter" placeholder="Найти товар..."  onkeyup="fetchProductsByName();">
<input type="button" id="btnSearchProducts" name="btnSearchProducts" value="Найти" onclick="fetchProductsByName();">
Отсортировать по: 
<select id="productSorter" name="productSorter" onchange="fetchProductsByName();">
    <option id="name" name="name" value="name">Имени</option>
    <option id="price_asc" name="price_asc" value="price ASC">От дешевых к дорогим</option>
    <option id="price_desc" name="price_desc" value="price DESC">От дорогим к дешевым</option>
</select>
<br /><br />
</div>

<div id="results">
<?php
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
</div>
            
<?php }
}
