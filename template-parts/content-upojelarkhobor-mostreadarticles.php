<div class="wrapper">
  <div class="otg content-panel main-content content-with-sidebar lets-grid-wrap">
    <div class="ot-grid-column otg-item otg-u-4">
      <div class="otg">
        <div class="otg-item otg-u-6">
          <div class="ot-title-block">
            <h2>উপজেলার খবর</h2>
            <?php 
              //24 catid = slug subdistricts
                      $cat_subdistricts = get_category_by_slug('subdistricts');
                      $args = 
                      array(
                        'type' => 'post', 
                        'child_of' => $cat_subdistricts->term_id, 
                        'orderby' => 'name', 
                        'order' => 'ASC', 
                        'hide_empty' => FALSE, 
                        'hierarchical' => 1, 
                        'taxonomy' => 'category', 
                      );
                      $child_categories = get_categories($args);
                      $category_list1 = array();
                      $category_list2 = array();
                      $category_list = array();
              //For the purpose of Storing portion of Categories in Different Tabs,AND FOR ALL
              //Should not work but working
                      $category_list1[] = $current_category -> category_nicename;
              //defining the type of the array
                      $category_list2[] = $current_category -> category_nicename;
                      ?>
            <div class="ot-title-selector">
              <a href="#" data-ot-tab="all" class="active">সকল</a>
              <?php
                if ( !empty ( $child_categories ) )
                {
                //Just initializing Cat list
                  for ($i=0; $i <count($child_categories) ; $i++)
                  {
                    global $category_list; 
                    $category_list[] = $child_categories[$i]->cat_ID;
                  }
                  for ($i=0; $i <4 ; $i++)
                  { 
                //count($child_categories)
                    global $category_list1;
                    $category_list1[] = $child_categories[$i]->category_nicename;
                // echo $child_category->category_nicename; 
                    ?>
              <a href="#" data-ot-tab="<?php echo $child_categories[$i] -> category_nicename; ?>"><?php echo $child_categories[$i] -> name; ?></a>
              <?php }
                }
                ?>
              <span class="ot-title-selector-drop">
              <a href="#">অারো<i class="material-icons">arrow_drop_down</i>
              </a>
              <span>
              <?php 
                if ( !empty ( $child_categories ) )
                {
                  for ($i=4; $i <count($child_categories) ; $i++)
                  { 
                //count($child_categories)
                    global $category_list2;
                    $category_list2[] = $child_categories[$i]->category_nicename;
                // echo $child_category->category_nicename; 
                    ?>
              <a href="#" data-ot-tab="<?php echo $child_categories[$i] -> category_nicename; ?>"><?php echo $child_categories[$i] -> name; ?></a>
              <?php }
                }
                ?>
              </span>
              </span>
            </div>
          </div>
          <div class="ot-content-block ot-content-tabs">
            <div data-ot-tab="all" class="ot-content-tab active">
              <div class="otg otg-items-2 otg-h-30 otg-v-30">
                <div class="otg-item">
                  <?php
                    $category = get_category_by_slug('chandpur-central');//25 = Chandpur Upojela
                    $query_args_all = array(
                      'cat' => $cat_subdistricts->term_id,
                      'posts_per_page'=>1
                    );
                    $query_all = new WP_Query($query_args_all);
                    if ($query_all->have_posts()): while ($query_all->have_posts()) : $query_all->the_post();
                      if(has_post_thumbnail())
                      {
                    
                    
                        ?>
                  <div class="ot-articles-material-blog-list">
                    <div class="item item-vertical">
                      <div class="item-header">
                        <a href="#" class="read-later-widget-btn">
                        <i class="material-icons">access_time</i>
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                        <i class="ot-inline-tooltip">Read later</i>
                        </a>
                        <a href="<?php the_permalink($post -> ID); ?>" class="item-header-image">
                        <?php the_post_thumbnail('full', array('id' => 'img')); ?>
                        </a>
                      </div>
                      <div class="item-content">
                        <h2>
                          <a href="<?php the_permalink($post -> ID); ?>"><?php the_title(); ?></a>
                        </h2>
                        <span class="item-meta">
                          <span class="item-meta-item">
                            <!-- <i class="material-icons">person</i> -->
                            <i class="material-icons">access_time</i>
                            <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                          </span>
                          <!-- <a href="<?php //the_permalink($post->ID); ?>#comments" class="item-meta-item">
                            <i class="material-icons">chat_bubble_outline</i>35</a> -->
                        </span>
                        <?php echo substr(strip_tags($post->post_content), 0, 255); ?>
                      </div>
                    </div>
                  </div>
                  <?php } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); ?>
                </div>
                <div class="otg-item">
                  <div class="ot-articles-blog-list">
                    <?php
                      $category = get_category_by_slug('chandpur-central');//25 = Chandpur Upojela
                      $query_args_all = array(
                        'cat' => $cat_subdistricts->term_id,
                        'posts_per_page'=>5
                      );
                      $query_all = new WP_Query($query_args_all);
                      if ($query_all->have_posts()): while ($query_all->have_posts()) : $query_all->the_post();
                        if(has_post_thumbnail())
                        {
                          
                          
                          ?>
                    <div class="item item-small">
                      <div class="item-header">
                        <a href="#" class="read-later-widget-btn">
                        <i class="material-icons">access_time</i>
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                        <i class="ot-inline-tooltip">Read later</i>
                        </a>
                        <a href="<?php the_permalink($post -> ID); ?>" class="item-header-image">
                        <?php the_post_thumbnail('full', array('id' => 'img')); ?>
                        </a>
                      </div>
                      <div class="item-content">
                        <h2>
                          <a href="<?php the_permalink($post -> ID); ?>"><?php the_title(); ?></a>
                        </h2>
                      </div>
                    </div>
                    <?php } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
              if ( !empty ( $child_categories ) )
              {
              
                for ($i=0; $i <count($child_categories) ; $i++)
                { 
              //count($child_categories)
                  global $category_list1;
                  $category_list1[] = $child_categories[$i]->category_nicename;
              // echo $child_category->category_nicename; 
                  ?>
            <div data-ot-tab="<?php echo $child_categories[$i] -> category_nicename; ?>" class="ot-content-tab">
              <div class="otg otg-items-2 otg-h-30 otg-v-30">
                <div class="otg-item">
                  <div class="ot-articles-material-blog-list">
                    <?php
                      global $category_list;
                      
                      global $child_categories;
                      
                      $child_category_id = $child_categories[$i]->cat_ID;
                      $query_args1 = array(
                        'category_name' => $child_categories[$i]->category_nicename,
                        'posts_per_page'=>1
                      );
                      $query1 = new WP_Query($query_args1);
                      if ($query1->have_posts()): while ($query1->have_posts()) : $query1->the_post();
                        if(has_post_thumbnail())
                        {
                      
                      
                          ?>
                    <div class="item item-vertical">
                      <div class="item-header">
                        <a href="#" class="read-later-widget-btn">
                        <i class="material-icons">access_time</i>
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                        <i class="ot-inline-tooltip">Read later</i>
                        </a>
                        <a href="<?php the_permalink($post -> ID); ?>" class="item-header-image">
                        <?php the_post_thumbnail('full', array('id' => 'img')); ?>
                        </a>
                      </div>
                      <div class="item-content">
                        <h2>
                          <a href="<?php the_permalink($post -> ID); ?>"><?php the_title(); ?></a>
                        </h2>
                        <span class="item-meta">
                          <span class="item-meta-item">
                          <i class="material-icons">access_time</i>
                          <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                          </span>
                          <!-- <a href="<?php //the_permalink($post->ID); ?>#comments" class="item-meta-item">
                            <i class="material-icons">chat_bubble_outline</i>35</a> -->
                        </span>
                        <?php echo substr(strip_tags($post->post_content), 0, 255); ?>
                      </div>
                    </div>
                    <?php } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); ?>
                  </div>
                </div>
                <div class="otg-item">
                  <div class="ot-articles-blog-list">
                    <?php
                      $child_category_id = $child_categories[$i]->cat_ID;
                      
                      $query_args2 = array(
                        'category_name' => $child_categories[$i]->category_nicename,
                        'posts_per_page'=>5
                      );
                      $query2 = new WP_Query($query_args2);
                      if ($query2->have_posts()): while ($query2->have_posts()) : $query2->the_post();
                      
                        ?>
                    <div class="item item-small">
                      <div class="item-header">
                        <a href="#" class="read-later-widget-btn">
                        <i class="material-icons">access_time</i>
                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                        <i class="ot-inline-tooltip">Read later</i>
                        </a>
                        <a href="<?php the_permalink($post -> ID); ?>" class="item-header-image">
                        <?php the_post_thumbnail('full', array('id' => 'img')); ?>
                        </a>
                      </div>
                      <div class="item-content">
                        <h2>
                          <a href="<?php the_permalink($post -> ID); ?>"><?php the_title(); echo substr(strip_tags($post->post_content), 0, 255); ?></a>
                        </h2>
                      </div>
                    </div>
                    <?php endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php }
              }
              else
              {
                echo 'Child Categories Empty';
              }
              ?>
          </div>
        </div>
      </div>
      <div class="ot-title-block">
        <h2>জনপ্রিয় টপিক্স</h2>
      </div>
      <div class="ot-content-block">
        <div class="ot-articles-material-blog-list">
          <?php
            // $category = get_category(25);//25 = Chandpur Upojela
            // $category = get_category('mostread-articles');//25 = Chandpur Upojela
            // $query_args_topics = array(
            //  'cat' => '40,15,25,29',
            //  'posts_per_page'=>4
            // );
            $query_args_popularpost = array
            ( 
            'posts_per_page' => 4, 
            'meta_key' => 'wpb_post_views_count', 
            'orderby' => 'meta_value_num', 
            'order' => 'DESC'  
            );
            $popularpost = new WP_Query($query_args_popularpost);
            if ($popularpost->have_posts()): while ($popularpost->have_posts()) : $popularpost->the_post();
            if(has_post_thumbnail())
            {
              ?>
          <div class="item">
            <div class="item-header">
              <a href="#" class="read-later-widget-btn">
              <i class="material-icons">access_time</i>
              <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago '; ?>
              <i class="ot-inline-tooltip">Read later</i>
              </a>
              <a href="<?php the_permalink($post -> ID); ?>" class="item-header-image">
              <?php the_post_thumbnail('full', array('id' => 'img')); ?>
              </a>
            </div>
            <div class="item-content">
              <h2>
                <a href="<?php the_permalink($post -> ID); ?>"><?php the_title(); ?></a>
              </h2>
              <span class="item-meta">
                <span class="item-meta-item">
                <i class="material-icons">access_time</i>
                <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago '; ?>
                </span>
                <!-- <a href="<?php 
                  // the_permalink($post->ID); ?>#comments" class="item-meta-item">
                  <i class="material-icons">chat_bubble_outline</i>35</a> -->
              </span>
              <?php 
                echo substr(strip_tags($post->post_content), 0, 255);
                ?> 
            </div>
          </div>
          <?php } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_query();wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <div class="otg-item otg-u-2 sidebar">
      <aside id="sidebar" class="sidebar sidebar-right">
        <?php 
          get_sidebar( 'sidebar-main' ) 
          ?>
      </aside>
    </div>
  </div>
  <!-- END POSTS GALLERY -->
  <!-- END .wrapper -->
  <!-- BEGIN  -->
  <div class="wrapper">
    <div class="ot-grid-column otg-item otg-u-6">
      <div class="otg">
        <div class="otg-item otg-u-6">
          <div class="ot-content-block">
            <div class="ot-do-large-space">
              <a href="http://DailyChandpurDarpan.com" target="_blank">
                <!-- <img src="images/aspace-3.jpg" alt=""> -->
                <?php dynamic_sidebar('sidebar-midpage'); ?>
                </img>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>