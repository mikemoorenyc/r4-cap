<?php
/**
 * Template Name: Home Template Page

 */
?>
<?php global $siteDir; global $homeURL;?>

<?php get_header(); ?>
<div id="home-block">
  <div class="grey-bg">
    <div class="theImg">
      <?php

      $thumbid = get_post_thumbnail_id();
      $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
      $thumbURL = $thumbURL[0];
      $thumb800 =  wp_get_attachment_image_src($thumbid, 'large');
      $thumb800 = $thumb800[0];
      ?>
      <img data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>" class="hide" />
    </div>

  </div>
  <div id="home-headline">

    <h1><?php the_content();?></h1>
  </div>
  <a href="#" class="down">
    <svg>
        <use xlink:href="#down-arrow" />
      </svg>
  </a>

</div>



<div id="history-block">
<?php
$history = get_page_by_title('History');
$historyID = $history->ID;
?>

<div class="grey-bg">
  <div class="theImg">
    <?php

    $thumbid = get_post_thumbnail_id($historyID);
    $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
    $thumbURL = $thumbURL[0];
    $thumb800 =  wp_get_attachment_image_src($thumbid, 'large');
    $thumb800 = $thumb800[0];
    ?>
    <img data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>" class="hide" />
  </div>

</div>

<div class="head-block">
  <h1>
    <span class="title">
      <?php echo $history->post_title;?>
    </span>
  </h1>
</div>

<div class="content-block">
  <?php echo wpautop($history->post_content); ?>

  <div class="btn-holder">
    <a href="<?php echo $homeURL;?>team/" class="big-btn">Team</a>
  </div>

</div>


</div>



<?php get_footer(); ?>
