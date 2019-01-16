<?php /* Smarty version 2.6.26, created on 2018-09-25 05:04:05
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/News/ViewNews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\thuocdongy\\templates/News/ViewNews.tpl', 7, false),array('modifier', 'strip_tags', 'D:\\CODE\\code\\thuocdongy\\templates/News/ViewNews.tpl', 197, false),)), $this); ?>


    <script type="text/javascript" src="js/adoco/procss.js"></script>
   
    <?php if ($this->_tpl_vars['catid_info']['image']): ?>
 <!--<div>
 <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['catid_info']['image'], 'id' => $this->_tpl_vars['catid_info']['catid'], 'folder' => 'product_cat', 'type' => '1680')), $this); ?>
" class="img-responsive"/>
 </div>-->
 <?php endif; ?>
 
               
                <ol class="breadcrumb">
                    
                    <li><a href="<?php echo $this->_tpl_vars['home_url']; ?>
">Trang chủ</a>
                    </li>
                   
                    <?php if ($this->_tpl_vars['cat_parent_info']): ?>
                    <li><span class="glyphicon glyphicon-play-circle"></span></li>
                    <li ><a href="<?php echo $this->_tpl_vars['cat_parent_info']['href']; ?>
"><?php echo $this->_tpl_vars['cat_parent_info']['title']; ?>
</a></li>
                    <?php endif; ?>
                     <li><span class="glyphicon glyphicon-play-circle"></span></li>
                    <li ><a href="<?php echo $this->_tpl_vars['catid_info']['href']; ?>
"><?php echo $this->_tpl_vars['catid_info']['title']; ?>
</a></li>
                </ol>
           
 <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
           
      
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

        <div class="col-md-9"  >


      <div class="row" >
    <?php if ($this->_tpl_vars['maintenace'] != 1): ?>  
      <div class="col-md-5"  >
        <div id="">
        <div class="p_title"><?php echo $this->_tpl_vars['item']['headline']; ?>
</div>
          <div class="jqzoom p_relative" id="spec-n1"><img class="img-responsive img-hover thumbnail " src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '610')), $this); ?>
" jqimg="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '610')), $this); ?>
" />
           
          </div>

          <div id="spec-n5">
            
            <div id="spec-list">
              <ul class="list-h">
                
                    <li class="p_relative"><img class="img-responsive img-hover thumbnail " src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '610')), $this); ?>
" />
                    
                    </li>
                  
                    <?php $_from = $this->_tpl_vars['resultdh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['img'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['img']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['img']):
        $this->_foreach['img']['iteration']++;
?>
                 <li ><img  class="img-responsive img-hover thumbnail " src="uploads/image/<?php echo $this->_tpl_vars['img']['image']; ?>
"/></li>
               <?php endforeach; endif; unset($_from); ?>   
                 
                  
              </ul>
            </div>
            
          </div>
        </div>
        </div>
    <?php endif; ?>
        <div class="col-md-7" >
        <div class="">
          <h1 class="font16"   style="margin-bottom:23px"><?php echo $this->_tpl_vars['item']['title']; ?>
</h1>
      <?php if ($this->_tpl_vars['maintenace'] != 1): ?>  
       <br/>
       
          <div class="intro" >
          <?php echo $this->_tpl_vars['item']['brief']; ?>
 
          
          <div>
          <p><b>Giá: </b><span style="color:blue" ><?php echo $this->_tpl_vars['item']['price']; ?>
 </span>đ</p>
          <a href="javascript:void(0);" onclick="add_cart(<?php echo $this->_tpl_vars['item']['id']; ?>
,1);" ><!--<span class="glyphicon glyphicon-shopping-cart"></span> Đặt hàng -->
      <img alt="" class="img-responsive img-hover img_buy" src="/images/dat-mua.png"  />
      </a>

          </div>
        </div>
      <?php endif; ?>
      
         
          <!--
          <div class="share">
            <span>Chia sẻ:</span><div class="bshare-custom"><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到开心网" class="bshare-kaixin001"></a><a title="分享到Twitter" class="bshare-twitter"></a><a title="分享到Facebook" class="bshare-facebook"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a></div>
            
          </div>
         -->
     <div>
     
     </div>
     
        </div>
     
        </div>
        <div class="clear"></div>
      <div class="blank30"></div>
        </div>
    <?php if ($this->_tpl_vars['maintenace'] != 1): ?> 
        <div class="row">
        <div class="col-md-12">
        <div class="param">
          <dl class="chose" id="tags">
            <dd><a href="javascript:void(0)"  class="sec">Chi tiết sản phẩm</a></dd>
          
          </dl>
          <div class="desp" id="tagContent0"  >
            

<div class="new_des">

<?php echo $this->_tpl_vars['item']['des']; ?>

<div>
<hr/>
 <div class="text-primary">
<div class="end_content">
   <?php echo $this->_tpl_vars['end_content']; ?>

</div>
<div class="review">
            (<i> <?php echo $this->_tpl_vars['ratingCount']; ?>
 phiếu bầu </i>)
            <div class="rating">
             <span class="checked">☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span> 
            </div>
            
            </div>





              <div class="fb-comments" data-href="<?php echo $this->_tpl_vars['url_current']; ?>
" data-numposts="5" data-colorscheme="light"></div>
              </div>

          </div>
          
        </div>
         </div>
         </div>
         
         
  <dl class="chose" id="tags">
            <dd><a href="javascript:void(0)"  class="sec">Có thể bạn quan tâm</a></dd>
          
          </dl>       
         <?php $_from = $this->_tpl_vars['arrNewsest']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
  <div class="row" >
            
            <div class="col-md-3 p_relative">
                <a  href="<?php echo $this->_tpl_vars['item']['href']; ?>
">
                <div class="p_title" style="text-align:left"><?php echo $this->_tpl_vars['item']['headline']; ?>

                    <img style="height:100%!important"   alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" class="img-responsive img-hover thumbnail border_img" >
                    </div>
                </a>
            </div>
            <div class="col-md-9">
                <h3>
                    <a href="<?php echo $this->_tpl_vars['item']['href']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a>
                </h3>
               
                </p>
                <div ><?php echo $this->_tpl_vars['item']['brief']; ?>
</div>
                <p><b>Giá: </b><span style="color:blue"><?php echo $this->_tpl_vars['item']['price']; ?>
 </span>đ</p>
                <a href="<?php echo $this->_tpl_vars['item']['href']; ?>
" class="btn btn-primary">Xem Thêm <i class="fa fa-angle-right"></i></a>
               &nbsp;&nbsp; &nbsp;&nbsp;<a href="javascript:void(0);" onclick="add_cart(<?php echo $this->_tpl_vars['item']['id']; ?>
,1);" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Đặt hàng </a>
            </div>
        </div>
        <hr />
 <?php endforeach; endif; unset($_from); ?> 
        
   </div>  
   
   

     </div> 
   <?php endif; ?>
   
        </div> 
   
   

   
   
   <?php echo '


<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Book",
  "name": "'; ?>
<?php echo $this->_tpl_vars['item']['title']; ?>
<?php echo '",
  "description": "'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['desciption'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
<?php echo '",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "'; ?>
<?php echo $this->_tpl_vars['ratingValue']; ?>
<?php echo '",
    "bestRating": "'; ?>
<?php echo $this->_tpl_vars['bestRating']; ?>
<?php echo '",
    "worstRating": "'; ?>
<?php echo $this->_tpl_vars['worstRating']; ?>
<?php echo '",
    "ratingCount": "'; ?>
<?php echo $this->_tpl_vars['ratingCount']; ?>
<?php echo '"
  }
}
</script>



'; ?>

   
   
   
   
   
   
   
   <?php echo '


   
   
     
  

        <script type="text/javascript">
      $(function(){     
         $(".jqzoom").jqueryzoom({
          xzoom:290,
          yzoom:290,
          offset:10,
          position:"right",
          preload:1,
          lens:1
        });
        
        $("#spec-list img").bind("mouseover",function(){
          var src=$(this).attr("src");
          $("#spec-n1 img").eq(0).attr({
            src:src.replace("\\/n5\\/","\\/n1\\/"),
            jqimg:src.replace("\\/n5\\/","\\/n0\\/")
          });
          $(this).css({
            "border":"1px solid #ff6600",
            "padding":"1px"
          });
        }).bind("mouseout",function(){
          $(this).css({
            "border":"1px solid #ccc",
            "padding":"1px"
          });
        });       
      })
      </script>
    <style>
 .blink {
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    
    -moz-animation-name: blinker;
    -moz-animation-duration: 1s;
    -moz-animation-timing-function: linear;
    -moz-animation-iteration-count: infinite;
    
    animation-name: blinker;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
}

@-moz-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@-webkit-keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}

@keyframes blinker {  
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}
 </style>
        <style>
       
*{margin:0; padding:0;}

p{margin:0px 0 13px 0;}


/* new clearfix */

.blank15{height:15px; line-height:0;font-size:0; display:block}
.blank20{height:20px; line-height:0;font-size:0; display:block}
.blank30{height:30px; line-height:0;font-size:0; display:block}


/*==========Products=========*/

/*protype*/
.protype dl{ float:left; width:100%; padding-bottom:20px; border-bottom:#d8d8d8 solid 1px; margin-bottom:20px;}
.protype dd{ float:left; width:30%; padding-right:30px;}
.protype dd img{ border:#dfdfdf solid 4px;}
.protype dt{ float:left; width:65%; text-overflow:ellipsis; white-space:normal; word-break:break-all;}
.protype dt span{ font-size:16px; width:100%; line-height:30px;}
.protype dt p{ color:#666666; line-height:24px;}
.protype dt a{ color:#00479f; border:0;}
/*prolist*/
.prolist{padding-top:20px;width:100%;}
.prolist li{padding-right:16px;padding-bottom:16px;float:left;}
.prolist li a{width:161px;display:block;text-align:center; line-height:30px;}
.prolist li a img{display:block;border:5px solid #bfbfbf;}
.prolist li a:hover{color:#00479f;}
/*prodetail*/
#preview{ float:left; width:290px; padding-right:20px; text-align:center;}
.jqzoom{ position:relative;padding:0;}
#spec-n5{  height:60px; margin-top:6px; overflow:hidden;}
#spec-left,#spec-right{ float:left; width:15px; height:50px; cursor:pointer; margin-top:5px;} 
#spec-list{ float:left;  height:55px; overflow:hidden; display:inline; margin-top:5px; padding-left:4px;}
#spec-list ul li{ float:left; display:inline; width:63px;}
#spec-list ul li img{ padding:1px;float:left; border:1px solid #ccc; width:50px; height:50px;}
#preview .link{margin:10px auto 0 auto; display:block;}
/*jqzoom*/
.jqzoom{position:relative;padding:0;}
.zoomdiv{z-index:100;position:absolute;top:1px;left:0px;width:290px;height:292px;background:url(images/loading.gif) #fff no-repeat center center;display:none;text-align:center;overflow: hidden;}
.bigimg{width:580px;height:580px;}
.jqZoomPup{z-index:10;visibility:hidden;position:absolute;top:0px;left:0px;width:50px;height:50px;border:1px solid #aaa;background:#FEDE4F 50% top no-repeat;opacity:0.5;-moz-opacity:0.5;-khtml-opacity:0.5;filter:alpha(Opacity=50);cursor:move;}

.details{ float:left; width:400px; height:auto;}
  .font16{ float:left; width:100%; font-size:16px; height:30px; line-height:30px; font-weight:bold; color:#10459d; text-align:left;}
  .intro{ float:left; width:100%; line-height:25px; text-align:left;}
  
  
  .param{ width:100%; }
    .chose{float:left; width:100%; height:34px;line-height:34px;border-bottom:1px solid #dbdbdb;position:relative;}
    .chose dd{float:left; width:136px;font-size:14px;height:34px; text-align:left;}
    .chose dd a{height:33px; line-height:33px; display:block; text-align:center; background:#f5f5f5; color:#666;border-top:1px solid #dbdbdb;border-right:1px solid #dbdbdb;border-bottom:1px solid #dbdbdb;border-left:1px solid #dbdbdb;}
    .chose dd a.sec,.chose dd a:hover{color:#cc0000;background:#f8f8f8;border-top:3px solid #cc0000;height:32px; line-height:32px;border-bottom:none;}
    .desp{float:left; width:100%; padding:20px 0;}
    .desp table{ background:#dcdcdc; border:#dcdcdc solid 1px;}
    .desp table td{ background:#ffffff; border:#dcdcdc solid 1px; text-indent:0.5em;}


        </style>
         '; ?>