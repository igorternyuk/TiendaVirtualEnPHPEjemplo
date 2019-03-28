<?php
/* Smarty version 3.1.33, created on 2019-03-28 13:11:10
  from '/opt/lampp/htdocs/myshop.local/views/texturia/leftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9cb9de902722_33501397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02dac11a67a76a790f4c665eb154d8622338db89' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/leftColumn.tpl',
      1 => 1553775067,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9cb9de902722_33501397 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="jf-right">
	<div id="jf-user4">
            <div id="searchBox">
                <div class="search">
                    <input type="text" class="inputbox" name="searchFilter" id="mod_search_searchword" placeholder="Найти товар..." size="18" value="" onkeyup="fetchProductsByName();"/>
                    <input type="button" class="button" onclick="fetchProductsByName();"/>
                    <input name="option" value="com_search" type="hidden">
                    <input name="Itemid" value="435" type="hidden">
                </div>
                Отсортировать по: 
                <select id="productSorter" name="productSorter" onchange="fetchProductsByName();">
                    <option id="name" name="name" value="name">Имени</option>
                    <option id="price_asc" name="price_asc" value="price ASC">От дешевых к дорогим</option>
                    <option id="price_desc" name="price_desc" value="price DESC">От дорогим к дешевым</option>
                </select>
            </div>

	</div>
	<div class="jfmod module" id="Mod88">
            <div class="jfmod-top"></div>
            <div class="jfmod-mid">
                <h3>Меню:</h3>
                <div class="jfmod-content">
                    <ul class='menu'>
                        <li class="item44" ><a href="/">На главную</a></li>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <li class="item44"><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
                            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                                <ul class="menu" style="padding: 0px 0px 0px 20px">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
                                        <li><a href="/category/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a></li>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>        
                                </ul>                                
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                    
                </div>                
            </div>
            <div class="jfmod-bot"></div>
                    
        </div>
       <div class="jfmod module_blue" id="Mod97">
        <div class="jfmod-top"></div>
            <div class="jfmod-mid">
                <h3>Корзина</h3>
                <div class="jfmod-content">
                    <div class="joomimg97_main">
                        <div class="joomimg_row" style="font-size: 22px;">
                            <a href="/cart/" title="Перейти в корзину">В корзине</a>
                            <span id="cartItemCount">
                                <?php if ($_smarty_tpl->tpl_vars['cartItemCount']->value > 0) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['cartItemCount']->value;?>

                                <?php } else { ?>
                                    <span>Пусто</span>
                                <?php }?>
                            </span>
                        </div>
                        <div class="joomimg_clr"></div>
                    </div>
                </div>
            </div>
            <div class="jfmod-bot"></div>
        </div>
                            
        <div class="jfmod module_orangebold" id="Mode89">
            <div class="jfmod-top"></div>
            <div class="jfmod-mid">
                <div id="form-login">
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
                            <form action="/" method="post" id="form-login">
                                <div id="loginBox">
                                    <h3> Авторизация</h3>
                                    <fieldset class="input">
                                        <p id="form-login-username">                                        
                                             <input type="email" class="inputbox modlgn_username" id="loginEmail" name="loginEmail" placeholder="email" size="18" value="E-mail" onblur="if(this.value==='') this.value='E-mail';" onfocus="if(this.value==='E-mail') this.value='';"/>                                        
                                        </p>
                                        <p id="form-login-password">
                                            <input type="password" class="inputbox modlgn_passwd" id="loginPassword" name="loginPassword" placeholder="password" size="18" value="Password" onblur="if(this.value==='') this.value='Password';" onfocus="if(this.value==='Password') this.value='';" alt="password" />
                                        </p>
                                        <p style="text-align: right">
                                            <input type="button" class="buttonLogin" onclick="login();" value="Войти" />
                                        </p>
                                    </fieldset>                                
                                </div>

                                <div id="registerBox">
                                <div class="menuCaption showHidden" onclick="toggleRegisterBox();"><h3> Регистрация</h3></div>    
                                <fieldset class="input">
                                    <div id="registerBoxHidden"class="hideme">
                                        <p>
                                            E-mail:<br />
                                            <input type="email" class="inputbox modlgn_username" id="email" name="email" value="" required/><br />
                                            Пароль:<br />
                                            <input type="password" class="inputbox modlgn_passwd" id="pwd1" name="pwd1" value="" required><br />
                                            Повторить пароль:<br />
                                            <input type="password" class="inputbox modlgn_passwd" id="pwd2" name="pwd2" value="" required><br /><br />
                                        </p>
                                        <p style="text-align: right">
                                            <input type="button" class="buttonLogin" name="btnRegister" value="Регистрация" onclick="registerNewUser();">
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                            </div>
                        <?php }?>
                    <?php }?>
                </div>
                <div class="jfmod-content"></div>
            </div>
            <div class="jfmod-bot"></div>
        </div>
                    
</div>


                    
<?php }
}
