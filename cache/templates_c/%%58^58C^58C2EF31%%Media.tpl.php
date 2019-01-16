<?php /* Smarty version 2.6.26, created on 2019-01-10 08:48:58
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Media/Media.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\communication.com\\templates/Media/Media.tpl', 4, false),)), $this); ?>
<h1>load media</h1>
<?php $_from = $this->_tpl_vars['our_work_contents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['media'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['media']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['media']):
        $this->_foreach['media']['iteration']++;
?>
    <a href="javascript:voide(0);" onclick="media_play(this,'<?php echo $this->_tpl_vars['media']['title']; ?>
');" ><?php echo $this->_tpl_vars['media']['title']; ?>
</a> <br/>
    <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['media']['media'], 'id' => $this->_tpl_vars['media']['id'], 'folder' => 'ourwork_image', 'type' => '610')), $this); ?>
" width="50" />
    </br>
<?php endforeach; endif; unset($_from); ?>