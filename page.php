<?php
// DEFAULT SINGLE PAGE

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
$pos = get_post_meta( $post->ID, 'background-crop', true );
$pos = str_replace('_', ' ', $pos[0]['background-crop']);
?>
<div id="profile-image">
  <div class="grey-bg ">
    <div class="theImg">

      <img class="hide" data-crop="<?php echo $pos;?>" data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>"/>
    </div>

  </div>

</div>

<div class="head-block">
  <h1>
    <span class="title">
      <?php the_title();?>
    </span>

  </h1>
</div>

<div class="content-block">

<?php the_content();?>
</div>



<?php get_footer(); ?>
