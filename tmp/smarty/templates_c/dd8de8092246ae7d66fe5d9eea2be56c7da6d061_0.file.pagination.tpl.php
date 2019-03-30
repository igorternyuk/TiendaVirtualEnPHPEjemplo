<?php
/* Smarty version 3.1.33, created on 2019-03-30 09:37:07
  from '/opt/lampp/htdocs/myshop.local/views/texturia/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c9f2ab357e619_63341516',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd8de8092246ae7d66fe5d9eea2be56c7da6d061' => 
    array (
      0 => '/opt/lampp/htdocs/myshop.local/views/texturia/pagination.tpl',
      1 => 1553935025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c9f2ab357e619_63341516 (Smarty_Internal_Template $_smarty_tpl) {
?><center>
        <div class="pagination">
        <?php if ($_smarty_tpl->tpl_vars['paginator']->value['currentPage'] != 1) {?>
            <span class='p_prev'><a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['link'];
echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage']-1;?>
">&nbsp;</a></span>
        <?php }?>
        
        <strong><span><?php echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage'];?>
 </span></strong>
        
        <?php if ($_smarty_tpl->tpl_vars['paginator']->value['currentPage'] < $_smarty_tpl->tpl_vars['paginator']->value['pageCount']) {?>
            <span class='p_next'><a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['link'];
echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage']+1;?>
">&nbsp;</a></span>
        <?php }?>
        </div>
        <hr/>
        <div class="pagination">
            <?php if (!isset($_smarty_tpl->tpl_vars['currentLetter']->value) || ($_smarty_tpl->tpl_vars['currentLetter']->value == '')) {?>
                <strong><span>Все</span></strong>
            <?php } else { ?>
                <a href="/index/?letter=#">Все</a>
            <?php }?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latinLetters']->value, 'letter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['letter']->value) {
?>
                <?php if (isset($_smarty_tpl->tpl_vars['currentLetter']->value) && $_smarty_tpl->tpl_vars['currentLetter']->value == $_smarty_tpl->tpl_vars['letter']->value) {?>
                    <strong><span><?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
 </span></strong>
                <?php } else { ?>
                    <a href="/index/?letter=<?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
</a>
                <?php }?>                
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <hr/>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cyrillicLetters']->value, 'letter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['letter']->value) {
?>
                <?php if (isset($_smarty_tpl->tpl_vars['currentLetter']->value) && $_smarty_tpl->tpl_vars['currentLetter']->value == $_smarty_tpl->tpl_vars['letter']->value) {?>
                    <strong><span><?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
 </span></strong>
                <?php } else { ?>
                    <a href="/index/?letter=<?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
</a>
                <?php }?>                
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </center><?php }
}
