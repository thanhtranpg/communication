<div class="page-careers">
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
            <div class="hero__inner" >
                <h1 class="heading hero__heading heading--underline" data-aos="fade-up" data-aos-delay="300" data-item="1">{$banner.title}</h1>
                <div class="p hero__description" data-aos="fade-up" data-aos-delay="800">{$banner.description}
                </div>
            </div>
        </div>
    </section>
    <section class="card-job">
        <div class="small-container card-job__container">
            <h3 class="card-job__heading sub-heading heading--underline" data-aos="fade-up">OPEN POSITIONS</h3>
            <div class="card-job__list">
                {foreach from=$careers name=career item=career}
                    <div class="card-job__item" data-aos="fade-up">
                        <figure class="figure card-job__figure" style="background-image: url('../assets/imgs/Careers/Picture1.png')"></figure>
                        <div class="card-job__inner">
                            <h5 class="card-job__sub-title sub-title">{$career.title}</h5>
                            <div class="p card-job__location">{$career.address}</div>
                            <button class="card-job__button button-primary" onclick="window.open('/uploads/{$career.image}', '_blank');">JOB DESCRIPTION</button>
                        </div>
                    </div>
                {/foreach}
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
                <button id="send_email_career" class="button-secondary button-transform">
                    <span class="hover">SEND</span>
                    <span class="transform">SEND</span>
                    <span class="bg-hover"></span>
                </button>
            </div>
        </div>
    </section>
</div>
