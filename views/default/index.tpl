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
{foreach $rsProducts as $product name=products}
    <div style="float:left; padding: 0px 30px 40px 0px">
        <a href="/product/{$product['id']}/" >
            <img src="/images/product/{$product['image']}" width='100'/>
        </a><br />
         <b> Цена: ${$product['price']} </b><br />
        <a href="/product/{$product['id']}/" > {$product['name']}</a>        
    </div>
    {if $smarty.foreach.products.iteration mod 3 == 0}
        <div style="clear: both;"></div>
    {/if}
{/foreach}   
</div>
            
