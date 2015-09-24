<?php get_header(); ?>
<?php include 'newsoverviewmodule.php';?>

<div id="news-section">
<?php
$transactionArray = array();
$releasesArray = array();
$pressArray = array();
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php /* How to display standard posts and search results */ ?>
	<?php

	$cat = get_the_category();
	$cat = $cat[0];
	if($cat->slug == 'recent-transactions') {
		array_push($transactionArray, get_the_ID());
	}
	if($cat->slug == 'press-releases') {
		array_push($releasesArray, get_the_ID());
	}
	if($cat->slug == 'press') {
		array_push($pressArray, get_the_ID());
	}


	?>







<?php endwhile; // End the loop. Whew. ?>

	<div id="recent-transactions" class="section">

<?php if (count($transactionArray) > 0): ?>


		<?php arrowCreator();?>
		<div class="inner">
			<?php
			foreach($transactionArray as $ta) {
				clip_block_maker($ta, 'Recent Transactions');
			}
			?>
		</div>



<?php endif; ?>
</div>


	<div id="press-releases" class="section">
<?php if (count($releasesArray) > 0): ?>


		<?php arrowCreator();?>
		<div class="inner">
			<?php
			foreach($releasesArray as $ta) {
				clip_block_maker($ta, 'Press Releases');
			}
			?>
		</div>



<?php endif; ?>
	</div>

	<div id="press" class="section">
<?php if (count($pressArray) > 0): ?>


		<?php arrowCreator();?>
		<div class="inner">
			<?php
			foreach($pressArray as $ta) {
				clip_block_maker($ta, 'Press');
			}
			?>
		</div>



<?php endif; ?>
	</div>


</div>


<?php get_footer(); ?>
