<?php
// TEAM MEMBER PROFILE PAGE

?>
<?php global $siteDir; global $homeURL;?>
<?php get_header(); ?>
<?php

//GET THE IMAGE
if(has_post_thumbnail($post->ID)) {
  $thumbid = get_post_thumbnail_id($post->ID);
  $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
  $thumbURL = $thumbURL[0];
  $thumb800 =  wp_get_attachment_image_src($thumbid, 'large');
  $thumb800 = $thumb800[0];
} else {
  $thumbURL = $siteDir.'/assets/imgs/blank.png';
  $thumb800 = $siteDir.'/assets/imgs/blank.png';
}

$title = get_post_meta( $post->ID, 'team-meta', true );
$title = $title[0];

?>
<div id="profile-image" class="actual-profile">
  <div class="grey-bg ">
    <div class="theImg">

        <img class="hide" data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>"/>
    </div>

  </div>

</div>

<div class="head-block with-close">
  <h1>
    <span class="title">
      <?php the_title();?>
    </span>
    <span class="sub">
      <?php echo $title['title'];?>
    </span>
  </h1>
  <a href="<?php echo $homeURL?>team/" class="close"><span class="hide">Back</span>
    <span class="close-icon">
        <svg>
          <use xlink:href="#close-svg" />
        </svg>
    </span>
  </a>
</div>

<div class="content-block">

<?php the_content();?>
</div>



<?php get_footer(); ?>
