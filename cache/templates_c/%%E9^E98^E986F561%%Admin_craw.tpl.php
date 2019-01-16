<?php /* Smarty version 2.6.26, created on 2018-08-16 08:32:27
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Admin_craw/Admin_craw.tpl */ ?>
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
	<div class="mod_title marginBottom10">Nhập dữ liệu</div>  
    
</div>    
<!--End Child Menu-->


<!--Edit-->
<form name="Admin_newsForm" id="Admin_crawForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_craw">

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

        <div class="float_left marginRight10" style="width:20%; text-align:right">Nội dung</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>        
        <div style="text-align:center">
            <textarea name="des" id="list_data" style="width: 100%; height: 200px"></textarea>
        </div> 


<div class="clear paddingBottom5"></div>
		

        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="button" id="import_data_from_craw" value="Nhập dữ liệu" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<div id="rs_content">
</div>
<?php echo '
<script type="text/javascript">
$(\'#import_data_from_craw\').click(function() {
   var catid = $(\'#catid\').val();
   var list_data = $(\'#list_data\').val();
   if( catid == 0){
    alert (\' chọn danh mục1\');
    return;
   }

   if( list_data == \'\'){
    alert (\' Nhập link cần lấy nội dung !\');
    return;
   }
   var splitted = list_data.split("\\n"); 
   $.each(splitted, function( index, value ){

    if(value != \'\'){
        $.ajax({
           type:"POST",
           data:{url: value,catid: catid },
           url:"modules/Ajax/craw.php",
           dataType:"html",
           success:function(data){
           $(\'#rs_content\').append(\'<p>\'+data+\'</p>\');
            console.log(data);
           }                                    
        });      
    }
    } );
});
</script>
'; ?>



