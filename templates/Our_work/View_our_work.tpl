<div class="page-sub-work">
    <section class="hero">
        <div class="hero__container">
            <figure class="figure hero__figure" style="background-image: url('{insert name=getItemImage img=$ourwork_corver.image id=$ourwork_corver.id folder='ourwork' type='1680'}')"></figure>
            <div class="hero__inner">
                <h1 class="heading hero__heading heading--underline">{$banner.title}</h1>
                <div class="p hero__description">{$banner.description}
                </div>
            </div>
        </div>
    </section>
    <section class="card-title" data-aos="fade-up">
        <div class="card-title__container">
            <h3 class="sub-heading card-title__heading heading--underline">OUR WORKS IN {$banner.title}</h3>
            <div class="p card-title__description"></div>
        </div>
    </section>
    <div class="card-sub">
        <div class="small-container card-sub__container">
            <div class="card-sub__list">
            	{foreach from=$ourworks name=ourwork item=ourwork}
				    <div class="card-sub__item" data-aos="fade-up" onclick="load_our_work_media({$ourwork.id},'img');" >
                    <figure class="figure card-sub__figure" style="background-image: url('{insert name=getItemImage img=$ourwork.image id=$ourwork.id folder='ourwork' type='610'}')"></figure>
                    <div class="card-sub__inner">
                        <h5 class="card-sub__sub-title sub-link">{$ourwork.title}</h5>
                        
                    </div>
                </div>
				{/foreach}
            </div>
            <div class="">
                {$pagingData}
            </div>
        </div>
    </div>
</div>


<div style="background: #807f7f" class="load_media"></div>
