<div id="blockCategories">
    <h2>Управление категориями</h2>
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Действие</th>
        </tr>
        {foreach $allCats as $cat name=categories}
            <tr>
                <td>{$smarty.foreach.categories.iteration}</td>
                <td>{$cat['id']}</td>
                <td>
                    <input type="edit" id="categoryNewName_{$cat['id']}" name="categoryNewName_{$cat['id']}" value="{$cat['name']}">
                </td>
                <td>
                    <select id="parentCategoryNewId_{$cat['id']}" name="parentCategoryNewId_{$cat['id']}">
                        {foreach $allMainCats as $mainCat}
                            <option value="{$mainCat['id']}" {if $cat['parent_id'] == $mainCat['id']}selected{/if}>{$mainCat['name']}</option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <input type="button" onclick="updateCategory({$cat['id']});" value="Сохранить">
                </td>
            </tr>   
        {/foreach}
    </table>
</div>