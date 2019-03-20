<?php
/* Smarty version 3.1.33, created on 2019-03-20 07:53:21
  from '/opt/lampp/htdocs/myshop.local/views/admin/adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c91e3614c6664_31715829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d9bbff07f2fdc65ef41e895b477732d85237a71' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/admin/adminHeader.tpl',
      1 => 1553005460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftColumn.tpl' => 1,
  ),
),false)) {
function content_5c91e3614c6664_31715829 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css"/>
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/query-3.3.1.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
    </head>
    
<body>
    
<div id="header">
    <h1>Управление сайтом</h1>            
</div>
    
    <?php $_smarty_tpl->_subTemplateRender('file:adminLeftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
<div id="centerColumn"><?php }
}
