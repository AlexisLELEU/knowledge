<?php /* Smarty version Smarty-3.1.19, created on 2018-06-13 17:11:41
         compiled from "/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/admin4147egi7m/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19757930525b21342de34c01-91471796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7375fb4a2aad5f736bb677b148b860ddebf4e351' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/admin4147egi7m/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1527169470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19757930525b21342de34c01-91471796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b21342de48a78_87360809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b21342de48a78_87360809')) {function content_5b21342de48a78_87360809($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" >
	<i class="icon-search-plus"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>

</a>
<?php }} ?>
