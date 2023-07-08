<?php

function bostone_header_opt(){
	global $bostone;
	
	$bostone_header_style					 = '';
	
	if ( isset( $bostone['bostone_header_style'] ) ) {
		$bostone_header_style = $bostone['bostone_header_style'];
	}
	
	$bostone_meta_head_banner = get_post_meta(get_the_ID(), '_bostone_header_style', true);
	
	if($bostone_meta_head_banner){
		if($bostone_meta_head_banner == '2'){
			echo esc_attr(' dark-header-control dark-header');
		}
	}else{
		if($bostone_header_style == '2'){
			echo esc_attr(' dark-header-control dark-header');
		}
	}	
	
}

function bostone_header(){
	global $bostone;
	
	$bostone_languages_opt					 = '';
	$bostone_head_btn_text					 = '';
	$bostone_preloader_opt					 = '';
	$bostone_homepage_opt					 = '';
	$bostone_scroll_up_opt						 = '';
			
	if ( isset( $bostone['bostone_languages_opt'] ) ) {
		$bostone_languages_opt = $bostone['bostone_languages_opt'];
	}	
	
	if ( isset( $bostone['bostone_head_btn_text'] ) ) {
		$bostone_head_btn_text = $bostone['bostone_head_btn_text'];
	}	
	
	if ( isset( $bostone['bostone_head_btn_link'] ) ) {
		$bostone_head_btn_link = $bostone['bostone_head_btn_link'];
	}
	
	if ( isset( $bostone['bostone_preloader_opt'] ) ) {
		$bostone_preloader_opt = $bostone['bostone_preloader_opt'];
	}

	if ( isset( $bostone['bostone_homepage_opt'] ) ) {
		$bostone_homepage_opt = $bostone['bostone_homepage_opt'];
	}
	
	if ( isset( $bostone['bostone_scroll_up_opt'] ) ) {
		$bostone_scroll_up_opt = $bostone['bostone_scroll_up_opt'];
	}
	
	$bostone_custom_logo_id = get_theme_mod( 'custom_logo' );
	$bostone_custom_logo = wp_get_attachment_image_src( $bostone_custom_logo_id , 'full' );
	$bostone_meta_page_logo = get_post_meta(get_the_ID(), '_bostone_page_logo_opt', true);
	
	?>
	
	<?php if($bostone_header_dis_opt == '2'){ ?>
	
	<?php }else{ 
	
 if($bostone_preloader_opt == '1' && !$bostone_homepage_opt == '1') { ?>

    <!-- ==========Preloader Starts Here========== -->
    <div class="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>

    <!-- ==========Preloader Ends Here========== -->

<?php }elseif($bostone_preloader_opt == '1' && $bostone_homepage_opt == '1'){ ?>	

<?php if(is_front_page()) {?>

<!-- ==========Preloader Starts Here========== -->
<div class="overlayer">
	<div class="loader">
		<div class="loader-inner"></div>
	</div>
</div>

<!-- ==========Preloader Ends Here========== -->

<?php } } if($bostone_scroll_up_opt == true){ ?>


<div class="toTopBtn"><i class="fas fa-angle-up"></i></div>
<div class="overlay"></div>

<?php } ?>
	
<!-- Header Section -->
<header class="header-section <?php bostone_header_opt();?>">
	<div class="container">
		<div class="header-area">
			<div class="logo me-auto">
				<?php if($bostone_meta_page_logo){ ?>
					<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($bostone_meta_page_logo);?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"dfd /></a>          	
				<?php }elseif(get_custom_logo()){ ?>
					<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url($bostone_custom_logo[0]);?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>          				
				<?php }else{ ?>
					<a href="<?php echo esc_url(home_url('/'));?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/logo/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>          				
				<?php } ?> 		
			</div>
			
			<div class="main-menu">
				<?php bostone_main_menu();?>
				
			</div>
			
			<?php if(!empty($bostone_languages_opt)){ ?>
			<select class="select-bar">
				
				<?php foreach((array) $bostone_languages_opt as $social){ 
	
				$title = $url = '';

				if ( isset( $social['title'] ) )
					$title = $social['title'] ;

				if ( isset( $social['url'] ) )
					$link = $social['url'] ;
			
				?>
				
				<option value="<?php echo esc_attr($title);?>"><?php echo esc_html($title);?></option>
				
				<?php } ?>	

			</select>
			
			<?php } ?>
			<?php if($bostone_head_btn_link){ ?>
				<div class="header-buttons d-none d-lg-flex">
					<a href="<?php echo esc_url($bostone_head_btn_link);?>" class="cmn--btn bg--green rounded"><?php echo esc_html($bostone_head_btn_text);?></a>
				</div>
			<?php } ?>
			
			<div id="mobile-menu"></div>
		</div>
	</div>
</header>
<!-- Header Section -->
	
<?php } 
}

function bostone_footer(){
	
	global $bostone;
	
	$bostone_copywrite_text						 = '';

	
	if ( isset( $bostone['bostone_copywrite_text'] ) ) {
		$bostone_copywrite_text = $bostone['bostone_copywrite_text'];
	}
	
$bostone_footer_style = get_post_meta(get_the_ID(), '_bostone_footer_style', true);
?>

<!-- Footer Section -->
<footer class="footer-section-2 bg--dark position-relative overflow-hidden <?php if($bostone_footer_style == '2'){ echo esc_attr('top-clippy');}?>">
	<?php if (is_active_sidebar( 'sidebar-2' ) ) {?>
		<div class="container">
			<div class="pt-120 pb-120">
				<div class="row gy-5">				
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	
	<div class="footer-bottom text-white">
		<div class="container">
			<div class="row g-2">
				<div class="col-lg-6">
					<div class="copyright text-center text-lg-start">
						<?php if($bostone_copywrite_text){
							echo bostone_wp_kses($bostone_copywrite_text);
						}else{
							echo bostone_wp_kses('Copyright &copy; 2022 <a href="#" >Boston</a> all right reserved.');
						} ?>
						
					</div>
				</div>
				<div class="col-lg-6">
					<div class="quick-links justify-content-center justify-content-lg-end"><?php bostone_footer_menu();?></div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Section -->

<?php	

}

function bostone_bannar_img_url(){
	
	global $bostone;
	
	$bostone_theme_opt_banner_img						 = '';

	if ( isset( $bostone['bostone_theme_opt_banner_img']['url'] ) ) {
		$bostone_theme_opt_banner_img = $bostone['bostone_theme_opt_banner_img']['url'];
	}
	
	$bostone_meta_banner_img = get_post_meta(get_the_ID(), '_bostone_home_banner_img', true);
	$bostone_default_banner_img = get_template_directory_uri() . '/assets/images/shapes-bg/banner-shapes-bg.png';

	if($bostone_meta_banner_img){
		return $bostone_meta_banner_img;
	}elseif($bostone_theme_opt_banner_img){
		return $bostone_theme_opt_banner_img;
	}else{
		return $bostone_default_banner_img;
	}
}

function bostone_blog_banner(){
	global $bostone;
	
	$bostone_home_text						 = '';
	$bostone_blog_title						 = '';

	if ( isset( $bostone['bostone_home_text'] ) ) {
		$bostone_home_text = $bostone['bostone_home_text'];
	}	
	
	if ( isset( $bostone['bostone_blog_title'] ) ) {
		$bostone_blog_title = $bostone['bostone_blog_title'];
	}
	
	?>
	
    <!-- Hero Section -->
    <section class="page-header-section">
        <div class="hero-shape bg_img" data-img="<?php echo esc_url(bostone_bannar_img_url());?>"></div>
        <div class="container">
            <div class="page-content">
                <h2 class="title">
				<?php 
					 if($bostone_blog_title){
						echo esc_html($bostone_blog_title);
					}else{
						echo esc_html__('Blog' , 'bostone');
					} 
				?>
				</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php esc_url(home_url('/'));?>"><?php 

						 if($bostone_home_text){
							echo esc_html($bostone_home_text);
						}else{
							echo esc_html__('Home' , 'bostone');
						} 
					?>
					</a> 
                    </li>
                    <li>
                        <?php 

						 if($bostone_blog_title){
							echo esc_html($bostone_blog_title);
						}else{
							echo esc_html__('Blog' , 'bostone');
						} 
					?>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Hero Section -->
	
	<?php
}

function bostone_single_page_banner(){
	
	global $bostone;
	
	$bostone_home_text						 = '';
	
	if ( isset( $bostone['bostone_home_text'] ) ) {
		$bostone_home_text = $bostone['bostone_home_text'];
	}	
	$bostone_categories_list = get_the_category_list( esc_html__( ', ', 'bostone' ) );
	
	?>
	
    <!-- Hero Section -->
    <section class="page-header-section">
        <div class="hero-shape bg_img" data-img="<?php echo esc_url(bostone_bannar_img_url());?>"></div>
        <div class="container">
            <div class="page-content">
                <h2 class="title">
					<?php the_title();?> 
				</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php esc_url(home_url('/'));?>"><?php 

						 if($bostone_home_text){
							echo esc_html($bostone_home_text);
						}else{
							echo esc_html__('Home' , 'bostone');
						} 
					?>
					</a> 
                    </li>
                    <li>
                        <?php the_title();?> 
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Hero Section -->
	
	<?php
}

function bostone_archive_banner(){
	global $bostone;
	
	$bostone_home_text						 = '';
	
	if ( isset( $bostone['bostone_home_text'] ) ) {
		$bostone_home_text = $bostone['bostone_home_text'];
	}	
	
	?>

    <!-- Hero Section -->
    <section class="page-header-section">
        <div class="hero-shape bg_img" data-img="<?php echo esc_url(bostone_bannar_img_url());?>"></div>
        <div class="container">
            <div class="page-content">
                <h2 class="title">
					<?php the_archive_title();?>
				</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php esc_url(home_url('/'));?>"><?php 

						 if($bostone_home_text){
							echo esc_html($bostone_home_text);
						}else{
							echo esc_html__('Home' , 'bostone');
						} 
					?>
					</a> 
                    </li>
                    <li>
                        <?php the_archive_title();?>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Hero Section -->
	
	<?php
}

function bostone_search_banner(){
	global $bostone;
	
	$bostone_home_text						 = '';
	
	if ( isset( $bostone['bostone_home_text'] ) ) {
		$bostone_home_text = $bostone['bostone_home_text'];
	}	
	
	?>

    <!-- Hero Section -->
    <section class="page-header-section">
        <div class="hero-shape bg_img" data-img="<?php echo esc_url(bostone_bannar_img_url());?>"></div>
        <div class="container">
            <div class="page-content">
                <h2 class="title">
					<?php printf( esc_html__( 'Search Results for: %s', 'bostone' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php esc_url(home_url('/'));?>"><?php 

						 if($bostone_home_text){
							echo esc_html($bostone_home_text);
						}else{
							echo esc_html__('Home' , 'bostone');
						} 
					?>
					</a> 
                    </li>
                    <li>
                        <?php printf( esc_html__( 'Search Results for: %s', 'bostone' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Hero Section -->	
	

	<?php
}

function bostone_404_banner(){
	global $bostone;
	
	$bostone_404_title_text						 = '';
	
	$bostone_home_text						 = '';
	
	if ( isset( $bostone['bostone_home_text'] ) ) {
		$bostone_home_text = $bostone['bostone_home_text'];
	}	
	
	if ( isset( $bostone['bostone_404_title_text'] ) ) {
		$bostone_404_title_text = $bostone['bostone_404_title_text'];
	}	
	?>
 
<!-- Hero Section -->
<section class="page-header-section">
	<div class="hero-shape bg_img" data-img="<?php echo esc_url(bostone_bannar_img_url());?>"></div>
	<div class="container">
		<div class="page-content">
			<h2 class="title">
				<?php 
					if($bostone_404_title_text){
					echo esc_html($bostone_404_title_text);
					}else{
						echo esc_html__('404' , 'bostone');
					}
				?>
			</h2>
			<ul class="breadcrumb">
				<li>
					<a href="<?php esc_url(home_url('/'));?>"><?php 

					 if($bostone_home_text){
						echo esc_html($bostone_home_text);
					}else{
						echo esc_html__('Home' , 'bostone');
					} 
				?>
				</a> 
				</li>
				<li>
					<?php 
						if($bostone_404_title_text){
						echo esc_html($bostone_404_title_text);
						}else{
							echo esc_html__('404' , 'bostone');
						}
					?>
				</li>
			</ul>
		</div>
	</div>
</section>
<!-- Hero Section -->	

	<?php
}

function bostone_404_content(){
	global $bostone;
	
	$bostone_404_image						 = '';
	$bostone_404_page_title						 = '';
	$bostone_404_page_descrption						 = '';
	$bostone_404_btn_text						 = '';

	if ( isset( $bostone['bostone_404_page_title'] ) ) {
		$bostone_404_page_title = $bostone['bostone_404_page_title'];
	}		
	
	if ( isset( $bostone['bostone_404_image']['url'] ) ) {
		$bostone_404_image = $bostone['bostone_404_image']['url'];
	}	
	
	if ( isset( $bostone['bostone_404_page_descrption'] ) ) {
		$bostone_404_page_descrption = $bostone['bostone_404_page_descrption'];
	}	 	
	
	if ( isset( $bostone['bostone_404_btn_text'] ) ) {
		$bostone_404_btn_text = $bostone['bostone_404_btn_text'];
	}	 
?>

		<!-- Erron Section -->
		<section class="error-section pt-120 pb-120">
			<div class="container">
				<?php if($bostone_404_image){ ?>
					<div class="error-thumb pb-80">
						<img src="<?php echo esc_url($bostone_404_image);?>" alt="<?php echo esc_attr($bostone_404_page_title);?>">
					</div>
				<?php } ?>
				<div class="about--content">
					<div class="section-header section-header-center mb-4">
						<h2 class="section-title">
						<?php if($bostone_404_page_title){
							echo esc_html($bostone_404_page_title);
						}else{
							echo esc_html__('Page Not Found','bostone');
						}?>
						</h2>
						<h6 class="section-txt error-txt">
						<?php 
							if($bostone_404_page_descrption){
								echo esc_html($bostone_404_page_descrption);
							}else{
								esc_html_e( 'We’re not able to find what you were looking for.', 'bostone' ); 
							}
						
							?>
							
						</h6>
					</div>
					<?php if($bostone_404_btn_text){ ?>
						<div class="text-center">
							<a href="<?php echo esc_url(home_url('/'));?>" class="cmn--btn"><?php echo esc_html($bostone_404_btn_text);?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!-- Erron Section -->
<?php
}


function bostone_post_bottom(){
global $post;
$author_id = $post->post_author;	
?>

<div class="post__author my-4 my-lg-5">
		<div class="thumb">			
			<?php echo get_avatar(get_the_author_meta('email'), '60'); ?>
		</div>
		<div class="content">
			<h6 class="title"><?php echo get_the_author_meta( 'display_name', $author_id );?></h6>
			<p><?php echo get_the_author_meta( 'user_description', $author_id );?></p>
		</div>
	</div>
	
	<div class="post__related">
		<h4 class="title mb-4"><?php echo esc_html__('Related Posts' , 'bostone');?></h4>
		<div class="post__related-slider owl-theme owl-carousel">

		<?php

			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'post' ),
				'posts_per_page'         => '-1',
			);

			// The Query
			$bostone_rel_post_query = new WP_Query( $args );

			// The Loop
			if ( $bostone_rel_post_query->have_posts() ) {
				while ( $bostone_rel_post_query->have_posts() ) {
					$bostone_rel_post_query->the_post();
					
					 if(has_post_thumbnail()){ ?>
					 
					<div class="post__item post__related">
						
						<div class="post__thumb">
							<a href="<?php the_permalink();?>">
								<?php the_post_thumbnail('bostone_image_370_220');?>
							</a>
						</div>
						
						<div class="post__content">
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
							<h5 class="post__title mb-0">
								<a href="<?php the_permalink();?>"><?php the_title();?></a>
							</h5>
						</div>
					</div>	
				<?php } 
				}
			} else {
				// no posts found
			}

			// Restore original Post Data
			wp_reset_postdata();
		?>		

		</div>
	</div>
					
<?php	
}