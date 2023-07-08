<?php
function bostone_import_files() {
  return array(
  
    array(
      'import_file_name'             => esc_html__('Demo Import'  , 'bostone'),
      'categories'                   => array( 'bostone Category' ),
      'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo/demo-content.xml',
	  'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo/widget.wie',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . '/inc/demo/redux.json',
          'option_name' => 'bostone',
        ),
      ),
      
      'import_notice'                => esc_html__( 'It shows up right after on clicking the import sample data button Just click on it. Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'bostone' ),
      
    ),      
	

  );
  
    
}
add_filter( 'pt-ocdi/import_files', 'bostone_import_files' );




function bostone_after_import_files() {

	//Set Menu
	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');	
	$footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');	
	
	set_theme_mod( 'nav_menu_locations' , array( 
		  'menu-1' => $main_menu->term_id, 		  
		  'menu-2' => $footer_menu->term_id, 		  
		 ) 
	);
    
// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	
}

add_filter( 'pt-ocdi/after_import', 'bostone_after_import_files' );
