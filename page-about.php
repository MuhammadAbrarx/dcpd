<?php get_header(); ?>

<!-- BEGIN #content -->
<main id="content">

	<!-- BEGIN .wrapper -->
	<div class="wrapper">

		<div class="ot-content-with-sidebar-right">

			<div class="ot-main-page-content">

				<div class="ot-title-block">
					<h2><?php echo single_cat_title("", false); ?>
					 </h2>
				</div>

				<div class="ot-content-block">

					<div class="ot-grid-article-list otg otg-items-2 otg-h-30 otg-v-30">
						<?php
								
								// $category = get_category( get_query_var( 'cat' ) );
								// $cat_id = $category->cat_ID;
								$cat_id = get_query_var('cat');
				        		$query_args = array(
				        			'cat' => $cat_id,
				        			'posts_per_page'=>10,
				        			'order_by'=>'date',
				        			'order' => 'DESC'

				        			);
				        		$query = new WP_Query($query_args);
				        		if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); 

		        		?>
						<div class="otg-item">
							<div class="ot-material-card">
								<a href="<?php the_permalink($post->ID); ?>" class="item-header">
								<!-- <img src="images/photos/image-1.jpg" alt="" /> -->
								<?php the_post_thumbnail( 'full' , array('id' => 'img' )); ?>
								</a>
								<div class="item-content">
									<h3>
									<a href="<?php the_permalink($post->ID); ?>">
									<?php the_title(); ?>
									</a>
									</h3>
									<span class="meta-items">
										<a href="blog.html" class="meta-items-i">
										<i class="material-icons">person</i>
										<?php 
												global $current_user;
			      								get_currentuserinfo();

			      								echo $current_user->user_login;
	      									?>
										</a>
										<i class="meta-items-i">
										<i class="material-icons">access_time</i>
										<?php 
											echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
										?></i>
									</span>
									<!-- <p>Eum et novum mollis corpora. Ad lorem altera omittantur pro, eros modus dolore id usu. His hinc munere intellegebat in. Sea tibique dissentias ea. Nominati voluptatum ullamcorper eos ut</p> -->
									<?php 
									// the_content_limit(350,'MORE...'); //Limit post plugin
									the_content_limit(350,'Click on Read More Button to Read Entire Article'); //Limit post plugin
									// the_content('',true); //DEFAULT WORDPRESS FUNCTION 
								?>
								</div>
								<div class="item-footer">
									<a href="<?php the_permalink($post->ID); ?>" class="card-footer-button">Read more</a>
									<a href="#" class="card-footer-button">Read later</a>
								</div>
							</div>
						</div>

						<?php endwhile; ?>
						<?php else: echo '<p>No Content Found</p>'; endif; ?>
						<?php
							 // wp_reset_postdata();
						?>

					</div>

					
					
					<!-- <div class="ot-main-panel-pager">
						<a class="prev page-numbers" 
						href="<?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>">
							<i class="fa fa-angle-double-left"></i>Previous</a>
						<a class="page-numbers" href="#">1</a>
						<span class="page-numbers current">2</span>
						<a class="page-numbers" href="#">3</a>
						<a class="page-numbers" href="#">4</a>
						<a class="page-numbers" href="#">5</a>
						<a class="next page-numbers" 
						href="<?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>">Next<i class="fa fa-angle-double-right"></i></a>
					</div> -->
<!-- 
					<div class="ot-main-panel-pager">
						<a href="#" class="ot-main-pager-button">View more articles</a>
					</div> -->

					<div class="ot-main-panel-pager">
						<!-- <a href="#" class="ot-main-pager-button left"><i class="fa fa-angle-double-left"></i>Newer posts</a>
						<a href="#" class="ot-main-pager-button right active">Older posts<i class="fa fa-angle-double-right"></i></a> -->
						<p>3 of 7 pages</p>
					</div>
					
					


					<!-- <div class="ot-content-block">
						<?php
							// echo 'Banner Advertisement'; 
							// 	// get_template_part('review'); 
							// get_template_part('widget_advertisement');
						?>
					</div> -->
				</div>

			</div>

			<?php get_sidebar(); ?>

		</div>

		<!-- END .wrapper -->
	</div>

	<!-- BEGIN #content -->
</main>

<!-- BEGIN #footer -->
<?php get_footer(); ?>