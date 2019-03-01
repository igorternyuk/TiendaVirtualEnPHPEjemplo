<div id="leftColumn">
<div id="leftMenu">
<div class="menuCaption">Меню:</div>

{foreach $allCats as $item}
    <a href="/category/{$item['id']}/">{$item['name']}</a><br />
    {if isset($item['children'])}
        {foreach $item['children'] as $child}
            ---><a href="/category/{$child['id']}/">{$child['name']}</a>
        {/foreach}        
    {/if}
{/foreach}

</div>

<div id="registerBox">
    <div class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
    <div id="registerBoxHidden">
        E-mail:<br />
        <input type="email" id="email" name="email" value="" required/><br />
        Пароль:<br />
        <input type="password" id="pwd1" name="pwd1" value="" required><br />
        Повторить пароль:<br />
        <input type="password" id="pwd2" name="pwd2" value="" required><br />
        <input type="button" name="btnRegister" value="Загеристрироваться" onclick="registerNewUser();">
    </div>
</div>

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