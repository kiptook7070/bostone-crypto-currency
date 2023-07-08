<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bostone
 */
$bostone_embede_code = get_post_meta(get_the_ID(), '_bostone_embed_code', true); 

?>

<div class="col-md-6 col-lg-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post__item body-bg">
			<?php if($bostone_embede_code){ ?>
				<div class="blog_embed_code">
					<?php echo bostone_wp_kses($bostone_embede_code);?>
				</div>
			<?php } ?>								

			<div class="post__content">
				<h5 class="post__title">
					<a href="<?php the_permalink();?>"><?php the_title();?></a>
				</h5>
				<ul class="post__meta">
					<li>
						<a href="<?php the_permalink();?>">
							<i class="las la-clock"></i> <?php echo esc_html(get_the_time('d F, Y'));?>
						</a>
					</li>
					<li>
						<i class="las la-comments"></i> <?php comments_popup_link( __( '0 comment', 'bostone' ), __( '1 Comment', 'bostone' ), __( '% Comments', 'bostone' ) ); ?>
					</li>
				</ul>
				
				<p><?php the_excerpt();?></p>
				<?php 
					wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bostone' ),
						'after'  => '</div>',
					)
					);
				?>
			
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>