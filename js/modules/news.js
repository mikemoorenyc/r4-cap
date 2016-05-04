// ArCHIVE Toggler

$(document).on('click', 'a.archive-toggler', function(){
  /*$('#archive-list').css('max-height',
    (windowh-$('header').height())+'px'
  );

  if($('#archive-list').hasClass('archive-closed')) {
    $('#archive-list').velocity('slideDown');
  } else {
    $('#archive-list').velocity('slideUp');
  }*/
  $('html').toggleClass('_archive-opened');
  return false;
});
$(document).on('click', '#archive-list ul li a', function(){
  /*if(windoww < dt && $('#archive-list').hasClass('archive-closed') == false) {
    $('#archive-list').velocity('slideUp');
    $('#archive-list').toggleClass('archive-closed');

  }*/
  $('html').removeClass('_archive-opened');
});
function newsPadding() {
  /*
  if(windoww < dt) {
    $('#news-section > .section > .inner > .spacer > .inner').width(((windoww-305)/2));
  } else {
    $('#news-section > .section > .inner > .spacer > .inner').removeAttr('style');
  }
  */
}
function scrollMaker() {
  if(windoww >= dt) {

    $('#news-section > .section > .inner').each(function(){
      if($(this).hasClass('__swipe')) {
        $(this).slick('unslick').removeClass('__swipe');
      }

    });

    $('#news-section > .section > .inner').each(function(){
      var theSection = $(this);
      var cH = $('#main-container').height();
    //  $(theSection).css('max-height', (cH-(180+60))+'px');
      $(theSection).css('opacity',1);
      var theScrollContainer = $(this).parent().find('.scroll-holder');
      if($(theSection).hasClass('__scrollbars') == false) {
        $(theSection).scrollbar({
            "showArrows": true,
            "scrolly": $(theScrollContainer),
            "onScroll": function(y, x){
              if(y.scroll == 0 && y.maxScroll == 0) {
                $(theScrollContainer).addClass('_no-arrows');
              } else {
                $(theScrollContainer).removeClass('_no-arrows');
                if(y.scroll == y.maxScroll){
                  $(theScrollContainer).find('.scroll-arrow_more').addClass('__disabled');
                } else {
                  $(theScrollContainer).find('.scroll-arrow_more').removeClass('__disabled');
                }
                if(y.scroll == 0) {
                  $(theScrollContainer).find('.scroll-arrow_less').addClass('__disabled');
                } else {
                  $(theScrollContainer).find('.scroll-arrow_less').removeClass('__disabled');
                }
              }

            },
            onInit: function() {
              console.log('sadfasdfasf');
              jQuery(theSection).addClass('etsetst');
            }
        }).addClass('__scrollbars').addClass('__activated');
        $(theSection).find('.clip-block').addClass('__activated');
      }

    });


  } else {

    $('#news-section > .section > .inner').each(function(){
      $(this).scrollbar('destroy').removeClass('__scrollbars');
    });
    $('#news-section > .section > .inner').each(function(){
      $(this).slick({
        mobileFirst: true,
        variableWidth: true,
        centerMode: true,
        centerPadding: '0px',
        infinite: false,
        arrows: false
      }).addClass('__activated').addClass('__swipe');
      $(this).find('.clip-block').addClass('__activated');
    });

  }
}

function newsScrollInterior() {
  if(windoww >= dt) {
    if($('#post-interior .scroller').hasClass('__scrollbars') == false) {
      $('#post-interior .scroller').scrollbar().addClass('__scrollbars');
    }
  } else {
    $('#post-interior .scroller').scrollbar('destroy').removeClass('__scrollbars');
  }
}

function runnernews() {

  newsPadding();
scrollMaker();
  newsScrollInterior();

  //FOR CAPTIONED NEWS

  $('#post-interior .content-block .wp-caption').each(function(){
    var thewidth = $(this).find('img').attr('width');
    $(this).width(thewidth);
  });


  $(window).resize(function(){
    newsPadding();
    scrollMaker();
    newsScrollInterior();
  });
/*
  $('#news-section > .section > .inner').slick({
    mobileFirst: true,
    variableWidth: true,
    centerMode: true,
    centerPadding: '0px',
    infinite: false,
    arrows: false
  }).addClass('__activated');
*/

}
