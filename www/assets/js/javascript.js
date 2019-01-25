AOS.init({
  duration: 1000,
  easing: 'ease-in'
});

var tag = document.createElement('script');
tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var tv,
youtube_id = $('#tv').attr('_youtubeID');
endSeconds = $('#tv').attr('_endSeconds');
$('#tv').attr('width',0);
$('#tv').attr('height',0);

playerDefaults = {autoplay: 1, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3, loop: 1,wmode: 'opaque'};
var vid = [
    {'videoId': youtube_id, 'startSeconds': 0, 'endSeconds': endSeconds, 'suggestedQuality': 'hd720'},

  ],
  randomVid = Math.floor(Math.random() * vid.length),
  currVid = randomVid;

function onYouTubePlayerAPIReady(){
  tv = new YT.Player('tv', {events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange}, playerVars: playerDefaults});
}

function onPlayerReady(){
  tv.loadVideoById(vid[currVid]);
  tv.mute();
  vidRescale();
}

function onPlayerStateChange(e) {
  $('#tv').addClass('active');
  if (e.data == 0) {
    tv.loadVideoById(vid[currVid]);
    tv.seekTo(vid[currVid].startSeconds);
    tv.playVideo();
  }
}

function vidRescale(){
  var w = $(window).width()+200,
    h = $(window).height()+200;

  if (w/h > 16/9){
    tv.setSize(w, w/16*9);
    $('.tv .screen').css({'left': '0px'});
  } else {
    tv.setSize(h/9*16, h);
    $('.tv .screen').css({'left': -($('.tv .screen').outerWidth()-w)/2});
  }
}

$(window).on('load resize', function(){
  vidRescale();
});

var yourNavigation = $(".header");
stickyDiv = "header__scroll";
yourHeader = $('.header').height();

$(window).scroll(function() {
  if( $(this).scrollTop() > yourHeader ) {
    yourNavigation.addClass(stickyDiv);
  } else {
    yourNavigation.removeClass(stickyDiv);
  }
});
;


// var lng = $("#list_images_8 img").length;
// $("#total_image_8").html(lng);
// $("#index_image_8").html("1");

$(document).ready(function() {
    // $(".flickity-button").click(function(){
    //   var index = $("#list_images_8").find('.is-selected').index();
    //   console.log(index);
    //   $("#index_image_8").html(index + 1);
    // });
    $(".flickity-button").click(function() {
    var card_side = $(this).parents().eq(2);
     var index = card_side.find('.is-selected').index();
      card_side.find('.current').text(index + 1);
});

$('.card__slide').each(function(e){
    var total = $(this).find('.card__item').length;
    $(this).find('.total').text(total);
    var current = $(this).find('.current').text(1);
});
$('.card__item').hover(function(){
   var card_side = $(this).parents().parents().parents().eq(2);
   console.log(card_side);
     var index = card_side.find('.is-selected').index();
      card_side.find('.current').text(index + 1);
});
});


var galleryElems = document.querySelectorAll('.carousel');
for ( var i=0, len = galleryElems.length; i < len; i++ ) {
  var galleryElem = galleryElems[i];
  var galleryItem = document.querySelectorAll('.card__item');
  console.log(galleryItem.length)
  new Flickity( galleryElem, {
    wrapAround: true,
    contain: true,
  });
}




// tab

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
		$('#video-id').attr('src', link);
  });
  $('.list-image li').click(function(event) {
		/* Act on the event */
		var link = $(this).attr('data-link');
		$('#id-img').attr('src', link);
	});
});


var $allVideos = $("iframe[src^='//www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = $("body");

// Figure out and save aspect ratio for each video
$allVideos.each(function() {

  $(this)
    .data('aspectRatio', this.height / this.width)

    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');

});

// When the window is resized
$(window).resize(function() {

  var newWidth = $fluidEl.width();

  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {

    var $el = $(this);
    $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));

  });

// Kick off one resize to fix all videos on page load
}).resize();