<?php
/**
 * The main template file
 *
 * @link 
 *
 * @package NewsPaper-Magazine Material
 * @since NewsPaper-Magazine Material by Md.Abrar v1.0
 */

?>

		<!-- BEGIN #footer -->
		<footer id="footer">

			<!-- BEGIN .wrapper -->
			<div class="wrapper">
				
				<div class="footer-widgets otg otg-items-4 otg-h-30 otg-v-30">
					
					<!-- BEGIN .footer-widget-column -->
					<div class="footer-widget-column otg-item">
						
						<div class="widget">
							<h3><span>দর্পণের ইতিহাস</span></h3>
							<div>
								<p>Justo ludus commune ius eu, omnes suscipit vute cu vis. Delectus salutandi quo ex, vim no atqui mollis alterum, pri unum euismod praesent te.</p>

								<p>Fabulas saperet his. Ei enim bonorum invenire quo.</p>

								<p>Utinam copiosae nominati eam cu, te erroribus explicari conceptam eam. Qui ad error omnesque cotidieque.</p>
							</div>
						</div>

						<!-- END .footer-widget-column -->
					</div>
					
					<!-- Advertisement Sections -->
					<?php
						$args_footer = array(
							'cat' => 45,
							'posts_per_page'=>1
							);
						$query_footer = new WP_Query($args_footer);
						if ($query_footer->have_posts()): while ($query_footer->have_posts()) : $query_footer->the_post();
						if(has_post_thumbnail())
						{


					?>
					<!-- BEGIN .footer-widget-column -->
					<div class="footer-widget-column otg-item">
						<?php 

							$post_id = get_the_ID(); 
						 
							get_template_part('widget_advertisement');
						 ?>

						<!-- END .footer-widget-column -->
					</div>

					<div class="footer-widget-column otg-item">
						
						<?php

							$post_id = get_next_post();
							get_the_post_thumbnail($next_post->ID);
						 
							get_template_part('widget_advertisement');
						 ?>

						<!-- END .footer-widget-column -->
					</div>
					<?php 	
						} 
						endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); 
					?>

					<!-- BEGIN .footer-widget-column -->
					<div class="footer-widget-column otg-item">
						
						<div class="widget">

							<?php get_template_part('module_featured_author')?>
							<!-- <h3><span>Latest flickr photos</span></h3>
							<div class="ot-widget-flicker-grid otg otg-items-3 otg-h-20 otg-v-20">
								
								<div class="item otg-item">
									<a href="#"><img src="http://farm8.staticflickr.com/7302/12333892565_fa980bc87f_q.jpg" alt="" /></a>
								</div>
								
								<div class="item otg-item">
									<a href="#"><img src="http://farm6.staticflickr.com/5521/12334281344_d9b279095f_q.jpg" alt="" /></a>
								</div>
								
								<div class="item otg-item">
									<a href="#"><img src="http://farm4.staticflickr.com/3798/12333834195_7dcb472dd5_q.jpg" alt="" /></a>
								</div>
								
								<div class="item otg-item">
									<a href="#"><img src="http://farm8.staticflickr.com/7308/12333833705_1e111fd1dd_q.jpg" alt="" /></a>
								</div>
								
								<div class="item otg-item">
									<div class="item-header">
										<a href="#"><img src="http://farm3.staticflickr.com/2852/12333832785_2b173fae28_q.jpg" alt="" /></a>
									</div>
								</div>
								
								<div class="item otg-item">
									<div class="item-header">
										<a href="#"><img src="http://farm6.staticflickr.com/5548/12334276684_4c4ab0dd86_q.jpg" alt="" /></a>
									</div>
								</div>

							</div>
							<a href="#" target="_blank" class="ot-widget-button">View flickr profile</a> -->
						</div>

						<!-- END .footer-widget-column -->
					</div>

				</div>

				<div class="footer-copyright">
					<p>&copy; 2016 Copyright NewsPaper Magazine Material by Md.Abrar</p>
				</div>

				<!-- END .wrapper -->
			</div>

			<!-- END #footer -->
		</footer>

		<div class="ot-follow-share">
			<a href="#" class="ot-color-facebook" data-h-title="Facebook"><i class="fa fa-facebook"></i></a>
			<a href="#" class="ot-color-twitter" data-h-title="Twitter"><i class="fa fa-twitter"></i></a>
			<a href="#" class="ot-color-google-plus" data-h-title="Google+"><i class="fa fa-google-plus"></i></a>
			<a href="#" class="ot-color-rss" data-h-title="RSS Feed"><i class="fa fa-rss"></i></a>
		</div>

		<!-- END .boxed -->
	</div>

	<?php wp_footer(); ?>
	<!-- END body -->
</body>
<!-- END html -->
</html>