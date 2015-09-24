<?php get_header(); ?>
<div id="interior-archive">

  <div id="archive-list" class="archive-closed">
    <a href="#" class="archive-toggler closer">
      <div class="svg">
        <?php include 'assets/imgs/icon-closed.svg';?>
      </div>

    </a>
    <div class="inner">
      <h3>Archives</h3>

      <ul class="no-style">

        <?php wp_get_archives('type=yearly'); ?>
      </ul>

    </div>

  </div>

</div>
<div id="post-interior">
  <a href="<?php echo $homeURL;?>news/" class="close-post-btn">

      <?php include 'assets/imgs/close-svg.svg';?>



  </a>
  <div class="dt-cat">
    <?php
    $cat = get_the_category();
    $cat = $cat[0];
    echo ($cat->name);

    ?>

  </div>
  <div class="scroller">
  <div class="post-header">

    <div class="date"><?php echo get_the_time('F j, Y'); ?></div>
    <h1><?php the_title();?></h1>



  </div>

  <div class="content-block">

  <?php the_content();?>
  </div>
</div>


</div>

<?php get_footer(); ?>
