<?php /* Smarty version Smarty-3.1.19, created on 2018-06-12 14:46:05
         compiled from "/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/modules/welcome/views/navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8230854945b1fc08d20b936-11491553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26cd1b7199bc7ed706925974d1eb0e4e606d2d3a' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/2ème Année/SI_CRM-CMS/prestashop/modules/welcome/views/navbar.tpl',
      1 => 1514906748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8230854945b1fc08d20b936-11491553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'percent_rounded' => 0,
    'percent_real' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b1fc08d257a38_00662043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1fc08d257a38_00662043')) {function content_5b1fc08d257a38_00662043($_smarty_tpl) {?>

<div class="onboarding-navbar">
  <div class="row text">
    <div class="col-md-8">
      <?php echo smartyTranslate(array('s'=>'Launch your shop!','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>

    </div>
    <div class="col-md-4 text-right text-md-right"><?php echo $_smarty_tpl->tpl_vars['percent_rounded']->value;?>
%</div>
  </div>
  <div class="progress">
    <div class="bar" role="progressbar" style="width:<?php echo $_smarty_tpl->tpl_vars['percent_real']->value;?>
%;"></div>
  </div>
  <div>
    <button class="btn btn-main btn-sm onboarding-button-resume"><?php echo smartyTranslate(array('s'=>'Resume','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
  </div>
  <div>
    <a class="btn -small btn-main btn-sm onboarding-button-stop"><?php echo smartyTranslate(array('s'=>'Stop the OnBoarding','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</a>
  </div>
</div>
<?php }} ?>
