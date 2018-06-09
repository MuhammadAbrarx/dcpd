
<!-- <div class="wrapper"> -->

<div class="ot-content-block ot-featured-author-block">

    <h3><span>Featured author</span></h3>
    <div class="ot-featured-author-header">
      <!-- <div class="ot-title-block">
        <h2>Featured author</h2>
      </div> -->

      <a href="blog.html" class="author-avatar">
        <!-- <img src="images/photos/avatar-3.jpg" alt="" /> -->
        <?php echo get_avatar(get_the_author_meta('ID'),512); ?>
      </a>
      <strong>
        <a href="<?php the_author( ); ?>"><?php echo get_the_author_meta('nickname'); ?></a>
      </strong>
      <?php echo get_the_author_meta('description');?>
        <a href="<?php the_author( ); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent button ot-shortcode-button">View author articles</a>
      </p>
    </div>

    </div>


<!-- </div>