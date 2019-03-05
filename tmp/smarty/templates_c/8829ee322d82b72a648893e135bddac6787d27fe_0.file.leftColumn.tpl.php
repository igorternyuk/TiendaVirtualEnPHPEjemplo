<?php
/* Smarty version 3.1.33, created on 2019-03-05 10:30:23
  from '/opt/lampp/htdocs/myshop.local/views/default/leftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c7e41af6af5c1_80371718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8829ee322d82b72a648893e135bddac6787d27fe' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/leftColumn.tpl',
      1 => 1551777908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c7e41af6af5c1_80371718 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">
<div id="leftMenu">
<div class="menuCaption">Меню:</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
    <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
            ---><a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>        
    <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div>

<?php if (isset($_smarty_tpl->tpl_vars['activeUser']->value)) {?>

<div id="userBox">
    <a id="userLink" href="/user/"><?php echo $_smarty_tpl->tpl_vars['activeUser']->value['displayName'];?>
</a><br />
    <a href="/user/logout/" onclick="logout();">Выйти</a>        
</div>
    
<?php } else { ?>
    <div id="userBox" class="userBoxHidden">
        <a id="userLink" href="/user/"></a><br />
        <a href="/user/logout/" onclick="logout();">Выйти</a>        
    </div>
    <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>
        <div id="loginBox">
            <div class="menuCaption"> Авторизация</div>
            <input type="email" id="loginEmail" name="loginEmail" value="" placeholder="email"/><br /><br />
            <input type="password" id="loginPassword" name="loginPassword" value="" placeholder="password"/><br /><br />
            <input type="button" onclick="login();" value="Войти" />
        </div>

        <div id="registerBox">
            <div class="menuCaption showHidden" onclick="toggleRegisterBox();">Регистрация</div>    
            <div id="registerBoxHidden"class="hideme">
                E-mail:<br />
                <input type="email" id="email" name="email" value="" required/><br />
                Пароль:<br />
                <input type="password" id="pwd1" name="pwd1" value="" required><br />
                Повторить пароль:<br />
                <input type="password" id="pwd2" name="pwd2" value="" required><br /><br />
                <input type="button" name="btnRegister" value="Загеристрироваться" onclick="registerNewUser();">
            </div>
        </div>
    <?php }?>
    
<?php }?>

<div class="menuCaption">Корзина</div>
<a href="/cart/" title="Перейти в корзину">В корзине</a>
<span id="cartItemCount">
    <?php if ($_smarty_tpl->tpl_vars['cartItemCount']->value > 0) {?>
        <?php echo $_smarty_tpl->tpl_vars['cartItemCount']->value;?>

    <?php } else { ?>
        Пусто
    <?php }?>
</span>
</div><?php }
}
