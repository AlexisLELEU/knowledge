<?php /* Smarty version Smarty-3.1.19, created on 2018-06-13 17:11:27
         compiled from "/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/modules/welcome/views/navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1665385205b21341f0c3155-71739647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e6f60c1d6044f4c1f4ac66a0787c606c423e015' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/modules/welcome/views/navbar.tpl',
      1 => 1514906748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1665385205b21341f0c3155-71739647',
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
  'unifunc' => 'content_5b21341f0dbd85_52030200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b21341f0dbd85_52030200')) {function content_5b21341f0dbd85_52030200($_smarty_tpl) {?>

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
