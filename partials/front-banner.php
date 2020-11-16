<?php if(have_posts()): ?>
  <?php while(have_posts()): the_post(); ?>
    <div class= "px-4 pt-5 pb-2" id="customizable-bckgd-color" style="background-color: <?= get_theme_mod('banner_background_color'); ?>;">
      <div class="container">
        <?php the_post_thumbnail('post-thumbnails', ['class' => 'card-img-top', 'alt'=> 'banner', 'style'=>'height: auto; object-fit: cover'])?>
        <h1 class="text-center my-5" id="customizable-tagline-color" style="color: <?= get_theme_mod('banner_tagline_color'); ?>; font-size: min(4vw, 40px);"><?=  get_bloginfo( 'description' ); ?></h1>
      </div>
    </div>
  <?php endwhile ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
