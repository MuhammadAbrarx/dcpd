<?php get_header(); ?>
<!-- BEGIN #content -->
<main id="content">

	<!-- BEGIN .wrapper -->
	<div class="wrapper">

		<div class="ot-main-page-content">

			<div class="otg otg-items-2 otg-h-30 otg-v-30">
				<?php 
					$current_category = get_category(get_query_var('cat')); 
					$args = array('parent' => current_category->cat_ID);
					$categories = get_categories( $args );
					$categories_cnt = count(get_categories( $args ));
					
				
				   // $categories = get_categories ( 'child_of = 35');
				   // $arr_length = count($categories); 
				   // foreach ($categories as $category) 
				   // {
				  // 	 $option = '<option value = "/ category / archives /'.$category->category_nicename.'"> ';
					 // . $option = $category-> cat_name;
					 // . $option = '('.. $Category-> category_count ')';
					 // . $option = '</ option>';
					 // echo $option;
					if (have_posts()) : while (have_posts()) : the_post(); ?>
				   	<!-- for($i=0;$i<$categories_cnt;$i++) 
					{ 
					    // calculations 
					

				   	?> -->
				   	<div class="otg-item content-archive-list">
					<div class="ot-title-block">
						<h2 style="color: #ffae22; border-color: #ffae22;">Fashion articles</h2>
						<div class="ot-v-slider-navi ot-title-block-navi">
							<div class="owl-prev">prev</div>
							<div class="owl-next">next</div>
						</div>
					</div>

					<div class="ot-content-block ot-block-content-vertical-slider">

						<?php

								global $query_string;
				        		query_posts ('posts_per_page=3');
				        		if (have_posts()): while (have_posts()) : the_post(); 

		        		?>
						<!-- BEGIN .ot-block-content-vertical-slider-wrapper -->
						<div class="ot-block-content-vertical-slider-wrapper active">

							<?php

								global $query_string;
				        		query_posts ('posts_per_page=3');
				        		if (have_posts()): while (have_posts()) : the_post(); 

		        			?>
							<div class="item">
								<div class="item-header">
									<a href="post-video.html">
									<img src="wp-content/themes/NewsPaper-Magazine-Material-MdAbrar/images/photos/image-2.jpg" alt="" /></a>
								</div>
								<div class="item-content">
									<h3><a href="post-video.html"><?php the_title(); ?></a></h3>
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
										<i class="material-icons">access_time</i>23 minutes ago</i>
									</span>
								</div>
							</div>
							<?php endwhile; else: echo '<p>No Content Found</p>'; endif; ?>
							<!-- END .ot-block-content-vertical-slider-wrapper -->
						</div>

						<?php endwhile; else: echo '<p>No Content Found</p>'; endif; ?>


					</div>

					<a href="category.html" class="ot-widget-button">View more articles</a>
				</div>
				<?php endwhile; endif; ?>
				

			</div>

			<div class="ot-content-block ot-main-panel-pager">
				<a class="prev page-numbers" href="#"><i class="fa fa-angle-double-left"></i>Previous</a>
				<a class="page-numbers" href="#">1</a>
				<span class="page-numbers current">2</span>
				<a class="page-numbers" href="#">3</a>
				<a class="page-numbers" href="#">4</a>
				<a class="page-numbers" href="#">5</a>
				<a class="next page-numbers" href="#">Next<i class="fa fa-angle-double-right"></i></a>
			</div>

		</div>

		<!-- END .wrapper -->
	</div>

	<!-- BEGIN #content -->
</main>

<!-- BEGIN #footer -->
<?php get_footer(); ?>