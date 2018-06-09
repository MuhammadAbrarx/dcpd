
<div class="widget">
	<h3><span><?php echo 'Advertisement'; ?></span></h3>
	
	<div class="do-space">
		<!-- <a href="#" target="_blank"> -->
		<?php 
			// the_post_thumbnail( 'full' , array('id' => 'img' ));
			global $post_id; 
			// $post_id=get_the_ID();
			echo get_the_post_thumbnail( $post_id, 'full', array( 'id' => 'img','class'=>'img-responsive' ) );
		?>
		
	</div>
	
</div>
	
