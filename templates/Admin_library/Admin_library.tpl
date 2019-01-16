<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_libraryForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is('form') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var catid = getValueId('catid');
		var title = getValueId('title');

		if(catid == 0){
			jQuery("#catid").focus();
			alert('Hãy chọn danh mục tin!');			
			return false;
		}
		
		if(title == ''){
			jQuery("#title").focus();
			alert('Hãy nhập tiêu đề tin!');			
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
	<div class="mod_title marginBottom10">Thư viện</div>  
    <div class="menu_child paddingBottom10">
    	<a href="webadmin.php?main={$main}&cmd=addcat">Thêm danh mục thư viện</a> | 
        <a href="webadmin.php?main={$main}&cmd=listcat">Danh sách danh mục</a> | 
        <a href="webadmin.php?main={$main}&cmd=add">Thêm thư viện mới</a> | 
        <a href="webadmin.php?main={$main}&cmd=list">Danh sách thư viện</a>
    </div>
</div>    
<!--End Child Menu-->

{if $item}
<!--Edit-->
<form name="Admin_libraryForm" id="Admin_libraryForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_library">

<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'add'}Thêm{else}Sửa{/if} thư viện</div>        	
    	<div class="float_left marginRight10" style="width:20%; text-align:right">Thêm vào</div>
        <div class="float_left">
        	<select id="catid" name="catid" class="input_text" style="width:200px;">
            	<option value="0">...Chọn danh mục</option>
                {foreach from=$arrcat name=cat item=cat}
                {if $cat.parentid == 0}
                <option value="{$cat.catid}" {if $cat.catid == $item.catid}selected{/if} style="font-weight:bold">{$cat.title}</option>
                	{foreach from=$arrcat name=scat item=scat}
	                {if $scat.parentid == $cat.catid}
                    	 <option value="{$scat.catid}" {if $scat.catid == $item.catid}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&raquo; {$scat.title}</option>
                    {/if}
	                {/foreach}
                {/if}
                {/foreach}
            </select>
        </div>
        <div class="clear paddingBottom5"></div>
        
    	<div class="float_left marginRight10" style="width:20%; text-align:right">Upload ảnh (298 X 202))</div>
        <div class="float_left"><input type="file" id="image" name="image" class="input_text" size="60"/> </div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:500px" value="{$item.title}"></div>
        <div class="clear paddingBottom5"></div>
        
           
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Nội dung</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="des">{$item.des}</textarea>
        </div>
        <div class="clear paddingBottom5"></div>  
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Nguồn tin</div>
        <div class="float_left"><input type="input" id="source" name="source" class="input_text" style="width:200px" value="{$item.source}" maxlength="60"></div>
        <div class="clear paddingBottom5"></div>                               
        
        <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" {if $item.status == 1}selected{/if}>Kích hoạt</option>
                <option value="3" {if $item.status == 3}selected{/if}>Tin nổi bật</option>
                <option value="4" {if $item.status == 4}selected{/if}>Sự kiện</option>
                <option value="5" {if $item.status == 5}selected{/if}>Thông báo</option>
            	<option value="2" {if $item.status == 2}selected{/if}>Không kích hoạt</option>                
            </select>
        </div>
        <div class="clear paddingBottom5"></div>    

<div class="clear paddingBottom5"></div>
		
		<div class="float_left marginRight10" style="width:20%; text-align:right">Key word</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="keyword" style="width:500px">{$item.keyword}</textarea>
        </div>
		<div class="clear paddingBottom5"></div>
		<div class="float_left marginRight10" style="width:20%; text-align:right">desciption</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="desciption" style="width:500px">{$item.desciption}</textarea>
        </div>           
        <div class="clear paddingBottom5"></div>		
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>
</form>
<!--End Edit-->
<script type="text/javascript">
{literal}

    
	
	 var des = CKEDITOR.replace( 'des',
	{ uiColor : '#9AB8F3'
	 });
	CKFinder.setupCKEditor( des, 'ckfinder/' ) ;
	

{/literal}
</script>
{/if}

{if $cmd=='list'}
<!--List-->
<form name="SearchlibraryForm" id="SearchlibraryForm"  method="get" action="webadmin.php">
<input type="hidden" name="main" value="{$main}" />
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
            {foreach from=$arrcat name=cat item=cat}
            {if $cat.parentid == 0}
            <option value="{$cat.catid}" {if $cat.catid == $s_catid}selected{/if} style="font-weight:bold">{$cat.title}</option>
                {foreach from=$arrcat name=scat item=scat}
                {if $scat.parentid == $cat.catid}
                     <option value="{$scat.catid}" {if $scat.catid == $s_catid}selected{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&raquo; {$scat.title}</option>
                {/if}
                {/foreach}
            {/if}
            {/foreach}
        </select>
    </div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%; text-align:right">Trạng thái</div>
    <div class="float_left">
        <select name="s_status" class="input_text" style="width:200px;">
        	<option value="" {if $s_status == ""}selected{/if}>...Tất cả</option>  
            <option value="1" {if $s_status == 1}selected{/if}>Kích hoạt</option>
            <option value="3" {if $s_status == 3}selected{/if}>Tin nổi bật</option>
            <option value="4" {if $s_status == 4}selected{/if}>Sự kiện</option>
            <option value="5" {if $s_status == 5}selected{/if}>Thông báo</option>
            <option value="2" {if $s_status === 2}selected{/if}>Không kích hoạt</option>                
        </select>
    </div>
    <div class="clear paddingBottom5"></div>
    
    <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
    <div class="float_left"><input type="submit" value="Tìm kiếm" class="button"></div>
    <div class="clear"></div>  
</div>
</form>
<form name="Admin_libraryForm" id="Admin_libraryForm"  method="post">
<input type="hidden" name="form_block" value="Admin_library">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách tin</div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop" width="40"><input type="checkbox" id="chk_all_checkbox" style="cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>
            <td class="rowtop" width="40">ID</td>
            <td class="rowtop">Tiêu đề</td>
            <td class="rowtop" width="115">Ngày đăng</td>
            <td class="rowtop" width="40">Trạng thái</td>
            <td class="rowtop" width="40">Sửa</td>
            <td class="rowtop" width="40">Xóa</td>
          </tr>
          {foreach from=$arritem name=item item=item}
          {if $item.parentid == 0}
          <tr class="row" id="chk_tr_{$item.id}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.id}" class="chk" value="{$item.id}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            <td>{$item.id}</td>
            <td class="padding5" style="text-align:left">{$item.title}</td>
            <td>{insert name=formatTime time=$item.time}</td>
            <td><img src="style/images/admin/_{$item.status}.gif" /></td>
            <td><a href="webadmin.php?main={$main}&cmd=edit&id={$item.id}"><img src="style/images/admin/b_edit.png" border="0" /></a></td>
            <td><a href="javascript:void(0);" onclick="del_item('webadmin.php?main={$main}&cmd=del&id=',{$item.id})"><img src="style/images/admin/b_del.png" border="0" /></a></td>
          </tr>
          {/if}
          {/foreach}
          <tr class="row">
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_libraryForm','chk')" />{$pagingData}</td>
          </tr>
        </table>
    </div>
</div>
</form>    
<!--End List-->
{/if}
