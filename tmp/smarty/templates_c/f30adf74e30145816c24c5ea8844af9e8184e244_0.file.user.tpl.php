<?php
/* Smarty version 3.1.33, created on 2019-03-04 12:58:35
  from '/opt/lampp/htdocs/myshop.local/views/default/user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7d12ebf10e84_59845671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f30adf74e30145816c24c5ea8844af9e8184e244' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/user.tpl',
      1 => 1551700710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c7d12ebf10e84_59845671 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php }
}
