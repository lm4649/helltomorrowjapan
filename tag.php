<?php get_header() ?>
<?php
  $tag = trim(wp_title('', false));
  $args= [
    'tag' => $tag,
    'post_status' => ['publish', 'future'],
    'paged'          => get_query_var( 'paged' )
  ];
  $tag_posts_query = new Wp_Query($args);
?>
<h2 class="text-center" style="text-transform:uppercase"><?=str_replace('_', ' ', $tag)?></h2>
  <br>
  <div class="row">
    <?php if($tag_posts_query->have_posts()): ?>
        <?php while($tag_posts_query->have_posts()): $tag_posts_query->the_post(); ?>
          <?php
            if(get_the_category()[0]->slug !=="events")
            {
              get_template_part('partials/card', 'news');
            }elseif(get_post_status()==='future')
            {
              get_template_part('partials/card', 'upcoming');
            }else
            {
              get_template_part('partials/card', 'past');
            }
          ?>
        <?php endwhile ?>
    <?php else: ?>
        <h2>No tag</h2>
    <?php endif; ?>
  </div>
  <?php if(function_exists('App\bootstrap_pagination')) {App\bootstrap_pagination();} ?>
<?php get_footer() ?>
