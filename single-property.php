<?php
// PROPERTY PAGE

?>
<?php global $siteDir; global $homeURL;?>
<?php get_header(); ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php

$title = get_post_meta( $post->ID, 'property-info', true );
$title = $title[0];

$referrer = $_GET['service_id'];


if($referrer == 'carousel') {
	$backlink = 'properties';
} else {
	$backlink = 'map';
}

?>
<div id="property-block">
<div class="head-block with-close">
  <h1>
    <span class="title">
      <?php the_title();?>, <?php echo $title['location'];?>
    </span>
    <span class="sub">
      <?php the_content();?>
    </span>

  </h1>
	<a href="<?php echo $homeURL?>portfolio/?service_id=<?php echo $backlink;?>" class="close"><span class="hide">Back</span>
		<svg>
			<use xlink:href="#close-svg" />
		</svg>
  </a>
</div>

<div class="property-gallery">
  <div class="carousel clearfix no-style">
<?php
$gal = get_post_meta( $post->ID, 'property-gallery', true );

if($gal !== '') {
foreach($gal as $g) {
  //GET THE IMAGE URL;
  $iid = $g['image'];
  $img800 = wp_get_attachment_image_src($iid, 'large');
  $img800 = $img800[0];

  $imgFull = wp_get_attachment_image_src($iid, 'full');
  $imgFull = $imgFull[0];

  ?>
  <div class="slide">
    <div class="inner">
      <img class="galimg" data-full='<?php echo $imgFull;?>' data-800='<?php echo $img800;?>' />

      <?php
      if($g['caption'] !== '') {
        ?>
        <div class="caption">
          <?php echo $g['caption'];?>
        </div>
        <?php
      }

      ?>

    </div>



  </div>

  <?php
}
}
?>




  </div>

</div>

<div class="navigation clearfix">
<?php

$args = array(
    'post_type' 		=> 'property',
    'orderby' 			=> 'menu_order',
    'order' 			=> 'ASC',
    'posts_per_page' => -1
    );
    $pagelist = get_pages($args);
    $pages = array();
    foreach ($pagelist as $page) {
       $pages[] += $page->ID;
    }


    $current = array_search($post->ID, $pages);
    $prevID = $pages[$current+1];
    $nextID = $pages[$current-1];
    if(!empty($prevID)) {
      $prevLink = get_permalink($prevID);
    } else {
      $prevLink = "no-link";
    }
    if(!empty($nextID)) {
      $nextLink = get_permalink($nextID);
    } else {
      $nextLink = "no-link";
    }

?>
  <?php
  if($prevLink !== 'no-link') {
    ?>
    <a href="<?php echo $prevLink;?>" class="previous no-underline ">
      <span class="arrow">
        <?php include 'assets/imgs/left-arrow.svg';?>
      </span>
      <span class="copy">
        Previous
      </span>
    </a>

    <?php
  }

  ?>

  <?php
  if($nextLink !== 'no-link') {
    ?>
    <a href="<?php echo $nextLink;?>" class="next no-underline ">
      <span class="copy">
        Next
      </span>
      <span class="arrow">
        <?php include 'assets/imgs/right-arrow.svg';?>
      </span>
    </a>
    <?php
  }


  ?>






</div>


</div>

  <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
