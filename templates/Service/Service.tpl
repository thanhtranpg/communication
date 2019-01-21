<div class="page-service">
    <section class="hero">
        <div class="hero__container">
            <figure class="figure hero__figure" style="background-image: url('uploads/{$banner.image}')"></figure>
            <div class="hero__inner">
                <h1 class="heading hero__heading heading--underline" data-aos="fade-up">{$banner.title}</h1>
                <div class="p hero__description" data-aos="fade-up">{$banner.description}
                </div>
            </div>
        </div>
    </section>
    <section class="card-title" data-aos="fade-up">
        <div class="card-title__container">
            <h3 class="sub-heading card-title__heading heading--underline">EVENT & ACTIVATION</h3>
            <div class="p card-title__description">
                We provide our clients with various BTL services of event  management.
                At ST Communications, we attach ultimate care and highest caution to
                any project that we implement.
            </div>
        </div>
    </section>
    <section class="card-service">
        <div class="card-service__container">
            <div class="card-service__list">
            	{foreach from=$ourwork_cat name=ourwork item=ourwork}
					<div class="card-service__item" data-aos="fade-up">
                    <a href="{$ourwork.href}" >
                        <figure class="card-service__figure small-img" style="background-image: url('/uploads/{$ourwork.image}')"></figure>
                        <h5 class="card-service__title sub-title">
                            {$ourwork.title}
                        </h5>
                    </a>
                </div>
				{/foreach}
            </div>
        </div>
    </section>
</div>