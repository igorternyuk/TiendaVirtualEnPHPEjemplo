<div id="leftColumn">
<div id="leftMenu">
<div class="menuCaption">Меню:</div>
<a href="/">Главная страница</a><br />
{foreach $allCats as $item}
    <a href="/category/{$item['id']}/">{$item['name']}</a><br />
    {if isset($item['children'])}
        {foreach $item['children'] as $child}
            ---><a href="/category/{$child['id']}/">{$child['name']}</a>
        {/foreach}        
    {/if}
{/foreach}

</div>

{if isset($activeUser) }

<div id="userBox">
    <a id="userLink" href="/user/">{$activeUser['displayName']}</a><br />
    <a href="/user/logout/" onclick="logout();">Выйти</a>        
</div>
    
{else}
    <div id="userBox" class="userBoxHidden">
        <a id="userLink" href="/user/"></a><br />
        <a href="/user/logout/" onclick="logout();">Выйти</a>        
    </div>
    {if not isset($hideLoginBox)}
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
    {/if}
    
{/if}

<div class="menuCaption">Корзина</div>
<a href="/cart/" title="Перейти в корзину">В корзине</a>
<span id="cartItemCount">
    {if $cartItemCount > 0}
        {$cartItemCount}
    {else}
        Пусто
    {/if}
</span>
</div>