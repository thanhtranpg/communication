<?php /* Smarty version 2.6.26, created on 2019-01-11 03:29:13
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_carrer/Admin_carrer.tpl */ ?>
<script>
<?php echo '
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_advForm").submit(function(){//return true;	
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
        
        if (cmd==\'add\'){
            if(image == \'\'){
                jQuery("#image").focus();
                alert(\'Hãy chọn ảnh đại diện Our Client!\');           
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
	<div class="mod_title marginBottom10">Our Carrers</div>
    <div class="menu_child paddingBottom10">
        <a <?php if ($this->_tpl_vars['cmd'] == 'add'): ?>style="color:red;"<?php endif; ?> href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=add">Thêm Carrer</a> | 
        <a <?php if ($this->_tpl_vars['cmd'] == 'list'): ?>style="color:red;"<?php endif; ?> href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list">Danh sách Carrers</a>
    </div>
</div>    
<!--End Child Menu-->

<?php if ($this->_tpl_vars['item']): ?>
<!--Edit-->
<form name="Admin_advForm" id="Admin_advForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_carrer">
<div class="admin_block">

	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'add'): ?>Thêm<?php else: ?>Sửa<?php endif; ?> Carrer</div>        	
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:460px" value="<?php echo $this->_tpl_vars['item']['title']; ?>
"></div>
        <div class="clear paddingBottom5"></div>

        <div class="float_left marginRight10" style="width:20%; text-align:right">Địa chỉ</div>
        <div class="float_left"><input type="input" id="address" name="address" class="input_text" style="width:460px" value="<?php echo $this->_tpl_vars['item']['address']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
            
    	<div class="float_left marginRight10"  style="width:20%; text-align:right">Job Description
        </div>
        <div class="float_left">
        <input type="file" id="image" name="image" class="input_text" size="60"/>
        <?php if ($this->_tpl_vars['item']['image']): ?>
        <input type="hidden" name="old_image" value="<?php echo $this->_tpl_vars['item']['image']; ?>
" />
        
        <?php endif; ?>
        </div>

        <div class="clear paddingBottom5"></div>

        <div class="float_left marginRight10" style="width:20%; text-align:right">Thứ tự</div>
        <div class="float_left"><input type="input" id="ord" name="ord" class="input_text" style="width:70px" value="<?php echo $this->_tpl_vars['item']['ord']; ?>
" maxlength="60"></div>
        <div class="clear paddingBottom5"></div>                               
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" <?php if ($this->_tpl_vars['item']['status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
            	<option value="2" <?php if ($this->_tpl_vars['item']['status'] == 2): ?>selected<?php endif; ?>>Không kích hoạt</option>                
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
<form name="SearchNewsForm" id="SearchNewsForm"  method="get" action="webadmin.php">
<input type="hidden" name="main" value="<?php echo $this->_tpl_vars['main']; ?>
" />
<input type="hidden" name="cmd" value="list" />
<div class="admin_block">
	<div class="mod_title marginBottom10">Tìm nhanh</div>
    
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Từ khóa</div>
    <div class="float_left"><input type="input" id="keyword" name="keyword" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['keyword']; ?>
"></div>
    <div class="clear paddingBottom5"></div>    
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
    <div class="float_left">
        <select name="s_status" class="input_text" style="width:200px;">
        	<option value="" <?php if ($this->_tpl_vars['s_status'] == ""): ?>selected<?php endif; ?>>...Tất cả</option>  
            <option value="1" <?php if ($this->_tpl_vars['s_status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
            <option value="2" <?php if ($this->_tpl_vars['s_status'] === 2): ?>selected<?php endif; ?>>Không kích hoạt</option>                
        </select>
    </div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
    <div class="float_left"><input type="submit" value="Tìm kiếm" class="button"></div>
    <div class="clear"></div>  
</div>
</form>
<form name="Admin_advForm" id="Admin_advForm"  method="post">
<input type="hidden" name="form_block" value="Admin_carrer">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách Carrers</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>
            <td class="rowtop">Tiêu đề</td>
            <td class="rowtop">Địa chỉ</td>
            <td class="rowtop" width="40">Job Description</td>
            <td class="rowtop" width="40">Thứ tự</td>
            <td class="rowtop" width="40">Trạng thái</td>
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
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['address']; ?>
</td>
            <td class="padding5" style="text-align:left"><a target="_blank" href="/uploads/<?php echo $this->_tpl_vars['item']['image']; ?>
" width="100">Xem</a></td>
            <td><?php echo $this->_tpl_vars['item']['ord']; ?>
</td>
            <td><img src="style/images/admin/_<?php echo $this->_tpl_vars['item']['status']; ?>
.gif"  /></td>
            <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=del&id=',<?php echo $this->_tpl_vars['item']['id']; ?>
)"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
          <tr class="row">
          	<td colspan="8" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_advForm','chk')" /><?php echo $this->_tpl_vars['pagingData']; ?>
</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
<?php endif; ?>