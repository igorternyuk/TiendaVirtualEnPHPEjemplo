<?php
/* Smarty version 3.1.33, created on 2019-03-28 13:17:47
  from '/opt/lampp/htdocs/myshop.local/views/texturia/user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9cbb6b689980_12591508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce018d5acc502f07c0fccc0482ad8fcd2d0a81f7' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/user.tpl',
      1 => 1552986570,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9cbb6b689980_12591508 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Ваши регистрационные данные</h2>

<div id="userData">
<table border="0">
    <tr>
        <td>Логин:</td>
        <td><input type="email" id="login" name="newEmail" readonly value="<?php echo $_smarty_tpl->tpl_vars['activeUser']->value['email'];?>
" /></td>
    </tr>
    <tr>
        <td>Имя:</td>
        <td><input type="text" id="newName" name="newName" value="<?php echo $_smarty_tpl->tpl_vars['activeUser']->value['name'];?>
" /></td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td><input type="text" id="newPhone" name="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['activeUser']->value['phone'];?>
" /></td>
    </tr>
    <tr>
        <td>Адрес:</td>
        <td><textarea id="newAddress" name="newAddress"/><?php echo $_smarty_tpl->tpl_vars['activeUser']->value['address'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль:</td>
        <td><input type="password" name="newPwd1" id="newPwd1" value="" /></td>
    </tr>
    <tr>
        <td>Повтор пароля:</td>
        <td><input type="password" name="newPwd2" id="newPwd2" value="" /></td>
    </tr>
    <tr>
        <td>Текущий пароль:</td>
        <td><input type="password" name="currPwd" id="currPwd" value="" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" id="btnUpdateUserData" name="btnUpdateUserData" value="Сохранить изменения" onclick="updateUserData();"></td>
    </tr>
</table>    
</div>
<hr>    
<div id="userOrders">
    <table border='1'  cellpadding='1' cellspacing='1' >
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID Заказа</th>
            <th>Сумма заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Дополнительная информация</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allOrders']->value, 'order', false, NULL, 'orders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>
</td>
                <td><a id="toggleProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" href='#' onclick="toggleProductsByOrderId(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
); return false;">Показать товар заказа</a></td>
                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
                <td>$<?php echo $_smarty_tpl->tpl_vars['order']->value['total_sum'];?>
</td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] == 1) {?>
                        Заказ оплачен
                    <?php } else { ?>
                        Заказ не оплачен
                    <?php }?>
                    
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_created'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['order']->value['comment'];?>
</td>
            </tr>
            <?php if ($_smarty_tpl->tpl_vars['order']->value['purchases']) {?>
                <tr>
                    <td colspan="8">
                    <table id="products_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" name="products_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="hideme" border='1'  cellpadding='1' cellspacing='1' width='100%'>
                        <tr>
                            <th>№</th>
                            <th>ID заказа</th>
                            <th>ID покупки</th>
                            <th>ID товара</th>
                            <th>Название товара</th>
                            <th>Цена за единицу</th>
                            <th>Количество</th>
                                                    </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['purchases'], 'purchase', false, NULL, 'purchases', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_purchases']->value['iteration']++;
?>
                            <tr>
                                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_purchases']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_purchases']->value['iteration'] : null);?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['purchase']->value['order_id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['purchase']->value['id'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['purchase']->value['product_id'];?>
</td>
                                <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['purchase']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['purchase']->value['product_name'];?>
</a></td>
                                <td>$<?php echo $_smarty_tpl->tpl_vars['purchase']->value['price'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['purchase']->value['amount'];?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                    </td>
                </tr>
            <?php }?>            
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div>
<?php }
}
