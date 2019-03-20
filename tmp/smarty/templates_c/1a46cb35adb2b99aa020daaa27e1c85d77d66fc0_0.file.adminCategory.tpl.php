<?php
/* Smarty version 3.1.33, created on 2019-03-20 17:01:05
  from '/opt/lampp/htdocs/myshop.local/views/admin/adminCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9263c10178b8_48765511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a46cb35adb2b99aa020daaa27e1c85d77d66fc0' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/admin/adminCategory.tpl',
      1 => 1553097601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9263c10178b8_48765511 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="blockCategories">
    <h2>Управление категориями</h2>
    <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Действие</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'cat', false, NULL, 'categories', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']++;
?>
            <tr>
                <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_categories']->value['iteration'] : null);?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
</td>
                <td>
                    <input type="edit" id="categoryNewName_<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" name="categoryNewName_<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
">
                </td>
                <td>
                    <select id="parentCategoryNewId_<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" name="parentCategoryNewId_<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allMainCats']->value, 'mainCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainCat']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['mainCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainCat']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['mainCat']->value['name'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </td>
                <td>
                    <input type="button" onclick="updateCategory(<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
);" value="Сохранить">
                </td>
            </tr>   
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</div><?php }
}
