$(document).on('click', '#service-list li a.header', function(){

  if(windoww < dt) {

    mobileOpener($(this).data('serviceid'));
    /*
    if($(this).hasClass('_opened') == false) {
      $('#service-list li a.header').each(function(){
        if($(this).hasClass('_opened') == true) {
          $(this).removeClass('_opened');
          /*$(this).next().velocity('slideUp', {complete:function(){
            $(this).next().removeAttr('style');
          }});
          $(this).next().slideUp(ts, function(){
            $(this).next().removeAttr('style');
            $(this).next().removeClass('_opened');
          });
        }
      });
      $(this).addClass('_opened');

      $(this).next().velocity('slideDown', {complete:function(){
        $(this).parent().velocity('scroll', {offset: -($('header').height())});
      }});

      $(this).next().slideDown(ts, function(){
        $(this).parent().velocity('scroll', {offset: -($('header').height())});
      }).addClass("_opened");
    } else {
      $(this).removeClass('_opened');

      $(this).next().velocity('slideUp', {complete:function(){
        $(this).next().removeAttr('style');
      }});

      $(this).next().slideUp(ts, function(){
        $(this).next().removeAttr('style');
        $(this).next().removeClass('_opened');
      });
    }
    */

  }

  return false;
});

$(document).on('click', '#service-list h3._accordionized', function(){
  if(windoww >= dt) {

    //LOOP THROUGH AND CLOSE THE OTHER ONE


    if($(this).hasClass('__opened') == false) {
      $('#service-list h3._accordionized.__opened').next().slideUp(ts);
      $('#service-list h3._accordionized.__opened').removeClass("__opened");

      $(this).addClass("__opened");
      $(this).next().slideDown(ts);
    }
  }


  return false;

});


function runnerourservices() {


 ///ACCORDION

 $('#service-list .content-block[data-serviceid="0"] h3' ).each(function(){
   $(this).addClass('_accordionized');
   $(this).next().wrap('<div class="accordion-container" />');
 });
  setTimeout(function(){
    $('#service-list .content-block[data-serviceid="0"] h3:first-child' ).click();
  },10)


  var serviceid = getParameterByName('service_id');

  if(windoww < dt) {
    var newHeader = $('#service-list li[data-serviceid="'+serviceid+'"] a.header');

    $('#service-list li .content-container').each(function(){
      $(this).height($(this).height()).addClass('_closed');
    });
    $('#service-list li').addClass('__service-activated');

    /*
    $(newHeader).addClass('_opened');

    $(newHeader).next().velocity('slideDown', {complete:function(){
      $(newHeader).parent().velocity('scroll', {offset: -($('header').height())});
    }});

    $(newHeader).next().slideDown(500, function(){
      $(newHeader).parent().velocity('scroll', {offset: -($('header').height())});
    });
    */
    setTimeout(function(){
      /*
      $(newHeader).next().addClass('_opened');
      $(newHeader).addClass('_opened');

      $(newHeader).next().slideDown(ts, function(){
        $(newHeader).parent().velocity('scroll', {offset: -($('header').height())});
        $(newHeader).next().addClass('_opened');
      });
      */
      mobileOpener(serviceid);
    },500)
  } else {
    if(serviceid !== '') {
      $('.grey-bg.service, #service-list li').removeClass('__service-activated');
      $('#service-list li[data-serviceid="'+serviceid+'"]').addClass('__service-activated');
      $('.grey-bg.service[data-serviceid="'+serviceid+'"]').addClass('__service-activated');
    } else {
      $('#service-list li[data-serviceid="'+0+'"]').addClass('__service-activated');
      $('.grey-bg.service[data-serviceid="'+0+'"]').addClass('__service-activated');
    }
  }
}


function mobileOpener(id) {
  var header = $('#service-list li[data-serviceid="'+id+'"] a.header');
  var block = $(header).next();
  if($(header).hasClass('_opened') == false) {
    $('#service-list li a.header').removeClass('_opened');
    $('#service-list li a.header').next().addClass("_closed");
    $(header).addClass('_opened');
    $(block).removeClass('_closed');



    var target = $('#service-list li[data-serviceid="'+id+'"]');

    setTimeout(function(){
      $('html,body').animate({
        scrollTop: target.offset().top - ($('header').height())
      }, ts);
    },ts)


  } else {
    $(header).removeClass('_opened');
    $(header).next().addClass('_closed');
  }
}
