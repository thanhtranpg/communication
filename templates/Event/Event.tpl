<div class="page-upcoming-event">
    <section class="hero-image">
        <div class="hero-image__container">
            <figure class="figure hero-image__figure" style="background-image: url('/uploads/{$banner.image}')"></figure>
            <div class="hero-image__inner">
                <figure class="figure hero-image__sub-figure" style="background-image: url('/uploads/{$banner.image}')"></figure>
            </div>
        </div>
    </section>
    <section class="block-event">
        <div class="small-container block-event__container">
            <h3 class="sub-heading block-event__heading heading--underline"  data-aos="fade-up">
                {$banner.title}
            </h3>
            <div class="p block-event__description"  data-aos="fade-up">
                {$banner.description}
            </div>
            <div class="block-event__footer"  data-aos="fade-up">
                <button class="button-secondary" onclick="window.location.href = '{$banner.link}';">SEE MORE</button>
            </div>
        </div>
    </section>
</div>

