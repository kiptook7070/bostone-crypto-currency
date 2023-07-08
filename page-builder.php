<?php
/**
 * Template Name: Page Builder Template
 *
 * 
 * @package bostone
 */

get_header(); 

$bostone_hide_banner = get_post_meta(get_the_ID(), '_bostone_hide_banner', true);

if($bostone_hide_banner == true){
	
}else{
	bostone_single_page_banner();
}


?>

<div class="clearfix"></div>

<div id="elementor_page_builder">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; // End of the loop. ?>

</div><!-- #main -->

<div class="clearfix"></div>

<?php get_footer(); ?>
