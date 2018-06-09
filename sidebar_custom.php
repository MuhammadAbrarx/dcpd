<aside class="sidebar">

	<?php dynamic_sidebar( 'sidebar' );?>
	<?php
								
			// $category = get_category( get_query_var( 'cat' ) );
			// $cat_id = $category->cat_ID;
			// $cat_id = get_query_var('cat');
			$cat_id = 46;
			$post_id=0;
    		$qry_args = array(
    			'cat' => $cat_id,
    			'posts_per_page'=>1,
    			'order_by'=>'date',
    			'order' => 'DESC'

    			);
    		$qry = new WP_Query($qry_args);
    		if ($qry->have_posts()): while ($qry->have_posts()) : $qry->the_post(); 

			if(has_post_thumbnail())
			{
				global $post_id; 

				$post_id = get_the_ID();
	?>
	<div class="widget">
		<?php 
			get_template_part('widget_advertisement');
		?>
		
	</div>

	<div class="widget widget_search">
		<?php 
			get_template_part('sidebar_articles');
		?>
	</div>

	<!-- <div class="widget widget_search">
	<?php 
	// get_template_part('sidebar_comments');
	?>
	</div> -->

	<!-- <div class="widget">
		<h3><span>Tag cloud</span></h3>
		<div class="tagcloud">
			<a href="blog.html">fabulas</a>
			<a href="blog.html">similique</a>
			<a href="blog.html">oportere</a>
		</div>
	</div> -->

	<!-- <div class="widget">
	<?php 
	//get_template_part('accordion_widgets') 
	?>
	</div> -->
	<?php 	
    		} endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); 
    ?>
</aside>