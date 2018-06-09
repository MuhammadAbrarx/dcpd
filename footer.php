<?php
/**
 * The template for displaying the footer
 *
 * @link 
 *
 * @package NewsPaper Material Magazine by Md.Abrar 2.4
 * @since NewsPaper Material Magazine by Md.Abrar 2.4
 */

?>


		<!-- BEGIN #footer -->
		<footer id="footer">

			<!-- BEGIN .wrapper -->
			<div class="wrapper">
				
				<div class="footer-widgets otg otg-items-4 otg-h-30 otg-v-30">
					<?php dynamic_sidebar( 'sidebar-bottom' ); ?>
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