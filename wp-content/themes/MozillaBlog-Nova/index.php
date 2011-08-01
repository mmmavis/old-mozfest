<?php get_header(); ?>

<section id="content-main" class="hfeed">
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

  <article class="hentry" id="post-<?php the_ID(); ?>">
    <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to “<?php the_title_attribute(); ?>”"><?php the_title(); ?></a></h2>
    <div class="entry-meta">
      <address class="vcard">Posted by <cite class="author fn"><a class="url" href="<?php echo get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ?>" title="See all <?php the_author_posts() ?> posts by <?php the_author() ?>"><?php the_author() ?> <?php echo get_avatar(get_the_author_meta('user_email'), 36) ?></a></cite></address>
      <p>
        <time class="published" pubdate="pubdate" datetime="<?php the_time('Y-m-d\TH:i:sP') ?>" title="<?php the_time('Y-m-d\TH:i:sP') ?>"><?php the_time('F jS, Y') ?></time> &middot; <?php the_category(', ') ?> 
        <?php if ( current_user_can( 'edit_page', $post->ID ) ) : ?><span class="edit"><?php edit_post_link('Edit', '&middot; ', ''); ?></span><?php endif; ?>
      </p>
    </div>
    <div class="entry-content"> 
      <?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>

  <?php if (fc_show_spread() == true) : ?>
    <ul class="spread">
    <?php if (function_exists('sharethis_button')) : ?><li><?php sharethis_button(); ?></li><?php endif; ?> 
    <?php if ( (fc_get_comment_type_count('ping') > 0 ) || (pings_open()) ) : ?><li><a href="<?php trackback_url(display); ?>" title="See other sites linking to this post">Trackbacks (<?php fc_comment_type_count('ping') ?>)</a></li><?php endif; ?>
    <?php if ( (fc_get_comment_type_count('comment') > 0) || (comments_open()) ) : ?><li><a href="<?php comments_link(); ?>" title="Read comments on this post">Comments (<?php fc_comment_type_count('comment'); ?>)</a></li><?php endif; ?>
    </ul>
  <?php endif; ?>
  </article>
  
  <?php endwhile; ?>
    
  <?php if (fc_show_posts_nav()) : ?>
    <ul class="nav-paging">
      <?php if ( $paged < $wp_query->max_num_pages ) : ?><li class="prev"><?php next_posts_link(__('Older posts','mozblog')); ?></li><?php endif; ?>
      <?php if ( $paged > 1 ) : ?><li class="next"><?php previous_posts_link(__('Newer posts','mozblog')); ?></li><?php endif; ?>
    </ul>
  <?php endif; ?>
    
<?php else : ?>

  <h1 class="page-title">Not Found</h1>
  <p>Sorry, there are no posts here.</p>

<?php endif; ?>

</section><!-- end #content-main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
