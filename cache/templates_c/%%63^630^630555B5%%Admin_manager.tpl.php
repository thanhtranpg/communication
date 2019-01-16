<?php /* Smarty version 2.6.26, created on 2019-01-11 03:31:56
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_manager/Admin_manager.tpl */ ?>
<script>
<?php echo '
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_managerForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is(\'form\') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var title = getValueId(\'title\');
		
		if(title == \'\'){
			jQuery("#title").focus();
			alert(\'Hãy nhập tiêu đề!\');			
			return false;
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
	<div class="mod_title marginBottom10">Quản trị viên</div>  
    <div class="menu_child paddingBottom10">
        <a <?php if ($this->_tpl_vars['cmd'] == 'add'): ?>style="color:red;"<?php endif; ?> href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=add">Thêm quản trị viên</a> | 
        <a <?php if ($this->_tpl_vars['cmd'] == 'list'): ?>style="color:red;"<?php endif; ?> href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list">Danh sách quản trị viên</a>
    </div>
</div>    
<!--End Child Menu-->

<?php if ($this->_tpl_vars['item']): ?>
<!--Edit-->
<form name="Admin_managerForm" id="Admin_managerForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_manager">
<div class="admin_block">
	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'add'): ?>Thêm<?php else: ?>Sửa<?php endif; ?> quản trị viên</div>        	
                
        <div class="float_left marginRight10" style="width:20%; text-align:right">Họ và Tên</div>
        <div class="float_left"><input type="input" id="name" name="name" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['name']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tên đăng nhập</div>
        <div class="float_left"><input type="input" id="user" name="user" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['user']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Mật khẩu</div>
        <div class="float_left"><input type="input" id="pwd" name="pwd" class="input_text" style="width:200px" value=""></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Email</div>
        <div class="float_left"><input type="input" id="email" name="email" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['email']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Mobile</div>
        <div class="float_left"><input type="input" id="mobile" name="mobile" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['mobile']; ?>
"></div>
        <div class="clear paddingBottom5"></div>                	                              
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Quyền truy cập</div>
        <div class="float_left">
        	<select name="arrmod[]" class="input_text" style="width:200px; height:200px" multiple="multiple">
            <?php $_from = $this->_tpl_vars['arrMod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mod'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mod']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mod']):
        $this->_foreach['mod']['iteration']++;
?>
            <?php if ($this->_tpl_vars['mod']['modaccess']): ?>
            	<option value="<?php echo $this->_tpl_vars['mod']['modkey']; ?>
" <?php if ($this->_tpl_vars['mod']['selected']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['mod']['modname']; ?>
</option>
            <?php endif; ?>    
            <?php endforeach; endif; unset($_from); ?>    
            </select>
        </div>
        <div class="clear paddingBottom5"></div>           
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<!--End Edit-->
<?php endif; ?>

<?php if ($this->_tpl_vars['cmd'] == 'list'): ?>
<!--List-->
<form name="Admin_managerForm" id="Admin_managerForm"  method="post">
<input type="hidden" name="form_block" value="Admin_manager">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách quản trị viên</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Họ và tên</td>
            <td class="rowtop">Tên đăng nhập</td>
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
          	<td><input name="selected_ids[]" type="checkbox" id="chk<?php echo $this->_tpl_vars['item']['uid']; ?>
" class="chk" value="<?php echo $this->_tpl_vars['item']['uid']; ?>
" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            <td><?php echo $this->_tpl_vars['item']['uid']; ?>
</td>
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['name']; ?>
</td>
            <td><?php echo $this->_tpl_vars['item']['user']; ?>
</td>
            <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=edit&id=<?php echo $this->_tpl_vars['item']['uid']; ?>
"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=del&id=',<?php echo $this->_tpl_vars['item']['uid']; ?>
)"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
          <tr class="row">
          	<td colspan="6" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_managerForm','chk')" /><?php echo $this->_tpl_vars['pagingData']; ?>
</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
<?php endif; ?>