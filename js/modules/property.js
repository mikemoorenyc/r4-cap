function runnerproperty() {

  if(windoww < dt) {
    var slideCount = $('.property-gallery .slide').length;
    var slidesLoaded = 0;
    $('.property-gallery .slide').each(function(){
      var img = $(this).find('img.galimg'),
          li = $(this);

      $(img).attr('src', $(img).data('800'));
      $(img).load(function(){
        $(li).addClass('__activated');
        slidesLoaded++;
        if(slidesLoaded == slideCount) {
          $('#property-block .navigation').addClass('__activated');
        }
      });
    });
  } else {
    //LOAD PROGRESSIVELY FOR CAROUSEL
    progressiveImageLoader();
    function progressiveImageLoader() {
      var imgArray = $('.property-gallery .slide').find('img');
          imgCount = $(imgArray).length;
          slidesLoaded = 0;
      $(imgArray).each(function(e){
        $(this).addClass('pro-'+e);
      });

      if(imgCount > 0) {
        theLoader(slidesLoaded);
      }

      function theLoader(num) {
      //  console.log(slidesLoaded);
      //  console.log(imgCount);
        if(num == imgCount) {
        /*  $('.property-gallery .carousel').slick({
                fade: false,
                speed: ts
              }).addClass('__activated');*/
          console.log('all loaded');
          return false;
        } else {
          var theImg = $('img.pro-'+num),
              theSrc = $(theImg).data('full');
          $(theImg).attr('src', theSrc);
          $(theImg).load(function(){
          //  console.log("Image Loaded "+$(theImg).attr('class'));
            slidesLoaded++;
            $(theImg).addClass("__loaded");
            $(theImg).parent().css('background-image', 'url('+$(theImg).attr('src')+')');
            $(theImg).closest('.slide').addClass('__activated');
            if(slidesLoaded == 1) {
              $('.property-gallery .carousel').slick({
                fade: false,
                speed: ts
              }).addClass("__activated");
            //  console.log('gallery loaded');
            }


            theLoader(slidesLoaded);
          });
        }
      }
    }

  }
}
