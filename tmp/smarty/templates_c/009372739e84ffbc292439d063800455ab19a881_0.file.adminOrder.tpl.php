<?php
/* Smarty version 3.1.33, created on 2019-03-23 16:36:24
  from '/opt/lampp/htdocs/myshop.local/views/admin/adminOrder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c965278b42ab6_74260773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '009372739e84ffbc292439d063800455ab19a881' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/admin/adminOrder.tpl',
      1 => 1553355382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c965278b42ab6_74260773 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Заказы</h2>
<?php if (!$_smarty_tpl->tpl_vars['orders']->value) {?>
    <h3>Нет заказов</h3>
<?php } else { ?>
    <table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Действие</th>
        <th width='100'>Статус</th>
        <th>Дата создания</th>
        <th>Дата оплаты</th>
        <th>Дата изменения</th>
        <th>Дополнительная информация</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
        <tr>
            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
            <td><a id="toggleProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" href='#' onclick="toggleProductsView(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
); return false;"><strong>Показать товары заказа</strong></a></td>
            <td>
                <input type="checkbox" id="orderStatus_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value['status']) {?> checked="checked" <?php }?> onclick="updateOrderStatus(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
                <label id="orderStatusLabel_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" ><?php if ($_smarty_tpl->tpl_vars['order']->value['status']) {?> Закрыт <?php } else { ?> Не оплачен <?php }?></label>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_created'];?>
</td>
            <td>
                <input type='datetime' id='orderPaymentDate_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
' value="<?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
">
                <input type='button' value='Сохранить' onclick="updateOrderPaymentDate(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_modification'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['order']->value['comment'];?>
</td>
        </tr>
        <tr id="orderProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="hideme">
            <td colspan='8'>
                <table border="1" cellpadding="1" cellspacing="1" width="100%">
                    <tr>
                        <th>№</th>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['children'], 'child', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                        <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
</td>
                            <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['child']->value['price'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['child']->value['amount'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </table>
            </td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
<?php }
}
}
