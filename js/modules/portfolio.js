function runnerportfolio() {

  var location = getParameterByName('service_id');

  $(window).scrollTop(0);

    if(windoww < dt) {
      if(location == 'properties') {
        setTimeout(function(){
          $('#featured-header').velocity('scroll', {offset: -($('header').height())});
        }, ts/ 2)
      }

    } else {
      if(location == 'properties') {
        $('#property-carousel').addClass('__activated');
      } else {
        $('#dt-map').addClass('__activated');
      }
    }




  if(windoww >= dt) {
    $('.carousel .slide').width((windoww / 7));
  } else {
    $('.carousel .slide').removeAttr('style');
  }
  $(window).resize(function(){
    if(windoww >= dt) {
      $('.carousel .slide').width(windoww / 7);
    } else {
      $('.carousel .slide').removeAttr('style');
    }
  });

  if(windoww >= dt) {


    $('.carousel').slick({
      slidesToShow: 7,
      infinite: false,
      edgeFriction: 0
    }).addClass('_carousel-activated');
  }
  $(window).resize(function(){
    if(windoww < dt) {
      $('.carousel').slick('unslick');
    } else {
      if($('.carousel').hasClass('_carousel-activated') == false) {



        $('.carousel').slick({
          slidesToShow: 7,
          infinite: false,
          edgeFriction: 0
        }).addClass('_carousel-activated');
      }
    }
  });


  //LOCATIONS MAP
  $('#dt-map img.main-img').attr('src', $('#dt-map img.main-img').data('src'));
  $('#dt-map img.main-img').load(function(){
    $(this).closest('.container').addClass('__activated');
    dotPositioner();
    aspecter();
  });
  var sizeChecker = setInterval(function(){
    var iw = $('#dt-map img.main-img').width();
    var ih = $('#dt-map img.main-img').height();
    if(iw > 0 || ih > 0) {
      dotPositioner();
      aspecter();
      clearInterval(sizeChecker);
    }
  }, 10);
  dotPositioner();
  $(window).resize(function(){
    dotPositioner();
  });

  function dotPositioner() {
    if(windoww >= dt) {

      var holderX = $('#dt-map .holder').offset().left,
          holderY =$('#dt-map .holder').offset().top,
          imgX = $('#dt-map img.main-img').offset().left,
          imgY = $('#dt-map img.main-img').offset().top,
          imgW = $('#dt-map img.main-img').width(),
          imgH = $('#dt-map img.main-img').height();
      $('#dt-map .apparatus').css({
        left : (imgX - holderX)+'px',
        top : (imgY - holderY)+'px',
        width : imgW+'px',
        height : imgH+'px'
      });
    }
  }



}

$(document).on('mouseenter','#dt-map .dot', function(){
  //$(this).addClass('__hovering').removeClass('__not-hovering');
  var theDot = $(this);
  dotActivator(theDot);
});

function dotActivator(dot){
if($(dot).hasClass('animating-in') === false && $(dot).hasClass('animating-out') === false && $(dot).hasClass('__activated') === false) {
  $(dot).addClass('animating-in')
        .addClass('__hovering')
        .removeClass("__not-hovering")
        .addClass('__activated');
  setTimeout(function(){
    if($(dot).hasClass('animating-in') == true) {
      $(dot).find('.info').fadeIn(ts, function(){
        $(dot).removeClass('animating-in');
      });
    }

  },ts);
}



}



$(document).on('mouseleave','#dt-map .dot', function(){
  //$(this).removeClass('__hovering').addClass('__not-hovering');
  var theDot = $(this);
  dotReceder(theDot);
});

function dotReceder(dot) {
if($(dot).hasClass('animating-in') == true || $(dot).hasClass('__activated') == true) {
  $(dot).addClass('animating-out');
  $(dot).find('.info').fadeOut(ts, function(){
    $(dot).removeClass('__hovering').addClass("__not-hovering").removeClass('__activated').removeClass("animating-out").removeClass("animating-in");
  });
}



}
