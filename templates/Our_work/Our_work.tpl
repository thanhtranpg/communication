<div class="page-work">
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
        <div class="tabs">
            <div class="small-container tabs__container">
              <span class="tabs__name tabs__name--active" data-aos="fade-up">
                  <a href="{$ourwork_link}" class="link-menu" >All</a>
              </span>
              {foreach from=$ourwork_cats name=ourwork_cat item=ourwork_cat}
                <span class="tabs__name" data-aos="fade-up">
                  <a href="{$ourwork_cat.href}"  class="link-menu" >{$ourwork_cat.title}</a>
                </span>
            {/foreach}
            </div>
        </div>
<div class="tab-content">
    <div class="small-container tab-content__container">
        <div class="tab-content__list" id="content_our_works">
          
        </div>
    </div>
</div>

{literal}
<script type="text/javascript">
	$( document ).ready(function() {
    	load_our_work('',0,5);
	});
	function load_pop_up(a){
		alert(a);
	}
	function load_our_work_more(catid,start,limit,a) {
		$('.bt_load_more_our_work').hide();
		load_our_work(catid,start,limit);
	}
	function load_our_work(catid,start,limit){
      $.ajax({
    	   type:"POST",
    	   data:{'catid': catid , 'start' : start , 'limit' : limit },
    	   url:"modules/Ajax/loadOurWork.php",
    	   dataType:"html",
    	   success:function(data){
      		  $('#content_our_works').append(data);
      	   }									
  	   });		
	}
</script>
{/literal}