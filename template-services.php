<?php
/**
 * Template Name: Services fsadfdfsaPage

 */
?>
<?php global $siteDir; global $homeURL; global $services;?>

<?php get_header(); ?>
<div id="services-image">
  <div class="grey-bg ">
    <div class="theImg">
<?php

//$list = get_post_meta( $post->ID, 'services', true );

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

$sid= intval($_GET['service_id']);
$serviceID = $services[$sid]->ID;

if(has_post_thumbnail($serviceID)) {
  $thumbid = get_post_thumbnail_id($serviceID);
  $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
  $thumbURL = $thumbURL[0];
  $thumb800 =  wp_get_attachment_image_src($thumbid, 'large');
  $thumb800 = $thumb800[0];
}



$pos = get_post_meta( $post->ID, 'background-crop', true );
$pos = str_replace('_', ' ', $pos[0]['background-crop']);
?>
      <img data-crop="<?php echo $pos;?>" class="hide" data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>" />
    </div>

  </div>

  <?php
  $looper = 0;
  foreach($services as $l) {
  //  $carURL =  wp_get_attachment_image_src($carID, 'full');
  //  $carURL = $carURL[0];
  if($looper == 0) {
    $active = '__service-activated';
  } else {
    $active = '';
  }

  if(has_post_thumbnail($l->ID)) {
    $thumbid = get_post_thumbnail_id($l->ID);
    $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
    $thumbURL = $thumbURL[0];
    $thumb800 =  wp_get_attachment_image_src($thumbid, 'large');
    $thumb800 = $thumb800[0];



    ?>
  <!--  <div class="grey-bg service " data-serviceid="<?php echo $looper;?>">
      <div class="theImg">

          <img class="hide" data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>"/>
      </div>

    </div> -->
    <?php
  }
  $looper++;
  }



  ?>

  <h1>

<?php the_content();?>
  </h1>

</div>
<div class="head-block" id="service-header">
  <h1>
    <span class="title">
      <?php the_title();?>
    </span>

  </h1>
</div>

<div id="service-list">
  <?php

  if(count($services) > 0) {
    echo '<ul class=" no-style">';
    $looper = 0;
    foreach($services as $l) {
      if($looper == 0 ) {
        $activated = '__service-activated';
      } else {
        $activated = '';
      }
      ?>
      <li class="" data-serviceid="<?php echo $looper;?>">
        <a  href="#" class="header" data-serviceid="<?php echo $looper;?>">
          <?php echo $l->post_title;?>
        </a>
        <div class="content-container">
        <div class="content-block " data-serviceid="<?php echo $looper;?>">
          <?php echo wpautop($l->post_content);?>

        </div>
      </div>

      </li>

      <?php
      $looper++;
    }



    echo '</ul>';
  }


  ?>


</div>



<?php get_footer(); ?>
