<?php
/**
 * Bostone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bostone
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bostone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bostone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bostone, use a find and replace
		 * to change 'bostone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bostone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'bostone_image_770_420', 770,420, true );
		add_image_size( 'bostone_image_370_220', 370,220, true );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'bostone' ),
				'menu-2' => esc_html__( 'Fotter', 'bostone' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bostone_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		/*
		 * post-formats
		 */
		 
		add_theme_support( 'post-formats', array(
			'audio',
			'video',
		) );
	}
endif;
add_action( 'after_setup_theme', 'bostone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bostone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bostone_content_width', 640 );
}
add_action( 'after_setup_theme', 'bostone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bostone_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bostone' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bostone' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget__title">',
			'after_title'   => '</h4>',
		)
	);	
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Sidebar', 'bostone' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'bostone' ),
			'before_widget' => '<div class="col-lg-3 col-sm-6"><section id="%1$s" class="widget footer-widget text-light %2$s">',
			'after_widget'  => '</section></div>',
			'before_title'  => '<h6 class="footer__title text-white">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'bostone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bostone_scripts() {
	
	// Load CSS files
	wp_enqueue_style( 'bostone-googlefonts', '//fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style('bootstrap' , get_template_directory_uri(). '/assets/css/bootstrap.min.css');
	wp_enqueue_style('font-awosome' , get_template_directory_uri(). '/assets/css/all.min.css');
	wp_enqueue_style('line-awesome' , get_template_directory_uri(). '/assets/css/line-awesome.min.css');
	wp_enqueue_style('slicknav' , get_template_directory_uri(). '/assets/css/slicknav.css');
	wp_enqueue_style('magnific-popup' , get_template_directory_uri(). '/assets/css/magnific-popup.css');
	wp_enqueue_style('animate' , get_template_directory_uri(). '/assets/css/animate.css');
	wp_enqueue_style('owl' , get_template_directory_uri(). '/assets/css/owl.min.css');
	wp_enqueue_style('odometer' , get_template_directory_uri(). '/assets/css/odometer.css');
	wp_enqueue_style('nice-select' , get_template_directory_uri(). '/assets/css/nice-select.css');
	wp_enqueue_style('bostone-main' , get_template_directory_uri(). '/assets/css/main.css');	
	wp_enqueue_style( 'bostone-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bostone-style', 'rtl', 'replace' );
	
	// Load JS files
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'imagesloaded.pkgd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'masonry.pkgd', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'viewport', get_template_directory_uri() . '/assets/js/viewport.jquery.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'odometer', get_template_directory_uri() . '/assets/js/odometer.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/nice-select.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'loader', get_template_directory_uri() . '/assets/js/loader.js', array('jquery'), true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/assets/js/owl.min.js', array('jquery'), '578952', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri() . '/assets/js/countdown.min.js', array('jquery'),  true );
	wp_enqueue_script( 'bostone-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '578952', true );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bostone_scripts' );


/**
 * Main Menu
 */
function bostone_main_menu() {
		wp_nav_menu( array(
		'theme_location'    => 'menu-1',
		'depth'             => 5,
		'container'         => false,
		'menu_class'        => 'menu',
		'fallback_cb'       => 'bostone_navwalker::fallback',
		
		)
	); 	
}

/**
 * Fotter Menu
 */
function bostone_footer_menu() {
		wp_nav_menu( array(
		'theme_location'    => 'menu-2',
		'depth'             => 5,
		'container'         => false,
		'menu_class'        => ' ',
		'fallback_cb'       => 'bostone_navwalker::fallback',
		
		)
	); 	
}

/**
 * Bostone WP Kses
*/
 
function bostone_wp_kses($val){
	return wp_kses($val, array(
	
	'p' => array(
		'class' =>array()
	),
	'span' => array(),
	'small' => array(),
	'div' => array(),
	'strong' => array(),
	'b' => array(),
	'br' => array(),
	'h1' => array(),
	'i' => array(
		'class' =>array()
	),	
	'ul' => array(
		'class' =>array()
	),	
	'ul' => array(
		'id' =>array()
	),	
	'li' => array(
		'class' =>array()
	),	
	'li' => array(
		'id' =>array()
	),
	'h2' => array(),
	'h3' => array(),
	'h4' => array(),
	'h5' => array(),
	'h6' => array(),
	'a'=> array('href' => array(),'target' => array()),
	'iframe'=> array('src' => array(),'height' => array(),'width' => array()),
	
	), '');
}

// comment list modify

function bostone_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

		<div class="comment__item">
			<?php if(get_avatar($comment)){ ?>
			<div class="thumb">
				<?php echo get_avatar( $comment,70 ); ?>
			</div>
			<?php } ?>
			
			<div class="content">
				<div class="comments__item-header">
					<div class="titles">
						<h6 class="title">
							<?php comment_author_link() ?>
						</h6>
						<span><?php echo esc_html(get_comment_date('F j, Y')); ?></span>
					</div>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</div>
				<p>
					<?php comment_text(); ?>
				</p>
				<?php if ($comment->comment_approved == '0') : ?>
					<p><em><?php esc_html_e('Your comment is awaiting moderation.','bostone'); ?></em></p>
				<?php endif; ?>
			</div>
			
		</div>	
	</li>


<?php } 

// comment box title change
add_filter( 'comment_form_defaults', 'bostone_remove_comment_form_allowed_tags' );
function bostone_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	$defaults['comment_notes_before'] = '';
	return $defaults;

}

function bostone_comment_reform ($arg) {

$arg['title_reply'] = esc_html__('Leave a Reply','bostone');
$arg['comment_field'] = '<div class="row"><div class="form-group col-md-12"><div class="form-textarea"><textarea id="comment" class="comment_field form-control form--control-2" name="comment" cols="77" rows="3" placeholder="'. esc_attr__("Ask any question...", "bostone").'" aria-required="true"></textarea></div></div></div>';


return $arg;

}
add_filter('comment_form_defaults','bostone_comment_reform');

// comment form modify

function bostone_modify_comment_form_fields($fields){
	$commenter = wp_get_current_commenter();
	$req	   = get_option( 'require_name_email' );

	$fields['author'] = '<div class="contact__form row g-3"><div class="form-group col-lg-6"><div class="form-item"><input type="text" name="author" id="author" value="'. esc_attr( $commenter['comment_author'] ) .'" placeholder="'. esc_attr__("Your Name *", "bostone").'" size="22" tabindex="1"'. ( $req ? 'aria-required="true"' : '' ).' class="input-name form-control form--control-2" /></div></div>';

	$fields['email'] = '<div class="form-group col-lg-6"><div class="form-item"><input type="text" name="email" id="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'.esc_attr__("Your Email *", "bostone").'" size="22" tabindex="2"'. ( $req ? 'aria-required="true"' : '' ).' class="input-email form-control form--control-2"  /></div></div>';
	
	$fields['url'] = '<div class="form-group col-lg-12"><div class="form-item"><input type="text" name="url" id="url" value="'. esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'. esc_attr__("Your Website*", "bostone").'" size="22" tabindex="2"'. ( $req ? 'aria-required="false"' : '' ).' class="input-url form-control form--control-2"  /></div></div></div>';

	return $fields;
}
add_filter('comment_form_default_fields','bostone_modify_comment_form_fields');

// comment Move Field
function bostone_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'bostone_move_comment_field_to_bottom' );


// Modify search widget
function bostone_my_search_form( $form ) {
	$form = '
		
		<form method="get" id="searchform" class="search-form" action="' . esc_url(home_url( '/' )) . '" >
			<div class="input-group mb-3">
				<input type="text" value="' . esc_attr(get_search_query()) . '" name="s" id="s" class="form-control" placeholder="' . esc_attr__('Search Here' , 'bostone') .'">
				<button class="input-group-text"><i class="las la-search"></i></button>		
			</div>
		</form>

		
        ';
	return $form;
}
add_filter( 'get_search_form', 'bostone_my_search_form' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* Includes Files */ 

require get_template_directory() . '/inc/bostone-functions.php';
require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/required-plugin.php';
require get_template_directory() . '/inc/demo_install.php';

// Comment Excerpt

function bostone_custom_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'bostone_custom_excerpt_length', 999 );

