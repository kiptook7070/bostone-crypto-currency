<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bostone
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post__details">
		<?php if(has_post_thumbnail()){ ?>
			<div class="post__thumb">
				<?php the_post_thumbnail();?>
			</div>
		<?php } ?>
		
		<div class="post__content">
			<div class="entry-content">
				<?php the_content();?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->