<?php /* Smarty version 2.6.26, created on 2019-01-07 08:37:39
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Admin_news/Admin_news_cat.tpl */ ?>
<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Tin tức</div>  
    <div class="menu_child paddingBottom10">
    	<a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=addcat">Thêm danh mục</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=listcat">Danh sách danh mục</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=add">Thêm tin mới</a> | 
        <a href="webadmin.php?main=<?php echo $this->_tpl_vars['main']; ?>
&cmd=list">Danh sách tin</a>
    </div>
</div>    
<!--End Child Menu-->

<!--Edit Cat-->
<?php if ($this->_tpl_vars['item']): ?>
<form name="Admin_news_catForm" id="Admin_news_catForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_news" />
<div class="admin_block">
	<div class="mod_title marginBottom10"><?php if ($this->_tpl_vars['cmd'] == 'addcat'): ?>Thêm<?php else: ?>Sửa<?php endif; ?> danh mục tin</div>        	
    
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Thêm vào</div>
        <div class="float_left">
        	<select name="parentid" class="input_text" style="width:200px;">
            	<option value="0" <?php if ($this->_tpl_vars['cat']['parentid'] == 0): ?>selected<?php endif; ?>>Danh mục gốc</option>
                <?php $_from = $this->_tpl_vars['arrcat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['cat']['iteration']++;
?>
                <?php if ($this->_tpl_vars['cat']['parentid'] == 0): ?>
                <option value="<?php echo $this->_tpl_vars['cat']['catid']; ?>
" <?php if ($this->_tpl_vars['cat']['catid'] == $this->_tpl_vars['item']['parentid']): ?>selected<?php endif; ?>>&raquo; <?php echo $this->_tpl_vars['cat']['title']; ?>
</option>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </select>
        </div>
        
         <div class="clear paddingBottom5"></div>
        	<div class="float_left marginRight10" style="width:35%; text-align:right">Upload ảnh (1200 X *)</div>
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> <?php if ($this->_tpl_vars['item']['image']): ?><input type="hidden" name="old_image" value="<?php echo $this->_tpl_vars['item']['image']; ?>
" /><?php endif; ?></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="clear paddingBottom5"></div>
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tên danh mục</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:200px" value="<?php echo $this->_tpl_vars['item']['title']; ?>
" maxlength="100"></div>
        <div class="clear paddingBottom5"></div>
        
         <div class="float_left marginRight10" style="width:20%; text-align:right">Mô tả</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="description"><?php echo $this->_tpl_vars['item']['description']; ?>
</textarea>
        </div>
        <div class="clear paddingBottom5"></div> 
        
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">Keyword</div>
        <div class="float_left">
        <textarea name="key" cols="70" rows="10"><?php echo $this->_tpl_vars['item']['key']; ?>
</textarea>
        
        </div>
        <div class="clear paddingBottom5"></div>
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">des</div>
        <div class="float_left">
         <textarea name="des" cols="70" rows="10"><?php echo $this->_tpl_vars['item']['des']; ?>
</textarea>
        </div>
        <div class="clear paddingBottom5"></div>
        
        
                
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" <?php if ($this->_tpl_vars['item']['status'] == 1): ?>selected<?php endif; ?>>Categories</option>
                <option value="3" <?php if ($this->_tpl_vars['item']['status'] == 3): ?>selected<?php endif; ?>>List</option>
                
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
<script type="text/javascript">
<?php echo '

    
	
	 var description = CKEDITOR.replace( \'description\',
	{ uiColor : \'#9AB8F3\'
	 });
	CKFinder.setupCKEditor( description, \'ckfinder/\' ) ;
	

'; ?>

</script>
</form>
<?php endif; ?>
<!--End Edit Cat-->

<!--List Cat-->
<?php if ($this->_tpl_vars['listcat']): ?>
<form name="Admin_news_catForm" id="Admin_news_catForm"  method="post">
<input type="hidden" name="form_block" value="Admin_news">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách danh mục</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="<?php echo 'selectAllCheckbox(this.form,\'chk\',this.checked,\'#ffffcc\',\'white\');'; ?>
" title="Chọn tất cả" /></td>
            <td class="rowtop">CatID</td>
            <td class="rowtop">Tên danh mục</td>
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
            <td><?php echo $this->_tpl_vars['item']['catid']; ?>
</td>
            <td class="paddingLeft5" style="text-align:left"><b><?php echo $this->_tpl_vars['item']['title']; ?>
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
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_news_catForm','chk')" /></td>
          </tr>
        </table>
    </div>
</div> 
</form>   
<?php endif; ?>
<!--End List Cat-->