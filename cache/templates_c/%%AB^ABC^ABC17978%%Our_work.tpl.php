<?php /* Smarty version 2.6.26, created on 2019-01-16 06:38:11
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Our_work/Our_work.tpl */ ?>
<div class="page-work">
        <section class="hero">
            <div class="hero__container">
                <figure class="figure hero__figure" style="background-image: url('/uploads/<?php echo $this->_tpl_vars['banner']['image']; ?>
')"></figure>
                <div class="hero__inner">
                    <h1 class="heading hero__heading heading--underline"><?php echo $this->_tpl_vars['banner']['title']; ?>
</h1>
                    <div class="p hero__description"><?php echo $this->_tpl_vars['banner']['description']; ?>

                    </div>
                </div>
            </div>
        </section>
        <div class="tabs">
            <div class="small-container tabs__container">
              <span class="tabs__name tabs__name--active" data-aos="fade-up">
                  <a href="<?php echo $this->_tpl_vars['ourwork_link']; ?>
" class="link-menu" target="_blank">All</a>
              </span>
              <?php $_from = $this->_tpl_vars['ourwork_cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ourwork_cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ourwork_cat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ourwork_cat']):
        $this->_foreach['ourwork_cat']['iteration']++;
?>
                <span class="tabs__name" data-aos="fade-up">
                  <a href="<?php echo $this->_tpl_vars['ourwork_cat']['href']; ?>
"  class="link-menu" target="_blank"><?php echo $this->_tpl_vars['ourwork_cat']['title']; ?>
</a>
                </span>
            <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
<div class="tab-content">
    <div class="small-container tab-content__container">
        <div class="tab-content__list" id="content_our_works">
          
        </div>
    </div>
</div>

<?php echo '
<script type="text/javascript">
	$( document ).ready(function() {
    	load_our_work(\'\',0,5);
	});
	function load_pop_up(a){
		alert(a);
	}
	function load_our_work_more(catid,start,limit,a) {
		$(\'.bt_load_more_our_work\').hide();
		load_our_work(catid,start,limit);
	}
	function load_our_work(catid,start,limit){
      $.ajax({
    	   type:"POST",
    	   data:{\'catid\': catid , \'start\' : start , \'limit\' : limit },
    	   url:"modules/Ajax/loadOurWork.php",
    	   dataType:"html",
    	   success:function(data){
      		  $(\'#content_our_works\').append(data);
      	   }									
  	   });		
	}
</script>
'; ?>