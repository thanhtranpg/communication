<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_managerForm").submit(function(){//return true;	
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
	<div class="mod_title marginBottom10">Quản trị viên</div>  
    <div class="menu_child paddingBottom10">
        <a {if $cmd == 'add'}style="color:red;"{/if} href="webadmin.php?main={$main}&cmd=add">Thêm quản trị viên</a> | 
        <a {if $cmd == 'list'}style="color:red;"{/if} href="webadmin.php?main={$main}&cmd=list">Danh sách quản trị viên</a>
    </div>
</div>    
<!--End Child Menu-->

{if $item}
<!--Edit-->
<form name="Admin_managerForm" id="Admin_managerForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_manager">
<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'add'}Thêm{else}Sửa{/if} quản trị viên</div>        	
                
        <div class="float_left marginRight10" style="width:20%; text-align:right">Họ và Tên</div>
        <div class="float_left"><input type="input" id="name" name="name" class="input_text" style="width:200px" value="{$item.name}"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tên đăng nhập</div>
        <div class="float_left"><input type="input" id="user" name="user" class="input_text" style="width:200px" value="{$item.user}"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Mật khẩu</div>
        <div class="float_left"><input type="input" id="pwd" name="pwd" class="input_text" style="width:200px" value=""></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Email</div>
        <div class="float_left"><input type="input" id="email" name="email" class="input_text" style="width:200px" value="{$item.email}"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Mobile</div>
        <div class="float_left"><input type="input" id="mobile" name="mobile" class="input_text" style="width:200px" value="{$item.mobile}"></div>
        <div class="clear paddingBottom5"></div>                	                              
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Quyền truy cập</div>
        <div class="float_left">
        	<select name="arrmod[]" class="input_text" style="width:200px; height:200px" multiple="multiple">
            {foreach from=$arrMod name=mod item=mod}
            {if $mod.modaccess}
            	<option value="{$mod.modkey}" {if $mod.selected}selected{/if}>{$mod.modname}</option>
            {/if}    
            {/foreach}    
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
<form name="Admin_managerForm" id="Admin_managerForm"  method="post">
<input type="hidden" name="form_block" value="Admin_manager">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách quản trị viên</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Họ và tên</td>
            <td class="rowtop">Tên đăng nhập</td>
            <td class="rowtop" width="40">Sửa</td>
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          {foreach from=$arritem name=item item=item}
          <tr class="row" id="chk_tr_{$item.id}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.uid}" class="chk" value="{$item.uid}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            <td>{$item.uid}</td>
            <td class="padding5" style="text-align:left">{$item.name}</td>
            <td>{$item.user}</td>
            <td><a href="webadmin.php?main={$main}&cmd=edit&id={$item.uid}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=del&id=',{$item.uid})"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          {/foreach}
          <tr class="row">
          	<td colspan="6" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_managerForm','chk')" />{$pagingData}</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
{/if}
