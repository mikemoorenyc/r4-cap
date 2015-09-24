<?php
/**
 * Template Name: Property Overview Page

 */
?>
<?php global $siteDir; global $homeURL;?>

<?php get_header(); ?>
<?php
$args = array(
    'post_type' 		=> 'property',
    'orderby' 			=> 'menu_order',
    'order' 			=> 'ASC',
    'posts_per_page' => -1

  );

$files_in_cat_query = new WP_Query($args);

if ( $files_in_cat_query->have_posts() ) {
  $prop = $files_in_cat_query->get_posts()
  ?>
  <ul class="no-style">
  <?php
  foreach($prop as $t) {
      $tid = $t->ID;
      ?>
      <li>
        <?php echo $t->post_title;?>

        <?php
        $title = get_post_meta( $tid, 'property-info', true );
        $title = $title[0];
        echo $title['location'];

        //GET THE IMAGE
        if(has_post_thumbnail($tid)) {
          $thumbid = get_post_thumbnail_id($tid);
          $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
          $thumbURL = $thumbURL[0];
        } else {
          $thumbURL = $siteDir.'/assets/imgs/blank.png';
        }

        ?>

        <img src="<?php echo $thumbURL;?>" />



      </li>

      <?php
  }
  ?>
</ul>
<?php

}

?>
<?php get_footer(); ?>
