{*Category page template*}


{if $rsChildren}
    <h1>Подкатегории {$selectedCategory['name']}</h1>
    {foreach $rsChildren as $child}
        <h2><a href="/products/{$child['id']}/">{$child['name']}</a></h2>
    {/foreach}
{/if}

{if $rsProducts}
    {if $rsProducts|@count == 0}
        <h1>Товары данной категории отсутствуют</h1>
    {else}
        <h1>Товары категории {$selectedCategory['name']}</h1>
        {foreach $rsProducts as $product name=products}
        <div style="float:left; padding: 0px 30px 40px 0px">
            <a href="/products/{$product['id']}/" >
                <img src="/images/product/{$product['image']}" width='100'/>
            </a><br />
            <a href="/products/{$product['id']}/" > {$product['name']} </a>        
        </div>
        {if $smarty.foreach.products.iteration mod 3 == 0}
            <div style="clear: both;"></dic>
        {/if}
    {/foreach}
    {/if}    
{/if}

