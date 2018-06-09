<?php /**
 * Template Name: Search Page
 *
 * @link 
 *
 * @package NewsPaper-Magazine Material
 * @since NewsPaper-Magazine Material by Md.Abrar v1.0
 */

get_header(); ?>
<!-- BEGIN #content -->
<main id="content">

	<!-- BEGIN .wrapper -->
	<div class="wrapper">

		<div class="ot-content-with-sidebar-right">

			<div class="ot-main-page-content">

				<div class="ot-title-block">
					<h2>সন্ধানকৃত খবরাখবর</h2>
				</div>

				<div class="ot-content-block">

					<div class="ot-articles-blog-list">
						<!-- times 5 -->
						<?php
                		$search_args = array(
                			'post_type' => 'post',
                            // 'posts_per_page' => -1,
                			'posts_per_page' => 5,
                			'orderby' => 'post_date',
                			'order' => 'DESC'
                		);
                            //Note, you can change the post_type to a CPT and set the number to pull and order to display them in here. 
                		$search_args = new WP_Query($search_args);
                		if ($search_args->have_posts()): while ($search_args->have_posts()) : $search_args->the_post(); 
                			if (has_post_thumbnail()) {

                		?>
						<div class="item">
							<div class="item-header">
								<a href="<?php the_permalink($recent_post -> ID); ?>"><?php the_post_thumbnail('full', array('id' => 'img')); ?></a>
							</div>
							<div class="item-content">
								<h2><a href="<?php the_permalink($recent_post -> ID); ?>"><?php the_title(); ?></a></h2>
								<span class="item-meta">
									<span class="item-meta-item"><i class="material-icons">access_time</i><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
									<!-- <a href="<?php //the_permalink($recent_post -> ID); ?>#comments" class="item-meta-item"><i class="material-icons">chat_bubble_outline</i>35</a> -->
								</span>
								<!-- <p></p> -->
								<?php the_content(); ?>
							</div>
						</div>

						<?php } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); ?>


					</div>

					<div class="ot-main-panel-pager">
						<a class="prev page-numbers" href="#"><i class="fa fa-angle-double-left"></i>Previous</a>
						<a class="page-numbers" href="#">1</a>
						<span class="page-numbers current">2</span>
						<a class="page-numbers" href="#">3</a>
						<a class="page-numbers" href="#">4</a>
						<a class="page-numbers" href="#">5</a>
						<a class="next page-numbers" href="#">Next<i class="fa fa-angle-double-right"></i></a>
					</div>

					<div class="ot-main-panel-pager">
						<a href="#" class="ot-main-pager-button">View more articles</a>
					</div>

					<div class="ot-main-panel-pager">
						<a href="#" class="ot-main-pager-button left"><i class="fa fa-angle-double-left"></i>Newer posts</a>
						<a href="#" class="ot-main-pager-button right active">Older posts<i class="fa fa-angle-double-right"></i></a>
						<p>3 of 7 pages</p>
					</div>

				</div>

			</div>

			<!-- <aside class="sidebar">

				<div class="widget">
					<h3><span>Advertisement space</span></h3>
					<div class="do-space">
						<a href="http://orange-themes.com" target="_blank"><img src="images/aspace-2.jpg" alt="" /></a>
					</div>
				</div>
			</aside> -->
			<?php 
			get_sidebar('sidebar-main'); ?>
		</div>

		<!-- END .wrapper -->
	</div>

	<!-- BEGIN #content -->
</main>
<?php get_footer(); ?>