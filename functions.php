<?php
/**
 * All functions and scripts
 *
 * @link 
 *
 * @package NewsPaper-Magazine Material
 * @since NewsPaper-Magazine Material by Md.Abrar v2.4
 * Theme Name: Newspaper Material by Md. Abrar Rebuild
 */

// Adding Supports for theme

add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5',array('searchform') );

// disabling wordpress auto markups
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

// function cleanup_shortcode_fix($content) {
//     $array = array('<p>[' => '[', ']</p>' => ']', ']<br />' => ']', ']<br>' => ']');
//     $content = strtr($content, $array);
//     return $content;
// }

// add_filter('the_content', 'cleanup_shortcode_fix');
// $string = preg_replace_('/<p>s*</p>/', '', $string);
// add_filter('the_content', 'cleanup_shortcode_fix', 1);
// function replace_core_jquery_version() {
//     wp_deregister_script( 'jquery-core' );
//     wp_register_script( 'jquery-core', "https://code.jquery.com/jquery-3.3.1.min.js", array(), '3.3.1' );
//     wp_deregister_script( 'jquery-migrate' );
//     wp_register_script( 'jquery-migrate', "https://code.jquery.com/jquery-migrate-3.0.0.min.js", array(), '3.0.0' );
// }

// Limiting The words in the title doesn't work as the theme is custom coded
// function titleLimiter($title)
// {
// 	if(strlen($title)>55 && !(is_single()) && !(is_page()) && !(is_category()))
// 	{
// 		$title = substrl($title,0,55)."..";
// 	}
// 	return $title;
// }
// add_filter('the_title','titleLimiter');

function newspaperMD_enqueue() 
{
	// wp_enqueue_script( 'jquery-latest.min', get_template_directory_uri(). '/js/jquery-latest.min.js', array( 'jquery' ) );
	// wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri(). '/js/owl.carousel.min.js', array( 'jquery' ) );
	// wp_enqueue_script( 'material.min', get_template_directory_uri(). '/js/material.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'otmenu.min', get_template_directory_uri(). '/js/otmenu.min.js', array( 'jquery' ) ); 
	// wp_enqueue_script( 'shortcode-scripts.min', get_template_directory_uri(). '/js/shortcode-scripts.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'theme-scripts.min', get_template_directory_uri(). '/js/theme-scripts.min.js', array( 'jquery' ) );
	// wp_enqueue_script( 'ot-lightbox.min', get_template_directory_uri(). '/js/ot-lightbox.min.js', array( 'jquery' ) );
	
	// wp_enqueue_script( 'materialzine', get_template_directory_uri(). '/js/materialzine.js', array( 'jquery' ) );
	// wp_enqueue_script( 'custom-scripts', get_template_directory_uri(). '/js/custom-scripts.js', array( 'jquery' ) );
	// wp_enqueue_script( '_ot-demo.min', get_template_directory_uri(). '/js/_ot-demo.min.js', array( 'jquery' ) );
	// wp_enqueue_script( 'facebookpixelscript', get_template_directory_uri(). '/js/facebookpixelscript.js', array( 'jquery' ) );
}
add_action('wp_footer', 'newspaperMD_enqueue');



//Registering Menus
register_nav_menus(
	array(
		'primary' => __( 'Primary Menu' ),
		'primary_minimal' => __( 'Primary Menu Minimal' )

		// register footer menu here
	)
);

//Registering Sidebar
if ( function_exists('register_sidebars') ) 
{

	register_sidebar(array(
		'name' => 'Widgets',
		'id' => 'sidebar-main',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' =>'<h3><span>',
		'after_title' => '</h3></span>',
	));

	register_sidebar(array(
		'name' => 'Widget Top',
		'id' => 'sidebar-top',
		'before_widget' => '<div class="header-blocks-aspace">
								<a href="#" target="_blank">',
		'after_widget' => '</a>
							</div>',
		'before_title' =>'<h3><span>',
		'after_title' => '</h3></span>',
	));

	register_sidebar(array(
		'name' => 'Widget Right',
		'id' => 'sidebar-right',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' =>'<h3><span>',
		'after_title' => '</h3></span>',
	));


	// These sidebars are designed for image/gif/vid ads so titles may not be necessary   
	register_sidebar(array(
		'name' => 'Widget Mid Page',
		'id' => 'sidebar-midpage',
		'before_widget' => '<div class="ot-do-large-space">',
		'after_widget' => '</div>',
		'before_title' =>'<h3><span>',
		'after_title' => '</h3></span>',
	));

	

	register_sidebar(array(
		'name' => 'Widget Bottom',
		'id' => 'sidebar-bottom',
		'before_widget' => '<div class="footer-widget-column otg-item">
						
						<div class="widget">',
		'after_widget' => '</div></div>',
		'before_title' =>'<h3><span>',
		'after_title' => '</h3></span>',
	));
	
}

//Non-WP Functions

//Post Counter
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/* Personal Fuctions*/
// function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
//     $children = get_categories( array( 
//         'child_of'      => $term_id,
//         'taxonomy'      => $taxonomy,
//         'hide_empty'    => false,
//         'fields'        => 'ids',
//     ) );
//     return ( $children );
// }


// function is_subcategory (){
//     $cat = get_query_var('cat');
//     $category = get_category($cat);
// 	$category-&gt;parent;
//     return ( $category-&gt;parent == '0' ) ? false : true;
// }

// Wordpress Modifier Functions
function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}