<div id="leftColumn">
<div id="leftMenu">
<div class="menuCaption">Меню:</div>

{foreach $allCats as $item}
    <a href="/category/{$item['id']}/">{$item['name']}</a><br />
    {if isset($item['children'])}
        {foreach $item['children'] as $child}
            ---><a href="/category/{$child['id']}/">{$child['name']}</a>
        {/foreach}        
    {/if}
{/foreach}

</div>
</div>