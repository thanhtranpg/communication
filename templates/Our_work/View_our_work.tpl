<div class="page-sub-work">
    <section class="hero">
        <div class="hero__container">
            <figure id="demo-1" class="figure hero__figure" data-zs-src='[
            {foreach from=$ourworks name=slide key=key item=slide}
                {if $smarty.foreach.slide.last}
                    "{insert name=getItemImage img=$slide.image id=$slide.id folder='ourwork' type='1680'}" 
                {else}
                     "{insert name=getItemImage img=$slide.image id=$slide.id folder='ourwork' type='1680'}", 
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
                    <!-- <div class="card-sub__item" data-aos="fade-up" onclick="load_our_work_media({$ourwork.id},'img');  id="myBtn"" > -->
                    <div style="cursor: pointer;" class="card-sub__item" data-aos="fade-up" onclick="load_our_work_media({$ourwork.id},'img');" >
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
            <div class="tabs" style="padding: 0px; margin: 0px; margin-top: 40px;margin-bottom: 20px " data-aos="fade-up">
                <div class="small-container tabs__container" style="max-width: 100%">
                  <span class="tabs__name " >
                      <a href="{$ourwork_link}" class="link-menu" >All</a>
                  </span>
                  {foreach from=$ourwork_cats name=ourwork_cat item=ourwork_cat}
                    <span class="tabs__name {if $catid == $ourwork_cat.catid} tabs__name--active {/if}" >
                      <a href="{$ourwork_cat.href}"  class="link-menu" >{$ourwork_cat.title}</a>
                    </span>
                {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div style="background: #807f7f" class="load_media">
    
</div> -->


