

<?php
  /**
   * The template for displaying category pages
   *
   * @link 
   *
   * @package NewsPaper Material Magazine by Md.Abrar 2.4
   * @since NewsPaper Material Magazine by Md.Abrar 2.4
   */
  
  ?>
<?php  
  get_header(); 
  
  $current_category = get_category(get_query_var('cat'));
  $cat_ID =  $current_category->cat_ID;
  //exclude uncategorized,top-news,breaking-news
  $cat_uncategorized = get_category_by_slug( uncategorized );
  $cat_top_news = get_category_by_slug( top-news );
  $cat_breaking_news = get_category_by_slug( breaking-news );
  // $exclude_array = 
  // array('uncategorized','');
  $args = array(
  	'type'                     => 'post',
  	'child_of'                 => $cat_ID,
    'category__not_in'         => array($cat_uncategorized->term_td, $cat_top_news->term_id,$cat_breaking_news->term_id),
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
  // function categoryCustom() {
     if ( !empty ( $child_categories ) )
     	{ ?>
<!-- BEGIN #content -->
<main id="content">
  <!-- BEGIN .wrapper -->
  <div class="wrapper">
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
          for ($i=0; $i <count($child_categories) ; $i++)
              // foreach ( $child_categories as $child_category )
              {
                   $child_category= $child_categories[$i];
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
              // $ourCurrentCategoryPage = get_query_var('page');
              //here post per page only loop upto 3 post & if those posts don't have post thumbnail
              //then no post is shown under category.. 
              //so manually overriding loop to fix post_per_page

              $counter_query_multiple_category=0;
              $query_args_multiple_category = array(
              	'category_name' => $child_category->category_nicename,
                  // 'offset' => 0,
              	// 'posts_per_page'=>3,
                  // 'paged'=>$ourCurrentCategoryPage
              );
              $query_multiple_category = new WP_Query($query_args_multiple_category);
              if ($query_multiple_category->have_posts()): while ($query_multiple_category->have_posts()) : $query_multiple_category->the_post();
              	if(has_post_thumbnail())
              	{
                    if($counter_query_multiple_category>2)
                    {
                      break;
                    }
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
            <?php $counter_query_multiple_category++;
              } endwhile; else: echo '<p>No Content Found</p>'; endif; wp_reset_postdata(); 
              
              ?>
          </div>
          <?php
            echo '<a href="' . esc_url( get_category_link( $child_category_id ) ) . '" class="ot-widget-button" >আরো খবর দেখুন</a>'; 
            ?>
        </div>
        <?php
          //breaking the loop if 6 categories shown already
          // if (i==6) {
          //     break;
          // }
          
          }
           ?>
        <!-- <div class="ot-main-panel-pager"> -->
        <?php  //echo paginate_links(); ?>
        <!-- </div> -->
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
        <?php //echo paginate_links(array('total'=>$query->max_num_pages)); 
          // next_posts_link('Next Page',$query->max_num_pages);?>
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
              
              //checking whatever is supported page or paged
              if ( get_query_var('paged') ) 
              {
                $ourCurrentPage = get_query_var('paged');
              } 
              else if ( get_query_var('page') ) 
              {
                $ourCurrentPage = get_query_var('page');
              } 
              else 
              {
                $ourCurrentPage = 1;
              }
              
              $query_counter = 0;
              $query_args = array(
              	'cat' => $cat_id,
              	'posts_per_page'=>6,
              	'order_by'=>'date',
              	'order' => 'DESC',
                'paged' => $ourCurrentPage
              
              );
              $query = new WP_Query($query_args);
              if ($query->have_posts()): while ($query->have_posts()) : $query->the_post(); 
              
              // if($query_counter>7)
              // {
              //     break;
              // }
              	?>
            <div class="otg-item">
              <div class="ot-material-card">
                <a href="<?php the_permalink($post->ID); ?>" class="item-header">
                  <!-- <img src="images/photos/image-1.jpg" alt="" /> -->
                  <?php if (has_post_thumbnail()) {
                      the_post_thumbnail( 'full' , array('id' => 'img' ));
                  } ?>
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
                    echo substr(strip_tags($post->post_content), 0, 255); 
                    
                    ?>
                </div>
                <div class="item-footer">
                  <a href="<?php the_permalink($post->ID); ?>" class="card-footer-button">আরো পড়ুন</a>
                  <!-- <a href="#" class="card-footer-button">পরে পড়ুন</a> -->
                </div>
              </div>
            </div>
            <?php $query_counter++;
              endwhile; ?>
            <!-- <div class="ot-main-panel-pager"> -->
            <!-- </div> -->
            <?php else: echo '<p>No Content Found</p>'; endif;?>
            <?php 
              //echo paginate_links(); 
                      //next_posts_link('Next Page',$query->max_num_pages);?>
          </div>
          <!-- <div class="ot-main-panel-pager">
            <a class="prev page-numbers" 
            href="<?php //echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>">
            <i class="fa fa-angle-double-left"></i>Previous</a>
            <a class="page-numbers" href="#">1</a>
            <span class="page-numbers current">2</span>
            <a class="page-numbers" href="#">3</a>
            <a class="page-numbers" href="#">4</a>
            <a class="page-numbers" href="#">5</a>
            <a class="next page-numbers" 
            href="<?php// echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>">Next<i class="fa fa-angle-double-right"></i></a>
            </div> -->
          <!-- 
            <div class="ot-main-panel-pager">
            <a href="#" class="ot-main-pager-button">আরো খবর দেখুন</a>
            </div> -->
          <div class="ot-main-panel-pager">
            <!-- <a href="" class="ot-main-pager-button left"> -->
            <!-- <i class="fa fa-angle-double-left"><?php //previous_posts_link('Newer Posts'); ?></i> -->
            <!-- </a> -->
            <!-- <a href="" class="ot-main-pager-button right active"> -->
            <!-- <i class="fa fa-angle-double-right"><?php //next_posts_link('Older Posts');?></i> -->
            <!-- </a> -->
            <?php echo paginate_links(array('total'=>$query->max_num_pages)); 
              // next_posts_link('Next Page',$query->max_num_pages);?>
            <!-- <p>3 of 7 pages</p> -->
            <p><?php echo (get_query_var('paged'))?get_query_var('paged'):1; ?> of <?php echo $query->max_num_pages; ?> pages</p>
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
  //}//ending function customCategory
     get_footer(); ?>

