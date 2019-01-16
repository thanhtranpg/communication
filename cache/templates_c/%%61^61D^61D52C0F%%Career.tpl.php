<?php /* Smarty version 2.6.26, created on 2019-01-16 05:36:11
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/Career/Career.tpl */ ?>
<div class="page-careers">
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
    <section class="card-job">
        <div class="small-container card-job__container">
            <h3 class="card-job__heading sub-heading heading--underline"  data-aos="fade-up">OPEN POSITIONS</h3>
            <div class="card-job__list">
                <?php $_from = $this->_tpl_vars['careers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['career'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['career']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['career']):
        $this->_foreach['career']['iteration']++;
?>
                    <div class="card-job__item"  data-aos="fade-up">
                        <figure class="figure card-job__figure" style="background-image: url('../assets/imgs/Careers/Picture1.png')"></figure>
                        <div class="card-job__inner">
                            <h5 class="card-job__sub-title sub-title"><?php echo $this->_tpl_vars['career']['title']; ?>
</h5>
                            <div class="p card-job__location"><?php echo $this->_tpl_vars['career']['address']; ?>
</div>
                            <button class="card-job__button button-primary" onclick="window.open('/uploads/<?php echo $this->_tpl_vars['career']['image']; ?>
', '_blank');">JOB DESCRIPTION</button>
                        </div>
                    </div>
                <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>
    </section>
    <section class="form-job">
        <div class="small-container form-job__container">
            <h1 class="heading heading--underline form-job__heading" data-aos="fade-up">SEND US A MESSAGE</h1>
            <div id="message_email" class="message_email"></div>
            
            <form class="form-job__form" data-aos="fade-up" method="post">
                <input class="form-input form-job__input" placeholder="Name" name="txtName" id="txtName" required/>
                <input class="form-input form-job__input" placeholder="E-mail Addresss" name="txtEmail" id="txtEmail" required/>
                <textarea class="form-textarea form-job__textarea" rows="10" name="txtDetail" id="txtDetail" required>Your message here</textarea>
            </form>
            <div class="form-job__footer" data-aos="fade-up">
                <button class="button-secondary" id="send_email_career">SEND</button>
            </div>
        </div>
    </section>
</div>