<div class="col-12 mb-5 d-flex justify-content-center">
  <div class="card shadow" style="width: 40%; min-width: 300px">
    <?php the_post_thumbnail('medium-large', ['class' => 'card-img-top', 'alt'=> '', 'style'=>'height: auto'])?>
    <div class="card-body text-center">
      <h5 class="card-title text-center"><?php the_title() ?></h5>
      <p class="text-center"><?php the_date('j M, g:i A')?> | ONLINE</p>
      <hr width="10%" color="#051e4e" align="center"/>
      <div class="card-text text-justify">
          <?= get_the_content() ?>
      </div>
      <div class="text-center">
        <?php $external_link = get_post_meta(get_the_ID(), 'htjp_event_link', true);?>
        <a href="<?=$external_link?>" class="btn btn-primary" target="_blank">EVENT ENDED</a>
      </div>
    </div>
  </div>
</div>
