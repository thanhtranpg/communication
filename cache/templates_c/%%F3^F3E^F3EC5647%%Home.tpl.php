<?php /* Smarty version 2.6.26, created on 2018-09-25 05:13:54
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Home/Home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\thuocdongy\\templates/Home/Home.tpl', 113, false),)), $this); ?>
<?php if ($this->_tpl_vars['maintenace'] == 1): ?>
<div class="container">
    <div class="col-lg-12">
      <?php echo $this->_tpl_vars['maintaince_content']; ?>

      <h1>Dươc phẩm pqa</h1>
      </div>  
    </div>
</div>      
<?php else: ?>
    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php $_from = $this->_tpl_vars['slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['i_slide'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['i_slide']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i_slide']):
        $this->_foreach['i_slide']['iteration']++;
?>
          
          <?php if (($this->_foreach['i_slide']['iteration'] <= 1)): ?>
           <li data-target="#myCarousel" data-slide-to="<?php echo $this->_foreach['i_slide']['iteration']-1; ?>
" class="active"></li>
          <?php else: ?>
           <li data-target="#myCarousel" data-slide-to="<?php echo $this->_foreach['i_slide']['iteration']-1; ?>
" class=""></li>
          <?php endif; ?>
           
          <?php endforeach; endif; unset($_from); ?>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
           <?php $_from = $this->_tpl_vars['slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['i_slide'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['i_slide']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['i_slide']):
        $this->_foreach['i_slide']['iteration']++;
?>
            <?php if (($this->_foreach['i_slide']['iteration'] <= 1)): ?>
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('uploads/adv/<?php echo $this->_tpl_vars['i_slide']['image']; ?>
');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
            <?php else: ?>
           <div class="item ">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('uploads/adv/<?php echo $this->_tpl_vars['i_slide']['image']; ?>
');"></div>
                <div class="carousel-caption">
                    <!--<h2><?php echo $this->_tpl_vars['i_slide']['title']; ?>
</h2>-->
                </div>
            </div>
          <?php endif; ?>
           
            <?php endforeach; endif; unset($_from); ?>
            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
		

    </header>
	
	
	<div class="conten_slider container">
	<div class="col-lg-12">
	<br/>
	
<marquee behavior="left" style="font-weight:bold; color:#B40606; margin-top:5px"><?php echo $this->_tpl_vars['board_run']; ?>
</marquee> 


</div>

<div class="row" >
<div class="col-md-4 text-center "  style="margin-top:10px" >
              <div class="container" style="background:#00984a; color:white;padding: 6px; padding-top:15px;">
                <p class="glyphicon glyphicon-tower" style="font-size:20px"></p>
                <h3>ĐẶT UY TÍN LÊN HÀNG ĐẦU</h3>
                <p class="cam-ket">PQA cam kết cung cấp sản phẩm tốt nhất, được cấp phép của bộ y tế tới khách hàng</p>
                </div>
            </div>
            
<div class="col-md-4 text-center " style="margin-top:10px" >
              <div class="container" style="background:#ffa500; color:white;padding: 6px; padding-top:15px;">
                <p class="glyphicon glyphicon-user" style="font-size:20px"></p>
                <h3>ĐỘI NGŨ TƯ VẤN CHUYÊN MÔN CAO</h3>
                <p class="cam-ket">Tư vấn viên đều là dược sĩ đại học được đào tạo bài bản với kinh nghiệm nhiều năm</p>
                </div>
            </div>
            
<div class="col-md-4 text-center " style="margin-top:10px" >
              <div class="container" style="background:#bb5800; color:white;padding: 6px; padding-top:15px;">
                <p class="glyphicon glyphicon-map-marker" style="font-size:20px"></p>
                <h3>GIAO HÀNG TẬN NƠI</h3>
                <p class="cam-ket">Cam kết miễn 100% phí giao hàng cho khách hàng trên toàn quốc</p>
                </div>
            </div>

</div>
</div>
    <!--
<div class="conten_slider container">
	<div class="col-lg-12">
                <h4 class="page-header">
                    SẢN PHẨM
                </h4>
    </div>

  <link rel="stylesheet" type="text/css" href="js/slick-1.3.15/slick/slick.css"/>
<script type="text/javascript" src="js/slick-1.3.15/slick/slick.min.js"></script>

	<div class="col-lg-12 text-center" >
				<div class="slider responsive" >
				<?php $_from = $this->_tpl_vars['product_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['product']['iteration']++;
?>
                              <div class="slide_product">   
                                <div><a href="<?php echo $this->_tpl_vars['product']['href']; ?>
"><img src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['product']['image'], 'id' => $this->_tpl_vars['product']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" class="img-responsive"></a></div>
                                <div><a href="<?php echo $this->_tpl_vars['product']['href']; ?>
"><?php echo $this->_tpl_vars['product']['title']; ?>
</a></div>
                             </div>
                           <?php endforeach; endif; unset($_from); ?>
					
				</div>
         	<div class="clearfix"></div>
	</div>   
	
	</div>       
<?php echo '
<script>
$(\'.responsive\').slick({
    centerMode: false,
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
				
</script>
'; ?>

    -->
    
    

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- Page Content -->
    <div class="container">
		<div class="col-lg-12">
                <h4 class="page-header  text_color_logo">
                    SẢN PHẨM NỔI BẬT
                </h4>
    </div>
	<div class="row">
      
			
				<?php $_from = $this->_tpl_vars['product_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['product']['iteration']++;
?>
                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-center" >
                              <div class="" style=" margin:auto;">   
                                <div class="p_relative"><a  href="<?php echo $this->_tpl_vars['product']['href']; ?>
">
                                <div class="p_title "><?php echo $this->_tpl_vars['product']['headline']; ?>
&nbsp;
                                <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['product']['image'], 'id' => $this->_tpl_vars['product']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" class="img-responsive img-hover ">
                                
                                </div>
                                </a>
                                </div>
                                <p><b>Giá: </b><span style="color:blue"><?php echo $this->_tpl_vars['product']['price']; ?>
 </span>đ</p>
                                 <div><a style="padding:2px;" href="javascript:void(0);" onclick="add_cart(<?php echo $this->_tpl_vars['product']['id']; ?>
,1);" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Đặt hàng </a></div>
                                <div style="height:50px"><a href="<?php echo $this->_tpl_vars['product']['href']; ?>
"><?php echo $this->_tpl_vars['product']['title']; ?>
</a></div>
                               <hr />
                             </div>
                             	</div>
                                
                                
                           <?php endforeach; endif; unset($_from); ?>
						   
		   
						   
						   
					
			
    
	</div> 
	
	
	
	
	
	
<!--	
<div class="col-lg-12">
                <h4 class="page-header  text_color_logo">
                    VIDEO
                </h4>
    </div>
	<div class="row">
      
			
				<?php $_from = $this->_tpl_vars['arrVideo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['video'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['video']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['video']):
        $this->_foreach['video']['iteration']++;
?>
                	<div class="col-lg-3 col-md-3 text-center" >
                             
                                <div>
								<?php echo $this->_tpl_vars['video']['des']; ?>

								</div>
                               
                                
                                <div><a href="<?php echo $this->_tpl_vars['video']['href']; ?>
"><?php echo $this->_tpl_vars['video']['title']; ?>
</a></div>
                               
                         
                             	</div>
                           <?php endforeach; endif; unset($_from); ?>
						   
		   
						   
						   
					
			
    
	</div> 
    -->
	
	
	
	<!--	
		<div class="col-lg-12">
                <h4 class="page-header  text_color_logo">
                    Cố Vấn Khoa Học
                </h4>
    </div>
	<div class="row" style="padding-left:6px">
	
	<img  alt="Hội Đồng Cố Vấn Khoa Học" src="images/home.jpg" class="myImg  img-responsive img-hover ">
   -->
	
	
	
	
	
	
<div class="col-lg-12" style="height:20px">
                
    </div>
	
	
		<div class="row">
		
            
           
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text_color_logo"><i class="glyphicon glyphicon-facetime-video"></i> Giới thiệu</h4>
						
                    </div>
                    <div class="panel-body">
					   
                        <?php echo $this->_tpl_vars['about_short']; ?>

                        <!--<a href="<?php echo $this->_tpl_vars['about_short_url']; ?>
" class="btn btn-default">Xem thêm</a>-->
                    </div>
                </div>
            </div>
            
        </div>
	
	
        <!-- Marketing Icons Section -->
        <div class="row">
		
            
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text_color_logo"><i class="glyphicon glyphicon-user"></i> Cẩm nang sức khỏe </h4>
                    </div>
                    <div class="panel-body">
					    
                       						  
						  <?php $_from = $this->_tpl_vars['arrTuVan']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tuvan']):
?>
                         <div class="row" style="margin:2px">
                          <div class="col-md-4"><a href="<?php echo $this->_tpl_vars['tuvan']['href']; ?>
"><img alt="<?php echo $this->_tpl_vars['tuvan']['title']; ?>
" src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['tuvan']['image'], 'id' => $this->_tpl_vars['tuvan']['id'], 'folder' => 'news', 'type' => '610')), $this); ?>
" class="img-responsive img-hover "></a></div>
						  <div class="col-md-8"><a href="<?php echo $this->_tpl_vars['tuvan']['href']; ?>
"><span class="glyphicon glyphicon-hand-right"></span> <?php echo $this->_tpl_vars['tuvan']['title']; ?>
</a></div>
                          </div>
                          <?php endforeach; endif; unset($_from); ?>
						
                    </div>
                </div>
            </div>
           
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="text_color_logo"><i class="glyphicon glyphicon-film"></i> Chia sẻ của bệnh nhân </h4>
                    </div>
                    <div class="panel-body">
					    
                       
						<?php $_from = $this->_tpl_vars['arrNewsHot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tuvan']):
?>
                        <div class="row" style="margin:2px">
                          <div class="col-md-4"><a href="<?php echo $this->_tpl_vars['tuvan']['href']; ?>
"><img alt="<?php echo $this->_tpl_vars['tuvan']['title']; ?>
" src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['tuvan']['image'], 'id' => $this->_tpl_vars['tuvan']['id'], 'folder' => 'news', 'type' => '610')), $this); ?>
" class="img-responsive img-hover "></a></div>
                           <div class="col-md-8"><a href="<?php echo $this->_tpl_vars['tuvan']['href']; ?>
"><span class="glyphicon glyphicon-hand-right"></span> <?php echo $this->_tpl_vars['tuvan']['title']; ?>
</a></div>
                          </div>
						  
                          <?php endforeach; endif; unset($_from); ?>
						  <!--
						  <?php $_from = $this->_tpl_vars['product_hot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_hot']):
?>
						  <li><a href="<?php echo $this->_tpl_vars['new_hot']['href']; ?>
"><?php echo $this->_tpl_vars['new_hot']['title']; ?>
</a></li>
                          <?php endforeach; endif; unset($_from); ?>
						  -->
						</ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
	</div>	
    </div>
<?php endif; ?>    