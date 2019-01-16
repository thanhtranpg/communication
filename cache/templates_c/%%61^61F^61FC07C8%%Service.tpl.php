<?php /* Smarty version 2.6.26, created on 2019-01-16 05:02:56
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Service/Service.tpl */ ?>
<div class="page-service">
    <section class="hero">
        <div class="hero__container">
            <figure class="figure hero__figure" style="background-image: url('uploads/<?php echo $this->_tpl_vars['banner']['image']; ?>
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
            <h3 class="sub-heading card-title__heading heading--underline">EVENT & ACTIVATION</h3>
            <div class="p card-title__description">
                We provide our clients with various BTL services of event  management.
                At ST Communications, we attach ultimate care and highest caution to
                any project that we implement.
            </div>
        </div>
    </section>
    <section class="card-service">
        <div class="card-service__container">
            <div class="card-service__list">
            	<?php $_from = $this->_tpl_vars['ourwork_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ourwork'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ourwork']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ourwork']):
        $this->_foreach['ourwork']['iteration']++;
?>
					<div class="card-service__item" data-aos="fade-up">
                    <a href="<?php echo $this->_tpl_vars['ourwork']['href']; ?>
" target="_blank">
                        <figure class="card-service__figure small-img" style="background-image: url('/uploads/<?php echo $this->_tpl_vars['ourwork']['image']; ?>
')"></figure>
                        <h5 class="card-service__title sub-title">
                            <?php echo $this->_tpl_vars['ourwork']['title']; ?>

                        </h5>
                    </a>
                </div>
				<?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    </section>
</div>