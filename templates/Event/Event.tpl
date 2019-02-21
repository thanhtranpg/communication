{if $our_clients.1.image}
<div class="page-upcoming-event">
    <section class="hero-image">
        <div class="hero-image__container">
            <figure class="figure hero-image__figure" style="background: #000"></figure>
            <div class="hero-image__inner" id="evets_id" _id="1" >
                <a href="javascript:void(0);" id="event_prev" onclick="change_event('prev')" ><i class="fa fa-caret-left" aria-hidden="true" style="float: left;" ></i>
                </a>
                <figure class="figure hero-image__sub-figure" id="event_image" style="background-image: url('/uploads/{$our_clients.1.image}')"></figure>
                <a id="event_next" href="javascript:void(0);" onclick="change_event('next')" style="float: right;" ><i class="fa fa-caret-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
    <section class="block-event">
        <div class="small-container block-event__container">
            <h3 class="sub-heading block-event__heading heading--underline"  data-aos="fade-up" id = "event_title">
                {$our_clients.1.title}
            </h3>
            <div class="p block-event__description"  data-aos="fade-up" id = "event_description">
                {$our_clients.1.description}
            </div>
            <div class="block-event__footer"  data-aos="fade-up">
                <button class="button-secondary button-transform" id = "event_link" _link = "{$our_clients.1.link}" onclick="redirectjs();">
                    <span class="hover">SEE MORE</span>
                    <span class="transform">SEE MORE</span>
                    <span class="bg-hover"></span>
                </button>
            </div>
        </div>
    </section>
</div>
{literal}
<script type="text/javascript">
var datas = {/literal} {$datas_js} {literal};
if(Object.keys(datas).length == 1){
    $('#event_prev').hide();
    $('#event_next').hide();
}
function redirectjs(){
    var link = $('#event_link').attr('_link');
    window.location.href = link;
}
function change_event(action){
    var current_id = $('#evets_id').attr('_id');
    var len = Object.keys(datas).length;
    
    if( action == 'prev'){
        current_id --;
        if( current_id <= 0 ){
            current_id = len;
        }
    }else{
        current_id ++;
        if( current_id > len ){
            current_id = 1;
        }
    }
    var data = datas[current_id];
    $('#event_title').html(data.title);
    $('#event_description').html(data.description);
    $('#event_image').attr('style',"background-image: url('/uploads/"+data.image+"')");
    $('#event_link').attr('_link',data.link);
    $('#evets_id').attr('_id',current_id);

}

</script>
{/literal}

{else}
<div class="page-upcoming-event">
    <section class="hero-image">
        <div class="hero-image__container">
            <figure class="figure hero-image__figure" style="background-image: url('/uploads/{$banner.image}')"></figure>
            
        </div>
    </section>
    <section class="block-event">
        <div class="small-container block-event__container">
            <h3 class="sub-heading block-event__heading heading--underline"  data-aos="fade-up" >
                0 Upcoming Events
            </h3>
            <div class="p block-event__description"  data-aos="fade-up" >
                Connect with us on our social medias for more updates
            </div>
            <div class="block-event__footer"  data-aos="fade-up">
                <button class="button-secondary button-transform"  onclick="window.location.href ='{$facebooklink}'">
                    <span class="hover">SEE MORE</span>
                    <span class="transform">SEE MORE</span>
                    <span class="bg-hover"></span>
                </button>
            </div>
        </div>
    </section>
</div>
{/if}

