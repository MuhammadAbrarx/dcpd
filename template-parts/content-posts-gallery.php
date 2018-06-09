<div class="wrapper">
    <div class="otg " data-ot-css="" style="">
      <div class="otg-item otg-u-6">
        <div class="ot-title-block">
          <h2>দর্পণ গ্যালারি</h2>
        </div>
        <div class="ot-content-block">
          <div id="owl-post-gallery" data-breaking-timeout="4000" data-breaking-autostart="true" class="ot-block-article-slider otg otg-items-3 otg-h-30 otg-slider">
            <?php //$darpan_gallery = get_category_by_slug( 'darpan-gallery' ); ?>
            <?php
              $darpan_gallery_query_counter = 0 ;
              $darpan_gallery_query_args = array('category_name' => 'darpan-gallery');
              $darpan_gallery_query = new WP_Query($darpan_gallery_query_args);
              if ($darpan_gallery_query->have_posts()): while ($darpan_gallery_query->have_posts()) : $darpan_gallery_query->the_post(); 
                if (has_post_thumbnail()) 
                {
                  if($darpan_gallery_query_counter>5)
                  {
                    //additional loop break can't trust anybody
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
            <?php $darpan_gallery_query_counter++;
              } endwhile; else: echo '<p>No Content Found</p>'; endif;
              wp_reset_postdata();
              ?>
          </div>
        </div>
      </div>
    </div>
    <!-- END POSTS GALLERY-->
    <!-- END .wrapper -->
  </div>