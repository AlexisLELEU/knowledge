<?php /* Smarty version Smarty-3.1.19, created on 2018-06-12 14:46:40
         compiled from "/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/admin4147egi7m/themes/new-theme/template/components/layout/confirmation_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:852938115b1fc0b095f191-34854478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a6bee6fed1c1c974fea34f61720db0186532a31' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/admin4147egi7m/themes/new-theme/template/components/layout/confirmation_messages.tpl',
      1 => 1527169470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '852938115b1fc0b095f191-34854478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmations' => 0,
    'conf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b1fc0b09e8723_92096584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1fc0b09e8723_92096584')) {function content_5b1fc0b09e8723_92096584($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['confirmations']->value)&&count($_smarty_tpl->tpl_vars['confirmations']->value)&&$_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php  $_smarty_tpl->tpl_vars['conf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['confirmations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->key => $_smarty_tpl->tpl_vars['conf']->value) {
$_smarty_tpl->tpl_vars['conf']->_loop = true;
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php } ?>
    </div>
  </div>
<?php }?>
<?php }} ?>
