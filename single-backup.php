<?php get_header(); ?>

<!-- BEGIN #content -->
<main id="content">

	<!-- BEGIN .wrapper -->
	<div class="wrapper">

		<div class="ot-content-with-sidebar-right">

			<div class="ot-main-page-content">

				<!-- THE PAGE TITLE -->
				<div class="ot-title-block">
					<h2>
						<?php 
						$linked_categories = get_the_category();
						//need to exclude some categories like uncategorized to show appropriate categories
						if($linked_categories[0]->name !== 'Uncategorized')
							echo $linked_categories[0]->name;
						else
							echo $linked_categories[1]->name;
						
						?>	
					</h2>
				</div>

				<div class="ot-content-block">
					<div class="ot-material-card ot-material-card-content" itemscope itemtype="http://schema.org/Blog">

						<div class="article-head">
							<div class="img-with-no-margin">
								<!-- <img itemprop="image" src="images/photos/image-45.jpg" alt="" /> -->
								<?php the_post_thumbnail( 'full' , array('id' => 'img' )); ?>
							</div>
							<h1 itemprop="headline"><?php the_title(); ?></h1>
							<meta itemprop="datePublished" content="2016-04-01" />
							<meta itemprop="dateModified" content="2016-04-01" />
							<div class="article-head-meta">
								<a href="#" class="meta-item">
									<i class="material-icons">person</i>
									<span itemprop="author">
										<?php 
										global $current_user;
										get_currentuserinfo();

										echo $current_user->user_login;
										?>

									</span>
								</a>
							<span class="meta-item"><i class="material-icons">access_time</i>7 hours ago</span>

							</div>
						</div>

					<div class="shortcode-content" itemprop="mainEntityOfPage">
						<?php the_content(); ?>
					</div>


					<div class="article-foot-tags">
						<strong>
						<i class="material-icons">content_copy</i>Categorized under</strong>
						<div>
						<?php 
							$linked_categories = get_the_category();
							//need to exclude some categories like uncategorized to show appropriate categories
							for ($i=0; $i <count($linked_categories) ; $i++) 
							{
								if ($linked_categories[$i]->name!=='Uncategorized') 
								{
								 	
						?>	
								
									<?php echo '<a href="' . esc_url( get_category_link( $linked_categories[$i]->term_id ) ) . '">' . esc_html( $linked_categories[$i]->name ) . '</a>'; ?>
									<?php
								} 
							} 
						?>
						</div>
					</div>

				</div>
			</div>
			<div class="ot-content-block">
				<!-- temporary use till implementation of comments -->
				<a href="#" class="ot-widget-button">Comments Are Coming Soon</a>
				<?php 
					// get_template_part('comments'); 
				?>
			</div>
			<div class="ot-content-block">

				<?php
				echo 'Banner Advertisement'; 
					// get_template_part('review'); 
				get_template_part('widget_advertisement')
				?>
			</div>
			<!-- <div class="ot-content-block about-author-block">
			<div class="ot-material-card ot-material-card-content">
			<?php 
				// get_template_part('about_author'); 
			?>
			</div>
			</div> -->


			<!-- <div class="ot-content-block">
			<div class="ot-material-card ot-material-card-content">
			<?php 
				// get_template_part('submit_review'); 
			?>
			</div>
			</div> -->

</div>

<?php 
//get_template_part('sidebar_custom'); 
 get_sidebar(); ?>

</div>

<!-- .wrapper ends -->
</div>

</main>

<!-- Footer -->
<?php get_footer(); ?>