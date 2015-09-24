function runnerteam() {

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
    $('#team-carousel > .carousel').on('init', function(){
      if($('#team-carousel > .carousel .slide').length > 7) {
        $(document).on('mousemove', '#team-carousel > .carousel', function(e){
          if($('#team-carousel > .carousel').hasClass("__hinted") == false) {
            if(e.pageX >= (windoww/1.25)) {
            //  $('#team-carousel > .carousel').addClass('__hinted');
          //    $('.slick-next').click();
            }
          }
        });
      }

    });
    $('#team-carousel > .carousel').slick({
      slidesToShow: 7,
      infinite: false,
      edgeFriction: 0
    }).addClass('_carousel-activated');
  }
  $(window).resize(function(){
    if(windoww < dt) {
      $('#team-carousel > .carousel').slick('unslick');
    } else {
      if($('#team-carousel > .carousel').hasClass('_carousel-activated') == false) {
        $('#team-carousel > .carousel').on('init', function(){
          if($('#team-carousel > .carousel .slide').length > 7) {
            $(document).on('mousemove', '#team-carousel > .carousel', function(e){
              if($('#team-carousel > .carousel').hasClass("__hinted") == false) {
                if(e.pageX >= (windoww/1.25)) {
                //  $('#team-carousel > .carousel').addClass('__hinted');
                //  $('.slick-next').click();
                }
              }
            });
          }

        });
        $('#team-carousel > .carousel').slick({
          slidesToShow: 7,
          infinite: false,
          edgeFriction: 0
        }).addClass('_carousel-activated');
      }
    }
  });


}
