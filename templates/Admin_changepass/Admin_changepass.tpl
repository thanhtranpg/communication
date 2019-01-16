<script>
{literal}
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_changepassForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is('form') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var old_pass = getValueId('old_pass');
		var old_pass2 = getValueId('old_pass2');
		var user = getValueId('user');
		var pass = getValueId('pass');
		var repass = getValueId('repass');
		
		if(old_pass == ''){
			jQuery("#old_pass").focus();
			alert('Hãy điền mật khẩu hiện tại!');			
			return false;
		}
		
		
		if(old_pass2!=hex_md5('hunghd_'+old_pass)){
			jQuery("#old_pass").focus();
   		    alert("Bạn nhập sai mật khẩu hiện tại!");
		    return false;
		}			
		
		if(user == ''){
			jQuery("#user").focus();
			alert('Hãy điền tên đăng nhập mới!');			
			return false;
		}
		
		if(pass == ''){
			jQuery("#pass").focus();
			alert('Hãy điền mật khẩu mới!');			
			return false;
		}
		
		if(repass == ''){
			jQuery("#repass").focus();
			alert('Hãy gõ lại mật khẩu mới!');
			return false;
		}
		
		if(repass != pass){
			jQuery("#repass").focus();
			alert('Mật khẩu mới không khớp!');
			return false;
		}
		is_submit=true;
		return true;		
}
{/literal}
</script>

<div class="admin_block">
	<div class="mod_title marginBottom10">Đổi mật khẩu</div>
    <div class="admin_block" style="width:400px; margin:auto">
    	<div>{$msg}</div>
    	<div class="float_left marginRight10" style="width:40%; text-align:right">Tên đăng nhập hiện tại</div>
        <div class="float_left"><input type="input" id="old_user" name="old_user" class="input_text" style="width:150px" value="{$user.user}" readonly="readonly"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:40%; text-align:right">Mật khẩu hiện tại</div>
        <div class="float_left"><input type="password" id="old_pass" name="old_pass" class="input_text" style="width:150px"><input type="hidden" id="old_pass2" name="old_pass2" value="{$user.pwd}"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:40%; text-align:right">Tên đăng nhập mới</div>
        <div class="float_left"><input type="input" id="user" name="user" class="input_text" style="width:150px"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:40%; text-align:right">Mật khẩu mới</div>
        <div class="float_left"><input type="password" id="pass" name="pass" class="input_text" style="width:150px"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:40%; text-align:right">Khẳng định mật khẩu</div>
        <div class="float_left"><input type="password" id="repass" name="repass" class="input_text" style="width:150px"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:40%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
    </div>
</div>