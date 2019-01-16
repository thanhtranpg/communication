<?php /* Smarty version 2.6.26, created on 2018-09-25 05:03:53
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Product/Product.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\thuocdongy\\templates/Product/Product.tpl', 4, false),)), $this); ?>

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
 <h1><?php echo $this->_tpl_vars['catid_info']['title']; ?>
</h1>
 <div class="h_description"><?php echo $this->_tpl_vars['catid_info']['description']; ?>
 </div>
 <hr />
 
 
 
 
 
        <!-- Page Heading/Breadcrumbs -->
        
           
      
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">



 <div class="col-md-9">
 
 <?php if ($this->_tpl_vars['maintenace'] != 1): ?>  
  <?php if ($this->_tpl_vars['sub_menu']): ?>
 <div class="row">
            <div class="col-lg-12">
<div class="list-group" >
   <a href="#" class="list-group-item active">
      <h4 class="list-group-item-heading" style="padding:8px; padding-left:16px;">
         <span class="glyphicon glyphicon-download"></span> <?php echo $this->_tpl_vars['catid_info']['title']; ?>

      </h4>
   </a>
   
   
  
   <?php $_from = $this->_tpl_vars['sub_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
   
   
    <a href="<?php echo $this->_tpl_vars['sub']['href']; ?>
" class="list-group-item" >
      <h4 class="list-group-item-heading" style="padding:8px; padding-left:16px;color:#337ab7">
         <span class="glyphicon glyphicon-hand-right"></span> <?php echo $this->_tpl_vars['sub']['title']; ?>

      </h4>
     
   </a>
   
   <?php endforeach; endif; unset($_from); ?>

  
   
</div>

</div>
</div>

 <?php $_from = $this->_tpl_vars['arrItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
 <?php if (($this->_foreach['item']['iteration'] <= 1)): ?>
    <div class="row">
 <?php endif; ?>
            <div class="col-md-3 img-portfolio">
            <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
             <div class="p_relative">
                <a href="<?php echo $this->_tpl_vars['item']['href']; ?>
">
                <div class="p_title"><?php echo $this->_tpl_vars['item']['headline']; ?>

                    <img alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '610')), $this); ?>
" class="img-responsive img-hover">
                    </div>
                </a>
              </div>  
               <?php endif; ?> 
                <p><a href="<?php echo $this->_tpl_vars['item']['href']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></p>
            </div>
          
 <?php if ($this->_foreach['item']['iteration'] % 4 == 0): ?>
    </div>
    <div class="row">
 <?php endif; ?>
       <?php if (($this->_foreach['item']['iteration'] == $this->_foreach['item']['total'])): ?>
   </div>
 <?php endif; ?>   
  <?php endforeach; endif; unset($_from); ?> 

<?php else: ?>
<!--------LIST PRODUCT ------------------>
 <?php $_from = $this->_tpl_vars['arrItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
  <div class="row" >
            
            <div class="col-md-5 p_relative">
                <a  href="<?php echo $this->_tpl_vars['item']['href']; ?>
">
                <div class="p_title"> <?php echo $this->_tpl_vars['item']['headline']; ?>

                    <img   alt="<?php echo $this->_tpl_vars['item']['title']; ?>
"  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'product', 'type' => '298')), $this); ?>
" class="img-responsive img-hover">
                    </div>
                </a>
            </div>
            <div class="col-md-7">
                <h3>
                    <a href="<?php echo $this->_tpl_vars['item']['href']; ?>
" ><?php echo $this->_tpl_vars['item']['title']; ?>
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
 
  <div class="row">
    <div class="col-md-12 text-center">
    <?php echo $this->_tpl_vars['pagingData']; ?>

 
    </div>
   </div>  
<!--------END LIST PRODUCT ----------------->
  <?php endif; ?> 
<?php endif; ?>   
   </div> 
   
   

        
        