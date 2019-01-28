<div>{$msg}</div>
<script>
{literal}
var is_submit   = false;
jQuery(document).ready(function(){
  jQuery("#Admin_ourwork_catForm").submit(function(){//return true; 
    return check_post_submit();     
  });
  
  jQuery.fn.extend({ reset: function() {//function for reset form
    return this.each(function() {jQuery(this).is('form') && this.reset();})}
  });
});
function check_post_submit(){
    if(is_submit) return false;
    var title = getValueId('title');
    var description = getValueId('description');

    
    
    if(title == ''){
      jQuery("#title").focus();
      alert('Hãy nhập tên danh mục!');     
      return false;
    }

    if(description == ''){
      jQuery("#description").focus();
      alert('Hãy nhập phần mô tả!');      
      return false;
    }
    is_submit=true;
    return true;    
}
{/literal}
</script>
<!--Child Menu-->
<div class="admin_block">
	<div class="mod_title marginBottom10">Our Works</div>  
    <div class="menu_child paddingBottom10">
    	<a {if $cmd == 'addcat'}style="color:red;"{/if} href="webadmin.php?main={$main}&cmd=addcat">Thêm danh mục Our Work</a> | 
        <a {if $cmd == 'listcat'}style="color:red;"{/if} href="webadmin.php?main={$main}&cmd=listcat">Danh sách danh mục Our Work</a> | 
        <a href="webadmin.php?main={$main}&cmd=add">Thêm Our Work</a> | 
        <a href="webadmin.php?main={$main}&cmd=list">Danh sách Our Work</a>
    </div>
</div>    
<!--End Child Menu-->

<!--Edit Cat-->
{if $item}
<form name="Admin_ourwork_catForm" id="Admin_ourwork_catForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_ourwork" />
<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'addcat'}Thêm{else}Sửa{/if} danh mục Our Work</div>        	
   
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tên danh mục</div>
        <div class="float_left" style="width:60%"><input type="input" id="title" name="title" class="input_text" style="width:100%" value="{$item.title}" ></div>
        <div class="clear paddingBottom5"></div>

        <div class="clear paddingBottom5"></div>
          <div class="float_left marginRight10" style="width:35%; text-align:right">Upload ảnh</div>
        <div class="float_left">
          <input type="file" id="image" name="image" class="input_text" size="60"/> 
          {if $item.image !=''}

          <div class="clear paddingBottom5"></div>
            <img  src="/Uploads/{$item.image}" width="100" />
          <input type="hidden" name="old_image" value="{$item.image}" />
          {/if}
        </div>
        <div class="clear paddingBottom5"></div>
        
       
        <div class="float_left marginRight10" style="width:35%; text-align:right">Mô tả</div>
        <div class="float_left" style="width:60%">
			     <textarea id="description" name="description" rows="4" style="width:100%"  >{$item.description}</textarea>
        </div>
        <div class="clear paddingBottom5"></div> 

        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Trạng thái</div>
        <div class="float_left">
        	<select name="status" class="input_text" style="width:200px;">
            	<option value="1" {if $item.status == 1}selected{/if}>Kích hoạt</option>
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
{/if}
<!--End Edit Cat-->

<!--List Cat-->
{if $cmd=='listcat'}
<form name="Admin_ourwork_lis_catForm" id="Admin_ourwork_lis_catForm"  method="post">
<input type="hidden" name="form_block" value="Admin_ourwork">
<div class="admin_block">
	<div class="mod_title marginBottom10">Danh sách danh mục | <strong>Tổng : {$total}</strong></div>  
    <div>
    	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="tbl_list">
          <tr>
          	<td class="rowtop"><input type="checkbox" id="chk_all_checkbox" style=" width: 30px; cursor:pointer" onclick="{literal}selectAllCheckbox(this.form,'chk',this.checked,'#ffffcc','white');{/literal}" title="Chọn tất cả" /></td>
            
            <td class="rowtop">Tên danh mục</td>
            <td class="rowtop">Ảnh</td>
            <td class="rowtop">Mô tả</td>
            <td class="rowtop">Anh slide</td>
            <td class="rowtop">Thứ tự</td>
            <td class="rowtop">Trạng thái</td>
            <td class="rowtop">Sửa</td>
            <td class="rowtop">Xóa</td>
          </tr>
          {foreach from=$listcat name=item item=item}
          {if $item.parentid == 0}
          <tr class="row" id="chk_tr_{$item.catid}">
          	<td><input name="selected_ids[]" type="checkbox" id="chk{$item.catid}" class="chk" value="{$item.catid}" style="cursor:pointer" onClick="select_checkbox(this.form,'chk',this,'#ffffcc','white');"></td>
            
            <td class="paddingLeft5" style="text-align:left"><b>{$item.title}</b></td>
            <td class="paddingLeft5" style="text-align:left">
              {if $item.image !=''}
               <img  src="/Uploads/{$item.image}" width="70" />
              {/if}
            </td>
            <td class="paddingLeft5" style="text-align:left"><b>{$item.description}</b></td>
            <td><a class="add_imag" href="webadmin.php?main={$main}&cmd=slide&id={$item.catid}"><strong style="color: blue">{$item.total_img}</strong><br/>Thêm ảnh</td>
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
          	<td colspan="7" class="paddingLeft5" style="text-align:left; height:30px"><input type="button" value="Xóa" class="button" onclick="DelSelectForm('Admin_ourwork_lis_catForm','chk')" /></td>
          </tr>
        </table>
    </div>
</div> 
</form>   
{/if}
<!--End List Cat-->
