<?php /* Smarty version 2.6.26, created on 2018-09-25 05:13:44
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Admin_config/Admin_config.tpl */ ?>
﻿<div class="admin_block">
	    
    	<div><?php echo $this->_tpl_vars['msg']; ?>
</div>
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tiêu đề website</div>
        <div class="float_left"><input type="input" id="web_name" name="web_name" class="input_text" style="width:400px" value="<?php echo $this->_tpl_vars['item']['web_name']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Mô tả website</div>
        <div class="float_left"><textarea id="web_des" name="web_des" class="input_text" style="width:400px; height:50px"><?php echo $this->_tpl_vars['item']['web_des']; ?>
</textarea></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Từ khóa tìm kiếm</div>
        <div class="float_left"><textarea id="web_keyword" name="web_keyword" class="input_text" style="width:400px; height:50px"><?php echo $this->_tpl_vars['item']['web_keyword']; ?>
</textarea></div>
        <div class="clear paddingBottom5"></div>
		
		
		<div class="float_left marginRight10" style="width:35%; text-align:right">Rewite url</div>
        <div class="float_left"><input  type="checkbox" id="rewrite" name="rewrite" class="check"  value="1" <?php if ($this->_tpl_vars['item']['rewrite'] == 1): ?> checked="checked" <?php endif; ?> ></div>
        <div class="clear paddingBottom5"></div>
        
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">Chu Chay</div>
        <div class="float_left"><input type="input" id="board_run" name="board_run" class="input_text" style="width:400px" value="<?php echo $this->_tpl_vars['item']['board_run']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
       	
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">Hot line</div>
        <div class="float_left"><input type="input" id="hotline" name="hotline" class="input_text" style="width:400px" value="<?php echo $this->_tpl_vars['item']['hotline']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        <!-- 
        <div class="float_left marginRight10" style="width:35%; text-align:right">yahoo</div>
        <div class="float_left"><input type="input" id="yahoo" name="yahoo" class="input_text" style="width:400px" value="<?php echo $this->_tpl_vars['item']['yahoo']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        -->
        <div class="float_left marginRight10" style="width:35%; text-align:right">skype</div>
        <div class="float_left"><input type="input" id="skype" name="skype" class="skype" style="width:400px" value="<?php echo $this->_tpl_vars['item']['skype']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Facebook</div>
        <div class="float_left"><input type="input" id="facebook" name="facebook" class="facebook" style="width:400px" value="<?php echo $this->_tpl_vars['item']['facebook']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Link in</div>
        <div class="float_left"><input type="input" id="linkin" name="linkin" class="linkin" style="width:400px" value="<?php echo $this->_tpl_vars['item']['linkin']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
          <div class="float_left marginRight10" style="width:35%; text-align:right">Twitter</div>
        <div class="float_left"><input type="input" id="twitter" name="twitter" class="twitter" style="width:400px" value="<?php echo $this->_tpl_vars['item']['twitter']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Google plus</div>
        <div class="float_left"><input type="input" id="google" name="google" class="google" style="width:400px" value="<?php echo $this->_tpl_vars['item']['google']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
       
        <div class="float_left marginRight10" style="width:35%; text-align:right">Email người quản trị</div>
        <div class="float_left"><input type="input" id="email" name="email" class="input_text" style="width:400px" value="<?php echo $this->_tpl_vars['item']['email']; ?>
"></div>
        <div class="clear paddingBottom5"></div>
	 
        <div class="float_left marginRight10" style="width:35%; text-align:right">pass người quản trị</div>
        <div class="float_left"><input type="password" id="email_pass" name="email_pass" class="input_text"  style="width:200px" value="<?php echo $this->_tpl_vars['item']['email_pass']; ?>
"></div>
        <div class="clear paddingBottom5"></div>	
        
        
        <!--div class="float_left marginRight10" style="width:35%; text-align:right">YM Hỗ trợ trực tuyến</div>
        <div class="float_left"><input type="input" id="ym" name="ym" class="input_text" style="width:400px" value="<?php echo $this->_tpl_vars['item']['ym']; ?>
"></div>
        <div class="clear paddingBottom5"></div-->
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Dung lượng tối đa cho Ảnh</div>
        <div class="float_left"><input type="input" id="maxsize_image" name="maxsize_image" class="input_text" style="width:70px" value="<?php echo $this->_tpl_vars['item']['maxsize_image']; ?>
" onkeypress="return checkForInt(event)"> KB</div>
        <div class="clear paddingBottom5"></div>
                        
                   
        
       <div class="float_left marginRight10" style="width:35%; text-align:right">Số tin trên 1 trang</div>
        <div class="float_left"><input type="input" id="max_news" name="max_news" class="input_text" style="width:70px" value="<?php echo $this->_tpl_vars['item']['max_news']; ?>
" onkeypress="return checkForInt(event)"></div>
        <div class="clear paddingBottom5"></div> 
                
       
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Số tin nổi bật hiển thị</div>
        <div class="float_left"><input type="input" id="max_hotnews" name="max_hotnews" class="input_text" style="width:70px" value="<?php echo $this->_tpl_vars['item']['max_hotnews']; ?>
" onkeypress="return checkForInt(event)"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Số tin liên quan hiển thị</div>
        <div class="float_left"><input type="input" id="max_oldnews" name="max_oldnews" class="input_text" style="width:70px" value="<?php echo $this->_tpl_vars['item']['max_oldnews']; ?>
" onkeypress="return checkForInt(event)"></div>
        <div class="clear paddingBottom5"></div>     
		
		
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Tình trạng Cache</div>
        <div class="float_left">
        	<select name="is_cache" class="input_text" style="width:70px;">
            	<option value="0" <?php if ($this->_tpl_vars['item']['is_cache'] == 0): ?>selected<?php endif; ?>>Tắt</option>
                <option value="1" <?php if ($this->_tpl_vars['item']['is_cache'] == 1): ?>selected<?php endif; ?>>Bật</option>
            </select>
        </div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Thời gian Cache</div>
        <div class="float_left"><input type="input" id="cache_time" name="cache_time" class="input_text" style="width:70px" value="<?php echo $this->_tpl_vars['item']['cache_time']; ?>
" onkeypress="return checkForInt(event)"> Giây</div>
        <div class="clear paddingBottom5"></div>     
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Bảo trì website</div>
        <div class="float_left"><input  type="checkbox" id="maintenace" name="maintenace" class="check"  value="1" <?php if ($this->_tpl_vars['item']['maintenace'] == 1): ?> checked="checked" <?php endif; ?> ></div>
        <div class="clear paddingBottom5"></div>   

        <div class="float_left marginRight10" style="width:35%; text-align:right">Đóng website</div>
        <div class="float_left"><input  type="checkbox" id="closewebsite" name="closewebsite" class="check"  value="1" <?php if ($this->_tpl_vars['item']['closewebsite'] == 1): ?> checked="checked" <?php endif; ?> ></div>
        <div class="clear paddingBottom5"></div>  
        
        <div class="float_left marginRight10" style="width:35%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>