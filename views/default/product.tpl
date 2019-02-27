{*Product page*}

<h3>{$selectedProduct['name']}</h3>

<img width="200" src="/images/product/{$selectedProduct['image']}"/>
<br /><br /><b>Цена: {$selectedProduct['price']} </b>
<a id="addToCart_{$selectedProduct['id']}" href="#" onclick="addToCart({$selectedProduct['id']}); return false;" {if $itemInCart } class="hideme" {/if}><i>Добавить в корзину<i></a>
<a id="removeFromCart_{$selectedProduct['id']}" href="#" onclick="removeFromCart({$selectedProduct['id']}); return false;" {if !$itemInCart } class="hideme" {/if}><i>Удалить из корзины</i></a>
<p><strong>Описание:</strong> <br />{$selectedProduct['description']}</p>
<br />
<a href="/category/{$selectedProduct['category_id']}/">Вернуться</a>
