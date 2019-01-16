<?php /* Smarty version 2.6.26, created on 2019-01-16 07:07:51
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Footer/Footer.tpl */ ?>
<footer class="footer" data-aos="fade-up">
    <div class="container footer__container">
        <div class="nav__logo">
            <a href="#" target=""> <figure class="logo__figure" style="background-image: url('../assets/imgs/logo.png')"></figure></a>
        </div>
        <nav class="nav footer__nav">
            <ul class="footer__list">
            	<?php $_from = $this->_tpl_vars['menuArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['menu']):
        $this->_foreach['menu']['iteration']++;
?>
                	<li class="header__item">
                    	<li class="footer__item">
		                    <a class="link-menu <?php echo $this->_tpl_vars['menu']['class']; ?>
" href ="<?php echo $this->_tpl_vars['menu']['href']; ?>
" ><?php echo $this->_tpl_vars['menu']['title']; ?>
</a>
		                </li>
                	</li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </nav>
    </div>
    <div class="footer__center">
        <div class="container">
            <div class="footer__row">
                <div class="footer__col col-60">
                    <h5 class="footer__label label">ADDRESS</h5>
                    <div class="footer__description p-small">
                        <?php echo $this->_tpl_vars['address']; ?>

                    </div>
                </div>
                <div class="footer__col col-center">
                    <h5 class="footer__label label">CONTACT</h5>
                    <div class="footer__description p-small">
                        <?php echo $this->_tpl_vars['email']; ?>
 <br/>
                        <?php echo $this->_tpl_vars['hotline']; ?>

                    </div>
                </div>
                <div class="footer__col col-right">
                    <h5 class="footer__label label">FOLLOW US</h5>
                    <div class="footer__social">
                        <a href="<?php echo $this->_tpl_vars['facebooklink']; ?>
" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="<?php echo $this->_tpl_vars['youtubelink']; ?>
" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer__notice">
                <p class="p-small">
                    <?php echo $this->_tpl_vars['copyright']; ?>

                </p>
            </div>
        </div>
    </div>
</footer>