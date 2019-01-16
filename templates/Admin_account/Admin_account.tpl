<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_accountForm").submit(function(){//return true;	
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
			alert('Hãy nhập tiêu đề tin!');			
			return false;
		}
		is_submit=true;
		return true;		
}






  function down(id,ord){		
		$.ajax({
				   type:"POST",
				   data:{id: id,
				         ord:ord,
						 cmd:'down'
				      },
				   url:"modules/Ajax/Down_up.php",
				   dataType:"html",
				   success:function(data){
					  location.href=location.href;	
				   }
					
				   });
	}


function up(id,ord){		
		$.ajax({
				   type:"POST",
				   data:{id: id,
				         ord:ord,
						 cmd:'up'
				      },
				   url:"modules/Ajax/Down_up.php",
				   dataType:"html",
				   success:function(data){
					  location.href=location.href;	
				   }
					
				   });
	}

{/literal}
</script>
<div>{$msg}</div>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Quản trị thành viên</div>  
    <div class="menu_child paddingBottom10">
        
        <a href="webadmin.php?main={$main}&cmd=list">Danh sách thành viên </a>
		
</div>    
<!--End Child Menu-->

{if $item}
<!--Edit-->
<form name="Admin_accountForm" id="Admin_accountForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_account">
<script type="text/javascript">
{literal}
window.onload = function()
{
	/*var oFCKeditor = new FCKeditor( 'brief' ) ;
	oFCKeditor.BasePath	= 'fckeditor/';
	oFCKeditor.Config["AutoDetectLanguage"] = false ;
	oFCKeditor.Config["DefaultLanguage"]    = "vi" ;
	oFCKeditor.Config["AutoDetectLanguage"] = true ;
	oFCKeditor.Width = '600px';
	oFCKeditor.Height = '250px';
	oFCKeditor.ReplaceTextarea() ;
	*/
	
	var oFCKeditor = new FCKeditor( 'des' ) ;
	oFCKeditor.BasePath	= 'fckeditor/';
	oFCKeditor.Config["AutoDetectLanguage"] = false ;
	oFCKeditor.Config["DefaultLanguage"]    = "vi" ;
	oFCKeditor.Width = '600px';
	oFCKeditor.Height = '500px';
	oFCKeditor.ReplaceTextarea() ;
}
{/literal}
</script>
<div class="admin_block">
	<div class="mod_title marginBottom10">Sửa thông tin</div>        	
        
    	
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Họ và tên </div>
        <div class="float_left"><input type="input" id="fullname" name="fullname" class="input_text" style="width:300px" value="{$item.fullname}" disabled="disabled"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Email </div>
        <div class="float_left"><input type="input" id="email" name="email" class="input_text" style="width:300px" value="{$item.email}" disabled="disabled"></div>
        <div class="clear paddingBottom5"></div>
		
		 <div class="float_left marginRight10" style="width:20%; text-align:right">Địa chỉ </div>
        <div class="float_left"><input type="input" id="address" name="address" class="input_text" style="width:300px" value="{$item.address}" disabled="disabled"></div>
        <div class="clear paddingBottom5"></div>
		
		 <div class="float_left marginRight10" style="width:20%; text-align:right">Phone </div>
        <div class="float_left"><input type="input" id="phone" name="phone" class="input_text" style="width:300px" value="{$item.phone}" disabled="disabled"></div>
        <div class="clear paddingBottom5"></div>                           
								  
								  
								  
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" {if $item.status == 1}selected{/if}>Kích hoạt</option>  
				<option value="4" {if $item.status == 4}selected{/if}>Dòng sự kiện</option>
				<option value="5" {if $item.status == 5}selected{/if}>Slideshow trang chủ</option>             
            	<option value="2" {if $item.status == 2}selected{/if}>Không kích hoạt</option>                
            </select>
        </div>
		 <div class="clear paddingBottom5"></div>     
		 <div class="float_left marginRight10" style="width:20%; text-align:right">Thành viên</div>
        <div class="float_left">
        	<select name="priority" class="input_text" style="width:200px;">
            	<option value="1" {if $item.priority  == 1}selected{/if}>Thường</option>               
            	<option value="2" {if $item.priority  == 2}selected{/if}>Vip</option>                
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
    <div class="float_left"><input type="input" id="keyword" name="keyword" class="input_text" style="width:500px"></div>
    <div class="clear paddingBottom5"></div>
    
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
    <div class="float_left">
        <select name="s_status" class="input_text" style="width:200px;">
        	<option value="" {if $s_status == ""}selected{/if}>...Tất cả</option>  
           <option value="1" {if $item.status == 1}selected{/if}>Kích hoạt</option>  
			<option value="4" {if $item.status == 4}selected{/if}>Dòng sự kiện</option>
			<option value="5" {if $item.status == 5}selected{/if}>Slideshow trang chủ</option>             
			<option value="2" {if $item.status == 2}selected{/if}>Không kích hoạt</option>                  
        </select>
    </div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
    <div class="float_left"><input type="submit" value="Tìm kiếm" class="button"></div>
    <div class="clear"></div>  
</div>
</form>
<form name="Admin_accountForm" id="Admin_accountForm"  method="post">
<input type="hidden" name="form_block" value="Admin_account">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách tin</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>
            <td class="rowtop" width="40">ID</td>
			<td class="rowtop" width="100">Họ và tên</td>
            <td class="rowtop">Email</td>
            <td class="rowtop" width="115">Địa chỉ</td>
			<td class="rowtop" width="40">Phone</td>
			<td class="rowtop" width="40">Thành viên</td>
            <td class="rowtop" width="40">Trạng thái</td>
            <td class="rowtop" width="40">Sửa</td>
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          {foreach from=$arritem name=item item=item}
          {if $item.parentid == 0}
          <tr class="row" id="chk_tr_{$item.id}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.id}" class="chk" value="{$item.id}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            <td>{$item.id}</td>
			<td>{$item.fullname}</td>
            <td class="padding5" style="text-align:left">{$item.email}</td>
			<td class="padding5" style="text-align:left">{$item.address}</td>
			<td class="padding5" style="text-align:left">{$item.phone}</td>
			<td class="padding5" style="text-align:left">{if $item.priority == 1} Thường {else} Vip {/if}</td>
          
			
			
			
			
			
			
            <td><img src="style/images/admin/_{$item.status}.gif" /></td>
            <td><a href="webadmin.php?main={$main}&cmd=edit&id={$item.id}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=del&id=',{$item.id})"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          {/if}
          {/foreach}
          <tr class="row">
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_accountForm','chk')" />{$pagingData}</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
{/if}
