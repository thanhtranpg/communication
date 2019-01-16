<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_ourwork_mediaForm").submit(function(){//return true;	
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

    if (cmd =='img'){
        if(image == ''){
            jQuery("#image").focus();
            alert('Hãy chọn ảnh!');           
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
	<div class="mod_title marginBottom10">Quản ảnh <strong style="color: red; font-size: 14px">{$item_title.title}</strong></div>  
    <div class="menu_child paddingBottom10">
         <a href="webadmin.php?main={$main}&cmd=list"><img src="style/images/go-back-icon.png" border="0" width="15" height="20"/>Danh sách Our Works</a> |
         <a style="color: red" href="webadmin.php?main={$main}&cmd=img&id={$id}" style="padding: 3px" >Quản lý video {$item_title.title}</a>|

         <a href="webadmin.php?main={$main}&cmd=video&id={$id}" style="padding: 3px" >Quản lý video {$item_title.title}</a>
    </div>
</div>    
<!--End Child Menu-->


<!--Edit-->
<form name="Admin_ourwork_mediaForm" id="Admin_ourwork_mediaForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_ourwork">
<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'editimg'}Sửa{else}Thêm{/if} ảnh</div>        	
        
       
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:460px" value="{$item_adjust.title}"></div>
        <div class="clear paddingBottom5"></div>
            
    	<div class="float_left marginRight10"  style="width:20%; text-align:right">Upload ảnh</div>
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> 
          <div class="clear paddingBottom5"></div>
          {if $item_adjust.media}
          <img  src="{insert name=getItemImage img=$item_adjust.media id=$item_adjust.id folder='ourwork_image' type='610'}" width="400" /><input type="hidden" name="old_image" value="{$item_adjust.media}" />
          {/if}
        </div>
        <div class="clear paddingBottom5"></div>
                
        
		
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" {if $item_adjust.status == 1}selected{/if}>Kích hoạt</option>
            	<option value="2" {if $item_adjust.status == 2}selected{/if}>Không kích hoạt</option>                
            </select>
        </div>
        <div class="clear paddingBottom5"></div>           
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button">
          {if $item_adjust.media !=''}
          &nbsp;
          <a href="webadmin.php?main={$main}&cmd=img&id={$id}" style="padding: 3px" class="button">Hủy</a>
          {/if}
          <div class="clear"></div>
        </div>
        <div class="clear"></div>  
</div>
</form>
<!--End Edit-->



<!--List-->

<form name="Admin_ourworkimageForm" id="Admin_ourworkimageForm"  method="post">
<input type="hidden" name="form_block" value="Admin_ourwork">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách ảnh : {$item_title.title} | <strong>Tổng : {$total} ảnh</strong></div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<!--<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>-->
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Tiêu đề</td>
          
            <td class="rowtop" width="40">Ảnh</td> 
			<td class="rowtop" width="40">Sửa</td>         
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          {foreach from=$arritem name=item item=item}
          <tr class="row" id="chk_tr_{$item.id}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.id}" class="chk" value="{$item.id}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
          
            <td class="padding5" style="text-align:left">{$item.title}</td>
          
            <td><img  src="{insert name=getItemImage img=$item.media id=$item.id folder='ourwork_image' type='610'}" width="100" /></td>
            <td><img src="style/images/admin/_{$item.status}.gif" /></td>
			 <td><a href="webadmin.php?main={$main}&cmd=editimg&cid={$item.id}&id={$id}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=delimg&id={$id}&cid={$item.id}')"><img src="style/images/admin/b_del.png" border="0" /></a></td>
			
          </tr>
          {/foreach}
          <tr class="row">
          	<td colspan="8" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_ourworkimageForm','chk')" />{$pagingData}</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->

