function siteInit() {
  if ('addEventListener' in document) {
      document.addEventListener('DOMContentLoaded', function() {
          FastClick.attach(document.body);
      }, false);
  }
  Modernizr.addTest('mix-blend-mode', function(){
    return Modernizr.testProp('mixBlendMode');
  });




  //GLOBALS
  ts = 500,
  tab = 401,
  dt = 801;
  windoww = $(window).width();
  windowh = $(window).height();
  orientationClass();
  mainContainer();
  $(window).resize(function(){
    windoww = $(window).width();
    windowh = $(window).height();
    orientationClass();
    mainContainer();
  });






  theHistory();


  //CHECK IF CSS IS LOADED
  var thechecker = setInterval(function(){
    var ztest = $('#css-checker').css('height');

    if(ztest == '1px') {
      cssLoaded = true;
      clearInterval(thechecker);
      console.log('css loaded');
    }
  }, 10);





  // GET STUFF ON INIT
  pageTitle = $('title').last().html();
  var currentSlug = $("#main-container").data('current');
  var postType = $("#main-container").data('posttype');
  currentSlug = currentSlug.replace('-','');
  pageLoader(currentSlug, postType);

  $('html').addClass('_page-loaded');
  console.log('scripts loaded');
}



function mainContainer() {
  if(windoww >=801) {
    $('#main-container').height(windowh - $('nav').height());
  } else {
    $('#main-container').removeAttr('style');
  }
}


function orientationClass() {
  if (windoww >= windowh) {
    $('html').addClass('_orientation-landscape').removeClass('_orientation-portrait');
  } else {
    $('html').removeClass('_orientation-landscape').addClass('_orientation-portrait');
  }
}



//DON'T TOUCH
siteScriptsLoaded = true;
siteInit();
