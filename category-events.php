<?php get_header() ?>
  <br>
  <!-- UPCOMING EVENTS -->
    <?php
      $args= [
        'category_name' => 'events',
        'post_status' => 'future',
        'paged'          => get_query_var( 'paged' )
      ];
      $upcoming_evts_query = new Wp_Query($args)
    ?>
    <?php if($upcoming_evts_query->have_posts()): ?>
    <h2 class="text-center mb-5">UPCOMING EVENTS</h2>
    <div class="row">
      <?php while($upcoming_evts_query->have_posts()): $upcoming_evts_query->the_post(); ?>
        <?php get_template_part('partials/card', 'upcoming'); ?>
      <?php endwhile ?>
      <?php wp_reset_postdata(); ?>
  <?php else: ?>
  <div class="row d-flex justify-content-center">
      <h2 class="text-center mb-5">No Upcoming Events</h2>
  <?php endif; ?>
  </div>
  <br>
  <!-- PAST EVENTS -->
  <?php if(have_posts()): ?>
    <h2 class="text-center mb-5">PAST EVENTS</h2>
    <div class="row">
      <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('partials/card', 'past'); ?>
      <?php endwhile ?>
  <?php else: ?>
  <div class="row d-flex justify-content-center">
      <h2 class="text-center mb-5">No Past Events</h2>
  <?php endif; ?>
    </div>
  <?php if(function_exists('App\bootstrap_pagination')) {App\bootstrap_pagination();} ?>
<?php get_footer() ?>

