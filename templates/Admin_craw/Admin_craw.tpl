<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_newsForm").submit(function(){//return true;	
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
	<div class="mod_title marginBottom10">Nhập dữ liệu</div>  
    
</div>    
<!--End Child Menu-->


<!--Edit-->
<form name="Admin_newsForm" id="Admin_crawForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_craw">

<div class="admin_block">
	<div class="mod_title marginBottom10">{if $cmd == 'add'}Thêm{else}Sửa{/if} tin tức</div>        	
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
{literal}
<script type="text/javascript">
$('#import_data_from_craw').click(function() {
   var catid = $('#catid').val();
   var list_data = $('#list_data').val();
   if( catid == 0){
    alert (' chọn danh mục1');
    return;
   }

   if( list_data == ''){
    alert (' Nhập link cần lấy nội dung !');
    return;
   }
   var splitted = list_data.split("\n"); 
   $.each(splitted, function( index, value ){

    if(value != ''){
        $.ajax({
           type:"POST",
           data:{url: value,catid: catid },
           url:"modules/Ajax/craw.php",
           dataType:"html",
           success:function(data){
           $('#rs_content').append('<p>'+data+'</p>');
            console.log(data);
           }                                    
        });      
    }
    } );
});
</script>
{/literal}



