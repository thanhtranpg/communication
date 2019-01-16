<?php /* Smarty version 2.6.26, created on 2018-09-25 05:13:40
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Footer/Footer.tpl */ ?>

    <!-- /.container -->
	<div class="clearfix"></div>
</div>
<!-- Footer -->
        <footer>
            <div class="container">
	 <div class="row" >
				 
				  <div class="col-md-3 col-sm-3 ">
				  <h4 class="h_footer">Sản phẩm</h4>
				      <dl class="product_footer">
						 
						  <?php $_from = $this->_tpl_vars['arr_product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
						  <dd><a href="<?php echo $this->_tpl_vars['product']['href']; ?>
"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;<?php echo $this->_tpl_vars['product']['title']; ?>
</a></dd>
                          <?php endforeach; endif; unset($_from); ?>
						</dl>
				  </div>
				  <div class="col-md-3 col-sm-3 ">
				  <h4 class="h_footer">Chính sách</h4>
				      <dl class="product_footer">
						 
						  
						  <dd><a href="<?php echo $this->_tpl_vars['Content_baohanh']; ?>
"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Chính sách bảo hành và đổi trả</a></dd>
						  <dd><a href="<?php echo $this->_tpl_vars['Content_thanhtoan']; ?>
"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Chính sách và hình thức thanh toán</a></dd>
						  <dd><a href="<?php echo $this->_tpl_vars['Content_quydinh']; ?>
"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Chính sách và quy định chung</a></dd>
						  <dd><a href="<?php echo $this->_tpl_vars['Content_baomat']; ?>
"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Chính sách về bảo mật thông tin</a></dd>
						  <dd><a href="<?php echo $this->_tpl_vars['Content_khieunai']; ?>
"><span class="glyphicon glyphicon-hand-right"></span>&nbsp;Chính sách về quy trình xử lý khiếu nại</a></dd>
                          
						</dl>
						<div style="margin-bottom:4px">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3739.932373386697!2d106.14708331444434!3d20.385678014796706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135de2e55555553%3A0x31545a7e4a9bacf!2zVGh14buRYyDEkMO0bmcgWSBQUUE!5e0!3m2!1svi!2s!4v1473389460527"  style="border:0 ;width:100% !important; height:250px!important" allowfullscreen></iframe>
						</div>
					
				  </div>
				 <div class="col-md-3 col-sm-3 ">
				       <h4 class="h_footer">Liên hệ</h4>
                
							<?php echo $this->_tpl_vars['Content']; ?>

							<div>
							<a target="_blank" href="http://www.online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=17845"><img src="http://thuocdongypqa.vn/ckfinder/userfiles/images/uytin.png" class="img-responsive img-hover "/></a>
							</div>
							
							<div>
							<a href="http://www.dmca.com/Protection/Status.aspx?ID=cd0241a3-94f7-415e-bba1-f4e9c3c4cd00" title="DMCA.com Protection Status" class="dmca-badge"> <img class="img-responsive img-hover " src="//images.dmca.com/Badges/dmca-badge-w200-5x1-09.png?ID=cd0241a3-94f7-415e-bba1-f4e9c3c4cd00" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
							</div>
					
							
           
				  </div>
				  <div class="col-md-3 col-sm-3 ">
				  <h4 class="h_footer">Tư vấn miễn phí</h4>
				  <?php if ($this->_tpl_vars['maintenace'] != 1): ?> 
                  <?php echo $this->_tpl_vars['Content_showroom']; ?>

				         
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
	        <?php endif; ?>
				  </div>
	  </div>
            </div>
			<div class="content_footer img-rounded text-center ">
			<div class="row" >
            <?php $_from = $this->_tpl_vars['menuArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['menu']):
        $this->_foreach['menu']['iteration']++;
?>
			
				 
				  <div class="col-md-2 col-sm-2 ">
			   <a href="<?php echo $this->_tpl_vars['menu']['href']; ?>
"><?php echo $this->_tpl_vars['menu']['title']; ?>
 &nbsp;</a>
			   </div>
			<?php endforeach; endif; unset($_from); ?>
			</div>
			<div class="clearfix"></div>
			</div>
            
        <!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>  
<div class="support">
	<div class="support_title"><b>Gọi Ds.Thu Phương<b></div>
	<div class="support_phone vinaphone"><img src="images/viettel.png" title="logo viettel" height="10" ><a href="tel:0979048786" style="color: #14928f"> 0979.048.786</a></div>
	<div class="support_phone"><img src="images/mobiphone.png" title="logo vinaphone" height="10" style="padding-right: 11px"><a href="tel:0906144577" >0906.144.577</a></div>
</div>


<!--box phone-->
<div class="box_phone">
	<h2 class="h2_phone"><b>Yêu Cầu Gọi Lại</b> </h2>
	<span class="glyphicon glyphicon-remove" id="box_close"></span>
	<div class="from_phone">
			<img src="images/loading.gif" width="50" class="loadding" style="margin-top: -10px;display: none;">
			<div class="from_content">
		<form name="frmPhone" id="frmPhone"  method="post">
			<div class="content_phone">
		           <div class=" col-md-9 col-sm-9 col-xs-9" style="padding:0px">
					<input type="text" name="customer_phone" id="customer_phone" class="form-control" placeholder="Nhập số điện thoại" >
				 </div>
				  <div class=" col-md-3 col-sm-3 col-xs-3" style="padding:0px">
					<button type="button" class="btn btn-primary mb-2" onclick="add_phone()"  class="text_mid" /> Gửi </button>
				 </div>
			</div>
			<div class="clearfix"></div>
			<div class="more_info">
				<br/>
				<input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Họ và Tên" >
				<br/>
				<label>Tin Nhắn</label>	
				<textarea class="form-control" id="customer_message" rows="5" id="comment" placeholder="Nội dung tin nhắn" ></textarea>
			</div>
		</form>
	</div>
	</div>
</div>  

<?php echo '
<style type="text/css">
div.support{
	filter: drop-shadow(0 0 0.75rem #c6c2c2);
    position: fixed;
    font-size: 14px;
    bottom: 1px;
    right: 1px;
    background: #fff;
    border: 1px solid #f37d48;
    border-radius: 5px 0px 0px 0px;
    padding: 10px;
}
div.vinaphone{
	padding-bottom: 3px;
	padding-top: 3px;
}
.support_phone img{
	padding-right: 7px;
}
.support_phone a{
	color: #b01e41;
}
.support_title{
	font-size: 16px;
    color: #e63600;
}
#box_close{
	position: absolute;
    top: 11px;
    right: 10px;
    display: none;
    color: #000;
}
.more_info{display: none}
	.box_phone{
	filter: drop-shadow(0 0 0.75rem #c6c2c2);
	padding: 3px;
    position: fixed;
    bottom: 2px;
    left: 2px;
    width: 50%;
    max-width: 290px;
    z-index: 999;
    background: #fff;
    border-radius: 0px 5px 0px 0px;
    padding-top: 0px;
    overflow: hidden;
    border: 1px solid #f37d48;
}
.from_phone{
	color: #000;
	font-weight: 100;
}
    .h2_phone{
    	font-size: 16px !important;
        color: #e63600;
        margin-top: 7px;
    	margin-bottom: 27px;
    }
</style>
<script>
	$( "#customer_phone" ).focus(function() {
    $(\'.more_info\').show();
     $(\'#box_close\').show();
    
  });
	$( "#box_close" ).click(function() {
    $(\'.more_info\').hide();
     $(\'#box_close\').hide();
    
  });

function add_phone(){  
customer_phone=$(\'#customer_phone\').val();
customer_name=$(\'#customer_name\').val();
customer_message=$(\'#customer_message\').val();

if(customer_phone!=\'\'){
$(\'.loadding\').show();
$(\'.from_content\').hide();
$(\'#box_close\').hide();

    $.ajax({
								   type:"POST",
								   data:{customer_phone: customer_phone,customer_name: customer_name,customer_message: customer_message,url:window.location.href },
								   url:"modules/Ajax/addPhone.php",
								   dataType:"json",
								   success:function(data){
								   	$(\'.loadding\').hide();
								   	  $(\'.from_phone\').html(\'Chúng tôi sẽ liên hệ sớm với bạn, Cảm ơn\')
									  //alert(\'Bạn gửi yêu cầu thành công, đội tư vấn sẽ liên hệ sớm với bạn\');
								   }									
								   });		
}else{
	alert(\'Bạn chưa nhập số điện thoại\');
}
}
</script>
'; ?>

            
            
			
			<?php echo '

<script>
// Get the modal
var modal = document.getElementById(\'myModal\');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById(\'myImg\');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
$(\'.myImg\').click(function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
});
</script>
<style>
/* Style the Image Used to Trigger the Modal */
.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    opacity:1 !important;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
'; ?>

</footer>
    <!-- jQuery -->
<?php echo '


</style>
<!-- Bootstrap Core JavaScript -->
    <script src="js/adoco/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $(\'.carousel\').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	
	<!-- Global site tag (gtag.js) - AdWords: 792315231 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-792315231"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag(\'js\', new Date());

  gtag(\'config\', \'AW-792315231\');
</script>
'; ?>
	
    
    


    