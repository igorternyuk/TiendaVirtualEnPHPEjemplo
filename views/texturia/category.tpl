{*Category page template*}

{if $rsChildren}
    <h1>Подкатегории {$selectedCategory['name']}</h1>
    {foreach $rsChildren as $child}
        <h2><a href="/category/{$child['id']}/">{$child['name']}</a></h2>
    {/foreach}
{else}
    {if $rsProducts}
    <h1>Товары категории {$selectedCategory['name']}</h1>
        <div id="results">
           {include file='galery.tpl'}
        </div>
        
    {else} 
        <h1>Товары данной категории отсутствуют</h1>
    {/if}
{/if}