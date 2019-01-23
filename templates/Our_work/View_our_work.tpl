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
                    <!-- <div class="card-sub__item" data-aos="fade-up" onclick="load_our_work_media({$ourwork.id},'img');" > -->
                    <div class="card-sub__item" data-aos="fade-up" id="myBtn" >
                    <figure class="figure card-sub__figure" style="background-image: url('/uploads/')"></figure>
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


<!-- <div style="background: #807f7f" class="load_media">
    
</div> -->
<div id="myModal" class="modal-popup">
    <div class="modal-center">
    <!-- Modal content -->
        <div class="modal-media__content">
            <span class="close">&times;</span>
            <div class="modal-header">
                <h2 class="sub-heading">
                    KPOP LOVER FESTIVAL 2018
                </h2>
                <p class="p">A K-POP Dance Cover Contest for K-POP Fan Community</p>
            </div>
            <div class="modal-body toggle">
                <div class="panels">
                    <div class="row-col library tab-pane panel" id="video">
                        <div class="col-8">
                            <div class="library-box">
                                <iframe id="video-id" src="https://www.youtube.com/embed/4q7eL9Kvp1E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="library-list list-video">
                                <ul>
                                    <li data-link="https://www.youtube.com/embed/4q7eL9Kvp1E">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500 alt="">
                                        <span class=button-media><i class="fa fa-play"></i></span>
                                    </li>
                                    <li data-link="https://www.youtube.com/embed/Pk0yp3GdNss">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        <span class=button-media><i class="fa fa-play"></i></span>
                                    </li>
                                    <li data-link="https://www.youtube.com/embed/Pk0yp3GdNss">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        <span class=button-media><i class="fa fa-play"></i></span>
                                    </li>
                                    <li data-link="https://www.youtube.com/embed/TjmaTbRzGnQ">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        <span class=button-media><i class="fa fa-play"></i></span>
                                    </li>
                                    <li data-link="https://www.youtube.com/embed/Pk0yp3GdNss">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        <span class=button-media><i class="fa fa-play"></i></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row-col library tab-pane panel active" id="image">
                        <div class="col-8">
                            <div class="library-box">
                                <img id="id-img"src="http://wac.2f9ad.chicdn.net/802F9AD/u/joyent.wme/public/wme/assets/6128a9b2-7ada-11e6-96e0-8905cd656caf.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="library-list list-image">
                                <ul>
                                    <li data-link="https://hikingnewzealand.com/assets/Uploads/_resampled/ResizedImage500370-Eastern-Epic-Adventure-Safari-19.jpg">
                                        <img src="https://hikingnewzealand.com/assets/Uploads/_resampled/ResizedImage500370-Eastern-Epic-Adventure-Safari-19.jpg" alt="">
                                    </li>
                                    <li data-link="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                                        <img src="https://images.pexels.com/photos/236047/pexels-photo-236047.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                    </li>
                                    <li data-link="https://hikingnewzealand.com/assets/Uploads/_resampled/ResizedImage500370-Eastern-Epic-Adventure-Safari-19.jpg">
                                        <img src="https://hikingnewzealand.com/assets/Uploads/_resampled/ResizedImage500370-Eastern-Epic-Adventure-Safari-19.jpg" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="clearfix tabs nav-tabs modal-nav">
                    <li class="tab active">
                        <a href="#image">Image</a>
                    </li>
                    <li class="tab">
                        <a href="#video">Video</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

