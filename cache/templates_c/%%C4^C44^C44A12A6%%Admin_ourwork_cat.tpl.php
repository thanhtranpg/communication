<?php /* Smarty version 2.6.26, created on 2019-01-16 04:24:17
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_ourwork/Admin_ourwork_cat.tpl */ ?>
<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
<script>
<?php echo '
var is_submit   = false;
jQuery(document).ready(function(){
  jQuery("#Admin_ourwork_catForm").submit(function(){//return true; 
    return check_post_submit();     
  });
  
  jQuery.fn.extend({ reset: function() {//function for reset form
    return this.each(function() {jQuery(this).is(\'form\') && this.reset();})}
  });
});
function check_post_submit(){
    if(is_submit) return false;
    var title = getValueId(\'title\');
    var description = getValueId(\'description\');

    
    
    if(title == \'\'){
      jQuery("#title").focus();
      alert(\'Hãy nhập tên danh mục!\');     
      return false;
    }

    if(description == \'\'){
      jQuery("#description").focus();
      alert(\'Hãy nhập phần mô tả!\');      
      return false;
    }
    is_submit=true;
    return true;    
}
'; ?>

</script>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Our Works</div>  
    <div class="menu_child paddingBottom10">
    	<a <?php if ($this->_tpl_vars['cmd'] == 'addcat'): ?>style="color:red;"<?php endif; ?> href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=addcat">Thêm danh mục Our Work</a> | 
        <a <?php if ($this->_tpl_vars['cmd'] == 'listcat'): ?>style="color:red;"<?php endif; ?> href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=listcat">Danh sách danh mục Our Work</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=add">Thêm Our Work</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list">Danh sách Our Work</a>
    </div>
</div>    
<!--End Child Menu-->

<!--Edit Cat-->
<?php if ($this->_tpl_vars['item']): ?>
<form name="Admin_ourwork_catForm" id="Admin_ourwork_catForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_ourwork" />
<div class="admin_block">
	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'addcat'): ?>Thêm<?php else: ?>Sửa<?php endif; ?> danh mục Our Work</div>        	
   
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tên danh mục</div>
        <div class="float_left" style="width:60%"><input type="input" id="title" name="title" class="input_text" style="width:100%" value="<?php echo $this->_tpl_vars['item']['title']; ?>
" ></div>
        <div class="clear paddingBottom5"></div>

        <div class="clear paddingBottom5"></div>
          <div class="float_left marginRight10" style="width:35%; text-align:right">Upload ảnh</div>
        <div class="float_left">
          <input type="file" id="image" name="image" class="input_text" size="60"/> 
          <?php if ($this->_tpl_vars['item']['image'] != ''): ?>

          <div class="clear paddingBottom5"></div>
            <img  src="/Uploads/<?php echo $this->_tpl_vars['item']['image']; ?>
" width="100" />
          <input type="hidden" name="old_image" value="<?php echo $this->_tpl_vars['item']['image']; ?>
" />
          <?php endif; ?>
        </div>
        <div class="clear paddingBottom5"></div>
        
       
        <div class="float_left marginRight10" style="width:35%; text-align:right">Mô tả</div>
        <div class="float_left" style="width:60%">
			     <textarea id="description" name="description" rows="4" style="width:100%"  ><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea>
        </div>
        <div class="clear paddingBottom5"></div> 

        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" <?php if ($this->_tpl_vars['item']['status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
            	<option value="2" <?php if ($this->_tpl_vars['item']['status'] == 2): ?>selected<?php endif; ?>>Không kích hoạt</option>
            </select>
        </div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Thứ tự</div>
        <div class="float_left"><input type="input" id="ord" name="ord" class="input_text" style="width:50px" value="<?php echo $this->_tpl_vars['item']['ord']; ?>
" onkeypress="return checkForInt(event)" maxlength="2"></div>
        <div class="clear paddingBottom5"></div>        
        
        <div class="float_left marginRight10" style="width:35%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<?php endif; ?>
<!--End Edit Cat-->

<!--List Cat-->
<?php if ($this->_tpl_vars['cmd'] == 'listcat'): ?>
<form name="Admin_ourwork_lis_catForm" id="Admin_ourwork_lis_catForm"  method="post">
<input type="hidden" name="form_block" value="Admin_ourwork">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách danh mục | <strong>Tổng : <?php echo $this->_tpl_vars['total']; ?>
</strong></div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop"><input type="checkbox" id="chk_all_checkbox" style=" width: 30px; cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>
            
            <td class="rowtop">Tên danh mục</td>
            <td class="rowtop">Ảnh</td>
            <td class="rowtop">Mô tả</td>
            <td class="rowtop">Thứ tự</td>
            <td class="rowtop">Trạng thái</td>
            <td class="rowtop">Sửa</td>
            <td class="rowtop">Xóa</td>
          </tr>
          <?php $_from = $this->_tpl_vars['listcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
          <?php if ($this->_tpl_vars['item']['parentid'] == 0): ?>
          <tr class="row" id="chk_tr_<?php echo $this->_tpl_vars['item']['catid']; ?>
">
          	<td><input name="selected_ids[]" type="checkbox" id="chk<?php echo $this->_tpl_vars['item']['catid']; ?>
" class="chk" value="<?php echo $this->_tpl_vars['item']['catid']; ?>
" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            
            <td class="paddingLeft5" style="text-align:left"><b><?php echo $this->_tpl_vars['item']['title']; ?>
</b></td>
            <td class="paddingLeft5" style="text-align:left">
              <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
               <img  src="/Uploads/<?php echo $this->_tpl_vars['item']['image']; ?>
" width="70" />
              <?php endif; ?>
            </td>
            <td class="paddingLeft5" style="text-align:left"><b><?php echo $this->_tpl_vars['item']['description']; ?>
</b></td>
            <td class="paddingLeft5" style="text-align:left"><?php echo $this->_tpl_vars['item']['ord']; ?>
</td>
            <td><img src="style/images/admin/_<?php echo $this->_tpl_vars['item']['status']; ?>
.gif" /></td>
            <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=editcat&catid=<?php echo $this->_tpl_vars['item']['catid']; ?>
"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=delcat&catid=',<?php echo $this->_tpl_vars['item']['catid']; ?>
)"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>          
              <?php $_from = $this->_tpl_vars['listcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['citem'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['citem']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['citem']):
        $this->_foreach['citem']['iteration']++;
?>
              <?php if ($this->_tpl_vars['citem']['parentid'] == $this->_tpl_vars['item']['catid']): ?>
              <tr class="row" id="chk_tr_<?php echo $this->_tpl_vars['citem']['catid']; ?>
">
                <td><input name="selected_ids[]" type="checkbox" id="chk<?php echo $this->_tpl_vars['citem']['catid']; ?>
" class="chk" value="<?php echo $this->_tpl_vars['citem']['catid']; ?>
" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
                <td><?php echo $this->_tpl_vars['citem']['catid']; ?>
</td>
                <td class="paddingLeft20" style="text-align:left">+ <?php echo $this->_tpl_vars['citem']['title']; ?>
</td>
                <td class="paddingRight5" style="text-align:right"><?php echo $this->_tpl_vars['citem']['ord']; ?>
</td>
                <td><img src="style/images/admin/_<?php echo $this->_tpl_vars['citem']['status']; ?>
.gif" /></td>
                <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=editcat&catid=<?php echo $this->_tpl_vars['citem']['catid']; ?>
"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
                <td><a href="javascript:void(0);" onclick="del_citem('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=delcat&catid=',<?php echo $this->_tpl_vars['citem']['catid']; ?>
)"><img src="style/images/admin/b_del.png" border="0" /></a></td>
              </tr>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>          
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
          <tr class="row">
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_ourwork_lis_catForm','chk')" /></td>
          </tr>
        </table>
    </div>
</div> 
</form>   
<?php endif; ?>
<!--End List Cat-->