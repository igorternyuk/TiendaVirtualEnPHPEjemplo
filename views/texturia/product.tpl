{*Product page*}


<div id="jf-content">
    <div class="gallery">
        <h3 class="jg_imgtitle" id="jg_photo_title">{$selectedProduct['name']}</h3>
    </div>
    
    <div id="jg_dtl_photo" class="jg_dtl_photo" style="text-align:center;">
        <img class="jg_photo" id="jg_photo_big" width="300" src="/images/product/{$selectedProduct['image']}"/>
    </div>
    
    <div class ="jg_photo_details" style="font-size: 20px; padding-top: 20px; padding-bottom: 10px;">
        <div class="jg_details">
            <div class="sectiontableentry2">
                <div class="jg_photo_left">
                  Цена:
                </div>
                <div class="jg_photo_right" id="jg_photo_author">
                  ${$selectedProduct['price']} 
                </div>
            </div>
        </div>
        
        <div class="jg_detailnavi" style="padding-top: 8px;">
            <div class="jg_iconbar">
                <a id="addToCart_{$selectedProduct['id']}" href="#" onclick="addToCart({$selectedProduct['id']}); return false;" {if $itemInCart } class="hideme" {/if}>Добавить в корзину</a>
                <a id="removeFromCart_{$selectedProduct['id']}" href="#" onclick="removeFromCart({$selectedProduct['id']}); return false;" {if !$itemInCart } class="hideme" {/if}>Удалить из корзины</a>
            </div>
        </div>
        
        <div style="clear:both;"></div> 
    </div>
            
    <div class="jg_description">
        <div id="jg_photo_description_label" style="font-size: 24px; padding-top:10px;padding-bottom:10px;">
            <strong>Описание:</strong>
        </div>
        <div id="jg_photo_description" style="font-size: 16px;" >
            <p>{$selectedProduct['description']}</p>
        </div>
        <a href="/category/{$selectedProduct['category_id']}/" style="font-size: 24px; padding-top:20px;">Вернуться</a>
    </div>
    
 </div>
