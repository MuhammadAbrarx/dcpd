<div class="wrapper">
  <div class="otg " data-ot-css="" style="">
    <div class="otg-item otg-u-6">
      <div class="ot-content-block">
        <div class="otg otg-items-2 otg-h-30 otg-v-30">
          <div class="otg-item">
            <div class="ot-title-block">
              <h2>শীর্ষ খবর</h2>
            </div>
            <div id="owl-slider" data-breaking-timeout="4000" data-breaking-autostart="true" class="owl-carousel ot-block-article-slider ot-block-article-slider-large-text otg otg-items-1 otg-h-30 otg-slider">
              <!-- Gallery type owl carousal slider  -->
              <?php
                // $cat_top_news_id = 42;
                $cat_top_news_slug = 'top-news';
                // $query_args = array('cat' => $cat_top_news_id,'posts_per_page' => 3);
                $top_news_query_counter = 0;
                $top_news_query_args = 
                array(
                    'category_name' => $cat_top_news_slug,
                    // 'posts_per_page' => 6
                  );
                $top_news_query = new WP_Query($top_news_query_args);
                if ($top_news_query->have_posts()): while ($top_news_query->have_posts() ) : $top_news_query->the_post(); 
                //Any post with no Featured image will not be visible
                //breaking the loop if ran more than 6 times
                if (has_post_thumbnail()) 
                {
                  if($top_news_query_counter>4)
                  {
                    break;
                  }
                ?>
              <div class="otg-item item">
                <a href="<?php the_permalink($post -> ID); ?>">
                  <!-- <img src="images/photos/image-1.jpg" alt="" /> -->
                  <?php the_post_thumbnail('full', array('id' => 'img')); ?>
                  <span class="item-content">
                  <strong><?php the_title(); ?></strong>
                    <span class="meta-items">
                    <i class="meta-items-i">
                    <i class="material-icons">person</i>
                    <?php
                      echo get_the_author();
                      ?>
                    </i>
                    <i class="meta-items-i">
                    <i class="material-icons">access_time</i>
                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></i>
                    </span>
                  </span>
                </a>
              </div>
              <?php 
                $top_news_query_counter++;
                } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); ?>
            </div>
          </div>
          <div class="otg-item">
            <div class="ot-title-block">
              <h2>সর্বশেষ খবর</h2>
              <!-- <div class="ot-v-slider-navi ot-title-block-navi">
                <div class="owl-prev">prev</div>
                <div class="owl-next">next</div>
                </div> -->
            </div>
            <div class="ot-block-content-vertical-slider">
              <!-- BEGIN .ot-block-content-vertical-slider-wrapper -->
              <div class="ot-block-content-vertical-slider-wrapper active">
                <!-- here show the recent posts made using php-->
                <?php
                  //IDs of the categories which are about to be excluded
                  $breaking_news_cat = get_category_by_slug('breaking-news');
                  $top_news_cat = get_category_by_slug('top-news');
                  $darpan_gallery_cat = get_category_by_slug('darpan-gallery');

                  $breaking_news_id = $breaking_news_cat->term_id;
                  $top_news_id = $top_news_cat->term_id;
                  $darpan_gallery_id = $darpan_gallery_cat->term_id;

                  $latest_news_query_counter = 0;

                  $latest_news_args = array(
                    'post_type' => 'post',
                    // 'posts_per_page' => 3,//post per page doesn't check more than 3 items for post thumbnail
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    // 'post__not_in' => array($breaking_news_id,$top_news_id,$darpan_gallery_id)
                    'post__not_in' => array($darpan_gallery_id)
                  );
                      //Note, you can change the post_type to a CPT and set the number to pull and order to display them in here. 
                  $latest_news_query = new WP_Query($latest_news_args);
                  if ($latest_news_query->have_posts()): while ($latest_news_query->have_posts()) : $latest_news_query->the_post(); 
                    if (has_post_thumbnail()) {
                      # code...
                      //additional breaks
                      if($latest_news_query_counter>2) 
                      {
                        //posts-per-page should work but who knows can't trust anybody
                        break;
                      }
                      ?>
                <div class="otg-item item">
                  <div class="item-header">
                    <a href="<?php the_permalink($recent_post -> ID); ?>">
                      <!-- <img src="images/photos/image-2.jpg" alt="" /> -->
                      <?php the_post_thumbnail('full', array('id' => 'img')); ?>
                    </a>
                  </div>
                  <div class="item-content">
                    <h3>
                      <a href="<?php the_permalink($recent_post -> ID); ?>"><?php the_title(); ?></a>
                    </h3>
                    <span class="meta-items">
                    <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID') ) ; ?>" class="meta-items-i">
                    <i class="material-icons">person</i><?php echo get_the_author(); ?></a>
                    <i class="meta-items-i">
                    <i class="material-icons">access_time</i>
                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                    </i>
                    </span>
                  </div>
                </div>
                <?php $latest_news_query_counter++; } endwhile; else: echo '<p>No Content Found</p>'; endif;wp_reset_postdata(); ?>
                <!-- END .ot-block-content-vertical-slider-wrapper -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END .wrapper -->
</div>