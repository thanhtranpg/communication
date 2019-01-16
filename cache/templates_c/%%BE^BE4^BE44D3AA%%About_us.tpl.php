<?php /* Smarty version 2.6.26, created on 2019-01-16 05:46:37
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/About_us/About_us.tpl */ ?>
</br>
</br>
</br>
<div class="page-about-us">
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
    <section class="card-title" data-aos="fade-up">
        <div class="card-title__container">
            <h3 class="sub-heading card-title__heading heading--underline">OUR MISSIONS</h3>
            <div class="p card-title__description">
                Create values for clients
                Enhance capacity for staffs.
            </div>
        </div>
    </section>
    <section class="gallery">
        <div class="gallery__container">
            <div class="gallery__row">
                <div class="gallery__col" data-aos="fade-up">
                    <figure class="figure gallery__figure" style="background-image: url('/www/assets/imgs/AboutUs/MaskGroup45.png')">
                    </figure>
                </div>
                <div class="gallery__col" data-aos="fade-up">
                    <div class="gallery__row">
                        <div class="gallery__col">
                            <figure class="figure gallery__figure" style="background-image: url('/www/assets/imgs/AboutUs/MaskGroup48.png')">
                            </figure>
                        </div>
                        <div class="gallery__col" data-aos="fade-up">
                            <figure class="figure gallery__figure" style="background-image: url('/www/assets/imgs/AboutUs/MaskGroup49.png')">
                            </figure>
                        </div>
                    </div>
                    <div class="gallery__row" data-aos="fade-up">
                        <div class="gallery__col-100 gallery__figure--active">
                            <figure class="figure gallery__figure" style="background-image: url('/www/assets/imgs/AboutUs/MaskGroup47.png')">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="card-value">
        <div class="card-value__container">
            <div class="card-value__inner">
                <div class="card-value__heading" data-aos="fade-up">
                    <h3 class="sub-heading">OUR VALUES</h3>
                </div>
                <div class="card-value__content">
                    <div class="card-value__block" data-aos="fade-up">
                        <figure class="card-value__figure small-img" style="background-image: url('/www/assets/imgs/AboutUs/Icon/care.png')"></figure>
                        <h5 class="card-value__title sub-title">
                            CUSTOMER CARE
                        </h5>
                        <div class="p card-value__description">
                            We take ultimate care for our customers
                        </div>
                    </div>
                    <div class="card-value__block" data-aos="fade-up">
                        <figure class="card-value__figure small-img" style="background-image: url('/www/assets/imgs/AboutUs/Icon/deli.png')"></figure>
                        <h5 class="card-value__title sub-title">
                            DELIVERING RESULTS
                        </h5>
                        <div class="p card-value__description">
                            Actual deliverables of a any projects we implement have always gone far beyond the planned deliverables
                        </div>
                    </div>
                    <div class="card-value__block" data-aos="fade-up">
                        <figure class="card-value__figure small-img" style="background-image: url('/www/assets/imgs/AboutUs/Icon/cost.png')"></figure>
                        <h5 class="card-value__title sub-title">
                            COST EFFECTIVE
                        </h5>
                        <div class="p card-value__description">
                            We can help save the “pocket” for our customers through applying the smartest and the most cost effective methods
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="card-client">
        <div class="card-client__container">
            <h3 class="card-client__heading sub-heading heading--underline" data-aos="fade-up">OUR CLIENTS</h3>
            <div class="card-client__list">
                <?php $_from = $this->_tpl_vars['our_clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['client'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['client']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['client']):
        $this->_foreach['client']['iteration']++;
?>
                    <div class="card-client__item" data-aos="fade-up"  onclick="window.open('/uploads/<?php echo $this->_tpl_vars['client']['link']; ?>
', '_blank');">
                        <figure class="figure card-client__figure" style="background-image: url('/uploads/<?php echo $this->_tpl_vars['client']['image']; ?>
')"></figure>
                    </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    </section>
</div>