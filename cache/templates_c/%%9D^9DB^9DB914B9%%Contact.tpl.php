<?php /* Smarty version 2.6.26, created on 2018-09-25 04:59:52
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Contact/Contact.tpl */ ?>
<div>
 <img  src="uploads/adv/<?php echo $this->_tpl_vars['Banner']['image']; ?>
" class="img-responsive"/>
 </div>
 
               
                <ol class="breadcrumb">
                <h1>Liên hệ</h1>
                    
                   <li><a href="<?php echo $this->_tpl_vars['home_url']; ?>
">Trang chủ</a>
                    </li>
                    <li><span class="glyphicon glyphicon-play-circle"></span></li>
                    <li >Liên hệ</li>
                    
                </ol>
  
  
  <div class="container">

        

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <h2>Gửi thư liên hệ </h2>
                       <form name="frmContact" id="frmContact"  method="post">
                        <input type="hidden" name="form_block" value="Contact">
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
                            <input type="tel" class="form-control" name="txtTel" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="txtEmail" id="email" required data-validation-required-message="Please enter your email address.">
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
                    <button type="submit" class="btn btn-primary">Gửi</button>
                    
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h2>Thông tin liên hệ mua hàng, làm đại lý</h2>
                <?php echo $this->_tpl_vars['Content']; ?>

                <ul class="list-unstyled list-inline list-social-icons">
                        <?php if ($this->_tpl_vars['facebook'] != ''): ?>
								<li>
									<a href="<?php echo $this->_tpl_vars['facebook']; ?>
" target="_blank"><i class="fa iconf fa-2x"></i></a>
								</li>
                         <?php endif; ?>       
                        <?php if ($this->_tpl_vars['linkin'] != ''): ?>        
								<li>
									<a href="<?php echo $this->_tpl_vars['linkin']; ?>
" target="_blank"><i class="fa iconi fa-2x"></i></a>
								</li>
                           <?php endif; ?>       
                        <?php if ($this->_tpl_vars['twitter'] != ''): ?>        
								<li>
									<a href="<?php echo $this->_tpl_vars['twitter']; ?>
" target="_blank"><i class="fa icont fa-2x"></i></a>
								</li>
                         <?php endif; ?>       
                                <?php if ($this->_tpl_vars['google'] != ''): ?>
								<li>
									<a href="<?php echo $this->_tpl_vars['google']; ?>
" target="_blank"><i class="fa icong fa-2x"></i></a>
								</li>
                                <?php endif; ?>
							</ul>
			   <div>
			   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3739.932373386697!2d106.14708331444434!3d20.385678014796706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135de2e55555553%3A0x31545a7e4a9bacf!2zVGh14buRYyDEkMO0bmcgWSBQUUE!5e0!3m2!1svi!2s!4v1473389460527" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>			   
            </div>
        </div>
		<div class="row" style="text-align:center">
			<img src="images/member.jpg" width="50%" class="center"  />
		</div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        

        <hr>

        
    </div>
    <script src="js/adoco/jqBootstrapValidation.js"></script>
    <script src="js/adoco/contact_me.js"></script>