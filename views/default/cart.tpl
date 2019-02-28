{* Cart page*}

{if $productsInCart}
    <table border="1">
        <tr>
            <th>№</th>
            <th>Наименование</th>
            <th>Цена за единицу</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Действие</th>
        </tr>
        
        {foreach $productsInCart as $product name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                
                <td>
                    <a href="/product/{$product['id']}/">{$product['name']}</a>
                </td>
                
                <td>
                    <span id="price_{$product['id']}" value="{$product['price']}">${$product['price']}</span>
                </td>
                
                <td>
                    <input type="number" min="1" value="1" id="itemCount_{$product['id']}" name="itemCount_{$product['id']}" onchange="updateSubtotal({$product['id']});" />
                </td>
                
                <td>
                    <span id="subTotal_{$product['id']}" class="subtotal" value="{$product['price']}">${$product['price']}</span>
                </td>
                <td>
                    <a id="addToCart_{$product['id']}" href="#" onclick="addToCart({$product['id']}); return false;" class="hideme"><i>Восстановить<i></a>
                    <a id="removeFromCart_{$product['id']}" href="#" onclick="removeFromCart({$product['id']}); return false;"><i>Удалить</i></a>
                </td>
                
            </tr>
        {/foreach}
        
        <tr>
            <th colspan="5">Общая сумма:</th>
            <td>
                <span id="totalCost" value="0"></span>
            </td>
        </tr>
    
    </table>        
        
{else}
    <h1>Ваша корзина пуста</h1>
{/if}

<script type="text/javascript">
    $("document").ready(function(){
        calcTotal();
    });
</script>


