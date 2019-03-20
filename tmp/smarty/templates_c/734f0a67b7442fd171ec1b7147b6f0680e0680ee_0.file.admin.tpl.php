<?php
/* Smarty version 3.1.33, created on 2019-03-20 10:14:42
  from '/opt/lampp/htdocs/myshop.local/views/admin/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9204820ac774_29353760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '734f0a67b7442fd171ec1b7147b6f0680e0680ee' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/admin/admin.tpl',
      1 => 1553073279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9204820ac774_29353760 (Smarty_Internal_Template $_smarty_tpl) {
?><div id='blockNewCategory'>
    Новая категория:
    <input type="text" id="newCategoryName" name="newCategoryName" value="" /><br />
    Является подкатегорией для:
    <select id="categoryParentId" name="categoryParentId">
        <option id="cat_$category['id']" name='Главная категория' value="0">Главная категория</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allMainCats']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
            <option id="cat_$category['id']" name='<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
' value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <input type="button" value="Добавить категорию" onclick="newCategory();">
</div>
<?php }
}
