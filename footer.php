<?php global $siteDir; global $homeURL;?>


<script>
ga('send', 'pageview', '<?php echo get_page_link();?>');
</script>
</div>  <!-- #main-container -->
</div>

<script async="true" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script id="inline-scripts"><?php $inlinejs = file_get_contents($siteDir.'/js/inline-load.js'); dirReplacer($inlinejs);?></script>
</body>
</html>
