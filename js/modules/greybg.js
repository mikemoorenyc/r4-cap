function greyBG() {
  $('.grey-bg').each(function(){

    if($(this).hasClass('carousel') == true) {
      var theImg = $(this).find('.theImg > img'),
          theBg = $(this),
          mobileSrc = $(theImg).data('mobile'),
          dtSrc = $(theImg).data('desktop'),
          theSrc = ''
      if(windoww < dt) {
        theSrc = mobileSrc;

      } else {
        theSrc = dtSrc;
      }
      $(theImg).attr('src', theSrc);
      $(theImg).load(function(){
        $(theImg).parent().css('background-image', 'url('+theSrc+')').addClass('__activated');
        $(theBg).addClass("__activated");
        $(theBg).closest('a').addClass('__activated');
      });
      $(window).resize(function(){
        if(windoww < dt) {
          theSrc = mobileSrc;
        } else {
          theSrc = dtSrc;
        }
        $(theImg).parent().css('background-image', 'url('+theSrc+')');
      });

    } else {
      var theImg = $(this).find('.theImg > img'),
          theBg = $(this),
          theSrc = $(theImg).data('src'),
          srcLoad = '',
          src800 = $(theImg).data('800');
      if(windoww < dt) {
        srcLoad = src800;
      } else {
        srcLoad = theSrc;
      }
      $(theImg).attr('src', srcLoad);
      $(theImg).parent().css('background-position', $(theImg).data('crop'));
      $(theImg).load(function(){

        $(theImg).parent().css('background-image', 'url('+srcLoad+')').addClass('__activated');
        $(theBg).parent().addClass('__activated');
        $(theBg).addClass("__activated");
      });

      $(window).resize(function(){
        if(windoww < dt) {
          $(theImg).parent().css('background-image', 'url('+src800+')');
        } else {
          $(theImg).parent().css('background-image', 'url('+theSrc+')');
        }
      });
    }


  });
}
