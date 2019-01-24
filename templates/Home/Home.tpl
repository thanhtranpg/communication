<script src="/www/assets/dist/video.popup.js?v=<?php echo CGlobal::$version; ?>"></script>
{literal}
<script>
            $(function(){
                $("#video").videoPopup({
                    autoplay: 1,
                    controlsColor: 'white',
                    showVideoInformations: 0,
                    width: 1000,
                    customOptions: {
                        rel: 0,
                        end: 60
                    }
                });
                $("#video2").videoPopup();
            });
        </script>
{/literal}

<div class="page-home">
        <section class="hero hero--video">
            <div class="hero__container">
                <figure class="figure hero__figure" style="background-image: url('/www/assets/imgs/Festival/MaskGroup47.png')"></figure>
                <div class="hero__video"> 
                    <div class="tv">
                        <div class="screen mute" id="tv" _youtubeID="{$youtube_id_background}" _endSeconds="{$endSecond}" ></div>
                    </div>
                </div>
                <div class="hero__inner" >
                    <div class="hero__content" data-aos="fade-up">
                        <h1 class="heading hero__heading heading--underline" >{$home_title}</h1>
                        <div class="p hero__description" >{$home_description}
                        </div>
                        <div class="hero__cta" >
                            <a  href="{$about_link}" class="button-primary p button-transform">
                                <span class="hover">About Us</span>
                                <span class="transform">About Us</span>
                                <span class="bg-hover"></span>
                            </a>
                        </div>
                    </div>
                    <div class="hero__video-button">
                        <button class="hero-video__buton" id="video" video-url="https://www.youtube.com/watch?v={$youtube_id_play}"><i class="fa fa-play" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <section class="hero hero--sub-title">
            <div class="hero__container">
                <figure class="figure hero__figure" style="background-image: url('/uploads/{$banner.image}')"></figure>
                <div class="hero__inner">
                    <h1 class="sub-heading hero__heading heading--underline" data-aos="fade-up" data-aos-delay="300" data-item="1">{$banner.title}</h1>
                    <div class="p hero__description" data-aos="fade-up" data-item="2" data-aos-delay="800">{$banner.description}
                    </div>
                    <a  href="{$service_link}" class="button-primary p button-transform" data-aos="fade-up" data-item="2" data-aos-delay="800">
                        <span class="hover">Services</span>
                        <span class="transform">Services</span>
                        <span class="bg-hover"></span>
                    </a>
                </div>
            </div>
        </section>
        {foreach from=$ourwork_cat name=ourwork key=i item=ourwork}
        <section class="card {if $smarty.foreach.ourwork.iteration % 2 == 0} card--left-img {/if}" >
            <div class="card__container">
                <div class="card__row">
                    <div class="card__col card__col--left" data-aos="fade-up">
                        <h5 class="sub-heading card__heading heading--underline">{$ourwork.title}</h5>
                        <div class="card__description p">{$ourwork.description}</div>
                        <div class="card__footer">
                        <a   href="{$ourwork.href}" class="button-primary button-transform">
                            <span class="hover">OUR WORKS</span>
                            <span class="transform">OUR WORKS</span>
                            <span class="bg-hover"></span>
                        </a>
                        </div>
                    </div>
                    <div class="card__col card__col--right" data-aos="fade-up">
                        <div class="card__col-header">
                            <p class="label">Our works</p>
                            <span class="red-bar"></span>
                        </div>
                        <div class="card__slide">
                            <div class="card__block-slide">
                                <div class="card__list carousel" id="list_images_{$i}"  data-flickity>
                                    {foreach from=$ourwork.ourworks item=image}
                                        <div class="card__item carousel-cell">
                                            <img src="{insert name=getItemImage img=$image.image id=$image.id folder='ourwork' type='610'}" />
                                            
                                        </div>
                                    {/foreach}
                                    
                                </div>
                            </div>
                            <div class="card__block-footer">
                                <div class="card__number">
                                    <span class="number current" id="index_image_{$i}"></span>/<span class="number total" id="total_image_{$i}">9</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {/foreach}

        <section class="form-home">
            <figure class="figure form-home__figure" style="background-image: url('../../www/assets/imgs/OurWorks/Demo hover BCSV.png')"></figure>
            <div class="form-contact form-contact--home">
                <div class="container form-contact__container">
                    <div class="form-contact__content">
                        <div class="form-contact__col form-contact__col--left" >
                            <h5 class="form-contact__heading sub-heading heading--underline" data-aos="fade-up">CONTACT US</h5>
                            <div class="message_email"></div>
                            <form class="form-contact__form">
                                <input class="form-input form-contact__input" placeholder="Full Name" name="txtName" id="txtName" required/>
                                <input class="form-input form-contact__input" placeholder="Email Address" name="txtEmail" id="txtEmail" required />
                                <input class="form-input form-contact__input" placeholder="Company/Organization" name="txtCompany" id="txtCompany" required />
                                <textarea class="form-textarea form-contact__textarea" rows="8" name="txtDetail" id="txtDetail" required >Project Detail</textarea>
                            </form>
                            <div class="form-contact__footer">
                                <button id="send_email_contact" class="button-secondary button-transform">
                                    <span class="hover">SEND</span>
                                    <span class="transform">SEND</span>
                                    <span class="bg-hover"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



