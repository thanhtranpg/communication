<?php /* Smarty version 2.6.26, created on 2019-01-11 04:51:47
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_ourwork/Admin_image.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\communication.com\\templates/Admin_ourwork/Admin_image.tpl', 67, false),)), $this); ?>
<script>
<?php echo '
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_ourwork_mediaForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is(\'form\') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var title = getValueId(\'title\');
    var image = getValueId(\'image\');
		
		if(title == \'\'){
			jQuery("#title").focus();
			alert(\'Hãy nhập tiêu đề!\');			
			return false;
		}
    var cmd = \''; ?>
<?php echo $this->_tpl_vars['cmd']; ?>
<?php echo '\';

    if (cmd ==\'img\'){
        if(image == \'\'){
            jQuery("#image").focus();
            alert(\'Hãy chọn ảnh!\');           
            return false;
        }
    }
		is_submit=true;
		return true;		
}
'; ?>

</script>
<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Quản ảnh <strong style="color: red; font-size: 14px"><?php echo $this->_tpl_vars['item_title']['title']; ?>
</strong></div>  
    <div class="menu_child paddingBottom10">
         <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list"><img src="style/images/go-back-icon.png" border="0" width="15" height="20"/>Danh sách Our Works</a> |
         <a style="color: red" href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=img&id=<?php echo $this->_tpl_vars['id']; ?>
" style="padding: 3px" >Quản lý video <?php echo $this->_tpl_vars['item_title']['title']; ?>
</a>|

         <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=video&id=<?php echo $this->_tpl_vars['id']; ?>
" style="padding: 3px" >Quản lý video <?php echo $this->_tpl_vars['item_title']['title']; ?>
</a>
    </div>
</div>    
<!--End Child Menu-->


<!--Edit-->
<form name="Admin_ourwork_mediaForm" id="Admin_ourwork_mediaForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_ourwork">
<div class="admin_block">
	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'editimg'): ?>Sửa<?php else: ?>Thêm<?php endif; ?> ảnh</div>        	
        
       
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:460px" value="<?php echo $this->_tpl_vars['item_adjust']['title']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
            
    	<div class="float_left marginRight10"  style="width:20%; text-align:right">Upload ảnh</div>
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> 
          <div class="clear paddingBottom5"></div>
          <?php if ($this->_tpl_vars['item_adjust']['media']): ?>
          <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item_adjust']['media'], 'id' => $this->_tpl_vars['item_adjust']['id'], 'folder' => 'ourwork_image', 'type' => '610')), $this); ?>
" width="400" /><input type="hidden" name="old_image" value="<?php echo $this->_tpl_vars['item_adjust']['media']; ?>
" />
          <?php endif; ?>
        </div>
        <div class="clear paddingBottom5"></div>
                
        
		
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" <?php if ($this->_tpl_vars['item_adjust']['status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
            	<option value="2" <?php if ($this->_tpl_vars['item_adjust']['status'] == 2): ?>selected<?php endif; ?>>Không kích hoạt</option>                
            </select>
        </div>
        <div class="clear paddingBottom5"></div>           
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button">
          <?php if ($this->_tpl_vars['item_adjust']['media'] != ''): ?>
          &nbsp;
          <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=img&id=<?php echo $this->_tpl_vars['id']; ?>
" style="padding: 3px" class="button">Hủy</a>
          <?php endif; ?>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>  
</div>
</form>
<!--End Edit-->



<!--List-->

<form name="Admin_ourworkimageForm" id="Admin_ourworkimageForm"  method="post">
<input type="hidden" name="form_block" value="Admin_ourwork">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách ảnh : <?php echo $this->_tpl_vars['item_title']['title']; ?>
 | <strong>Tổng : <?php echo $this->_tpl_vars['total']; ?>
 ảnh</strong></div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<!--<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>-->
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Tiêu đề</td>
          
            <td class="rowtop" width="40">Ảnh</td> 
			<td class="rowtop" width="40">Sửa</td>         
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          <?php $_from = $this->_tpl_vars['arritem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
          <tr class="row" id="chk_tr_<?php echo $this->_tpl_vars['item']['id']; ?>
">
          	<td><input name="selected_ids[]" type="checkbox" id="chk<?php echo $this->_tpl_vars['item']['id']; ?>
" class="chk" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
          
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
          
            <td><img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['media'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'ourwork_image', 'type' => '610')), $this); ?>
" width="100" /></td>
            <td><img src="style/images/admin/_<?php echo $this->_tpl_vars['item']['status']; ?>
.gif" /></td>
			 <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=editimg&cid=<?php echo $this->_tpl_vars['item']['id']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=delimg&id=<?php echo $this->_tpl_vars['id']; ?>
&cid=<?php echo $this->_tpl_vars['item']['id']; ?>
')"><img src="style/images/admin/b_del.png" border="0" /></a></td>
			
          </tr>
          <?php endforeach; endif; unset($_from); ?>
          <tr class="row">
          	<td colspan="8" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_ourworkimageForm','chk')" /><?php echo $this->_tpl_vars['pagingData']; ?>
</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
