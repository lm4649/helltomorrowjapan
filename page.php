<?php get_header()?>
  <?php if(have_posts()): ?>
    <?php while(have_posts()): the_post(); ?>
      <!-- <h2 class="text-center mt-5"><?php the_title() ?></h2> -->
      <?php $class = is_page('partners')? 'partners-container mb-5' : 'challenge-container' ?>
      <div class="<?=$class?>">
        <?php the_content() ?>
      </div>
    <?php endwhile ?>
  <?php else: ?>
      <h2 class="text-center">Page under construction</h2>
  <?php endif; ?>
<?php get_footer()?>
