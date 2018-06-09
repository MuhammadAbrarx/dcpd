<strong class="category-listing-title">

<span>আকর্ষণীয় খবর</span>

</strong>

<div class="ot-content-block">

  <div class="ot-grid-article-list otg otg-items-3 otg-h-30">

    <?php

      $query_args_popularpost = array

      ( 

        'posts_per_page' => 3, 

        'meta_key' => 'wpb_post_views_count', 

        'orderby' => 'meta_value_num', 

        'order' => 'DESC'  

      );

      

      $popularpost = new WP_Query($query_args_popularpost);

      if (

      $popularpost->have_posts()): while ($popularpost->have_posts()) : 

      $popularpost->the_post();

      if(has_post_thumbnail())

      {

      ?>

    <div class="otg-item">

      <div class="ot-material-card">

        <a href="<?php the_permalink($post -> ID);?>" class="item-header">

        <?php the_post_thumbnail('full', array('id' => 'img')); ?></a>

        <div class="item-content">

          <h3><a href="<?php the_permalink($post -> ID); ?>"><?php the_title(); ?></a></h3>

          <span class="meta-items">

          <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID') ) ; ?>" class="meta-items-i">

          <i class="material-icons">person</i><?php echo get_the_author(); ?></a>

          <i class="meta-items-i"><i class="material-icons">access_time</i>

          <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago '; ?></i>

          </span>

          <?php echo substr(strip_tags($post->post_content), 0, 255); ?>

        </div>

        <div class="item-footer">

          <a href="<?php the_permalink($post -> ID); ?>" class="card-footer-button">Read more</a>

          <a href="#" class="card-footer-button">Read later</a>

        </div>

      </div>

    </div>

    <?php 

      } 

      endwhile;

      else:echo '<p>No Content Found</p>';

      endif;

      wp_reset_query();

      wp_reset_postdata(); 

      ?>

  </div>

</div>