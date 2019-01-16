<?php /* Smarty version 2.6.26, created on 2019-01-16 07:08:42
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Header/Header.tpl */ ?>
<header class="header">
    <div class="container header__container">
        <div class="nav__logo">
            <a href="/" target=""> <figure class="logo__figure" style="background-image: url('/uploads/<?php echo $this->_tpl_vars['logo']['image']; ?>
')"></figure></a>
        </div>
        <div class="header__title header-title"></div>
        <div class="header__nav">
            <button class="button-header" ng-click="toggle = !toggle">
                <i class="fa fa-header-custom" aria-hidden="true"></i>
            </button>
        </div>
        <div class="header__menu">
            <ul class="header__list">
            	<?php $_from = $this->_tpl_vars['menuArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['menu']):
        $this->_foreach['menu']['iteration']++;
?>
                    
                    <?php if (($this->_foreach['menu']['iteration'] == $this->_foreach['menu']['total'])): ?> 
	                    <li class="header__item header__item--p">
                        	<a class="p <?php echo $this->_tpl_vars['menu']['class']; ?>
" href="<?php echo $this->_tpl_vars['menu']['href']; ?>
" ><?php echo $this->_tpl_vars['menu']['title']; ?>
</a>
                    	</li>
                    <?php else: ?>
                    	<li class="header__item">
                        	<a class="sub-heading <?php echo $this->_tpl_vars['menu']['class']; ?>
" href="<?php echo $this->_tpl_vars['menu']['href']; ?>
" ><?php echo $this->_tpl_vars['menu']['title']; ?>
</a>
                    	</li>
                    <?php endif; ?> 
                <?php endforeach; endif; unset($_from); ?>
                
                <li class="header__item header__item--social">
                    <a class="header__social" href="<?php echo $this->_tpl_vars['facebooklink']; ?>
" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a class="header__social" href="<?php echo $this->_tpl_vars['youtubelink']; ?>
" target="_blank"><i class="fa fa-youtube-play"></i></a>
                </li>
            </ul>
        </div>
    </div>
</header>