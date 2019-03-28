<?php
/* Smarty version 3.1.33, created on 2019-03-28 07:55:53
  from '/opt/lampp/htdocs/myshop.local/views/texturia/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9c6ff9ec0d58_66563625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46cfc7a5c0160392d59905b27f487025e9967381' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/product.tpl',
      1 => 1553756150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9c6ff9ec0d58_66563625 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="jf-content">
    <div class="gallery">
        <h3 class="jg_imgtitle" id="jg_photo_title"><?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['name'];?>
</h3>
    </div>
    
    <div id="jg_dtl_photo" class="jg_dtl_photo" style="text-align:center;">
        <img class="jg_photo" id="jg_photo_big" width="300" src="/images/product/<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['image'];?>
"/>
    </div>
    
    <div class ="jg_photo_details" style="font-size: 20px; padding-top: 20px; padding-bottom: 10px;">
        <div class="jg_details">
            <div class="sectiontableentry2">
                <div class="jg_photo_left">
                  Цена:
                </div>
                <div class="jg_photo_right" id="jg_photo_author">
                  $<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['price'];?>
 
                </div>
            </div>
        </div>
        
        <div class="jg_detailnavi" style="padding-top: 8px;">
            <div class="jg_iconbar">
                <a id="addToCart_<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
" href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
); return false;" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?>>Добавить в корзину</a>
                <a id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
" href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['id'];?>
); return false;" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?>>Удалить из корзины</a>
            </div>
        </div>
        
        <div style="clear:both;"></div> 
    </div>
            
    <div class="jg_description">
        <div id="jg_photo_description_label" style="font-size: 24px; padding-top:10px;padding-bottom:10px;">
            <strong>Описание:</strong>
        </div>
        <div id="jg_photo_description" style="font-size: 16px;" >
            <p><?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['description'];?>
</p>
        </div>
        <a href="/category/<?php echo $_smarty_tpl->tpl_vars['selectedProduct']->value['category_id'];?>
/" style="font-size: 24px; padding-top:20px;">Вернуться</a>
    </div>
    
 </div>
<?php }
}
