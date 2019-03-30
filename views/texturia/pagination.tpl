<center>
        <div class="pagination">
        {if $paginator['currentPage'] != 1}
            <span class='p_prev'><a href="{$paginator['link']}{$paginator['currentPage'] - 1}">&nbsp;</a></span>
        {/if}
        
        <strong><span>{$paginator['currentPage']} </span></strong>
        
        {if $paginator['currentPage'] < $paginator['pageCount']}
            <span class='p_next'><a href="{$paginator['link']}{$paginator['currentPage'] + 1}">&nbsp;</a></span>
        {/if}
        </div>
        <hr/>
        <div class="pagination">
            {if not isset($currentLetter) or ($currentLetter == '') }
                <strong><span>Все</span></strong>
            {else}
                <a href="/index/?letter=#">Все</a>
            {/if}
            {foreach $latinLetters as $letter}
                {if isset($currentLetter) and $currentLetter == $letter}
                    <strong><span>{$letter} </span></strong>
                {else}
                    <a href="/index/?letter={$letter}">{$letter}</a>
                {/if}                
            {/foreach}
            <hr/>
            {foreach $cyrillicLetters as $letter}
                {if isset($currentLetter) and $currentLetter == $letter}
                    <strong><span>{$letter} </span></strong>
                {else}
                    <a href="/index/?letter={$letter}">{$letter}</a>
                {/if}                
            {/foreach}
        </div>
    </center>