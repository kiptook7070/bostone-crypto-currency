<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bostone
 */

get_header();

bostone_archive_banner();

?>

<!-- Blog Section Section -->
<section class="blog-section pt-120 pb-120">
	<div class="container">
		<div class="row justify-content-center blog-item-wrap">
			<?php
			if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		

			else :

			get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</div>
		
		<div class="text-center mt-4 mt-md-5">
			<div class="pagination">
				<!-- pagination -->
				<?php the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => bostone_wp_kses( '<i class="las la-arrow-left"></i>' ),
					'next_text' => bostone_wp_kses( '<i class="las la-arrow-right"></i>' ),
				) ); ?>
				
			</div>
		</div>
	</div>
</section>
<!-- Blog Section Section -->

<?php

get_footer();
