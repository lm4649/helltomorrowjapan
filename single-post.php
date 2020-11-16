<?php get_header() ?>
  <div class="single-post-container">
    <?php if(have_posts()): ?>
        <?php while(have_posts()): the_post(); ?>
              <?php the_post_thumbnail('full', ['class' => 'card-img-top', 'alt'=> '', 'style'=>'height: auto'])?>
              <p class="text-center pt-3"><?php the_date('Y/m/d')?></p>
              <h1 class="text-center" style="font-size: min(6vw, 43px);"><?php the_title() ?></h1>
              <div class="card-text post-content">
                  <?= get_the_content() ?>
              </div>
        <?php endwhile ?>
        <!-- pagination towards previous/next article of same category -->
        <nav class="d-flex justify-content-center my-5">
          <ul class="pagination">
            <li class="page-item">
              <?php previous_post_link('%link', '&laquo Previous', true);?>
            </li>
            <li class="page-item">
              <a href="https://hello-tomorrow-japan.com/category/news" class="btn btn-secondary">See All News</a>
            </li>
            <li class="page-item">
              <?php next_post_link('%link', 'Next &raquo', true); ?>
            </li>
          </ul>
        </nav>
        <!-- end pagination -->
    <?php else: ?>
        <h2>No news</h2>
    <?php endif; ?>
  </div>
<?php get_footer() ?>
