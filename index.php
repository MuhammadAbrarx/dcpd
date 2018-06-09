<?php
/*
The main template file

Author: Muhammad Abrar
Theme URI: Dailychandpurdarpan.com
Description: A handrolled WordPress Multipurpose Bootstrap theme
Version: 2.4
Tags: responsive, sky blue, bootstrap
 
License: Free for Personal Use Only
License URI: 
 
*/

get_header(); ?>

	<!-- <div id="primary" class="content-area"> -->
		<!-- <main id="main" class="site-main" role="main"> -->

		<?php 
		if ( have_posts() ) : ?>

			<?php 
			// if ( is_home() && ! is_front_page() ) : ?>
				<!-- <header>
					<h1 class="page-title screen-reader-text"><?php 
					// single_post_title(); ?></h1>
				</header> -->
			<?php 
			// endif; ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', get_post_format() );
				the_title( );
				the_content( );

			// End the loop.
			endwhile;







			// Previous/next page navigation.
			// the_posts_pagination( array(
			// 	'prev_text'          => __( 'Previous page', 'twentysixteen' ),
			// 	'next_text'          => __( 'Next page', 'twentysixteen' ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			// ) );

		// If no content, include the "No posts found" template.
		else :
			echo 'No Content Found';

		endif;
		?>

		<!-- </main>.site-main -->
	<!-- </div>.content-area -->

<?php 
// get_sidebar(); ?>
<?php get_footer(); ?>

