<?php /* Smarty version 2.6.26, created on 2017-08-06 18:36:31
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Cart/Cart.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\thuocdongy\\templates/Cart/Cart.tpl', 120, false),)), $this); ?>

<div>

 </div>
 
               
                <ol class="breadcrumb">
                <h1>Giỏ hàng</h1>
                    
                   <li><a href="<?php echo $this->_tpl_vars['home_url']; ?>
">Trang chủ</a>
                    </li>
                    <li><span class="glyphicon glyphicon-play-circle"></span></li>
                    <li >Giỏ hàng</li>
                    
                </ol>
  
  
  <div class="">

        

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-12">














 <form name="frmContact" id="frmContact"  method="post">
                        <input type="hidden" name="form_block" value="Cart">
                        <input type="hidden" name="cmd" value="send">

<section id="cart">

                    	<div class="container">
                        	
                        	<div class="row">                            	
                            	<article class="col-lg-12 cls_hidden">
                            		<div class="cart-step">
                                    	<ol class="progtrckr" data-progtrckr-steps="4">
    										<li class="progtrckr-done">
                                            	<a href="javascript:void(0);">
                                                	<span class="step">1</span>
	                                                <p>Giỏ hàng</p>
												</a>                                                    
                                            </li>
    										<li class="progtrckr-todo">
                                            		<span class="step">2</span>
                                                	<p>Gửi Đơn</p>
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
                                <article class="giohang">
                                	<figure class="col-lg-12">
	                                    <h2>Giỏ hàng</h2>
    	                                <p>Vui lòng kiểm tra lại giỏ hàng của bạn</p>
									</figure>                                        
                                    <figure class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                         <ul class="cart-list">
  												<li class="thead">
    												<div class="name">Sản phẩm</div>
    												<div class="price cls_hidden">Ảnh sản phẩm</div>
    												<div class="unit-price cls_hidden">Giá</div>
    												<div class="amount">Số lượng</div>
                                                    <div class="total-price">Thành tiền</div>
    												<div class="action"></div>
  												</li>        
                                                                                        
                                                <!--order header-->
                                                
                                                
                                                
                                     





                 

            
  		
  	  	
<?php $_from = $this->_tpl_vars['array_product']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['product']):
?>
  <li id="li_product_<?php echo $this->_tpl_vars['product']['id']; ?>
">
    	<div class="service-reg name">
        	<ul class="name-sv" style="padding:0px">
            	<li><?php echo $this->_tpl_vars['product']['title']; ?>
</li>        				
            </ul>
            
    	</div>
        
        
        <!--set up feê-->
    	<div class="price cls_hidden" style="color:#333">
       <img alt=""  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['product']['image'], 'id' => $this->_tpl_vars['product']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" class="img-responsive img-hover thumbnail cart_img">      
    	</div>
        
        
        
        <!--price-->
        <div class="unit-price cls_hidden" style="color:#f16725">        
            <p id="ord_realprice_1"><?php echo $this->_tpl_vars['product']['price_fomart']; ?>
 đ</p>
                                                
         </div>
         
         
         
         <!--thoi gian gia han (cycle)-->
         <div class="amount">                                     
          <input style="width:60px; background:#fff; color:#000" onchange="update_cart(<?php echo $this->_tpl_vars['product']['id']; ?>
,this);" value="<?php echo $this->_tpl_vars['product']['number']; ?>
" type="number" id="replyNumber" min="1" step="1" data-bind="value:replyNumber" />            
        
    	</div>
        <!--tong tiền-->
    	<div style="color:#f16725" class="order_amount total-price">
        	<span>Thành tiền </span>
            <small id="ord_amount_<?php echo $this->_tpl_vars['product']['id']; ?>
"><?php echo $this->_tpl_vars['product']['money']; ?>
 đ
            </small>
        </div>
        
        <!--xoá-->
        <div class="cs">
        <a title="" style="cursor: pointer;" onclick="javascript:delete_cart(<?php echo $this->_tpl_vars['product']['id']; ?>
);"><i class="fa fa-times-circle fa-lg"></i></a>
                
        </div>
     </li>      
  <?php endforeach; endif; unset($_from); ?>      
        
   
   

   
	    

<!--footer cart-->
<?php echo '
<style>
@media (max-width: 500px) { 
    .cls_hidden{display:none!important;}
    
}
</style>

<script>
function show_alert(){
	alert("Bạn chưa có dịch vụ nào trong giỏ hàng");
	return false;	
	
}

$(document).ready(function () {
 
  $("#replyNumber").keypress(function (e) {
     
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
       
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

</script>
'; ?>

 											</ul>
                                         <div class="row">
                                         	<div class="col-lg-12">
                                            	<!--a href="#" class="trans-hover btnsave" title="">Lưu thông tin</a-->
                                                <a class="trans-hover btndelete" onclick="delete_all();" title="">Xóa rỗng giỏ hàng</a>
                                            </div>
                                         </div>      
                                    </figure>
                                    <figure class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                         <div class="info-checkout">
                                         	<div class="heading">
                                             	Hóa đơn
                                            </div>
                                         	<div class="main-checkout">
                                            	<p>Tổng tiền</p>
                                                <span class="max-price" id="ord_total"><?php echo $this->_tpl_vars['total_money']; ?>
 đ</span>
                                                <!--<div class="vat">
                                                	<span>Xuất hóa đơn</span>
													<div class="custom-select fa-angle-down">
                                                    
                                                    
                                                    	<select name="ord_is_vat" defaultvalue="0" id="ord_is_vat" on>
                                                    		<option value="0">Không</option>
                    										<option value="1">Có</option>
														</select>
													</div>
                                                </div>
                                                -->
                                            </div>
                                            <a style="width:100%" class="trans-hover btndelete" href="<?php echo $this->_tpl_vars['send_href']; ?>
" title="">Gửi Đơn Hàng</a>
                                            
                                             <a class="trans-hover btncoucart" id="cbuying-bottom" href="<?php echo $this->_tpl_vars['product_list_href']; ?>
" title="">Hoặc tiếp tục mua hàng</a>
                                         </div>  
                                    </figure>
                                </article>
                            </div>
                        </div>
                    </section>

					<!--footer carrt-->

</form>










                
                
   </div>             
                
</div>


        <hr>

        
    </div>


<?php echo '

<script>

function delete_all(){
    
    $.ajax({
								   type:"POST",
								   data:{cmd: \'delete_all\'},
								   url:"modules/Ajax/cart.php",
								   dataType:"json",
								   success:function(data){
									  location.href=location.href;
								   }									
								   });		
}


function update_cart(product_id,a){
    var number=$(a).val();
    $.ajax({
								   type:"POST",
								   data:{cmd: \'update\',product_id:product_id,number:number},
								   url:"modules/Ajax/cart.php",
								   dataType:"json",
								   success:function(data){
									$(\'#ord_total\').html(data.total_money +\' đ\');
                                    $(\'#ord_amount_\'+product_id).html(data.money_product +\' đ\');
								   }									
								   });		
}


function delete_cart(product_id){
    
    $.ajax({
								   type:"POST",
								   data:{cmd: \'delete\',product_id:product_id},
								   url:"modules/Ajax/cart.php",
								   dataType:"json",
								   success:function(data){
								      	$(\'#ord_total\').html(data.total_money +\' đ\');
									  $(\'#li_product_\'+product_id).html(\'\');
								   }									
								   });		
}




</script>

'; ?>
