<div id="leftColumn">
<div id="leftMenu">
<div class="menuCaption">Меню:</div>

{foreach $allCats as $item}
    <a href="?controller=category&id={$item['id']}">{$item['name']}</a><br />
    {if isset($item['children'])}
        {foreach $item['children'] as $child}
            ---><a href="?controller=category&id={$child['id']}">{$child['name']}</a>
        {/foreach}        
    {/if}
{/foreach}

</div>
</div>