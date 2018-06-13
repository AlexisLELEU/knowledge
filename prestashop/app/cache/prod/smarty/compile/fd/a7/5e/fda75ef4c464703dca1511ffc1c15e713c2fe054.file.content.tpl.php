<?php /* Smarty version Smarty-3.1.19, created on 2018-06-13 17:11:26
         compiled from "/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/admin4147egi7m/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70733515b21341e680003-65185242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fda75ef4c464703dca1511ffc1c15e713c2fe054' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/admin4147egi7m/themes/default/template/content.tpl',
      1 => 1527169470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70733515b21341e680003-65185242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b21341e687895_63565630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b21341e687895_63565630')) {function content_5b21341e687895_63565630($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
