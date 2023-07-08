<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bostone
 */

get_header();
bostone_single_page_banner();

?>

<!-- Blog Section Section -->
<section class="blog-section pt-120 pb-120">
	<div class="container">
		<div class="row gy-5 justify-content-center">
			<div class="col-lg-8">
				<article>
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content','page' );

						bostone_post_bottom();
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</article>
			</div>
			
			<div class="col-lg-4 col-md-8">
				<aside>
					<?php get_sidebar();?>
				</aside>
			</div>
		</div>
	</div>
</section>
<!-- Blog Section Section -->

<?php

get_footer();
