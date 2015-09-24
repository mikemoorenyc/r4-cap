<?php
/**
 * Template Name: Portfolio Page

 */
?>
<?php global $siteDir; global $homeURL;?>
<?php get_header(); ?>


<img id="mobile-map" src="<?php echo $siteDir;?>/assets/imgs/mobile-map.png" />

<div class="head-block" id="featured-header">
  <h1 id="featured-properties">
    <span class="title">
      Featured Properties
    </span>

  </h1>
</div>
<?php
$args = array(
    'post_type' 		=> 'property',
    'orderby' 			=> 'menu_order',
    'order' 			=> 'ASC',
    'posts_per_page' => -1

  );

$files_in_cat_query = new WP_Query($args);

if ( $files_in_cat_query->have_posts() ) {
  $team = $files_in_cat_query->get_posts();
  ?>
  <div id='property-carousel' class="carousel-container section">
  <div class="carousel no-style clearfix">
  <?php
  foreach($team as $t) {
      $tid = $t->ID;
      ?>
      <div class="slide">
        <a href="<?php echo get_permalink($tid);?>?service_id=carousel">



        <?php
        $title = get_post_meta( $tid, 'property-info', true );
        $title = $title[0];


        //GET THE IMAGE
        if(has_post_thumbnail($tid)) {
          $thumbid = get_post_thumbnail_id($tid);
          $thumbURL =  wp_get_attachment_image_src($thumbid, 'full');
          $thumbURL = $thumbURL[0];
          $thumb800 =  wp_get_attachment_image_src($thumbid, 'large');
          $thumb800 = $thumb800[0];
        } else {
          $thumbURL = $siteDir.'/assets/imgs/blank.png';
          $thumb800 = $siteDir.'/assets/imgs/blank.png';
        }

        //GET DESKTOP IMAGE



        ?>





        <div class="grey-bg ">
          <div class="theImg">

            <img class="hide" data-src="<?php echo $thumbURL;?>" data-800="<?php echo $thumb800;?>"/>
          </div>

        </div>
        <div class="hover-state"></div>
        <div class="title">
          <div class="copy">
            <div class="head">
              <?php echo $t->post_title;?>
            </div>

            <div class="sub">
              <?php echo $title['location'];?>
            </div>
          </div>
        </div>

      </a>
    </div>

      <?php
  }
  ?>
</div>
</div>
<?php

}

?>

<div id="dt-map" class="section">
  <div class="container">
    <div class="holder">

    <img class="main-img" data-src="<?php echo $siteDir;?>/assets/imgs/map-1622-9_17.png" />
    <div class="apparatus aspecter" data-basewidth="1622">
      <h1 id="top-copy">
        <span class="text">
          R4 Capital Locations Map

        </span>
      </h1>
      <a href="<?php echo $homeURL;?>property/regency-pointe/" class="dot right __not-hovering" style="bottom:<?php echo (170/14);?>em; right: <?php echo (504/14);?>em;">
        <span class="line"></span>
        <div class="info">

            <div class="large">
              <b>104 units</b><br/>
              Regency Pointe
            </div>
            <div class="small">
              New Construction<br/>
              <!--<a href="<?php echo $homeURL;?>property/regency-pointe/">(see images)</a>-->
            </div>
        </div>
      </a>
      <!-- MCDONOUGH-->
      <a  href="<?php echo $homeURL;?>property/mcdonough-16/" id="mcdonough" class="dot bottom __not-hovering" style="bottom:<?php echo (255/14);?>em; right: <?php echo (745/14);?>em;">
        <span class="line"></span>
        <div class="info">

            <div class="large">
              <b>64 Units</b><br/>
              McDonough 16
            </div>
            <div class="small">
              Rehabilitation<br/>
              <!--<a href="<?php echo $homeURL;?>property/mcdonough-16/">(see images)</a>-->
            </div>
        </div>
      </a>

      <!-- Lake Washington-->
      <a  href="<?php echo $homeURL;?>property/lake-washington-apartments/?service_id=map" id="lake-washington" class="dot left-side __not-hovering" style="top:<?php echo (60/14);?>em; left: <?php echo (145/14);?>em;">
        <span class="line"></span>
        <div class="info">
            <div class="large">
              <b>379 Apartments</b><br/>
              Lake Washington <br/>Apartments
            </div>
            <div class="small">
              Rehabilitation<br/>
            <!--  <a href="<?php echo $homeURL;?>property/lake-washington-apartments/?service_id=map">(see images)</a>-->
            </div>
        </div>
      </a>

      <!-- Coronado-->
      <a  href="<?php echo $homeURL;?>property/coronado-park-senior-village/"id="coronado" class="dot right __not-hovering" style="bottom:<?php echo (68/14);?>em; left: <?php echo (450/14);?>em;">
        <span class="line"></span>
        <div class="info">
            <div class="large">
              <b>56 Units</b><br/>
              Coronado Park <br/>Senior Village
            </div>
            <div class="small">
              New Construction<br/>
              <!--<a href="<?php echo $homeURL;?>property/coronado-park-senior-village/">(see images)</a>-->
            </div>
        </div>
      </a>

      <!-- Harvest Park -->
      <a href="<?php echo $homeURL;?>property/harvest-park/" id="harvest-park" class="dot left-side  __not-hovering" style="bottom:<?php echo (582/14);?>em; left: <?php echo (112/14);?>em;">
        <span class="line"></span>
        <div class="info">

            <div class="large">
              <b>90 Units</b><br/>
              Harvest Park
            </div>
            <div class="small">
              New Construction<br/>
              <!--<a href="<?php echo $homeURL;?>property/harvest-park/">(see images)</a>-->
            </div>
        </div>
      </a>

      <!-- Fresno RAD -->
      <a  href="<?php echo $homeURL;?>property/fresno-rad/" id="fresno-rad" class="dot right-align bottom __not-hovering" style="bottom:<?php echo (455/14);?>em; left: <?php echo (180/14);?>em;">
        <span class="line"></span>
        <div class="info">

            <div class="large">
              <b>193 Units</b><br/>
              Fresno RAD
            </div>
            <div class="small">
              Rehabilitation<br/>
            <!--  <a href="<?php echo $homeURL;?>property/fresno-rad/">(see images)</a>-->
            </div>
        </div>
      </a>

      <!-- Parklane-->
      <a  href="<?php echo $homeURL;?>property/parklane-apartments/" id="parklane" class="dot left-side __not-hovering" style="top:<?php echo (100/14);?>em; left: <?php echo (125/14);?>em;">
        <span class="line"></span>
        <div class="info">

            <div class="large">
              <b>260 Units</b><br/>
              Parklane<br/> Apartments
            </div>
            <div class="small">
              Rehabilitation<br/>
              <!--<a href="<?php echo $homeURL;?>property/parklane-apartments/">(see images)</a>-->
            </div>
        </div>
      </a>

    </div>
    </div>
  </div>

    
</div>


<?php get_footer(); ?>
