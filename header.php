<?php

//GET POST SLUG
global $post;
$slug = $post->post_name;

//GET POST TYPE
$postType = get_post_type($post->ID);

//GET POST PARENT
$parentID = $post->post_parent;
$parentslug = get_post($parentID)->post_name;

//FOR ARCHIVE
if(is_archive()) {
  $slug = 'news';
  $parentslug = 'news';
}

//FOR NEWS POST
if($postType == 'post') {
  $slug = 'news';
  $parentslug = 'news';
}

//GET THEME DIRECTORY
global $siteDir;
$siteDir = get_bloginfo('template_url');

//GET HOME URL
global $homeURL;
$homeURL = esc_url( home_url( '/' ) );

//DECLARE THE SITE TITLE, SAVE A DB QUERY
global $siteTitle;
$siteTitle = 'R4 Capital';

//DECLARE THE PAGE EXCERPT
global $siteDesc;
$siteDesc = '';

//GET SERVICES
global $services;
$args = array(
    'post_type' 		=> 'services',
    'orderby' 			=> 'menu_order',
    'order' 			=> 'ASC',
    'posts_per_page' => -1

  );

$files_in_cat_query = new WP_Query($args);
if ( $files_in_cat_query->have_posts() ) {
  $services = $files_in_cat_query->get_posts();
} else {
  $services = '';
}


?>



<!DOCTYPE html>
<html lang="en" data-parent-slug="<?php echo $parentslug;?>" data-current="<?php echo $slug;?>" class="slug-<?php echo $slug;?>">
<head>

<!-- ABOVE THE FOLD CSS -->
<style><?php $inlinecss = file_get_contents($siteDir.'/css/main.css'); dirReplacer($inlinecss);?></style>


<?php


if ( is_front_page() ) {
  $namer = "Home";
  ?>
  <title><?php echo $siteTitle;?></title>
  <?php
} else {
  $namer = get_the_title();
  if($slug == 'portfolio') {
    $sid = $_GET["service_id"];
    if($sid == 'map') {
      $namer = 'Locations Map';
    } else {
      $namer = 'Featured Properties';
    }
  }
  if($slug == 'our-services') {
    $sid= intval($_GET['service_id']);
    $namer = $services[$sid]->post_title;
  }

  if(is_category()) {
    $namer = get_cat_name(get_query_var('cat'));
  }
  if(is_date()) {
    $namer = 'News from '.get_query_var('year');
  }

  ?>



  <title><?php echo $namer;?> | <?php echo $siteTitle;?></title>
  <?php
}
?>

<!-- HERE'S WHERE WE GET THE SITE DESCRIPTION -->
<meta name="description" content="<?php if (have_posts() && is_single() OR is_page()):while(have_posts()):the_post();



  if (get_the_excerpt()) {
    $out_excerpt = str_replace(array("\r\n", "\r", "\n", "[&hellip;]"), "", get_the_excerpt());
    //echo apply_filters('the_excerpt_rss', $out_excerpt);
    $siteDesc = $out_excerpt;
  } else {
    $siteDesc =  get_bloginfo('description');
  }

endwhile;

else: ?>
<?php $siteDesc = get_bloginfo('description'); ?>
<?php endif; ?><?php echo $siteDesc;?>" />

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">



<!-- icons & favicons -->
<link rel="shortcut icon" href="<?php echo $siteDir;?>/assets/imgs/icons/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $siteDir;?>/assets/imgs/imgs/icons/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon-152x152.png" />
<!-- For Nokia -->
<link rel="shortcut icon" href="<?php echo $siteDir;?>/assets/imgs/icons/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="<?php echo $siteDir;?>/assets/imgs/icons/favicon.ico">

<!--  STUFF FOR IE8 WILL GET REMOVED ON COMPILATION // REMOVE THIS LINE TO RENDER IT
<!--[if lte IE 8]>
<link rel="stylesheet" href="<?php echo $siteDir;?>/css/expanded.css" />
	<link href='<?php echo $siteDir;?>/css/ie-fixes.css?ts=<?php echo time();?>' rel='stylesheet' type='text/css'>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<!-- FACEBOOK TAGS REMOVED ON COMPILATION UNLESS YOU UNCOMMENT-->
<!--
<meta property="og:site_name" content="<?php echo $siteTitle;?>" />
<meta property="og:title" content="<?php echo get_bloginfo('description');?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $homeURL;?>" />
<meta property="og:image" content="<?php echo $siteDir;?>/assets/blue-pin.jpg" />
<meta property="og:description" content="<?php echo $siteDesc;?>" />
-->

</head>

<body <?php body_class(); ?> id="top">
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-65521731-1', 'auto');
</script>
<div id="css-checker"></div>


<div id="svg-sprite" class="hide">
  <?php include 'assets/svgs.svg';?>
</div>

  <?php include 'theNav.php';?>


<div id="nav-buffer"></div>
<div class="ajax-catcher">
<div id="main-container" data-parent="<?php echo $parentslug;?>" data-current="<?php echo $slug;?>" data-posttype="<?php echo $postType;?>">
