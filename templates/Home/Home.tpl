
<div class="page-home">
        <section class="hero hero--video">
            <div class="hero__container">
                <figure class="figure hero__figure" style="background-image: url('/www/assets/imgs/Festival/MaskGroup47.png')"></figure>
                <div class="hero__video">
                    <div class="tv">
                        <div class="screen mute" id="tv" _youtubeID="Zr1jAVkYOV4" _endSeconds="30" ></div>
                        {*<iframe class="hero__clip" src="https://www.youtube.com/embed/DWgmCN4ms74?autoplay=1&mute=1&loop=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"  allowFullScreen="allowFullScreen">*}

                        {*</iframe>*}
                    </div>
                </div>
                <div class="hero__inner">
                    <div class="hero__content">
                        <h1 class="heading hero__heading heading--underline">{$home_title}</h1>
                        <div class="p hero__description">{$home_description}
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
                <figure class="figure hero__figure" style="background-image: url('/uploads/{$banner.image}')"></figure>
                <div class="hero__inner">
                    <h1 class="sub-heading hero__heading heading--underline">{$banner.title}</h1>
                    <div class="p hero__description">{$banner.description}
                    </div>
                    <a href="" class="button-primary p">Services</a>
                </div>
            </div>
        </section>
        {foreach from=$ourwork_cat name=ourwork item=ourwork}
        <section class="card {if $smarty.foreach.ourwork.iteration % 2 == 0} card--left-img {/if}" >
            <div class="card__container">
                <div class="card__row">
                    <div class="card__col card__col--left" data-aos="fade-up">
                        <h5 class="sub-heading card__heading heading--underline">{$ourwork.title}</h5>
                        <div class="card__description p">{$ourwork.description}</div>
                        <div class="card__footer">
                            <a class="button-primary" href="{$ourwork.href}">OUR WORKS</a>
                        </div>
                    </div>
                    <div class="card__col card__col--right" data-aos="fade-up">
                        <div class="card__col-header">
                            <p class="label">Our works</p>
                            <span class="red-bar"></span>
                        </div>
                        <div class="card__slide">
                            <div class="card__hide-bg">
                                <figure class="figure card__bg-figure" style="background-image: url('https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500')"></figure>
                            </div>
                            <div class="card__block-slide">
                                <div class="card__list carousel" data-flickity>
                                    <div class="card__item carousel-cell">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                                        {*<figure class="figure card__figure" style="background-image: url('https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500')"></figure>*}
                                    </div>
                                    <div class="card__item carousel-cell">
                                        <img src="https://www.w3schools.com/w3css/img_lights.jpg" />
                                        {*<figure class="figure card__figure" style="background-image: url('https://www.w3schools.com/w3css/img_lights.jpg')"></figure>*}
                                    </div>
                                    <div class="card__item carousel-cell">
                                        <img src="https://images.pexels.com/photos/257360/pexels-photo-257360.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
                                        {*<figure class="figure card__figure" style="background-image: url('https://images.pexels.com/photos/257360/pexels-photo-257360.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500')"></figure>*}
                                    </div>
                                </div>
                            </div>
                            <div class="card__block-footer">
                                <div class="card__number">
                                    <span class="number">3</span>/<span class="number">9</span>
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
                        <div class="form-contact__col form-contact__col--left" data-aos="fade-up">
                            <h5 class="form-contact__heading sub-heading heading--underline">CONTACT US</h5>
                            <div class="message_email"></div>
                            <form class="form-contact__form">
                                <input class="form-input form-contact__input" placeholder="Full Name" name="txtName" id="txtName" required/>
                                <input class="form-input form-contact__input" placeholder="Email Address" name="txtEmail" id="txtEmail" required />
                                <input class="form-input form-contact__input" placeholder="Company/Organization" name="txtCompany" id="txtCompany" required />
                                <textarea class="form-textarea form-contact__textarea" rows="8" name="txtDetail" id="txtDetail" required >Project Detail</textarea>
                            </form>
                            <div class="form-contact__footer"">
                                <button class="button-secondary" id="send_email_contact" >SEND</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
