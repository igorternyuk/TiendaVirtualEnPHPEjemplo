<?php
/* Smarty version 3.1.33, created on 2019-03-28 16:57:48
  from '/opt/lampp/htdocs/myshop.local/views/admin/adminProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9ceefc131b79_57165528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50c938355c45c5cc6ecc1e15355b71d2ee6acc15' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/admin/adminProduct.tpl',
      1 => 1553788665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9ceefc131b79_57165528 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="boxAddNewProduct">
<table border="1" cellpadding="1" cellspacing="1">
    <caption>Добавить товар</caption>
    <tr>
        <th>Название</th>
        <th>Категория</th>
        <th>Цена</th>
        <th>Описание</th>
        <th>Действие</th>
    </tr>
    <tr>
        <td>
            <input type="edit" id="newProductName" value="" />
        </td>
        <td>
            <select id="newProductCategoryId">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allSubCats']->value, 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </td>
        <td>
            <input type="number" step="0.01" id="newProductPrice" min='0' value="0">
        </td>
        <td>
            <textarea id="newProductDescription"></textarea>
        </td>
        <td>
            <input type="button" value="Сохранить" onclick="newProduct();">
        </td>
    </tr>
</table>    
</div>

<div id="boxUpdateProducts">
    <input type="button" id="btnCreateXML" value='Создать XML' onclick="createXML();">
    <div id="xml-place"></div>
    <table border="1" cellpadding="1" cellspacing="1">
        <caption>Товары</caption>
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Изображение</th>
            <th>Удален</th>
            <th>Сохранить</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allProducts']->value, 'product', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
                <td>
                    <input type="edit" id="productName_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="productName_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
">
                </td>
                <td>
                    <select id="productCategoryId_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="productCategoryId_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" >
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allSubCats']->value, 'cat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['product']->value['category_id'] == $_smarty_tpl->tpl_vars['cat']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>                    
                </td>
                <td>
                    <input type="number" id="productPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" step="0.01" name="productPrice_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
                </td>
                <td>
                    <textarea id="productDescription_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"  width="100%" height="100%">
                        <?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>

                    </textarea>
                </td>
                <td>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['image']) {?>
                        <img src="/images/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width="100"></img>
                    <?php }?>
                    <form action="/admin/upload/" method='post' enctype="multipart/form-data">
                        <input type="file" name="imageFile">
                        <input type="hidden" name="productId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                        <input type="submit" name="btnUploadImage" value="Загрузить">
                    </form>
                </td>
                <td>
                    <input type="checkbox" id="productStatus_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="productStatus_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['product']->value['status'] == 0) {?> checked='checked'<?php }?>>
                </td>
                <td>
                    <input type="button" value="Сохранить" onclick="updateProduct(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
);">
                </td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div>
<?php }
}
