<!-- this portion enables the user to show content with an overlay & a search bar  -->
<!-- <div id="search-overlay"> -->
	<!-- <div id="search-overlay-inner"> -->
		<!-- <form action="<?php //echo home_url('/');?>" method="get"> -->
			<!-- <input type="text" value="<?php //get_search_query( ); ?>" placeholder="খবর সন্ধান করুন.."> -->
			<!-- <button type="submit"><i class="fa fa-search"></i></button> -->
			<!-- </form> -->
			<!-- here will be the articles  -->
			<!-- </div> -->
			<!-- </div> -->


			<form role="search" method="get" class="search-form" id="searchform" action="<?php echo home_url('/');?>" >
				<input type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="খবর সন্ধান করুন..">
				<button type="submit" class="search-submit" id="searchsubmit" value="search">
					<i class="fa fa-search"></i>
				</button>
			</form>
