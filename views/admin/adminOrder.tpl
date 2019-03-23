<h2>Заказы</h2>
{if !$orders}
    <h3>Нет заказов</h3>
{else}
    <table border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Действие</th>
        <th width='100'>Статус</th>
        <th>Дата создания</th>
        <th>Дата оплаты</th>
        <th>Дата изменения</th>
        <th>Дополнительная информация</th>
    </tr>
    {foreach $orders as $order name=orders}
        <tr>
            <td>{$smarty.foreach.orders.iteration}</td>
            <td>{$order['id']}</td>
            <td><a id="toggleProducts_{$order['id']}" href='#' onclick="toggleProductsView({$order['id']}); return false;"><strong>Показать товары заказа</strong></a></td>
            <td>
                <input type="checkbox" id="orderStatus_{$order['id']}" {if $order['status'] } checked="checked" {/if} onclick="updateOrderStatus({$order['id']});">
                <label id="orderStatusLabel_{$order['id']}" >{if $order['status'] } Закрыт {else } Не оплачен {/if}</label>
            </td>
            <td>{$order['date_created']}</td>
            <td>
                <input type='datetime' id='orderPaymentDate_{$order['id']}' value="{$order['date_payment']}">
                <input type='button' value='Сохранить' onclick="updateOrderPaymentDate({$order['id']});">
            </td>
            <td>{$order['date_modification']}</td>
            <td>{$order['comment']}</td>
        </tr>
        <tr id="orderProducts_{$order['id']}" class="hideme">
            <td colspan='8'>
                <table border="1" cellpadding="1" cellspacing="1" width="100%">
                    <tr>
                        <th>№</th>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    {foreach $order['children'] as $child name=products}
                        <tr>
                            <td>{$smarty.foreach.products.iteration}</td>
                            <td>{$child['id']}</td>
                            <td><a href="/product/{$child['id']}/">{$child['name']}</a></td>
                            <td>{$child['price']}</td>
                            <td>{$child['amount']}</td>
                        </tr>
                    {/foreach}
                </table>
            </td>
        </tr>
    {/foreach}
    </table>
{/if}
