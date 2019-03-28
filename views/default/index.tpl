{* Main page template *}

<div id="searchBox">
    <input type="text" id="searchFilter" name="searchFilter" placeholder="Найти товар..."  onkeyup="fetchProductsByName();">
    <input type="button" id="btnSearchProducts" name="btnSearchProducts" value="Найти" onclick="fetchProductsByName();">
Отсортировать по: 
<select id="productSorter" name="productSorter" onchange="fetchProductsByName();">
    <option id="name" name="name" value="name">Имени</option>
    <option id="price_asc" name="price_asc" value="price ASC">От дешевых к дорогим</option>
    <option id="price_desc" name="price_desc" value="price DESC">От дорогим к дешевым</option>
</select>
<br /><br />
</div>

<div id="results">
    {include file='galery.tpl'}
</div>
            
