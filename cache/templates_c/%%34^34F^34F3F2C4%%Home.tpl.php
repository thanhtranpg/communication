<?php /* Smarty version 2.6.26, created on 2019-01-16 07:46:32
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Home/Home.tpl */ ?>

<div class="page-home">
        <section class="hero hero--video">
            <div class="hero__container">
                <figure class="figure hero__figure" style="background-image: url('/www/assets/imgs/Festival/MaskGroup47.png')"></figure>
                <div class="hero__video">
                    <video class="hero__clip" loop autoplay muted>
                        <source src="../assets/video/DemoHiddenvideo.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="hero__inner">
                    <div class="hero__content">
                        <h1 class="heading hero__heading heading--underline"><?php echo $this->_tpl_vars['home_title']; ?>
</h1>
                        <div class="p hero__description"><?php echo $this->_tpl_vars['home_description']; ?>

                        </div>
                        <div class="hero__cta">
                            <a class="button-primary p" href="about-us.html" target="_blank">About Us</a>
                        </div>
                    </div>
                    <div class="hero__video-button">
                        <button class="hero-video__buton"><i class="fa fa-play" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <section class="hero hero--sub-title">
            <div class="hero__container">
                <figure class="figure hero__figure" style="background-image: url('/uploads/<?php echo $this->_tpl_vars['baner']['image']; ?>
')"></figure>
                <div class="hero__inner">
                    <h1 class="sub-heading hero__heading heading--underline"><?php echo $this->_tpl_vars['baner']['title']; ?>
</h1>
                    <div class="p hero__description"><?php echo $this->_tpl_vars['baner']['description']; ?>

                    </div>
                    <a class="button-primary p">Services</a>
                </div>
            </div>
        </section>
    </div>