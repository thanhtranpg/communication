<?php /* Smarty version 2.6.26, created on 2019-01-09 05:47:26
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Right/Right.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\communication.com\\templates/Right/Right.tpl', 38, false),)), $this); ?>
<?php if ($this->_tpl_vars['maintenace'] != 1): ?> 
<div class="col-md-3 colum_right">

<ul class="nav nav-list list-group righ_nar">
  <li  class="list-group-item text-center">
    <h2><span class="glyphicon glyphicon-check"></span> Sản Phẩm</h2>
  </li>
  <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product']):
        $this->_foreach['product']['iteration']++;
?>
  <?php if ($this->_tpl_vars['product']['sub_menu']): ?>
  <li  class="list-group-item">
    <a class="accordion-heading" data-toggle="collapse" data-target="#submenu<?php echo $this->_foreach['product']['iteration']; ?>
">
      <span class="nav-header-primary"><span class="glyphicon glyphicon-circle-arrow-right"></span> <?php echo $this->_tpl_vars['product']['title']; ?>
 <b class="caret"></b></span>
    </a>
    <ul class="nav nav-list collapse" id="submenu<?php echo $this->_foreach['product']['iteration']; ?>
">
      <?php $_from = $this->_tpl_vars['product']['sub_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sub'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sub']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sub']):
        $this->_foreach['sub']['iteration']++;
?>
      <li><a href="<?php echo $this->_tpl_vars['sub']['href']; ?>
" title="<?php echo $this->_tpl_vars['sub']['title']; ?>
"><?php echo $this->_tpl_vars['sub']['title']; ?>
</a></li>
      <?php endforeach; endif; unset($_from); ?>
    </ul>
  </li>
  <?php else: ?>
   <li  class="list-group-item">
     <a href="<?php echo $this->_tpl_vars['product']['href']; ?>
" title="Title"><span class="glyphicon glyphicon-circle-arrow-right"></span> <?php echo $this->_tpl_vars['product']['title']; ?>
</a>
  </li>
  <?php endif; ?>
 <?php endforeach; endif; unset($_from); ?>
 
</ul>


<?php if ($this->_tpl_vars['arrRelative']): ?>
<ul class="nav nav-list list-group righ_nar">
  <li  class="list-group-item text-center">
    <h2><span class="glyphicon glyphicon-check"></span> <?php if ($this->_tpl_vars['title_sp']): ?> <?php echo $this->_tpl_vars['title_sp']; ?>
 <?php else: ?> Cẩm Nang <?php endif; ?></h2>
  </li>
  <?php $_from = $this->_tpl_vars['arrRelative']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['relative'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['relative']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['relative']):
        $this->_foreach['relative']['iteration']++;
?>
  
   <li  class="list-group-item" style="padding:0px; margin:0px">
     <a href="<?php echo $this->_tpl_vars['relative']['href']; ?>
" title="Title"><img alt="<?php echo $this->_tpl_vars['relative']['title']; ?>
" src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['relative']['image'], 'id' => $this->_tpl_vars['relative']['id'], 'folder' => $this->_tpl_vars['folder'], 'type' => '610')), $this); ?>
" class="img-responsive img-hover" style="float:left; width:80px; margin-right:2px"> <?php echo $this->_tpl_vars['relative']['title']; ?>
</a>
      <div class="clearfix"></div>
  </li>
 
  
 <?php endforeach; endif; unset($_from); ?>
 
</ul>
<?php endif; ?>



 
<ul class="nav nav-list list-group righ_nar" >
<!--
  <li  class="list-group-item text-center">
    <h2><span class="glyphicon glyphicon-user"></span> Hội Đồng Khoa Học</h2>
  </li>
  
  
   <li  class="list-group-item" style="padding:0px; margin:0px">
     <a style="padding:0px; margin:0px" href="http://thuocdongypqa.vn/Hoi-Dong-Khoa-Hoc-muc101-tin.html" title="Title"><img alt="Hội Đồng Khoa Học" src="images/co-van242.jpg" class="img-responsive img-hover" style="float:left; width:100%"> </a>
      <div class="clearfix"></div>
  </li>
  -->

    <li  class="list-group-item" style="padding:0px; margin:0px">
     <a style="padding:0px; margin:0px" href="http://thuocdongypqa.vn" title="Title"><img alt="Hội Đồng Khoa Học" src="images/thanh-tich-cong-ty-duoc-pham-pqa-1-1242.jpg" class="img-responsive img-hover" style="float:left; width:100%"> </a>
      <div class="clearfix"></div>
  </li>
  
  
   <li  class="list-group-item" style="padding:0px; margin:0px">
     <a style="padding:0px; margin:0px" href="http://thuocdongypqa.vn" title="Title"><img alt="bằng độc quyền giải pháp hữu ích" src="images/thanh-tich-cong-ty-duoc-pham-pqa-2-1242.jpg" class="img-responsive img-hover" style="float:left; width:100%"> </a>
      <div class="clearfix"></div>
  </li>
  
  <li  class="list-group-item" style="padding:0px; margin:0px">
     <a style="padding:0px; margin:0px" href="http://thuocdongypqa.vn" title="Title"><img alt="chứng nhận an toàn thực phẩm" src="images/0001242.jpg" class="img-responsive img-hover" style="float:left; width:100%"> </a>
      <div class="clearfix"></div>
  </li>
  
 
 
  

 
</ul>





                
            </div>
      <?php endif; ?>
     </div>
        <!-- /.row -->

          
        </div> 
        