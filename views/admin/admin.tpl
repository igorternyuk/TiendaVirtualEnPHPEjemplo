<div id='blockNewCategory'>
    Новая категория:
    <input type="text" id="newCategoryName" name="newCategoryName" value="" /><br />
    Является подкатегорией для:
    <select id="categoryParentId" name="categoryParentId">
        <option id="cat_$category['id']" name='Главная категория' value="0">Главная категория</option>
        {foreach $allMainCats as $category}
            <option id="cat_$category['id']" name='{$category['name']}' value="{$category['id']}">{$category['name']}</option>
        {/foreach}
    </select>
    <input type="button" value="Добавить категорию" onclick="newCategory();">
</div>
