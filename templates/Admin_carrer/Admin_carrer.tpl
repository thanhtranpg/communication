<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_advForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is('form') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var title = getValueId('title');
        var image = getValueId('image');
		
		if(title == ''){
			jQuery("#title").focus();
			alert('Hãy nhập tiêu đề!');			
			return false;
		}
        var cmd = '{/literal}{$cmd}{literal}';
        
        if (cmd=='add'){
            if(image == ''){
                jQuery("#image").focus();
                alert('Hãy chọn ảnh đại diện Our Client!');           
                return false;
            }
        }
		is_submit=true;
		return true;		
}
{/literal}
</script>
<div>{$msg}</div>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Our Carrers</div>
    <div class="menu_child paddingBottom10">
        <a {if $cmd == 'add'}style="color:red;"{/if} href="webadmin.php?main={$main}&cmd=add">Thêm Carrer</a> | 
        <a {if $cmd == 'list'}style="color:red;"{/if} href="webadmin.php?main={$main}&cmd=list">Danh sách Carrers</a>
    </div>
</div>    
<!--End Child Menu-->

{if $item}
<!--Edit-->
<form name="Admin_advForm" id="Admin_advForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_carrer">
<div class="admin_block">

	<div class="mod_title marginBottom10">{if $cmd == 'add'}Thêm{else}Sửa{/if} Carrer</div>        	
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:460px" value="{$item.title}"></div>
        <div class="clear paddingBottom5"></div>

        <div class="float_left marginRight10" style="width:20%; text-align:right">Địa chỉ</div>
        <div class="float_left"><input type="input" id="address" name="address" class="input_text" style="width:460px" value="{$item.address}"></div>
        <div class="clear paddingBottom5"></div>
            
    	<div class="float_left marginRight10"  style="width:20%; text-align:right">Job Description
        </div>
        <div class="float_left">
        <input type="file" id="image" name="image" class="input_text" size="60"/>
        {if $item.image}
        <input type="hidden" name="old_image" value="{$item.image}" />
        
        {/if}
        </div>

        <div class="clear paddingBottom5"></div>

        <div class="float_left marginRight10" style="width:20%; text-align:right">Thứ tự</div>
        <div class="float_left"><input type="input" id="ord" name="ord" class="input_text" style="width:70px" value="{$item.ord}" maxlength="60"></div>
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
{/if}

{if $cmd=='list'}
<!--List-->
<form name="SearchNewsForm" id="SearchNewsForm"  method="get" action="webadmin.php">
<input type="hidden" name="main" value="{$main}" />
<input type="hidden" name="cmd" value="list" />
<div class="admin_block">
	<div class="mod_title marginBottom10">Tìm nhanh</div>
    
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Từ khóa</div>
    <div class="float_left"><input type="input" id="keyword" name="keyword" class="input_text" style="width:200px" value="{$keyword}"></div>
    <div class="clear paddingBottom5"></div>    
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
    <div class="float_left">
        <select name="s_status" class="input_text" style="width:200px;">
        	<option value="" {if $s_status == ""}selected{/if}>...Tất cả</option>  
            <option value="1" {if $s_status == 1}selected{/if}>Kích hoạt</option>
            <option value="2" {if $s_status === 2}selected{/if}>Không kích hoạt</option>                
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
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>
            <td class="rowtop">Tiêu đề</td>
            <td class="rowtop">Địa chỉ</td>
            <td class="rowtop" width="40">Job Description</td>
            <td class="rowtop" width="40">Thứ tự</td>
            <td class="rowtop" width="40">Trạng thái</td>
            <td class="rowtop" width="40">Sửa</td>
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          {foreach from=$arritem name=item item=item}
          <tr class="row" id="chk_tr_{$item.id}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.id}" class="chk" value="{$item.id}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            <td class="padding5" style="text-align:left">{$item.title}</td>
            <td class="padding5" style="text-align:left">{$item.address}</td>
            <td class="padding5" style="text-align:left"><a target="_blank" href="/uploads/{$item.image}" width="100">Xem</a></td>
            <td>{$item.ord}</td>
            <td><img src="style/images/admin/_{$item.status}.gif"  /></td>
            <td><a href="webadmin.php?main={$main}&cmd=edit&id={$item.id}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=del&id=',{$item.id})"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          {/foreach}
          <tr class="row">
          	<td colspan="8" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_advForm','chk')" />{$pagingData}</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
{/if}
