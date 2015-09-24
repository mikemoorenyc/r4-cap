<div id="mobile-news-header" class="clearfix">
<h1>
  <?php
  if(is_date()) {
    echo get_query_var('year');
  } else {
    echo 'News';
  }

  ?>
  </h1>

  <a href="#" class="archive-toggler"><span class="hide">Menu</span></a>

</div>

<div id="archive-list" class="archive-closed">
  <a href="#" class="archive-toggler closer">
    <div class="svg">
      <svg>
  			<use xlink:href="#close-svg" />
  		</svg>
    </div>

  </a>
  <div class="inner">
    <h3>Archives</h3>

    <ul class="no-style">

      <?php wp_get_archives('type=yearly'); ?>
    </ul>

  </div>

</div>

<?php


function extract_from_string($start, $end, $tring) {
  $tring = stristr($tring, $start);
  $trimmed = stristr($tring, $end);
  return substr($tring, strlen($start), -strlen($trimmed));
}

function clip_block_maker($id, $cat_name) {
  ?>

  <div class="clip-block">
    <div class="inner">
      <div class="category-header">
        <?php echo $cat_name;?>
      </div>

      <?php



      //IF it is a link post.

      if(get_post_format($id) !== 'link') {
        $thelink = get_permalink($id);
        $linktarget = '';
        $external = '';
      } else {

        $content = get_page( $id );
        $content = $content->post_content;


        $link_string = extract_from_string('<a href=', '/a>', $content);
        $link_bits = explode('"', $link_string);
        $thelink = $link_bits[1];
        $linktarget = 'target="_blank"';
        $external = '<strong>(External Link)</strong>';
      }
      ?>

      <a href="<?php echo $thelink;?>" <?php echo $linktarget;?> class="post-link">
        <span class="date"> <?php echo get_the_time('F j, Y', $id); ?></span>
        <span class="title"><?php echo get_the_title($id);?> <?php echo $external;?></span>
      </a>


    </div>
  </div>


  <?php
}

function arrowCreator() {
  ?>
  <div class="scroll-holder">
  <div class="scroll-element_corner"></div>
  <div class="scroll-arrow scroll-arrow_less">
    <div class="svg">
      <svg>
          <use xlink:href="#up-scroll" />
      </svg>
    </div>

  </div>
  <div class="scroll-arrow scroll-arrow_more">
    <div class="svg">
      <svg>
          <use xlink:href="#down-scroll" />
      </svg>
    </div>

  </div>
  <div class="scroll-element_outer">
    <div class="scroll-element_size"></div>
    <div class="scroll-element_inner-wrapper">
      <div class="scroll-element_inner scroll-element_track">
        <div class="scroll-element_inner-bottom"></div>
      </div>
    </div>
    <div class="scroll-bar" style="height: 0px; top: 0px;">
      <div class="scroll-bar_body">
        <div class="scroll-bar_body-inner"></div></div>
        <div class="scroll-bar_bottom"></div>
        <div class="scroll-bar_center"></div>
      </div>
    </div>
  </div>
  <?php
}

?>
