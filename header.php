<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head()?>
</head>
<body>
  <!-- NAVIGATION BAR START -->
  <header id="sticky-navbar">
    <?php get_template_part('partials/header', 'navbar'); ?>
  </header>
  <!-- NAVIGATION BAR END -->
  <?php if(is_front_page()): ?>
    <!-- HERO BANNER -->
    <?php get_template_part('partials/front', 'banner')?>
  <?php endif; ?>
  <div class="container">


