<h3>
	<span>অন্যান্য খবর</span>
</h3>
<div class="ot-widget-article-list">

	<div class="item">
		<div class="item-header">
			<a href="<?php the_permalink($post->ID); ?>">
				<img src="images/photos/image-11.jpg" alt="" />
			</a>
		</div>
		<div class="item-content">
			<a href="#" class="read-later-widget-btn">
				<i class="material-icons">access_time</i>
				<?php 
				echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
				?>
				<i class="ot-inline-tooltip">Read later</i>
			</a>
			<h4>
				<a href="<?php the_permalink($post->ID); ?>">If You Really Want To, You'll Be Able To Immerse Yourself In The World</a>
			</h4>
		</div>
	</div>

	<div class="item">
		<div class="item-header">
			<a href="<?php the_permalink($post->ID); ?>">
				<img src="images/photos/image-12.jpg" alt="" />
			</a>
		</div>
		<div class="item-content">
			<a href="#" class="read-later-widget-btn">
				<i class="material-icons">access_time</i>
				<?php 
				echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
				?>
				<i class="ot-inline-tooltip">Read later</i>
			</a>
			<h4>
				<a href="<?php the_permalink($post->ID); ?>">Cum delenit luptatum et, suscipit legendos nec cu possim minimum philosophia.</a>
			</h4>
		</div>
	</div>

	<div class="item">
		<div class="item-header">
			<a href="<?php the_permalink($post->ID); ?>">
				<img src="images/photos/image-13.jpg" alt="" />
			</a>
		</div>
		<div class="item-content">
			<a href="#" class="read-later-widget-btn">
				<i class="material-icons">access_time</i>
				<?php 
				echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
				?>
				<i class="ot-inline-tooltip">Read later</i>
			</a>
			<h4>
				<a href="<?php the_permalink($post->ID); ?>">Mea nostro fabulas disputationi ex, quo audire prompta no hinc labitur omittam</a>
			</h4>
		</div>
	</div>

	<div class="item">
		<div class="item-header">
			<a href="<?php the_permalink($post->ID); ?>">
				<img src="images/photos/image-14.jpg" alt="" />
			</a>
		</div>
		<div class="item-content">
			<a href="#" class="read-later-widget-btn">
				<i class="material-icons">access_time</i>
				<?php 
				echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
				?>
				<i class="ot-inline-tooltip">Read later</i>
			</a>
			<h4>
				<a href="<?php the_permalink($post->ID); ?>">Mea nostro fabulas disputationi ex, quo audire prompta no hinc labitur omittam</a>
			</h4>
		</div>
	</div>

</div>
<a href="blog.html" class="ot-widget-button">View more articles</a>