<?php /* Smarty version 2.6.26, created on 2017-11-30 03:34:04
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Admin_about_us/Admin_about_us.tpl */ ?>
<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
<!--Child Menu-->
<div class="admin_block">
	
    <div class="menu_child paddingBottom10">
    	<?php $_from = $this->_tpl_vars['arr_about_us']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&id=<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['item']; ?>
</a> <?php if (! ($this->_foreach['item']['iteration'] == $this->_foreach['item']['total'])): ?>|<?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>    
<!--End Child Menu-->


<div class="admin_block">
	<div class="mod_title marginBottom10"><?php echo $this->_tpl_vars['cur_title']; ?>
</div>    
    	<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
    	<div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="des"><?php echo $this->_tpl_vars['des']; ?>
</textarea>
        </div>   
        
        <div class="float_left marginRight10" style="width:35%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
<script type="text/javascript">
<?php echo '

   
	 var des = CKEDITOR.replace( \'des\',
	{ uiColor : \'#9AB8F3\',
		height:\'500px\'
	 });
	CKFinder.setupCKEditor( des, \'ckfinder/\' ) ;
	

'; ?>

</script>