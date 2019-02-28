<?php
/* Smarty version 3.1.33, created on 2019-02-28 15:14:02
  from '/opt/lampp/htdocs/myshop.local/views/default/cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c77ecaacc1982_79537613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0a8bf6b73c516b26d344754cfd9f46aa21a642b' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/cart.tpl',
      1 => 1551363237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c77ecaacc1982_79537613 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['productsInCart']->value) {?>
    <table border="1">
        <tr>
            <th>№</th>
            <th>Наименование</th>
            <th>Цена за единицу</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Действие</th>
        </tr>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productsInCart']->value, 'product', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                
                <td>
                    <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
                </td>
                
                <td>
                    <span id="price_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">$<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span>
                </td>
                
                <td>
                    <input type="number" min="1" value="1" id="itemCount_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="itemCount_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" onchange="updateSubtotal(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
);" />
                </td>
                
                <td>
                    <span id="subTotal_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="subtotal" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">$<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</span>
                </td>
                <td>
                    <a id="addToCart_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
); return false;" class="hideme"><i>Восстановить<i></a>
                    <a id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
); return false;"><i>Удалить</i></a>
                </td>
                
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
        <tr>
            <th colspan="5">Общая сумма:</th>
            <td>
                <span id="totalCost" value="0"></span>
            </td>
        </tr>
    
    </table>        
        
<?php } else { ?>
    <h1>Ваша корзина пуста</h1>
<?php }?>

<?php echo '<script'; ?>
 type="text/javascript">
    $("document").ready(function(){
        calcTotal();
    });
<?php echo '</script'; ?>
>


<?php }
}
