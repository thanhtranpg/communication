<?php /* Smarty version 2.6.26, created on 2019-01-07 08:11:09
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_product/Admin_product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\communication.com\\templates/Admin_product/Admin_product.tpl', 76, false),array('insert', 'formatTime', 'D:\\CODE\\code\\communication.com\\templates/Admin_product/Admin_product.tpl', 264, false),)), $this); ?>
<script>
<?php echo '
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_productForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is(\'form\') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var catid = getValueId(\'catid\');
		var title = getValueId(\'title\');

		if(catid == 0){
			jQuery("#catid").focus();
			alert(\'Hãy chọn danh mục tin!\');			
			return false;
		}
		
		if(title == \'\'){
			jQuery("#title").focus();
			alert(\'Hãy nhập tiêu đề tin!\');			
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
	<div class="mod_title marginBottom10">sản phẩm</div>  
    <div class="menu_child paddingBottom10">
    	<a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=addcat">Thêm danh mục sản phẩm</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=listcat">Danh sách danh mục</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=add">Thêm sản phẩm mới</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list">Danh sách sản phẩm</a>
    </div>
</div>    
<!--End Child Menu-->

<?php if ($this->_tpl_vars['item']): ?>
<!--Edit-->
<form name="Admin_productForm" id="Admin_productForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_product">

<div class="admin_block">
	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'add'): ?>Thêm<?php else: ?>Sửa<?php endif; ?> sản phẩm</div>        	
    	<div class="float_left marginRight10" style="width:20%; text-align:right">Thêm vào</div>
        <div class="float_left">
        	<select id="catid" name="catid" class="input_text" style="width:200px;">
            	<option value="0">...Chọn danh mục</option>
                <?php $_from = $this->_tpl_vars['arrcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['cat']['iteration']++;
?>
                <?php if ($this->_tpl_vars['cat']['parentid'] == 0): ?>
                <option value="<?php echo $this->_tpl_vars['cat']['catid']; ?>
" <?php if ($this->_tpl_vars['cat']['catid'] == $this->_tpl_vars['item']['catid']): ?>selected<?php endif; ?> style="font-weight:bold"><?php echo $this->_tpl_vars['cat']['title']; ?>
</option>
                	<?php $_from = $this->_tpl_vars['arrcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['scat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['scat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['scat']):
        $this->_foreach['scat']['iteration']++;
?>
	                <?php if ($this->_tpl_vars['scat']['parentid'] == $this->_tpl_vars['cat']['catid']): ?>
                    	 <option value="<?php echo $this->_tpl_vars['scat']['catid']; ?>
" <?php if ($this->_tpl_vars['scat']['catid'] == $this->_tpl_vars['item']['catid']): ?>selected<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&raquo; <?php echo $this->_tpl_vars['scat']['title']; ?>
</option>
                    <?php endif; ?>
	                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </div>
        <div class="clear paddingBottom5"></div>
        
    	<div class="float_left marginRight10" style="width:20%; text-align:right">Upload ảnh (610 X 610)</div>
        <div class="float_left">
         <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
                
                    <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" />
               <br />
               <?php endif; ?> 
               
        <input type="file" id="image" name="image" class="input_text" size="60"/> </div>
       
        <div class="clear paddingBottom5"></div>
        
         <div class="float_left marginRight10" style="width:20%; text-align:right">Giá sản phẩm</div>
        <div class="float_left"><input type="input" id="price" name="price" class="input_text" style="width:500px" value="<?php echo $this->_tpl_vars['item']['price']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:500px" value="<?php echo $this->_tpl_vars['item']['title']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">GP ATTP</div>
        <div class="float_left"><input type="headline" id="headline" name="headline" class="input_text" style="width:500px" value="<?php echo $this->_tpl_vars['item']['headline']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">ID cẩm nang(cách nhau dấu , ví dụ 123,124)</div>
        <div class="float_left"><input type="relative_id" id="relative_id" name="relative_id" class="input_text" style="width:500px" value="<?php echo $this->_tpl_vars['item']['relative_id']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
         <div class="float_left marginRight10" style="width:20%; text-align:right">Thông số sản phẩm</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="brief"><?php echo $this->_tpl_vars['item']['brief']; ?>
</textarea>
        </div>
           
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Nội dung</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="des"><?php echo $this->_tpl_vars['item']['des']; ?>
</textarea>
        </div>
        <div class="clear paddingBottom5"></div>  
        
       <!-- <div class="float_left marginRight10" style="width:20%; text-align:right">Nguồn tin</div>
        <div class="float_left"><input type="input" id="source" name="source" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['source']; ?>
" maxlength="60"></div>
        <div class="clear paddingBottom5"></div>                               
       --> 
       
       <div class="float_left marginRight10" style="width:20%; text-align:right">Thứ tự</div>
        <div class="float_left"><input type="input" id="ord" name="ord" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['ord']; ?>
" maxlength="20"></div>
        <div class="clear paddingBottom5"></div>   
       
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" <?php if ($this->_tpl_vars['item']['status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
                <option value="3" <?php if ($this->_tpl_vars['item']['status'] == 3): ?>selected<?php endif; ?>>Hiện trang chủ</option>
                <option value="4" <?php if ($this->_tpl_vars['item']['status'] == 4): ?>selected<?php endif; ?>>Sự kiện</option>
                <option value="5" <?php if ($this->_tpl_vars['item']['status'] == 5): ?>selected<?php endif; ?>>Thông báo</option>
            	<option value="2" <?php if ($this->_tpl_vars['item']['status'] == 2): ?>selected<?php endif; ?>>Không kích hoạt</option>                
            </select>
        </div>
        <div class="clear paddingBottom5"></div>    

<div class="clear paddingBottom5"></div>
		
		<div class="float_left marginRight10" style="width:20%; text-align:right">Key word</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="keyword" style="width:500px"><?php echo $this->_tpl_vars['item']['keyword']; ?>
</textarea>
        </div>
		<div class="clear paddingBottom5"></div>
		<div class="float_left marginRight10" style="width:20%; text-align:right">desciption</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="desciption" style="width:500px"><?php echo $this->_tpl_vars['item']['desciption']; ?>
</textarea>
        </div>           
        <div class="clear paddingBottom5"></div>		
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<!--End Edit-->
<script type="text/javascript">
<?php echo '

    var brief = CKEDITOR.replace( \'brief\',
	{ 	
		
		uiColor : \'#9AB8F3\',
		height:\'100px\'
	 });
	CKFinder.setupCKEditor( brief, \'ckfinder/\' ) ;
	
	 var des = CKEDITOR.replace( \'des\',
	{ uiColor : \'#9AB8F3\'
	 });
	CKFinder.setupCKEditor( des, \'ckfinder/\' ) ;
	

'; ?>

</script>
<?php endif; ?>

<?php if ($this->_tpl_vars['cmd'] == 'list'): ?>
<!--List-->
<form name="SearchproductForm" id="SearchproductForm"  method="get" action="webadmin.php">
<input type="hidden" name="main" value="<?php echo $this->_tpl_vars['main']; ?>
" />
<input type="hidden" name="cmd" value="list" />
<div class="admin_block">
	<div class="mod_title marginBottom10">Tìm nhanh</div>
      
    <div class="float_left marginRight10" style="width:20%; text-align:right">Từ khóa</div>
    <div class="float_left"><input type="input" id="keyword" name="keyword" class="input_text" style="width:500px"></div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Danh mục</div>
    <div class="float_left">
        <select id="s_catid" name="s_catid" class="input_text" style="width:200px;">
            <option value="0">...Tất cả</option>
            <?php $_from = $this->_tpl_vars['arrcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['cat']['iteration']++;
?>
            <?php if ($this->_tpl_vars['cat']['parentid'] == 0): ?>
            <option value="<?php echo $this->_tpl_vars['cat']['catid']; ?>
" <?php if ($this->_tpl_vars['cat']['catid'] == $this->_tpl_vars['s_catid']): ?>selected<?php endif; ?> style="font-weight:bold"><?php echo $this->_tpl_vars['cat']['title']; ?>
</option>
                <?php $_from = $this->_tpl_vars['arrcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['scat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['scat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['scat']):
        $this->_foreach['scat']['iteration']++;
?>
                <?php if ($this->_tpl_vars['scat']['parentid'] == $this->_tpl_vars['cat']['catid']): ?>
                     <option value="<?php echo $this->_tpl_vars['scat']['catid']; ?>
" <?php if ($this->_tpl_vars['scat']['catid'] == $this->_tpl_vars['s_catid']): ?>selected<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&raquo; <?php echo $this->_tpl_vars['scat']['title']; ?>
</option>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </select>
    </div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
    <div class="float_left">
        <select name="s_status" class="input_text" style="width:200px;">
        	<option value="" <?php if ($this->_tpl_vars['s_status'] == ""): ?>selected<?php endif; ?>>...Tất cả</option>  
            <option value="1" <?php if ($this->_tpl_vars['s_status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
            <option value="3" <?php if ($this->_tpl_vars['s_status'] == 3): ?>selected<?php endif; ?>>Hiện trang chủ</option>
            <option value="4" <?php if ($this->_tpl_vars['s_status'] == 4): ?>selected<?php endif; ?>>Sự kiện</option>
            <option value="5" <?php if ($this->_tpl_vars['s_status'] == 5): ?>selected<?php endif; ?>>Thông báo</option>
            <option value="2" <?php if ($this->_tpl_vars['s_status'] === 2): ?>selected<?php endif; ?>>Không kích hoạt</option>                
        </select>
    </div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
    <div class="float_left"><input type="submit" value="Tìm kiếm" class="button"></div>
    <div class="clear"></div>  
</div>
</form>
<form name="Admin_productForm" id="Admin_productForm"  method="post">
<input type="hidden" name="form_block" value="Admin_product">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách tin</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Ảnh chính</td>
            <td class="rowtop">Tiêu đề</td>
			<td class="rowtop">Thứ tự</td>
            <td class="rowtop">Ảnh sản phẩm</td>
			
            <td class="rowtop" width="115">Ngày đăng</td>
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
            <td><?php echo $this->_tpl_vars['item']['id']; ?>
</td>
            <td>
            
            <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
                
                    <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" width="100" />
              
               <?php endif; ?> 
            </td>
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['title']; ?>
</td>
			<td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['ord']; ?>
</td>
            <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=img&id=<?php echo $this->_tpl_vars['item']['id']; ?>
">Thêm ảnh</td>
            <td><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'formatTime', 'time' => $this->_tpl_vars['item']['time'])), $this); ?>
</td>
            <td><img src="style/images/admin/_<?php echo $this->_tpl_vars['item']['status']; ?>
.gif" /></td>
            <td><a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=edit&id=<?php echo $this->_tpl_vars['item']['id']; ?>
"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=del&id=',<?php echo $this->_tpl_vars['item']['id']; ?>
)"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
         
          <?php endforeach; endif; unset($_from); ?>
          <tr class="row">
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_productForm','chk')" /><?php echo $this->_tpl_vars['pagingData']; ?>
</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
<?php endif; ?>