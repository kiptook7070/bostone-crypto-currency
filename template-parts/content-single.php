<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bostone
 */

$bostone_tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'bostone' ) );

$permalink = get_permalink(get_the_ID());
$title = get_the_title();
$bostone_embede_code = get_post_meta(get_the_ID(), '_bostone_embed_code', true); 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post__details">
		<?php if($bostone_embede_code){ ?>		
			<div class="blog_embed_code">
				<?php echo bostone_wp_kses($bostone_embede_code);?>
			</div>
		<?php }elseif(has_post_thumbnail()){ ?>
			<div class="post__thumb">
				<?php the_post_thumbnail('bostone_image_770_420');?>
			</div>
		<?php } ?>
		<div class="post__content">			
			<div class="entry-content">
				<?php the_content();?>
			</div>
				
			<div class="d-flex flex-wrap justify-content-between post-tag-share">
				<ul class="share">
					<li>
						<?php esc_html_e('Share:' , 'bostone');?> 
					</li>
					<li><a onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink) ;?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink) ;?>"><i class="lab la-facebook-f"></i></a></li>
					<li><a onClick="window.open('http://twitter.com/share?url=<?php echo esc_url($permalink) ;?>&amp;text=<?php echo esc_attr($title);?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo esc_url($permalink) ;?>&amp;text=<?php echo str_replace(" ", "%20", $title); ?>"><i class="lab la-twitter"></i></a></li>
					<li><a onClick="window.open('http://www.linkedin.com/shareArticle?url=<?php echo esc_url($permalink) ;?>&title=<?php echo esc_attr($title);?>','Linkedin','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.linkedin.com/shareArticle?url=<?php echo esc_url($permalink) ;?>&title=<?php echo esc_attr($title);?>"><i class="lab la-linkedin-in"></i></a></li>
					<li><a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="lab la-pinterest"></i></a></li>
				</ul>
				
				<?php if($bostone_tags_list == true){ ?>
				<ul class="tags">
					<li>
						<?php esc_html_e('Tags:' , 'bostone');?> 
					</li>
					<li>
						<?php echo $bostone_tags_list; ?>
					</li>
					
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
