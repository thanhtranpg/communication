<?php /* Smarty version 2.6.26, created on 2019-01-16 06:58:09
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Our_work/View_our_work.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('insert', 'getItemImage', 'D:\\CODE\\code\\communication.com\\templates/Our_work/View_our_work.tpl', 4, false),)), $this); ?>
<div class="page-sub-work">
    <section class="hero">
        <div class="hero__container">
            <figure class="figure hero__figure" style="background-image: url('<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['ourwork_corver']['image'], 'id' => $this->_tpl_vars['ourwork_corver']['id'], 'folder' => 'ourwork', 'type' => '1680')), $this); ?>
')"></figure>
            <div class="hero__inner">
                <h1 class="heading hero__heading heading--underline"><?php echo $this->_tpl_vars['banner']['title']; ?>
</h1>
                <div class="p hero__description"><?php echo $this->_tpl_vars['banner']['description']; ?>

                </div>
            </div>
        </div>
    </section>
    <section class="card-title" data-aos="fade-up">
        <div class="card-title__container">
            <h3 class="sub-heading card-title__heading heading--underline">OUR WORKS IN <?php echo $this->_tpl_vars['banner']['title']; ?>
</h3>
            <div class="p card-title__description"></div>
        </div>
    </section>
    <div class="card-sub">
        <div class="small-container card-sub__container">
            <div class="card-sub__list">
            	<?php $_from = $this->_tpl_vars['ourworks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ourwork'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ourwork']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ourwork']):
        $this->_foreach['ourwork']['iteration']++;
?>
				    <div class="card-sub__item" data-aos="fade-up" onclick="load_our_work_media(<?php echo $this->_tpl_vars['ourwork']['id']; ?>
,'img');" >
                    <figure class="figure card-sub__figure" style="background-image: url('<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'getItemImage', 'img' => $this->_tpl_vars['ourwork']['image'], 'id' => $this->_tpl_vars['ourwork']['id'], 'folder' => 'ourwork', 'type' => '610')), $this); ?>
')"></figure>
                    <div class="card-sub__inner">
                        <h5 class="card-sub__sub-title sub-link"><?php echo $this->_tpl_vars['ourwork']['title']; ?>
</h5>
                        
                    </div>
                </div>
				<?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    </div>
</div>


<div style="background: #807f7f" class="load_media"></div>