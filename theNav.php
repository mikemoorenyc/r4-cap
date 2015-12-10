<header>
<span id="menu-toggler" class="pointer"></span>
<a href="<?php echo $homeURL;?>" class="mobile-logo"></a>
</header>
<nav>
<ul id="main-nav" class="no-style clearfix">

<!--<li class="home"><a class="logo" href="<?php echo $homeURL;?>"></a></li>-->

<li class="about-us with-sub">
  <a href="<?php echo $homeURL;?>history" class="title sub-opener">About Us</a>
    <ul class="sub-nav no-style">
      <li><a href="<?php echo $homeURL;?>history">History</a></li>
      <li><a href="<?php echo $homeURL;?>team/">Team</a></li>
    </ul>
</li>

<li class="services with-sub">

  <a href="<?php echo $homeURL;?>our-services/?service_id=0" class="title sub-opener">Services</a>

  <?php
  //$services = get_page_by_title('Services');
  //$list = get_post_meta( $services->ID, 'services', true );
  if(count($services) > 0) {
    echo '<ul class="sub-nav no-style">';
    $looper = 0;
    foreach($services as $s) {

      ?>
      <li>

        <a href="<?php echo $homeURL;?>our-services/?service_id=<?php echo $looper;?>">
          <?php echo $s->post_title;?>
        </a>

      </li>

      <?php
      $looper++;
    }



    echo '</ul>';
  }


  ?>


</li>


<li class="portfolio with-sub">
  <a href="<?php echo $homeURL;?>portfolio/?service_id=map" class="title sub-opener">Portfolio</a>
  <ul class="sub-nav no-style">
    <li><a href="<?php echo $homeURL;?>portfolio/?service_id=map">Locations Map</a></li>
    <li><a href="<?php echo $homeURL;?>portfolio/?service_id=properties">Featured Properties</a></li>
  </ul>

</li>

<!--
<li class="news">
  <a href="<?php echo $homeURL;?>news" class="title">News</a>

</li>
-->

<li class="contact with-sub">
  <a href="<?php echo $homeURL;?>contact" class="title sub-opener">Contact</a>
  <ul class="sub-nav no-style">
    <li><a href="<?php echo $homeURL;?>contact">Info</a></li>
    <li><a href="<?php echo $homeURL;?>careers">Careers</a></li>
  </ul>
</li>

<li class="login">
  <a href="http://r4cap.reportingcentral.net/" class="title" target="_blank">Log-In</a>

</li>


</ul>
</nav>
