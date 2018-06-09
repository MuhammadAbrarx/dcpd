
<?php

/*
Template Name: Multiple Categories (Category)
Author: Muhammad Abrar
Theme URI: Dailychandpurdarpan.com
Description: A handrolled WordPress Multipurpose Bootstrap theme
Version: 2.4
Tags: responsive, sky blue, bootstrap

License: Free for Personal Use Only
License URI: 

*/

get_header(); 

?>

<!-- BEGIN #content -->
<main id="content">

	<!-- BEGIN .wrapper -->
	<div class="wrapper">

		<div class="ot-main-page-content">
			<div class="ot-title-block">
				<h2>

					<?php
					$current_category_title = single_cat_title("", true); 
					?>
				</h2>
			</div>
			<div class="otg otg-items-2 otg-h-30 otg-v-30">

				<?php
				$current_category = get_category(get_query_var('cat'));
				$cat_ID =  $current_category->cat_ID;
				$args = array(
					'type'                     => 'post',
					'child_of'                 => $cat_ID,
					'orderby'                  => 'name',
					'order'                    => 'ASC',
					'hide_empty'               => FALSE,
					'hierarchical'             => 1,
					'taxonomy'                 => 'category',
				);
				$child_categories = get_categories($args );
				$category_list = array();
// $category_list[] = $category->term_id;
$category_list[] = $current_category->category_nicename;//defining the type of the array

if ( !empty ( $child_categories ) )
{
	foreach ( $child_categories as $child_category )
	{
		$category_list[] = $child_category->category_nicename;
// echo $child_category->category_nicename;		


		?>
		<div class="otg-item content-archive-list">
			<div class="ot-title-block">
				<h2 style="color: #ffae22; border-color: #ffae22;">

					<?php
					echo $child_category->name; 
					?>
				</h2>
				<div class="ot-v-slider-navi ot-title-block-navi">
					<div class="owl-prev">prev</div>
					<div class="owl-next">next</div>
				</div>
			</div>

			<div class="ot-content-block ot-block-content-vertical-slider">


				<?php

				$child_category_id = $child_category->cat_ID;
				$query_args = array(
					'category_name' => $child_category->category_nicename,
					'posts_per_page'=>3
				);
				$query = new WP_Query($query_args);
				if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
					if(has_post_thumbnail())
					{



						?>
						<!-- BEGIN .ot-block-content-vertical-slider-wrapper -->
						<div class="ot-block-content-vertical-slider-wrapper active">

							<div class="item">
								<div class="item-header">
									<a href="
									<?php
									the_permalink($post->ID); 
									?>">

									<?php
									the_post_thumbnail( 'small' , array('id' => 'img' )); 
									?>
								</a>
							</div>
							<div class="item-content">
								<h3>
									<a href="
									<?php
									the_permalink($post->ID); 
									?>">

									<?php
									the_title(); 
									?>
								</a>
							</h3>
							<span class="meta-items">
								<a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>" class="meta-items-i">
									<i class="material-icons">person</i>

									<?php

									global $current_user;
									get_currentuserinfo();

									// echo $current_user->user_login;
									the_author();

									?>
								</a>
								<i class="meta-items-i">
									<i class="material-icons">access_time</i>23 minutes ago</i>
								</span>
							</div>
						</div>
						<!-- END .ot-block-content-vertical-slider-wrapper -->
					</div>


					<?php

				} endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); 

				?>


			</div>


			<?php
			echo '<a href="' . esc_url( get_category_link( $child_category_id ) ) . '" class="ot-widget-button" >View More Articles</a>'; 
			?>


		</div>

		<?php
	}
}

?>


</div>

<div class="ot-content-block ot-main-panel-pager">
<!-- <a class="prev page-numbers" href="#">
<i class="fa fa-angle-double-left">
</i>Previous</a>
<a class="page-numbers" href="#">1</a>
<span class="page-numbers current">2</span>
<a class="page-numbers" href="#">3</a>
<a class="page-numbers" href="#">4</a>
<a class="page-numbers" href="#">5</a>
<a class="next page-numbers" href="#">Next<i class="fa fa-angle-double-right">
</i>
</a> -->
</div>

<?php
// get_sidebar( 'sidebar-main' ); 
?>
</div>

<!-- END .wrapper -->
</div>

<!-- BEGIN #content -->
</main>

<!-- BEGIN #footer -->

<?php
get_footer(); 
?>