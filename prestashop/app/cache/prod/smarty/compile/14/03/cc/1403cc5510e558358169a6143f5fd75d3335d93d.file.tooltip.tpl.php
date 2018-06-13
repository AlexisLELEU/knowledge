<?php /* Smarty version Smarty-3.1.19, created on 2018-06-12 14:46:05
         compiled from "/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/modules/welcome/views/templates/tooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20042392855b1fc08d2e92b9-39541630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1403cc5510e558358169a6143f5fd75d3335d93d' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/modules/welcome/views/templates/tooltip.tpl',
      1 => 1514906748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20042392855b1fc08d2e92b9-39541630',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b1fc08d32b4b4_49395935',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1fc08d32b4b4_49395935')) {function content_5b1fc08d32b4b4_49395935($_smarty_tpl) {?>

<div class="onboarding-tooltip">
  <div class="content"></div>
  <div class="onboarding-tooltipsteps">
    <div class="total"><?php echo smartyTranslate(array('s'=>'Step','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
 <span class="count">1/5</span></div>
    <div class="bulls">
    </div>
  </div>
  <button class="btn btn-primary btn-xs onboarding-button-next"><?php echo smartyTranslate(array('s'=>'Next','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
</div>
<?php }} ?>
