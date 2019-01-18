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

