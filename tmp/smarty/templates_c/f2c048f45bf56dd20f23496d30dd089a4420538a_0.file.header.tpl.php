<?php
/* Smarty version 3.1.33, created on 2019-03-27 12:15:49
  from '/opt/lampp/htdocs/myshop.local/views/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9b5b6571d810_71102551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2c048f45bf56dd20f23496d30dd089a4420538a' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/default/header.tpl',
      1 => 1553678381,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftColumn.tpl' => 1,
  ),
),false)) {
function content_5c9b5b6571d810_71102551 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css"/>
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/query-3.3.1.min.js"><?php echo '</script'; ?>
>
        <!--<?php echo '<script'; ?>
 type="text/javascript" src="/js/underscore.js"><?php echo '</script'; ?>
> -->
        <?php echo '<script'; ?>
 type="text/javascript" src= 
        "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"> 
        <?php echo '</script'; ?>
> 
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
    </head>
    
<body>
    <?php echo '<script'; ?>
 type="text/javascript" >
       var tpl = _.template("<h1>Some text: <?php echo '<%';?>= foo <?php echo '%>';?></h1>");
    <?php echo '</script'; ?>
>    
<div id="header">
    <h1>My shop - Интернет магазин</h1>            
</div>
    
    <?php $_smarty_tpl->_subTemplateRender('file:leftColumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
<div id="centerColumn">
<?php }
}
