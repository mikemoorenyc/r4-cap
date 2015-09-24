function runnerhome() {
  if(windoww < dt) {
    $('#home-block').height(
      windowh - ($('header').height() )
    );
  }

  $('#home-block .theImg > img').load(function(){
    $('#home-block').addClass('_background-loaded');
  });
  $(window).scrollTop(0);
  setTimeout(function(){
    var scrollsect = window.location.hash.substr(1);
    if(windoww < dt) {

      $('#'+scrollsect).velocity('scroll', {offset: -($('header').height())});
    } else {
      if(scrollsect == 'history-block') {
        $('#history-block').velocity('fadeIn');
      }
    }
  },ts/2);


  if(windoww >= dt) {
    $('.content-block .btn-holder').remove();
  }


}
$(document).on('click', '#home-block .down', function(){
  $('#history-block').velocity('scroll', {offset: -($('header').height())});
  return false;
});
