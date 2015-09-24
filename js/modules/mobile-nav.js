  $('nav .sub-nav > li a, nav a.title').wrapInner('<div class="text-overflow" />');


$('#menu-toggler').click(function(){

  if($('html').hasClass('_nav-opened') == false) {
    OpenNav();
  } else {
    CloseNav();
  }
  return false;
});
function OpenNav() {
  $('nav').css('max-height', (windowh - $('header').height())+'px');
  //$('nav').velocity('slideDown');
  $('html').addClass('_nav-opened');
}
function CloseNav() {
  /*$('nav').velocity('slideUp', {complete:function(){
    $('nav').removeAttr('style');
  }});*/
  $('html').removeClass('_nav-opened');
}
$('a.sub-opener').click(function(){
  var subHeader = $(this);
  if(windoww < dt) {
    if($(this).hasClass("_sub-opened") == false) {
      subOpener(subHeader);
    } else {
      subCloser(subHeader);
    }


    return false;
  } else {
    if(Modernizr.touch) {
      if($(this).parent().hasClass('__activated') == true) {
        $(this).parent().removeClass('__activated')
      } else {
        $('nav li').removeClass('__activated');
        $(this).parent().addClass("__activated");
      }

    }
  }
  return false;
});

/*  ===== WIDESCREEN ======= */





$(document).on('mouseenter', 'nav li', function(event) {
  if(!(Modernizr.touch) && windoww >= dt) {
    $(this).addClass('__activated');
  }
});

$(document).on('mouseleave', 'nav li', function(event) {
  if(!(Modernizr.touch) && windoww >= dt) {

$(this).removeClass('__activated');
  }
});




function wideSubOpen(sub) {
  $(sub).addClass('__activated');

    $(sub).next().velocity('slideDown');

}

function wideSubClose(sub) {
  $(sub).removeClass('__activated');

    $(sub).next().velocity('slideUp', {complete:function(){
      $(sub).next().removeAttr('style');
    }});


}

function subOpener(header) {
  $('a.sub-opener').each(function(){
    var subHead = $(this);
    if($(this).hasClass("_sub-opened") == true) {
      subCloser(subHead);
    }
  });
  $(header).addClass('_sub-opened');
  $(header).next().slideDown(ts)
}
function subCloser(header) {
  $(header).removeClass("_sub-opened");
  $(header).next().slideUp(ts, function(){
    $(header).next().removeAttr('style');
  });
  /*$(header).next().velocity('slideUp', {complete:function(){
    $(header).next().removeAttr('style');
  }});*/
}


$(window).resize(function(){
  if($('html').hasClass('_nav-opened') == true) {
    CloseNav();
  }
  $('a.sub-opener').each(function(){
    var subHead = $(this);
    if($(this).hasClass("_sub-opened") == true || $(this).hasClass("__activated") == true) {
      subCloser(subHead);
    }
  });
});
