
<?php  
get_header(); 

$current_category = get_category(get_query_var('cat'));
$cat_ID =  $current_category->cat_ID;
    // $exclude_array = 
                // array('uncategorized','');
$args = array(
	'type'                     => 'post',
	'child_of'                 => $cat_ID,
        // 'exclude'                   =>
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => TRUE,
	'hierarchical'             => 1,
	'taxonomy'                 => 'category',
);
$child_categories = get_categories($args );
$category_list = array();
    // $category_list[] = $category->term_id;
    $category_list[] = $current_category->category_nicename;//defining the type of the array
    ?>
    <?php 
	//showing multiple categories BEGIN
    if ( !empty ( $child_categories ) )
    	{ ?>
    		<!-- BEGIN #content -->
    		<main id="content">
    			<!-- BEGIN .wrapper -->
    			<div class="wrapper">
    			
    				<div class="ot-title-block">
    					<h1>
    						<?php
    						//these logics only here cause posts have to be in a category
    						if (is_author()) {
    							the_post();
    							echo 'Author : '.get_the_author();
    							rewind_posts();
    						}
    						elseif (is_day()) {
    							echo 'Day : '.get_the_date();
    						}
    						elseif (is_month()) {
    							echo 'Month : '.get_the_date('F Y');
    						}
    						elseif (is_year()) {
    							echo 'Year : '.get_the_date('Y');
    						}
    						else
    						{
    							echo 'Archives :';
    						} 
    						?>
    					</h1>
    				</div>
    			

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
                        <!-- <div class="ot-v-slider-navi ot-title-block-navi">
                            <div class="owl-prev">prev</div>
                            <div class="owl-next">next</div>
                        </div> -->
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

                                        //echo $current_user->user_login;
                    						the_author( );

                    						?>
                    					</a>
                    					<i class="meta-items-i">
                    						<i class="material-icons">access_time</i><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></i>
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
	//showing multiple categories END
}
else 
{ 
    	//showing multiple pages BEGIN

	?>
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
							$cat_id = get_query_var('cat');
							$query_args = array(
								'cat' => $cat_id,
								'posts_per_page'=>8,
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
												<a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>" class="meta-items-i">
													<i class="material-icons">person</i>
													<?php 
													global $current_user;
													get_currentuserinfo();

                                        //echo $current_user->user_login;
													the_author( );
													?>
												</a>
												<i class="meta-items-i">
													<i class="material-icons">access_time</i>
													<?php 
													echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
													?></i>
												</span>
												<?php 
												the_content_limit(350,'Read More'); 

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
                <?php get_sidebar( 'main' ); ?>
            </div>
            <!-- END .wrapper -->
        </div>
        <!-- BEGIN #content -->
    </main>
    <!-- BEGIN #footer -->
    <?php
	//showing multiple pages END
} 
get_footer(); ?>