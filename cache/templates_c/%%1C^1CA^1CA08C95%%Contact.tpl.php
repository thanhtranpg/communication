<?php /* Smarty version 2.6.26, created on 2019-01-16 05:44:26
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Contact/Contact.tpl */ ?>
<div class="page-contact">
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
    <div class="block-address" data-aos="fade-up">
        <div class="container block-address__container">
            <div class="block-address__row">
                <div class="block-address__col col-left">
                    <div class="block-address__detail">
                        <div class="sub-title block-address__sub-title">E-MAIL</div>
                        <div class="p block-address__description"><?php echo $this->_tpl_vars['email']; ?>
</div>
                    </div>
                    <div class="block-address__detail">
                        <div class="sub-title block-address__sub-title">HOTLINE</div>
                        <div class="p block-address__description"><?php echo $this->_tpl_vars['hotline']; ?>
</div>
                    </div>
                </div>
                <div class="block-address__col col-right">
                    <div class="sub-title block-address__sub-title">ADDRESS</div>
                    <div class="p block-address__description"><?php echo $this->_tpl_vars['address']; ?>
</div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="form-contact">
        <div class="container form-contact__container">
            <div class="form-contact__row">
                <div class="form-contact__col form-contact__col--left" data-aos="fade-up">
                    <h5 class="form-contact__heading sub-heading heading--underline">CONTACT US</h5>
                    <div class="message_email"></div>
                    <form class="form-contact__form">
                        <input type="hidden" name="form_block" value="Contact">
                        <input class="form-input form-contact__input" placeholder="Full Name" name="txtName" id="txtName" required />
                        <input class="form-input form-contact__input" placeholder="Email Address" name="txtEmail" id="txtEmail" required />
                        <input class="form-input form-contact__input" placeholder="Company/Organization" name="txtCompany" id="txtCompany" required />
                        <textarea class="form-textarea form-contact__textarea" rows="8" name="txtDetail" id="txtDetail" required >Project Detail</textarea>
                    </form>
                    <div class="form-contact__footer" data-aos="fade-up">
                        <button class="button-secondary" id="send_email_contact" >SEND</button>
                    </div>
                </div>
                <div class="form-contact__col form-contact__col--right">
                    <div class="form-contact__block">
                        <div class="form-contact__social" data-aos="fade-up">
                            <a href="<?php echo $this->_tpl_vars['facebooklink']; ?>
" target="_blank">
                                <div class="form-contact__icon">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                                <div class="p-bold p form-contact__name">
                                    Facebook
                                </div>
                            </a>
                        </div>
                        <div class="form-contact__social" data-aos="fade-up">
                            <a href="<?php echo $this->_tpl_vars['youtubelink']; ?>
" target="_blank">
                                <div class="form-contact__icon">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </div>
                                <div class="p-bold p form-contact__name">
                                    Youtube
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>