<?php /* Smarty version 2.6.26, created on 2017-08-06 18:36:34
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Cart/Sent.tpl */ ?>

 
               
                <ol class="breadcrumb">
                <h1>Liên hệ</h1>
                    
                   <li><a href="<?php echo $this->_tpl_vars['home_url']; ?>
">Trang chủ</a>
                    </li>
                    <li><span class="glyphicon glyphicon-play-circle"></span></li>
                    <li >Liên hệ</li>
                    
                </ol>
  
  
  <div class="container">
  
  
  
  <section id="cart">
      <div class="row"> 
      <article class="col-lg-12 cls_hidden">
                            		<div class="cart-step">
                                    	<ol class="progtrckr" data-progtrckr-steps="4">
    										<li class="progtrckr-done">
                                            	<a href="<?php echo $this->_tpl_vars['cart_href']; ?>
">
                                                	<span class="step">1</span>
	                                                <p>Giỏ hàng</p>
												</a>                                                    
                                            </li>
    										<li class="progtrckr-done">
                                            <a href="javascript:void(0);">
                                            		<span class="step">2</span>
                                                	<p>Gửi Đơn hàng</p>
                                             </a>            
                                            </li>
    										<li class="progtrckr-todo">
                                            		<span class="step">3</span>
                                                	<p>Xác nhận</p>
                                            </li>
                                            <li class="progtrckr-todo">
                                            		<span class="step">4</span>
                                                	<p>Thanh toán</p>
                                            </li>
                                            <li class="progtrckr-todo">
                                               		<span class="step">5</span>
                                                	<p>Hoàn thành</p>
                                            </li>
										</ol>
                                	</div>
                                </article>
                                
         	</div>
                                </article>                   
                            
                            

        

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
            
             
            
            
                <!-- Embedded Google Map -->
                <h2>Gửi đơn hàng </h2>
                <h3> Bạn hãy điền đầy đủ thông tin dưới đây , chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất</h3>
                      <form name="frmContact" id="frmContact"  method="post">
                        <input type="hidden" name="form_block" value="Cart">
                        <input type="hidden" name="cmd" value="send">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Họ và tên:</label>
                            <input type="text" class="form-control" name="txtName" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Số điện thoại:</label>
                            <input type="tel" class="form-control" name="txtTel" id="phone" required data-validation-required-message="Bạn hãy nhập số điện thoại.">
                        </div>
                    </div>
                    <div class="control-group form-group" style="display:none">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="txtEmail" id="email" >
                        </div>
                    </div>
					
					<div class="control-group form-group" >
                        <div class="controls">
                            <label>Địa chỉ :</label>
                            <input type="address" class="form-control" name="address" id="address" required data-validation-required-message="Bạn hãy nhập địa chỉ liên hệ.">
                        </div>
                    </div>
					
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nội dung:</label>
                            <textarea rows="10" cols="100" class="form-control" name="txtDetail" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Gửi Đơn Hàng</button>
                    
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h2>Thông tin liên hệ mua hàng</h2>
                <?php echo $this->_tpl_vars['Content']; ?>

               
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        

        <hr>

        
    </div>
    <?php echo '
<style>
@media (max-width: 500px) { 
    .cls_hidden{display:none!important;}
    
}
</style>
  '; ?>

    <script src="js/adoco/jqBootstrapValidation.js"></script>
    <script src="js/adoco/contact_me.js"></script>