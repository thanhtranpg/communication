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
        
		is_submit=true;
		return true;		
}
{/literal}
</script>
<div>{$msg}</div>
<!--Child Menu-->

<form name="Admin_advForm" id="Admin_advForm"  method="post"  enctype="multipart/form-data">
<input type="hidden" name="form_block" value="Admin_event">
<div class="admin_block">

	<div class="mod_title marginBottom10">Event</div>        	
        <div class="float_left marginRight10" style="width:20%; text-align:right">Tiêu đề</div>
        <div class="float_left"><input type="input" id="title" name="title" class="input_text" style="width:460px" value="{$item.title}"></div>
        <input type="hidden" name="id" value="{$item.id}" />
        <input type="hidden" name="cmd" value="edit" />
        <div class="clear paddingBottom5"></div>

        <div class="float_left marginRight10" style="width:20%; text-align:right">Link see more</div>
        <div class="float_left"><input type="input" id="link" name="link" class="input_text" style="width:460px" value="{$item.link}"></div>
        <div class="clear paddingBottom5"></div>

        
            
    	<div class="float_left marginRight10"  style="width:20%; text-align:right">Upload ảnh
        </div>
        <div class="float_left">
        <input type="file" id="image" name="image" class="input_text" size="60"/>
        {if $item.image}
        <div class="clear paddingBottom5"></div> 
        <img src="/uploads/{$item.image}" width="200">
        <input type="hidden" name="old_image" value="{$item.image}" />
        {/if}
        </div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:20%; text-align:right">Nội dung</div>
        <div class="float_left"></div>
        <div class="clear paddingBottom5"></div>        
        <div style="text-align:center">
            <textarea name="description">{$item.description}</textarea>
        </div>
        <div class="clear paddingBottom5"></div>

        
        <div class="clear paddingBottom5"></div>           
        
        <div class="float_left marginRight10" style="width:20%;">&nbsp;</div>
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

