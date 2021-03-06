<?php
/* Smarty version 3.1.33, created on 2019-03-28 13:18:23
  from '/opt/lampp/htdocs/myshop.local/views/texturia/order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9cbb8f07f9b4_40387427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '571b8c0cc6291740292701331a834a612446d4ca' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/order.tpl',
      1 => 1551783940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9cbb8f07f9b4_40387427 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Данные заказа</h2>
<form id="formOrder" action="/cart/saveorder/" method="post">
    <table>
        <tr>
            <th>№</th>
            <th>Наименование</th>
            <th>Цена за единицу</th>
            <th>Количество</th>
            <th>Стоимость</th>
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
                <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></td>
                <td>
                    <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                        <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                        $<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>

                    </span>
                    
                </td>
                <td>
                    <span id="itemCount_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                        <input type="hidden" name="itemCount_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
    
                    </span>
                </td>
                <td>
                    <span>
                        <input type="hidden" name="subtotal_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['subtotal'];?>
">
                        $<?php echo $_smarty_tpl->tpl_vars['product']->value['subtotal'];?>

                    </span>                    
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <tr>
            <th colspan="4">Общая стоимость заказа:</th>
            <th>
                <span>
                    <input type="hidden" name="cartTotalSum" value="<?php echo $_smarty_tpl->tpl_vars['cartTotalSum']->value;?>
">
                    $<?php echo $_smarty_tpl->tpl_vars['cartTotalSum']->value;?>

                </span>  
            </th>
        </tr>
    </table>
                
    <?php if (isset($_smarty_tpl->tpl_vars['activeUser']->value)) {?>
        <h2>Данные заказчика</h2>
        <?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
        <div id="orderingUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
            <?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['activeUser']->value['name']);?>
            <?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['activeUser']->value['phone']);?>
            <?php $_smarty_tpl->_assignInScope('address', $_smarty_tpl->tpl_vars['activeUser']->value['address']);?>
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="userName" name="userName" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"></td>
                </tr>
                <tr>
                    <td>Телефон*</td>
                    <td><input type="text" id="userPhone" name="userPhone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea type="text" id="userAddress" name="userAddress"><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
                </tr>
            </table>
        </div>
    <?php } else { ?>
        <div id="loginBox">
            <div class="menuCaption">Авторизация:</div>
            <table>
                <tr>
                    <td>Логин:</td>
                    <td>
                        <input type="email" id="loginEmail" name="loginEmail" value="">
                    </td>    
                </tr>
                <tr>
                    <td>Пароль:</td>
                    <td>
                        <input type="password" id="loginPassword" name="loginPassword" value="">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="button" onclick="login();" value="Войти"></td>
                </tr>
            </table>
        </div>
        <div id="registerBox">
            или<br /><br />
            <div class="menuCaption">Регистрация нового пользователя:</div>
            <table>
                <tr>
                    <td>E-mail*</td>
                    <td>
                        <input type="email" id="email" name="email" value="">
                    </td>
                </tr>
                <tr>
                    <td>Пароль*</td>
                    <td>
                        <input type="password" id="pwd1" name="pwd1" value="">
                    </td>
                </tr>
                <tr>
                    <td>Повторите пароль*</td>
                    <td>
                        <input type="password" id="pwd2" name="pwd2" value="">
                    </td>
                </tr>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="userName" name="name" value=""></td>
                </tr>
                <tr>
                    <td>Телефон*</td>
                    <td><input type="text" id="userPhone" name="phone" value=""></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea type="text" id="userAddress" name="address"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                         <input type="button" name="btnRegister" value="Загеристрироваться" onclick="registerNewUser();">
                    </td>
                </tr>
            </table>
        </div>
        <?php $_smarty_tpl->_assignInScope('buttonClass', " class='hideme' ");?>        
    <?php }?>
    
    <input type="button" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" value="Оформить заказ" onclick="saveOrder();">
</form><?php }
}
