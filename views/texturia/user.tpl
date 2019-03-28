{* User page*}

<h2>Ваши регистрационные данные</h2>

<div id="userData">
<table border="0">
    <tr>
        <td>Логин:</td>
        <td><input type="email" id="login" name="newEmail" readonly value="{$activeUser['email']}" /></td>
    </tr>
    <tr>
        <td>Имя:</td>
        <td><input type="text" id="newName" name="newName" value="{$activeUser['name']}" /></td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td><input type="text" id="newPhone" name="newPhone" value="{$activeUser['phone']}" /></td>
    </tr>
    <tr>
        <td>Адрес:</td>
        <td><textarea id="newAddress" name="newAddress"/>{$activeUser['address']}</textarea></td>
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
        {foreach $allOrders as $order name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td><a id="toggleProducts_{$order['id']}" href='#' onclick="toggleProductsByOrderId({$order['id']}); return false;">Показать товар заказа</a></td>
                <td>{$order['id']}</td>
                <td>${$order['total_sum']}</td>
                <td>
                    {if $order['status'] == 1}
                        Заказ оплачен
                    {else}
                        Заказ не оплачен
                    {/if}
                    
                </td>
                <td>{$order['date_created']}</td>
                <td>{$order['date_payment']}</td>
                <td>{$order['comment']}</td>
            </tr>
            {if $order['purchases']}
                <tr>
                    <td colspan="8">
                    <table id="products_{$order['id']}" name="products_{$order['id']}" class="hideme" border='1'  cellpadding='1' cellspacing='1' width='100%'>
                        <tr>
                            <th>№</th>
                            <th>ID заказа</th>
                            <th>ID покупки</th>
                            <th>ID товара</th>
                            <th>Название товара</th>
                            <th>Цена за единицу</th>
                            <th>Количество</th>
                            {* product_name id product_id order_id price amount product_name *}
                        </tr>
                        {foreach $order['purchases'] as $purchase name=purchases}
                            <tr>
                                <td>{$smarty.foreach.purchases.iteration}</td>
                                <td>{$purchase['order_id']}</td>
                                <td>{$purchase['id']}</td>
                                <td>{$purchase['product_id']}</td>
                                <td><a href="/product/{$purchase['product_id']}/">{$purchase['product_name']}</a></td>
                                <td>${$purchase['price']}</td>
                                <td>{$purchase['amount']}</td>
                            </tr>
                        {/foreach}
                    </table>
                    </td>
                </tr>
            {/if}            
        {/foreach}
    </table>
</div>
