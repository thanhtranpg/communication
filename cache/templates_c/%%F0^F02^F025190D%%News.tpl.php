<?php /* Smarty version 2.6.26, created on 2018-08-16 08:12:49
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/News/News.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\thuocdongy\\templates/News/News.tpl', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['catid_info']['image']): ?>
 <!--<div>
 <img  src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['catid_info']['image'], 'id' => $this->_tpl_vars['catid_info']['catid'], 'folder' => 'news_cat', 'type' => '1680')), $this); ?>
" class="img-responsive"/>
 </div>-->
 <?php endif; ?>
 
               
                <ol class="breadcrumb">
                    <h1><?php echo $this->_tpl_vars['Title']; ?>
</h1>
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
 
 
 <div class="row">
 <?php $_from = $this->_tpl_vars['arrItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>

            <div class="col-md-3 col-sm-4 col-xs-6 img-portfolio">
            <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
                <a href="<?php echo $this->_tpl_vars['item']['href']; ?>
" class="border_img thumbnail">
                    <img alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" src="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['item']['image'], 'id' => $this->_tpl_vars['item']['id'], 'folder' => 'news', 'type' => '610')), $this); ?>
" class="img-responsive img-hover">
                </a>
               <?php endif; ?> 
                <div style="height:80px; overflow:hidden;"><a href="<?php echo $this->_tpl_vars['item']['href']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></div>
            </div>
          
  <?php endforeach; endif; unset($_from); ?>    
  </div>
   <div class="row">
    <div class="col-md-12 text-center">
    <?php echo $this->_tpl_vars['pagingData']; ?>

 
    </div>
   </div>  
        
   </div> 
   
  

        