{* Main page template *}

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
            
