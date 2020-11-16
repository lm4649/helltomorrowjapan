<?php get_header() ?>
  <h1 class="text-center">Hello Tomorrow Japan</h1>
  <br>
  <?php if(have_posts()): ?>
    <div class="row">
      <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('partials/card', 'news'); ?>
      <?php endwhile ?>
  <?php else: ?>
      <h2>No news</h2>
  <?php endif; ?>
    </div>
  <?php if(function_exists('App\bootstrap_pagination')) {App\bootstrap_pagination();} ?>
<?php get_footer() ?>
