<?php
	get_header(); 
?>
			<!-- BEGIN #content -->
			<main id="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					
					<div class="ot-main-page-content">
						
						<div class="ot-content-block big-error-message">
							<!-- <img src="<?php //echo get_template_directory(). '/images/404.png'?>" alt="Error 404"> -->
							<img src="<?php bloginfo('template_url');s ?>/images/404.png" alt="Error 404">
							<h3>Error 404</h3>
							<strong>পৃষ্ঠা খুজে পাওয়া যায়নি</strong>
							<p>দুক্ষিত আপনি যে তথ্য অনুশন্ধান করছিলেন তা খুজে পাওয়া যায়নি ।<a href="contact.html">আমাদের সাথে যোগাযোগ করুন।</a>.</p>
							<p><a href="<?php get_home_url(); ?>" class="button-error">প্রচ্ছদে ফিরে যান</a></p>
						</div>

					</div>
					
					<!-- END .wrapper -->
				</div>
				
				<!-- BEGIN #content -->
			</main>
			
			<!-- BEGIN #footer -->
<?php get_footer(); ?>
