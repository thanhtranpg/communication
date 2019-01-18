<div class="admin_block">
	    
    	<div>{$msg}</div>
    	<div class="float_left marginRight10" style="width:35%; text-align:right">Tiêu Đề website</div>
        <div class="float_left"><input type="input" id="web_name" name="web_name" class="input_text" style="width:400px" value="{$item.web_name}"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Mô Tả website</div>
        <div class="float_left"><textarea id="web_des" name="web_des" class="input_text" style="width:400px; height:50px">{$item.web_des}</textarea></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Từ Khóa Tìm kiếm</div>
        <div class="float_left"><textarea id="web_keyword" name="web_keyword" class="input_text" style="width:400px; height:50px">{$item.web_keyword}</textarea></div>
        <div class="clear paddingBottom5"></div>
		
		<div style="border: 1px solid #dadce0; padding: 5px; margin-bottom: 10px; margin-top: 10px">
         <h3 style="padding: 10px; font-size: 16px">Cấu Hình Send Email SMPT</h3>
         <div class="float_left marginRight10" style="width:35%; text-align:right">Send Email</div>
        <div class="float_left"><input  type="checkbox" id="sendemail" name="sendemail" class="check"  value="1" {if $item.sendemail ==1} checked="checked" {/if} ></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Email SMPT</div>
        <div class="float_left"><input type="input" id="email" name="email" class="input_text" style="width:400px" value="{$item.email}"></div>
        <div class="clear paddingBottom5"></div>
     
        <div class="float_left marginRight10" style="width:35%; text-align:right">Pass Email</div>
        <div class="float_left"><input type="password" id="email_pass" name="email_pass" class="input_text"  style="width:200px" value="{$item.email_pass}"></div>
        <div class="clear paddingBottom5"></div>
        </div>
		
        
        <div style="border: 1px solid #dadce0; padding: 5px; margin-bottom: 10px; margin-top: 10px">
         <h3 style="padding: 10px; font-size: 16px">Cấu Hình Trang Chủ</h3>
         <div class="float_left marginRight10" style="width:35%; text-align:right">Youtube ID Background</div>
        <div class="float_left"><input type="input" id="youtube_id" name="youtube_id" class="input_text" style="width:400px" value="{$item.youtube_id}"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Thời lượng loop video Background ( s )</div>
        <div class="float_left"><input type="input" id="endSecond" name="endSecond" class="input_text" style="width:400px" value="{$item.endSecond}"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Youtube ID Play</div>
        <div class="float_left"><input type="input" id="youtube_id_play" name="youtube_id_play" class="input_text" style="width:400px" value="{$item.youtube_id_play}"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Tiêu Đề Trên Nền Video Trang Chủ</div>
        <div class="float_left"><input type="input" id="home_title" name="home_title" class="home_title" style="width:400px" value="{$item.home_title}"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Nội Dung Trên Nền Video Trang Chủ</div>
        <div class="float_left">
            
            <textarea id="home_description" name="home_description" class="input_text" style="width:400px; height:50px">{$item.home_description}</textarea>
        </div>
        <div class="clear paddingBottom5"></div>
       	</div>
        
         <div class="float_left marginRight10" style="width:35%; text-align:right">Hot line</div>
        <div class="float_left"><input type="input" id="hotline" name="hotline" class="input_text" style="width:400px" value="{$item.hotline}"></div>
        <div class="clear paddingBottom5"></div>
        <div class="float_left marginRight10" style="width:35%; text-align:right">Email contact</div>
        <div class="float_left"><input type="input" id="email_contact" name="email_contact" class="input_text" style="width:400px" value="{$item.email_contact}"></div>
        <div class="clear paddingBottom5"></div>

        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Facebook Link</div>
        <div class="float_left"><input type="input" id="facebooklink" name="facebooklink" class="facebooklink" style="width:400px" value="{$item.facebooklink}"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Youtube Link</div>
        <div class="float_left"><input type="input" id="youtubelink" name="youtubelink" class="youtubelink" style="width:400px" value="{$item.youtubelink}"></div>
        <div class="clear paddingBottom5"></div>

       
        	
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Dung lượng tối đa cho Ảnh</div>
        <div class="float_left"><input type="input" id="maxsize_image" name="maxsize_image" class="input_text" style="width:70px" value="{$item.maxsize_image}" onkeypress="return checkForInt(event)"> KB</div>
        <div class="clear paddingBottom5"></div>
                        
                   
        
       <div class="float_left marginRight10" style="width:35%; text-align:right">Số tin trên 1 trang</div>
        <div class="float_left"><input type="input" id="max_news" name="max_news" class="input_text" style="width:70px" value="{$item.max_news}" onkeypress="return checkForInt(event)"></div>
        <div class="clear paddingBottom5"></div> 
                
       
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Số tin nổi bật hiển thị</div>
        <div class="float_left"><input type="input" id="max_hotnews" name="max_hotnews" class="input_text" style="width:70px" value="{$item.max_hotnews}" onkeypress="return checkForInt(event)"></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Số tin liên quan hiển thị</div>
        <div class="float_left"><input type="input" id="max_oldnews" name="max_oldnews" class="input_text" style="width:70px" value="{$item.max_oldnews}" onkeypress="return checkForInt(event)"></div>
        <div class="clear paddingBottom5"></div>     
		
		
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Tình trạng Cache</div>
        <div class="float_left">
        	<select name="is_cache" class="input_text" style="width:70px;">
            	<option value="0" {if $item.is_cache == 0}selected{/if}>Tắt</option>
                <option value="1" {if $item.is_cache == 1}selected{/if}>Bật</option>
            </select>
        </div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Thời gian Cache</div>
        <div class="float_left"><input type="input" id="cache_time" name="cache_time" class="input_text" style="width:70px" value="{$item.cache_time}" onkeypress="return checkForInt(event)"> Giây</div>
        <div class="clear paddingBottom5"></div>     
        
        <div class="float_left marginRight10" style="width:35%; text-align:right">Bảo trì website</div>
        <div class="float_left"><input  type="checkbox" id="closewebsite" name="closewebsite" class="check"  value="1" {if $item.closewebsite ==1} checked="checked" {/if} ></div>
        <div class="clear paddingBottom5"></div>   

        <div class="float_left marginRight10" style="width:35%; text-align:right">Rewite url</div>
        <div class="float_left"><input  type="checkbox" id="rewrite" name="rewrite" class="check"  value="1" {if $item.rewrite ==1} checked="checked" {/if} ></div>
        <div class="clear paddingBottom5"></div>
        
        <div class="float_left marginRight10" style="width:35%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>