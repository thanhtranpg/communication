<div>{$msg}</div>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">sản phẩm</div>  
    <div class="menu_child paddingBottom10">
    	<a href="webadmin.php?main={$main}&cmd=addcat">Thêm danh mục sản phẩm</a> | 
        <a href="webadmin.php?main={$main}&cmd=listcat">Danh sách danh mục</a> | 
        <a href="webadmin.php?main={$main}&cmd=add">Thêm sản phẩm mới</a> | 
        <a href="webadmin.php?main={$main}&cmd=list">Danh sách sản phẩm</a>
    </div>
</div>    
<!--End Child Menu-->

<!--Edit Cat-->
{if $item}
<form name="Admin_product_catForm" id="Admin_product_catForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_product" />
<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'addcat'}Thêm{else}Sửa{/if} danh mục sản phẩm</div>        	
   
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Thêm vào</div>
        <div class="float_left">
        	<select name="parentid" class="input_text" style="width:200px;">
            	<option value="0" {if $cat.parentid == 0}selected{/if}>Danh mục gốc</option>
                {foreach from=$arrcat name=cat item=cat}
                {if $cat.parentid == 0}
                <option value="{$cat.catid}" {if $cat.catid == $item.parentid}selected{/if}>&raquo; {$cat.title}</option>
                {/if}
                {/foreach}
            </select>
        </div>
       
        <div class="clear paddingBottom5"></div>
        	<div class="float_left marginRight10" style="width:35%; text-align:right">Upload ảnh (1200 X *)</div>
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> {if $item.image}<input type="hidden" name="old_image" value="{$item.image}" />{/if}</div>
        <div class="clear paddingBottom5"></div>
        
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tên danh mục</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:200px" value="{$item.title}" maxlength="100"></div>
        <div class="clear paddingBottom5"></div>
        
       
        <div class="float_left marginRight10" style="width:20%; text-align:right">Mô tả</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="description">{$item.description}</textarea>
        </div>
        <div class="clear paddingBottom5"></div> 
        
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">Keyword</div>
        <div class="float_left">
        <textarea name="key" cols="70" rows="10">{$item.key}</textarea>
        
        </div>
        <div class="clear paddingBottom5"></div>
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">des</div>
        <div class="float_left">
         <textarea name="des" cols="70" rows="10">{$item.des}</textarea>
        </div>
        <div class="clear paddingBottom5"></div>
         
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" {if $item.status == 1}selected{/if}>Kích hoạt</option>
                <option value="3" {if $item.status == 3}selected{/if}>Hiện trang chủ</option>
            	<option value="2" {if $item.status == 2}selected{/if}>Không kích hoạt</option>
                
            </select>
        </div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Thứ tự</div>
        <div class="float_left"><input type="input" id="ord" name="ord" class="input_text" style="width:50px" value="{$item.ord}" onkeypress="return checkForInt(event)" maxlength="2"></div>
        <div class="clear paddingBottom5"></div>        
        
        <div class="float_left marginRight10" style="width:35%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<script type="text/javascript">
{literal}

    
	
	 var description = CKEDITOR.replace( 'description',
	{ uiColor : '#9AB8F3'
	 });
	CKFinder.setupCKEditor( description, 'ckfinder/' ) ;
	

{/literal}
</script>
{/if}
<!--End Edit Cat-->

<!--List Cat-->
{if $listcat}
<form name="Admin_product_catForm" id="Admin_product_catForm"  method="post">
<input type="hidden" name="form_block" value="Admin_product">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách danh mục</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>
            <td class="rowtop">CatID</td>
            <td class="rowtop">Tên danh mục</td>
            <td class="rowtop">Thứ tự</td>
            <td class="rowtop">Trạng thái</td>
            <td class="rowtop">Sửa</td>
            <td class="rowtop">Xóa</td>
          </tr>
          {foreach from=$listcat name=item item=item}
          {if $item.parentid == 0}
          <tr class="row" id="chk_tr_{$item.catid}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.catid}" class="chk" value="{$item.catid}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            <td>{$item.catid}</td>
            <td class="paddingLeft5" style="text-align:left"><b>{$item.title}</b></td>
            <td class="paddingLeft5" style="text-align:left">{$item.ord}</td>
            <td><img src="style/images/admin/_{$item.status}.gif" /></td>
            <td><a href="webadmin.php?main={$main}&cmd=editcat&catid={$item.catid}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=delcat&catid=',{$item.catid})"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>          
              {foreach from=$listcat name=citem item=citem}
              {if $citem.parentid == $item.catid}
              <tr class="row" id="chk_tr_{$citem.catid}">
                <td><input name="selected_ids[]" type="checkbox" id="chk{$citem.catid}" class="chk" value="{$citem.catid}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
                <td>{$citem.catid}</td>
                <td class="paddingLeft20" style="text-align:left">+ {$citem.title}</td>
                <td class="paddingRight5" style="text-align:right">{$citem.ord}</td>
                <td><img src="style/images/admin/_{$citem.status}.gif" /></td>
                <td><a href="webadmin.php?main={$main}&cmd=editcat&catid={$citem.catid}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
                <td><a href="javascript:void(0);" onclick="del_citem('webadmin.php?main={$main}&cmd=delcat&catid=',{$citem.catid})"><img src="style/images/admin/b_del.png" border="0" /></a></td>
              </tr>
              {/if}
              {/foreach}          
          {/if}
          {/foreach}
          <tr class="row">
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_product_catForm','chk')" /></td>
          </tr>
        </table>
    </div>
</div> 
</form>   
{/if}
<!--End List Cat-->
