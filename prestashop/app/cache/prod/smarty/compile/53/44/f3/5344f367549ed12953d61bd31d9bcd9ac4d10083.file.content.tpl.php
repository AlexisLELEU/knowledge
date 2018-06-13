<?php /* Smarty version Smarty-3.1.19, created on 2018-06-12 14:46:04
         compiled from "/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/admin4147egi7m/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:801336835b1fc08c2dad92-35133144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5344f367549ed12953d61bd31d9bcd9ac4d10083' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/admin4147egi7m/themes/default/template/content.tpl',
      1 => 1527169470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '801336835b1fc08c2dad92-35133144',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b1fc08c2e9376_41934539',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1fc08c2e9376_41934539')) {function content_5b1fc08c2e9376_41934539($_smarty_tpl) {?>
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
