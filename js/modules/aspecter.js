//EM ASPECT RATIOER
function aspecter() {
  $('.aspecter').each(function(){
    var theObject = $(this),
        baseWidth = $(theObject).data('basewidth'),
        percenter = $(theObject).width() / baseWidth;

    $(theObject).css('font-size', (14 * percenter)+'px');
  });
}
