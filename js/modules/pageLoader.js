//PAGE LOADER FUNCTION
function pageLoader(theSlug,posttype) {



  pageTitle = $('title').last().html();


  // BASE STUFF

  //NAV ACTIVE CLASSES
  $('nav li').removeClass("_current");
  if(theSlug == 'ourservices') {
    $('nav li.services').addClass('_current');
  }
  if(theSlug == 'history' || theSlug == 'team' || posttype == "team_member") {
    $('nav li.about-us').addClass('_current');
  }
  if(theSlug == 'portfolio' || posttype =='property') {
    $('nav li.portfolio').addClass('_current');
  }
  if(theSlug == 'contact') {
    $('nav li.contact').addClass('_current');
  }
  if(theSlug == 'news') {
    $('nav li.news').addClass('_current');
  }

  $('nav li').removeClass('__activated');



  //MAKE INTERNAL LINKS
  var siteURL = "http://" + top.location.host.toString();
  var internalLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");
  $(internalLinks).addClass('internal');
  $('a.internal').each(function(){
    var linkstr = $(this).attr('href');
    if($(this).attr('target') == "_blank" || linkstr.indexOf('.pdf') >= 0 || linkstr.indexOf('.jpg') >= 0 || linkstr.indexOf('.png') >= 0) {
      $(this).removeClass('internal');
    }
  });




  //RUN PAGE SPECIFIC FUNCTIONS


  if (typeof window['runner'+theSlug] == 'function') {

    window['runner'+theSlug]();
  } else {

  }

  if (typeof window['runner'+posttype] == 'function') {

    window['runner'+posttype]();
  } else {

  }

  greyBG();

  contentSizer();
  aspecter();


  mobileNavHeight();

}

$(window).resize(function(){
  aspecter();
  mobileNavHeight();
});
