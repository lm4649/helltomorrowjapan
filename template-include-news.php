<?php
/**
* Template Name: Include News
  Template Post Type: page, post
*/
?>
<?php get_header() ?>
<!-- by default: about section -->
<style>
@media (max-width: 600px) {
  .has-text-align-right,  .has-text-align-left, .has-text-color {
    text-align: justify !important;
  }

}
</style>
  <?php if(have_posts()): ?>
      <?php while(have_posts()): the_post(); ?>
        <div class="mt-5" mb-3>
          <?php the_content() ?>
        </div>
      <?php endwhile ?>
    <?php wp_reset_postdata(); ?>
  <?php else: ?>
      <h2>Section under construction</h2>
  <?php endif; ?>
  <!-- including the latest news + links to the news category page -->
  <br>
  <h2 class="text-center">Latest News</h2>
  <?php
    $news_query = new Wp_Query(['category_name' => 'news']);
  ?>
  <?php for($i=0; $i < 3; $i++): ?>
    <?php if($news_query->have_posts()): $news_query->the_post();?>
      <div class="row">
          <?php get_template_part('partials/card', 'news'); ?>
        <?php wp_reset_postdata(); ?>
    <?php else: ?>
        <h2>No news</h2>
    <?php endif; ?>
    </div>
  <?php endfor; ?>
  <div class="d-flex justify-content-center mb-5">
    <a href="<?=get_site_url()?>/category/news" class="btn btn-secondary">See All News</a>
  </div>

<?php get_footer() ?>

