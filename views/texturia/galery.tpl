<div class="joomcat">
    <div class="joomcat96_row">
        {foreach $rsProducts as $product name=products}
            <!-- open joomcat image container div -->
            <div class="joomcat96_imgct" style="width:210px !important;margin-right:10px;">
                <div class="joomcat96_img cat_img">
                    <a href="/product/{$product['id']}/" >
                        <img src="/images/product/{$product['image']}" width='100'/>
                    </a>
                </div>
                 <div class="joomcat96_row_txt" style="padding-bottom:10px;padding-top:0px;">
                    <ul>
                      <li><a href="/product/{$product['id']}/">{$product['name']} Цена: ${$product['price']}</a></li>
                    </ul>
                </div>
            </div>

            {if $smarty.foreach.products.iteration mod 3 == 0}
                <div class="joomcat96_clr"></div>
                </div>
                <div class="joomcat96_row">
            {/if}
        {/foreach}
    </div>
    {if isset($paginator)}
        {include file='pagination.tpl'}
    {/if}
    
</div>