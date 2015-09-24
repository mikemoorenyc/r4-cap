
function theHistory() {

  var $document = $(document);

  if (!History.enabled) {

      return false;
  }

  var root = History.getRootUrl();

  $.expr.filters.internal = function (elem) {
      return (elem.hostname == window.location.hostname && /(\/|\.html)$/i.test(elem.pathname)) || false;
  };

  function find_all($html, selector) {
      return $html.filter(selector).add($html.find(selector));
  }

  function parse_html(html) {
      return $($.parseHTML(html, document, true));
  }

  function parse_response(html) {
      var
          head = /<head[^>]*>([\s\S]+)<\/head>/.exec(html),
          body = /<body[^>]*>([\s\S]+)<\/body>/.exec(html),

          $head = head ? parse_html(head[1]) : $(),
          $body = body ? parse_html(body[1]) : $(),

          title = $.trim(find_all($head, 'title').last().html()),
          $content = $.trim(find_all($body, '.ajax-catcher').first().html());

      return {
          'title': title,
          '$content': $content
      }
  }

  $document.ready(function () {
      $document.on('click', 'a.internal', function (event) {

          if (event.which == 2 || event.ctrlKey || event.metaKey) {
              return true;
          }

          History.pushState(null, null, $(this).attr('href'));
          event.preventDefault();

          return false;
      });
  });

  $(window).on('statechange', function () {

      //INITIATE LOADING ANIMATION

      $('html').addClass("__page-loading");

      //FOR MOBILE
      if(windoww < dt) {
        if($('html').hasClass('_nav-opened') == true ) {
          $('#menu-toggler').click();
        }
        $('nav li.with-sub a._sub-opened').click();
        $('html').velocity('scroll',{offset:0, mobileHA: false, duration: ts});
      }
/*
      $('#main-container').velocity({opacity:0},{complete:function(){
        runner();
      }, duration: ts});
*/
      //$('html').addClass('__mobile-nav-closed').removeClass('__mobile-nav-opened');
      setTimeout(function(){
        runner();
      },ts)
      var loading = true;







/*
      $('.page-content').velocity({opacity:0}, {
        duration: ts*1.5,
        complete: function(){
          runner();
        }
      });
*/
      var thenext = History.getState().url,
       therel = thenext.replace(root, '/');


      $('title').last().html(pageTitle);


//      $("html").velocity("scroll", { offset: '0px', mobileHA: false});
      function runner(){
        var
            url = History.getState().url,
            rel = url.replace(root, '/');

        $.get(rel).done(function (date) {
            loading = false;
            var response = parse_response(date);

            if (!response.$content.length) {
                document.location.href = url;

                return false;
            }


            var newStuff = response.$content;




            if (response.title.length) {
                $('title').last().html(response.title);
            }

            //NEW LOAD


            var newContainer = $(newStuff).find('#main-container');
            var newSlug = $(newStuff).data('current');
            newSlug = newSlug.replace('-','');
            var posttype = $(newStuff).data('posttype');

            //var pinAssemblage = $(newStuff).find('#top-header');
            //console.log(newContainer);
            $('#main-container').empty();
            $('#main-container').html($(newStuff).html());
            //$('#main-container').velocity({opacity:1}, {duration: ts});
            pageLoader(newSlug, posttype);

            $("html").removeClass('__page-loading');


        }).fail(function () {
          console.log('fail');
            document.location.href = url;

            return false;
        });
      }


  });
}


function pageReady() {

}
