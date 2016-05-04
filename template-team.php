<?php
/**
 * Template Name: Team Overview Page

 */
?>
<?php global $siteDir; global $homeURL;?>

<?php get_header(); ?>
<?php
$args = array(
    'post_type' 		=> 'team_member',
    'orderby' 			=> 'menu_order',
    'order' 			=> 'ASC',
    'posts_per_page' => -1

  );

$files_in_cat_query = new WP_Query($args);

if ( $files_in_cat_query->have_posts() ) {
  $team = $files_in_cat_query->get_posts();
  $calloutW = 5 - (count($team) % 5);
  if(count($team)>15) {
    $teamL = 'show-scroll';
  } else {
    $teamL = '';
  }
  ?>
  <div id='team-carousel' class="carousel-container">
  <div class="carousel no-style clearfix">
  <?php
  foreach($team as $t) {
      $tid = $t->ID;
      ?>
      <div class="slide <?php echo $teamL;?>">
        <a href="<?php echo get_permalink($tid);?>">



        <?php
        $title = get_post_meta( $tid, 'team-meta', true );
        $title = $title[0];


        //GET THE IMAGE
        if(has_post_thumbnail($tid)) {
          $thumbid = get_post_thumbnail_id($tid);
          $thumbURL =  wp_get_attachment_image_src($thumbid, 'large');
          $thumbURL = $thumbURL[0];
        } else {
          $thumbURL = $siteDir.'/assets/imgs/blank.png';
        }

        //GET DESKTOP IMAGE

        $carID = $title['carousel-image'];
        $carURL =  wp_get_attachment_image_src($carID, 'large');
        $carURL = $carURL[0];

        ?>





        <div class="grey-bg carousel">
          <div class="theImg">

            <img data-mobile="<?php echo $thumbURL;?>" class="hide" data-desktop="<?php echo $carURL;?>" />
          </div>

        </div>
        <div class="hover-state"></div>
        <div class="title">
          <div class="copy">
            <div class="head">
              <?php echo $t->post_title;?>
            </div>
            <?php
            //DETERMINE SUB LENGTH
            if(strlen($title['title']) > 27) {
              $longClass = 'long-title';
            } else {
              $longClass = '';
            }
            ?>
            <div class="sub <?php echo $longClass;?>">
              <?php echo $title['title'];?>
            </div>
          </div>
        </div>

      </a>
    </div>

      <?php
  }
  ?>
  <?php
  //DETERMINE BOTTOM PHRASING
  $showCallout = false;
  if($calloutW < 5) {
    $showCallout = true;
  }
  if(count($team) < 15) {
    $showCallout = true;
  }
  if($showCallout == true) {
    $calloutClass = 'cwidth-'.$calloutW;
    if(count($team) < 11) {
      $calloutClass = 'cwidth-full';
    }
    ?>
    <div class="slide callout <?php echo $calloutClass;?> <?php echo $teamL;?>">
      <div class="text">
        R4 Capital's senior executive team has on average 23 years Housing Tax Credit experience.
      </div>

    </div>
    <?php
  }



  ?>
</div>
</div>
<?php

}

?>
<?php get_footer(); ?>
