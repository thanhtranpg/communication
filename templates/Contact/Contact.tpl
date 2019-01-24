<div class="page-contact">
    <section class="hero">
        <div class="hero__container">
            <figure id="demo-1" class="figure hero__figure" data-zs-src='[
            {foreach from=$banner.image name=slide key=key item=slide}
                {if $smarty.foreach.slide.last}
                    "/uploads/{$slide}" 
                {else}
                     "/uploads/{$slide}", 
                {/if}
            {/foreach}
            ]' data-zs-overlay="false" data-zs-bullets="false"  data-zs-interval= "20000" data-zs-speed= "8000" data-zs-switchSpeed= "800" ></figure>
            <div class="hero__inner">
                <h1 class="heading hero__heading heading--underline" data-aos="fade-up" data-aos-delay="300" data-item="1">{$banner.title}</h1>
                <div class="p hero__description" data-aos="fade-up" data-aos-delay="800">{$banner.description}
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
                        <div class="p block-address__description">{$email}</div>
                    </div>
                    <div class="block-address__detail">
                        <div class="sub-title block-address__sub-title">HOTLINE</div>
                        <div class="p block-address__description">{$hotline}</div>
                    </div>
                </div>
                <div class="block-address__col col-right">
                    <div class="sub-title block-address__sub-title">ADDRESS</div>
                    <div class="p block-address__description">{$address}</div>
                    
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
                    <div class="form-contact__footer" >
                        <button id="send_email_contact" class="button-secondary button-transform">
                            <span class="hover">SEND</span>
                            <span class="transform">SEND</span>
                            <span class="bg-hover"></span>
                        </button>
                    </div>
                </div>
                <div class="form-contact__col form-contact__col--right">
                    <div class="form-contact__block">
                        <div class="form-contact__social" data-aos="fade-up">
                            <a href="{$facebooklink}" target="_blank">
                                <div class="form-contact__icon">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                                <div class="p-bold p form-contact__name">
                                    Facebook
                                </div>
                            </a>
                        </div>
                        <div class="form-contact__social" data-aos="fade-up">
                            <a href="{$youtubelink}" target="_blank">
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
