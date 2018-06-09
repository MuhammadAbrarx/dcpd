<?php
/**
 * The main template file
 *
 * @link 
 *
 * @package NewsPaper-Magazine Material
 * @since NewsPaper-Magazine Material by Md.Abrar v2.4
 */

?>

<!DOCTYPE HTML>
<!-- BEGIN html -->
<html <?php language_attributes();  ?>>
<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> -->
	<!-- <meta name="description" content="" /> -->
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0"> -->
	<title >
		<?php wp_title( '|', true, 'right' ); ?>
	</title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/favicon.png" type="image/x-icon" />

	<?php wp_head(); ?>
	<!-- END head -->
</head>

<!-- header -->

<!-- BEGIN body -->
<!-- <body class="ot_debug"> -->
	<!-- what is this portion of code does is actually shows the breaking news all other common header functionalities -->
	<body class="ot-menu-will-follow" <?php //body_class(); ?>>

		<!-- BEGIN #boxed if not boxed ot menu will not follow -->
		
		<div id="boxed">


			<!-- BEGIN #header -->
			<header id="header">

				<div class="header-top-block">

					<!-- BEGIN .wrapper -->
					<div class="wrapper">

						<div class="header-breaking-news-block ot-breaking-news-body" data-breaking-timeout="4000" data-breaking-autostart="true">
							<strong>ব্রেকিং নিউজ</strong>
							<div class="ot-breaking-news-controls">
								<button data-break-dir="left">
									<i class="fa fa-angle-left">
									</i>
								</button>
								<button data-break-dir="right">
									<i class="fa fa-angle-right">
									</i>
								</button>
							</div>
							<div class="header-breaking-news-block-frame ot-breaking-news-content">
								<div class="header-breaking-news-block-inner ot-breaking-news-content-wrap">
									<?php
                  //Use Breaking news category id here
                    // $child_category_id = 41;//breaking-news id
									// $child_category = get_category( 'breaking-news' );
									$query_args = array('numberposts' => 10,'category_name' => 'breaking-news');
									$query = new WP_Query($query_args);
									if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); 
										?>
										<div class="item">
											<a href="<?php the_permalink(); ?>">
												<strong><?php the_title(); ?></strong>
											</a>
											<?php 
                    //has to match same category.. currently not functioning.. 
											$previous_post = get_previous_post(true,'');
                      // $next_post = get_adjacent_post( true, '', true, 'taxonomy_slug' );
											if (!empty( $previous_post ) ): echo $previous_post->post_title;
											endif;
											?>
										</div>
									<?php  endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_query(); ?>

								</div>
							</div>
						</div>

						<!-- this division shows the weather -->
						<!-- <i class="wi icon-39"> -->
							<div id="weather" class="header-weather-block">
								<span class="header-weather-block-deg">+30&deg;C</span>
								<i class="wi wi-day-hail"></i>
								<span class="header-weather-block-city">
									<strong>Chandpur, Bangladesh</strong>
									<span>Cloudy</span>
								</span>
							</div>

            <!-- <div id="weather"></div>
            	<button class="js-geolocation" style="display: none;">Use Your Location</button> -->

            	<!-- END .wrapper -->
            </div>

          </div>

          <!-- BEGIN .wrapper -->
          <div class="wrapper">
          	<!-- begin header block -->
          	<div class="header-blocks">

          		<div class="header-blocks-logo">
          			<a href="index.php" id="header-logo-image">
          				<img src="<?php bloginfo('template_url')?>/images/logo.png" alt="" />
          			</a>
          		</div>
          		<div class="header-blocks-aspace">
          			<a href="#" target="_blank">
          				<?php 
                  //here a sidebar is declared in main purpose of showing ad but other tasks can also be performed 
          				dynamic_sidebar( 'sidebar-top' );
          				?>
          			</a>
          		</div>
          		<?php wp_reset_postdata(); ?>
          	</div><!-- end header block -->


          	<div class="main-menu-placeholder">
          		<!-- <nav id="main-menu" class="otm otm-follow"> -->
          			<?php 
          			$args = 
          			array(
          				'theme_location'=>'primary',
                  'container'=>'nav',//(string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
                  'container_class'=>'otm otm-follow',//(string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
                  'container_id'=>'main-menu',//(string) The ID that is applied to the container.
                  'menu_class'=>'load-responsive',//(string) CSS class to use for the ul element which forms the menu. Default 'menu'.
                  'menu_id'=>false,//(string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
                  'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>'//its the default
                  // 'items_wrap'=>'<ul id=\"%1$s\" class=\"%2$s\">%3$s</ul>';

                ); 
          			wp_nav_menu($args); 
          			?>
          			<!-- </nav> -->
          			<a href="#search-header" class="search-header-bull">
          				<i class="material-icons">search</i>
          			</a>
          		</div>  
          	</div><!-- END .wrapper -->


          	<!-- the search overlay was here-->
          	<div id="search-overlay">
          		<div id="search-overlay-inner">
          			<?php get_search_form( ); ?>
          			<!-- here will be the articles  -->
          			<?php get_template_part('template-parts/content','searchform'); ?>
          		</div>
          	</div>
          	<?php //get_template_part( 'searchform') ?>
          	
          	<!-- END #header -->
          </header>
