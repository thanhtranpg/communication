<?php /* Smarty version 2.6.26, created on 2016-10-13 04:34:25
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Admin_login/Admin_login.tpl */ ?>
<script>
<?php echo '
var	is_submit		=	false;
jQuery(document).ready(function(){
	jQuery("#Admin_loginForm").submit(function(){//return true;	
		return check_post_submit();			
	});
	
	jQuery.fn.extend({ reset: function() {//function for reset form
		return this.each(function() {jQuery(this).is(\'form\') && this.reset();})}
	});
});
function check_post_submit(){
		if(is_submit) return false;
		var user = getValueId(\'user\');
		var pass = getValueId(\'pass\');

		if(user == \'\'){
			jQuery("#user").focus();
			alert(\'Hãy điền tên đăng nhập!\');			
			return false;
		}
		
		if(pass == \'\'){
			jQuery("#pass").focus();
			alert(\'Hãy điền mật khẩu!\');			
			return false;
		}
		is_submit=true;
		return true;		
}
'; ?>

</script>
<div class="login">
	<div class="title">Đăng nhập</div>
	<div class="paddingTop15 paddingBottom15">
    	<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tên đăng nhập</div>
        <div class="float_left"><input type="input" id="user" name="user" class="input_text" style="width:150px"></div>
        <div class="clear paddingBottom10"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Mật khẩu</div>
        <div class="float_left"><input type="password" id="pass" name="pass" class="input_text" style="width:150px"></div>
        <div class="clear paddingBottom10"></div>
        <div class="float_left marginRight10" style="width:35%">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Đăng nhập" class="button"></div>
        <div class="clear"></div>        
    </div>
</div>