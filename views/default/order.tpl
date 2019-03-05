{* Order page *}

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
        
        {foreach $productsInCart as $product name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$product['id']}/">{$product['name']}</a></td>
                <td>
                    <span id="itemPrice_{$product['id']}">
                        <input type="hidden" name="itemPrice_{$product['id']}" value="{$product['price']}">
                        ${$product['price']}
                    </span>
                    
                </td>
                <td>
                    <span id="itemCount_{$product['id']}">
                        <input type="hidden" name="itemCount_{$product['id']}" value="{$product['count']}">
                        {$product['count']}    
                    </span>
                </td>
                <td>
                    <span>
                        <input type="hidden" name="subtotal_{$product['id']}" value="{$product['subtotal']}">
                        ${$product['subtotal']}
                    </span>                    
                </td>
            </tr>
        {/foreach}
        <tr>
            <th colspan="4">Общая стоимость заказа:</th>
            <th>
                <span>
                    <input type="hidden" name="cartTotalSum" value="{$cartTotalSum}">
                    ${$cartTotalSum}
                </span>  
            </th>
        </tr>
    </table>
                
    {if isset($activeUser)}
        <h2>Данные заказчика</h2>
        {$buttonClass=""}
        <div id="orderingUserInfoBox" {$buttonClass}>
            {$name = $activeUser['name']}
            {$phone = $activeUser['phone']}
            {$address = $activeUser['address']}
            <table>
                <tr>
                    <td>Имя*</td>
                    <td><input type="text" id="userName" name="userName" value="{$name}"></td>
                </tr>
                <tr>
                    <td>Телефон*</td>
                    <td><input type="text" id="userPhone" name="userPhone" value="{$phone}"></td>
                </tr>
                <tr>
                    <td>Адрес*</td>
                    <td><textarea type="text" id="userAddress" name="userAddress">{$address}</textarea></td>
                </tr>
            </table>
        </div>
    {else}
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
        {$buttonClass=" class='hideme' "}        
    {/if}
    
    <input type="button" {$buttonClass} id="btnSaveOrder" value="Оформить заказ" onclick="saveOrder();">
</form>