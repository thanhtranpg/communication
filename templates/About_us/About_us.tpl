<div class="page-about-us">
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
                <div class="p hero__description" data-aos="fade-up" data-item="2" data-aos-delay="800">{$banner.description}
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
                {foreach from=$our_clients name=client item=client}
                    <div style="cursor: pointer;" class="card-client__item" data-aos="fade-up"  onclick="window.open('{$client.link}', '_blank');">
                        <figure class="figure card-client__figure" style="background-image: url('/uploads/{$client.image}')"></figure>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>
</div>