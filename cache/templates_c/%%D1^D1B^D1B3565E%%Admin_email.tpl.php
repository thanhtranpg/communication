<?php /* Smarty version 2.6.26, created on 2019-01-11 05:13:07
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_email/Admin_email.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getImageNews', 'D:\\CODE\\code\\communication.com\\templates/Admin_email/Admin_email.tpl', 72, false),array('insert', 'formatTime', 'D:\\CODE\\code\\communication.com\\templates/Admin_email/Admin_email.tpl', 210, false),)), $this); ?>
<script>
<?php echo '
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_newsForm").submit(function(){//return true;	
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
	<div class="mod_title marginBottom10">Email</div>  
    <div class="menu_child paddingBottom10">

        <a style="<?php if ($this->_tpl_vars['s_catid'] == 1): ?> color: red;<?php endif; ?>" href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list&catid=1">Contact us</a> |
        <a style="<?php if ($this->_tpl_vars['s_catid'] == 2): ?> color: red;<?php endif; ?>" href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list&catid=2">Carrers</a>
    </div>
</div>    
<!--End Child Menu-->

<?php if ($this->_tpl_vars['item']): ?>
<!--Edit-->
<form name="Admin_newsForm" id="Admin_newsForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_news">

<div class="admin_block">
	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'add'): ?>Thêm<?php else: ?>Sửa<?php endif; ?> tin tức</div>        	
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
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> <?php if ($this->_tpl_vars['item']['image']): ?><a href="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getImageNews', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'])), $this); ?>
">[View]</a><input type="hidden" name="old_image" value="<?php echo $this->_tpl_vars['item']['image']; ?>
" /><?php endif; ?></div>
        <div class="clear paddingBottom5"></div>
       
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:500px" value="<?php echo $this->_tpl_vars['item']['title']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trích dẫn</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="brief"><?php echo $this->_tpl_vars['item']['brief']; ?>
</textarea>
        </div>
        <div class="clear paddingBottom5"></div>     
        
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
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" <?php if ($this->_tpl_vars['item']['status'] == 1): ?>selected<?php endif; ?>>Kích hoạt</option>
                <option value="3" <?php if ($this->_tpl_vars['item']['status'] == 3): ?>selected<?php endif; ?>>Tin nổi bật</option>
                
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
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Thứ tự</div>
        <div class="float_left"><input type="input" id="ord" name="ord" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['ord']; ?>
" maxlength="20"></div>
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
<form name="SearchNewsForm" id="SearchNewsForm"  method="get" action="webadmin.php">
<input type="hidden" name="main" value="<?php echo $this->_tpl_vars['main']; ?>
" />
<input type="hidden" name="cmd" value="list" />
<div class="admin_block">
	<div class="mod_title marginBottom10">Tìm nhanh</div>
      
    <div class="float_left marginRight10" style="width:20%; text-align:right">Từ khóa</div>
    <div class="float_left"><input type="input" id="keyword" name="keyword" class="input_text" style="width:500px"></div>
    <div class="clear paddingBottom5"></div>
    
    
    
    
    <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
    <div class="float_left"><input type="submit" value="Tìm kiếm" class="button"></div>
    <div class="clear"></div>  
</div>
</form>
<form name="Admin_emailForm" id="Admin_emailForm"  method="post">
<input type="hidden" name="form_block" value="Admin_email">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách email | <strong>Tổng : <?php echo $this->_tpl_vars['total']; ?>
</strong></div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>
            
            <td class="rowtop">Full Name</td>
            <td class="rowtop">Email Address</td>
            <?php if ($this->_tpl_vars['s_catid'] == 1): ?>
            <td class="rowtop">Company / Organization</td>
            <?php endif; ?>
            <td class="rowtop">Detail</td>
            <td class="rowtop" width="115">Ngày đăng</td>
            <td class="rowtop" >Xóa</td>
           
            
          </tr>
          <?php $_from = $this->_tpl_vars['arritem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
          <?php if ($this->_tpl_vars['item']['parentid'] == 0): ?>
          <tr class="row" id="chk_tr_<?php echo $this->_tpl_vars['item']['id']; ?>
">
          	<td><input name="selected_ids[]" type="checkbox" id="chk<?php echo $this->_tpl_vars['item']['id']; ?>
" class="chk" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['fullname']; ?>
</td>
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['email']; ?>
</td>
            <?php if ($this->_tpl_vars['s_catid'] == 1): ?>
            <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['company']; ?>
</td>
            <?php endif; ?>
             <td class="padding5" style="text-align:left"><?php echo $this->_tpl_vars['item']['content']; ?>
</td>
            <td><?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'formatTime', 'time' => $this->_tpl_vars['item']['time'])), $this); ?>
</td>
           
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=del&catid=<?php echo $this->_tpl_vars['s_catid']; ?>
&id=',<?php echo $this->_tpl_vars['item']['id']; ?>
)"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
          <tr class="row">
            <td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_emailForm','chk')" /><?php echo $this->_tpl_vars['pagingData']; ?>
</td>
          </tr>
          
        </table>
    </div>
</div>
</form> 
<div class="row">
    <div class="col-md-12 text-center">
    <?php echo $this->_tpl_vars['pagingData']; ?>

 
    </div>
   </div>     
<!--End List-->
<?php endif; ?>