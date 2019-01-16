<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_productForm1").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is('form') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var title = getValueId('title');
		
		if(title == ''){
			jQuery("#title").focus();
			alert('Hãy nhập tiêu đề!');			
			return false;
		}
		is_submit=true;
		return true;		
}
{/literal}
</script>
<div>{$msg}</div>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Quản ảnh sản phẩm</div>  
    <div class="menu_child paddingBottom10">
         <a href="webadmin.php?main={$main}&cmd=list"><img src="style/images/go-back-icon.png" border="0" width="15" height="20"/>Danh sách sản phẩm</a>
    </div>
</div>    
<!--End Child Menu-->


<!--Edit-->
<form name="Admin_productForm" id="Admin_productForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_product">
<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'editimg'}Sửa{else}Thêm{/if} ảnh</div>        	
        
       
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:460px" value="{$item.title}"></div>
        <div class="clear paddingBottom5"></div>
            
    	<div class="float_left marginRight10"  style="width:20%; text-align:right">Upload ảnh 610 X 610)</div>
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> {if $item.image}<a href="uploads/image/{$item.image}">[View]</a><input type="hidden" name="old_image" value="{$item.image}" />{/if}</div>
        <div class="clear paddingBottom5"></div>
                
        
		
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" {if $item.status == 1}selected{/if}>Kích hoạt</option>
            	<option value="2" {if $item.status == 2}selected{/if}>Không kích hoạt</option>                
            </select>
        </div>
        <div class="clear paddingBottom5"></div>           
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<!--End Edit-->



<!--List-->

<form name="Admin_productForm" id="Admin_productForm"  method="post">
<input type="hidden" name="form_block" value="Admin_product">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách ảnh căn hộ: {$item_title.title}</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<!--<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>-->
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Tiêu đề</td>
          
            <td class="rowtop" width="40">Thứ tự</td>
            <td class="rowtop" width="40">Trạng thái</td> 
			<td class="rowtop" width="40">Sửa</td>         
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          {foreach from=$arritem name=item item=item}
          <tr class="row" id="chk_tr_{$item.id}">
          	<!--<td><input name="selected_ids[]" type="checkbox" id="chk{$item.id}" class="chk" value="{$item.id}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>-->
            <td>{$item.id}</td>
            <td class="padding5" style="text-align:left">{$item.title}</td>
          
            <td><img src="uploads/image/{$item.image}"  width="120"/></td>
            <td><img src="style/images/admin/_{$item.status}.gif" /></td>
			 <td><a href="webadmin.php?main={$main}&cmd=editimg&cid={$item.id}&id={$id}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=delimg&id={$id}&cid={$item.id}')"><img src="style/images/admin/b_del.png" border="0" /></a></td>
			
          </tr>
          {/foreach}
          <tr class="row">
          	<td colspan="8" class="paddingLeft5" style="text-align:left; height:30px">{$pagingData}</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->

