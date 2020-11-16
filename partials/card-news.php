<div class="col-12 mb-5 d-flex justify-content-center">
  <div class="card shadow" style="width: 40%; min-width:300px">
    <?php the_post_thumbnail('medium-large', ['class' => 'card-img-top', 'alt'=> '', 'style'=>'height: auto'])?>
    <div class="card-body">
      <p class="text-center"><small><?php the_time('Y/m/d')?></small></p>
      <h5 class="card-title"><?php the_title() ?></h5>
      <p class="card-text text-justify"><?= get_the_excerpt() ?></p>
      <div class="text-center">
        <a href="<?php the_permalink() ?>" class="btn btn-primary">Read more</a>
      </div>
    </div>
  </div>
</div>
