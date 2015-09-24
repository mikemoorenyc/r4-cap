function mobileNavHeight() {
  $('nav, #archive-list').css('max-height', (windowh - $('header').height())+'px');
}
