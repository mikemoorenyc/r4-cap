<?php
/**
 * Template Name: News Page

 */
?>
<?php global $siteDir; global $homeURL; global $services;?>
  
<?php get_header(); ?>

<?php include 'newsoverviewmodule.php';?>

<div id="news-section">
  <div id="recent-transactions" class="section">
    <?php arrowCreator();?>


    <div class="inner">
    <!--  <div class="spacer"><div class="inner"></div></div>-->
    <?php
    $category_id = get_cat_ID('Recent Transactions');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'posts_per_page' => 20,
  'paged' => $paged,
  'cat' => $category_id
);

query_posts($args);
while ( have_posts() ) : the_post();
clip_block_maker(get_the_ID(), 'Recent Transactions');

?>



<?Php
endwhile;


?>


<!--  <div class="spacer"><div class="inner"></div></div>-->
    </div>
  </div>


  <div id="press-releases" class="section">
    <?php arrowCreator();?>

    <div class="inner">
      <!--  <div class="spacer"><div class="inner"></div></div>-->
    <?php
    $category_id = get_cat_ID('Press Releases');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'posts_per_page' => 20,
  'paged' => $paged,
  'cat' => $category_id
);

query_posts($args);
while ( have_posts() ) : the_post();
clip_block_maker(get_the_ID(), 'Press Releases');
?>



<?Php
endwhile;


?>


<!--  <div class="spacer"><div class="inner"></div></div>-->
    </div>
  </div>

  <div id="press" class="section">
    <?php arrowCreator();?>
    <div class="inner">
      <!--  <div class="spacer"><div class="inner"></div></div>-->
    <?php
    $category_id = get_cat_ID('Press');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'posts_per_page' => 20,
  'paged' => $paged,
  'cat' => $category_id
);

query_posts($args);
while ( have_posts() ) : the_post();
clip_block_maker(get_the_ID(), 'Press');
?>


<?Php
endwhile;


?>


  <!--<div class="spacer"><div class="inner"></div></div>-->
    </div>
  </div>



</div>


<?php get_footer(); ?>
