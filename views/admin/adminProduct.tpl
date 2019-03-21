<div id="boxAddNewProduct">
<table border="1" cellpadding="1" cellspacing="1">
    <caption>Добавить товар</caption>
    <tr>
        <th>Название</th>
        <th>Категория</th>
        <th>Цена</th>
        <th>Описание</th>
        <th>Действие</th>
    </tr>
    <tr>
        <td>
            <input type="edit" id="newProductName" value="" />
        </td>
        <td>
            <select id="newProductCategoryId">
                {foreach $allSubCats as $cat}
                    <option value="{$cat['id']}">{$cat['name']}</option>
                {/foreach}
            </select>
        </td>
        <td>
            <input type="number" step="0.01" id="newProductPrice" min='0' value="0">
        </td>
        <td>
            <textarea id="newProductDescription"></textarea>
        </td>
        <td>
            <input type="button" value="Сохранить" onclick="newProduct();">
        </td>
    </tr>
</table>    
</div>

<div id="boxUpdateProducts">
    <table border="1" cellpadding="1" cellspacing="1">
        <caption>Товары</caption>
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Изображение</th>
            <th>В наличии</th>
            <th>Сохранить</th>
        </tr>
        {foreach $allProducts as $product name=products}
            <tr>
                <td>{$smarty.foreach.products.iteration}</td>
                <td>{$product['id']}</td>
                <td>
                    <input type="edit" id="productName_{$product['id']}" name="productName_{$product['id']}" value="{$product['name']}">
                </td>
                <td>
                    <select id="productCategoryId_{$product['id']}" name="productCategoryId_{$product['id']}" >
                        {foreach $allSubCats as $cat}
                            <option value="{$cat['id']}" {if $product['category_id'] == $cat['id']} selected {/if}>{$cat['name']}</option>
                        {/foreach}
                    </select>                    
                </td>
                <td>
                    <input type="number" id="productPrice_{$product['id']}" step="0.01" name="productPrice_{$product['id']}" value="{$product['price']}">
                </td>
                <td>
                    <textarea id="productDescription_{$product['id']}"  width="100%" height="100%">
                        {$product['description']}
                    </textarea>
                </td>
                <td>
                    {if $product['image'] }
                        <img src="/images/product/{$product['image']}" width="100"></img>
                    {/if}
                    <form action="/admin/upload/" method='post' enctype="multipart/form-data">
                        <input type="file" name="pathToImage">
                        <input type="hidden" name="productId">
                        <input type="submit" name="btnUploadImage" value="Загрузить">
                    </form>
                </td>
                <td>
                    <input type="checkbox" id="productStatus_{$product['id']}" name="productStatus_{$product['id']}" {if $product['status'] == 0} checked='checked'{/if}>
                </td>
                <td>
                    <input type="button" value="Сохранить" onclick="updateProduct({$product['id']});">
                </td>
            </tr>
        {/foreach}
    </table>
</div>
