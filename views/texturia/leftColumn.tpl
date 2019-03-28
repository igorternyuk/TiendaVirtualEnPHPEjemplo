<div id="jf-right">
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
                        {foreach $allCats as $item}
                            <li class="item44"><a href="/category/{$item['id']}/">{$item['name']}</a></li>
                            {if isset($item['children'])}
                                <ul class="menu" style="padding: 0px 0px 0px 20px">
                                    {foreach $item['children'] as $child}
                                        <li><a href="/category/{$child['id']}/">{$child['name']}</a></li>
                                    {/foreach}        
                                </ul>                                
                            {/if}
                        {/foreach}
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
                                {if $cartItemCount > 0}
                                    {$cartItemCount}
                                {else}
                                    <span>Пусто</span>
                                {/if}
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
                        {/if}
                    {/if}
                </div>
                <div class="jfmod-content"></div>
            </div>
            <div class="jfmod-bot"></div>
        </div>
                    
</div>


                    
{*
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

*}