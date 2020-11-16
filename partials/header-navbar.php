<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= get_site_url() ?>">
    <img src="<?= wp_get_attachment_url(60) ?>" alt="logo" style="width:160px; height:auto">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- 1st part menu -->
  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <?php wp_nav_menu([
      'theme_location'=>'header',
      'container' => false,
      'menu_class' => 'navbar-nav' // ul element
    ]); ?>
    <!-- drowpdown menu -->
      <ul class='navbar-nav'>
        <li class="nav-item dropdown">
          <?php get_template_part('partials/header', 'dropdown'); ?>
        </li>
      </ul>
      <!-- Contact us link -->
      <?php wp_nav_menu([
      'theme_location'=>'header_contact',
      'container' => false,
      'menu_class' => 'navbar-nav', // ul element
      'fallback_cb' => 'false',
    ]); ?>
  </div>
</nav>
