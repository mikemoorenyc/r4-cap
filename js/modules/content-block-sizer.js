function contentSizer() {
  function contentInterior() {
    if(windoww >= dt) {

      $('.content-block').each(function(){
        var block = $(this),
            headh = 72,
            navh = $('nav').height();
        $(block).css('max-height',
          windowh - ((navh*2)+headh)
        );
      });




    } else {
      $('.content-block').removeAttr('style');
    }
  }
  contentInterior();


  $(window).resize(function(){
    contentInterior();
  });
}
