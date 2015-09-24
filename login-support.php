<?php
add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}




add_action('login_head', 'mobile_detector');

function mobile_detector() {
  include_once 'login/Mobile_Detect.php';
  $detect = new Mobile_Detect;
  if ( $detect->isMobile() ) {
    wp_redirect( home_url() );
  } else {
    echo 'Desktop';
  }
}



function the_login_message( $message ) {
    if ( empty($message) ){
        return "<p>Welcome to this site. Please log in to continue</p>";
    } else {
        return $message;
    }
}
add_filter( 'login_message', 'the_login_message' );

//STUFF FOR LOGIN
/*
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/main.css' );
    wp_enqueue_script( 'custom-login', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js' );
    wp_enqueue_script( 'custom-login', get_template_directory_uri() . '/js/main.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
*/
function footer_copy() {
  ?>
  <link rel="stylesheet" id="custom-login-css" href="<?php echo get_template_directory_uri();?>/css/main.css?ver=4.2.3" type="text/css" media="all">


  <?php
}
add_action('login_footer','footer_copy');
?>
