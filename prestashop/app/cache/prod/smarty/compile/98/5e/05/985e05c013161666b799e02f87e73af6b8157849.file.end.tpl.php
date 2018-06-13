<?php /* Smarty version Smarty-3.1.19, created on 2018-06-13 17:11:21
         compiled from "/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/modules/welcome/views/contents/end.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6787441825b213419b79f56-32043700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '985e05c013161666b799e02f87e73af6b8157849' => 
    array (
      0 => '/Users/Jonathan/Desktop/HETIC/knowledge/prestashop/modules/welcome/views/contents/end.tpl',
      1 => 1514906748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6787441825b213419b79f56-32043700',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5b213419b887b2_89297085',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b213419b887b2_89297085')) {function content_5b213419b887b2_89297085($_smarty_tpl) {?>

<div id="onboarding-welcome" class="modal-body">
    <div class="col-12">
        <button class="onboarding-button-next pull-right close" type="button">&times;</button>
        <h2 class="text-center text-md-center"><?php echo smartyTranslate(array('s'=>'Over to you!','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</h2>
    </div>
    <div class="col-12">
        <p class="text-center text-md-center">
          <?php echo smartyTranslate(array('s'=>'You\'ve seen the essential, but there\'s a lot more to explore.','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
<br />
          <?php echo smartyTranslate(array('s'=>'Some ressources can help you go further:','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>

        </p>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6  justify-content-center text-center text-md-center link-container">
              <a class="final-link" href="http://doc.prestashop.com/display/PS17/Getting+Started" target="_blank">
                <div class="starter-guide"></div>
                <span class="link"><?php echo smartyTranslate(array('s'=>'Starter Guide','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</span>
              </a>
            </div>
            <div class="col-md-6 text-center text-md-center link-container">
              <a class="final-link" href="https://www.prestashop.com/forums/" target="_blank">
                <div class="forum"></div>
                <span class="link"><?php echo smartyTranslate(array('s'=>'Forum','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</span>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-center text-md-center link-container">
              <a class="final-link" href="https://www.prestashop.com/en/training-prestashop" target="_blank">
                <div class="training"></div>
                <span class="link"><?php echo smartyTranslate(array('s'=>'Training','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</span>
              </a>
            </div>
            <div class="col-md-6 text-center text-md-center link-container">
              <a class="final-link" href="https://www.youtube.com/user/prestashop" target="_blank">
                <div class="video-tutorial"></div>
                <span class="link"><?php echo smartyTranslate(array('s'=>'Video tutorial','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</span>
              </a>
            </div>
          </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="col-12">
            <div class="text-center text-md-center">
                <button class="btn btn-primary onboarding-button-next"><?php echo smartyTranslate(array('s'=>'I\'m ready','d'=>'Modules.Welcome.Admin'),$_smarty_tpl);?>
</button>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
