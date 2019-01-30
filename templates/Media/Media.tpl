<div class="modal-center">
    <!-- Modal content -->
        <div class="modal-media__content">
            <span class="close" id="close_media">&times;</span>
            <div class="modal-header">
                <h2 class="sub-heading2">
                    {$ourwork.title}
                </h2>
                <p class="p-small media_title">{$first_img.title}</p>
            </div>
            <div class="modal-body toggle">
                <div class="panels">
                    <div class="row-col library tab-pane panel" id="video">
                        <div class="col-8">
                            <div class="library-box videoWrapper">
                            	{if $first_video}
                                <iframe data-link="{$first_video.title}" id="video-id" src="https://www.youtube.com/embed/{$first_video.media}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {else}
                            	<img src="/images/nodata.jpg" data-link="" alt="">
                            	{/if}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="library-list list-video">
                                <ul>
                                	{foreach from=$arr_video name=video item=video}
                                    <li data-link="https://www.youtube.com/embed/{$video.media}" data-title="{$video.title}">
                                        <img src="https://img.youtube.com/vi/{$video.media}/0.jpg" alt="" >
                                        <span class=button-media><i class="fa fa-play"></i></span>
                                    </li>
                                    {/foreach}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row-col library tab-pane panel active" id="image">
                        <div class="col-8">
                            <div class="library-box videoWrapper">
                            	{if $first_img}
                                <img id="id-img"src="{insert name=getItemImage img=$first_img.media id=$first_img.id folder='ourwork_image' type='1680'}" data-link="{$first_img.title}" alt="">
                            	{else}
                            	<img src="/images/nodata.jpg" data-link="" alt="">
                            	{/if}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="library-list list-image">
                                <ul>
                                {foreach from=$our_work_img name=img item=img}
                                    <li data-link="{insert name=getItemImage img=$img.media id=$img.id folder='ourwork_image' type='1680'}" data-title="{$img.title}" >
                                        <img src="{insert name=getItemImage img=$img.media id=$img.id folder='ourwork_image' type='610'}" alt="">
                                    </li>
                                {/foreach}
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="clearfix tabs nav-tabs modal-nav">
                    <li class="tab tab_image active">
                        <a href="javascript:changetab('tab_image');">Image</a>
                    </li>
                    <li class="tab tab_video">
                        {if $first_video}
                        <a href="javascript:changetab('tab_video');">Video</a>
                        {else}
                        <a href="javascript:void(0);">Video</a>
                        {/if}
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {literal}
    <script type="text/javascript">
    	window.onclick = function(event) {
    		var modal_media = document.getElementById('myModalMedia');

		  if (event.target == modal_media) {
		     modal_media.style.display = "none";
		  }
		}
    	$('#close_media').click(function(){
		    $('#myModalMedia').hide();
		 })
    	function changetab(tabClickEvent){
    		console.log(tabClickEvent);
			var myTabs = document.querySelectorAll("ul.nav-tabs > li");
			$("ul.nav-tabs > li").removeClass('active');
			$("."+ tabClickEvent ).addClass('active');
			$(".tab-pane").removeClass('active');
			if(tabClickEvent == 'tab_video'){
				$("#video").addClass('active');
			}else{
				$("#image").addClass('active');
			}
			
		    
    	}
  window.addEventListener("load", function() {
  // store tabs variable
	  var myTabs = document.querySelectorAll("ul.nav-tabs > li");
	  function myTabClicks(tabClickEvent) {
	    for (var i = 0; i < myTabs.length; i++) {
	      myTabs[i].classList.remove("active");
	    }
	    var clickedTab = tabClickEvent.currentTarget;
	    clickedTab.classList.add("active");
	    tabClickEvent.preventDefault();
	    var myContentPanes = document.querySelectorAll(".tab-pane");
	    for (i = 0; i < myContentPanes.length; i++) {
	      myContentPanes[i].classList.remove("active");
	    }
	    var anchorReference = tabClickEvent.target;
	    var activePaneId = anchorReference.getAttribute("href");
	    var activePane = document.querySelector(activePaneId);
	    activePane.classList.add("active");
	  }
	  for (i = 0; i < myTabs.length; i++) {
	    myTabs[i].addEventListener("click", myTabClicks)
	  }
});


$(document).ready(function(){
  $('.list-video li').click(function(event) {
    /* Act on the event */
    var link = $(this).attr('data-link');
    var title = $(this).attr('data-title');
    $('.media_title').html(title);
    $('#video-id').attr('src', link);
  });
  $('.list-image li').click(function(event) {
    /* Act on the event */
    var link = $(this).attr('data-link');
    var title = $(this).attr('data-title');
    $('.media_title').html(title);
    $('#id-img').attr('src', link);
  });
});
    </script>
    {/literal}