<?php

  namespace App;

  /*
    adding theme supports here
  */

  function theme_supports()
  {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'navbar_menu');
    register_nav_menu('header_contact', 'navbar_menu_contact');
    // register_nav_menu('footer', 'footer_menu');
  }

  /*
    integrating bootstrap stylesheet in the header and bootstrap/popper/jquery scripts in the body
    integration main css stylesheet as well
  */
  function register_assets()
  {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css', [], false, 'all');
    wp_register_style('htjp-style',get_stylesheet_uri(), ['custom-bootstrap'], false, 'all');
    wp_register_style('custom-bootstrap', get_template_directory_uri() . '/assets/custom.css', ['bootstrap'], false, 'all');
    wp_register_style('font-awesome5', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css', [], false, 'all');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js', ['popper', 'jquery-min'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
    wp_register_script('jquery-min', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    wp_enqueue_style( 'htjp-style');
    wp_enqueue_style('font-awesome5');
    wp_enqueue_script('bootstrap');
  }


  /*
    adding bootstrap nav-item class to navbar li elements

  */
    function navbar_li_class($classes)
    {
      $classes[] = 'nav-item';
      return $classes;
    }


     /*
      adding bootstrap nav-itemn class to navbar li elements

    */
    function navbar_link_class($attrs)
    {
      $attrs['class'] = 'nav-link';
      return $attrs;
    }

    /*
      pagination with bootstrap classes/style
    */
    function bootstrap_pagination()
    {
      $pages = paginate_links(['type' => 'array']);
      if($pages === null)
      {
        return;
      }
      echo '<nav aria-label="Pagination" class="d-flex justify-content-center">';
      echo '<ul class="pagination">';
      foreach ($pages as $page) {
        $active = strpos($page,'current') !== false;
        $class = 'page-item';
        if($active)
        {
          $class .= ' active';
        }

        $links = str_replace('page-numbers', 'page-link', $page);
        $links = str_replace('Previous', '', $links);
        $links = str_replace('Next', '', $links);

        echo '<li class="' . $class . '">';
        echo $links;
        echo '</li>';
      }
      echo '</ul>';
      echo '</nav>';
    }

    /*
      single post pagination -> giving button bootstrap classes to the next and previous
      post links
    */

    function post_link_attributes($output)
    {
      $code = 'class="btn btn-secondary"';
      return str_replace('<a href=', '<a '.$code.' href=', $output);
    }

    /*
      enabling changing color of hero banner background through customize menu
      enabling changing color of hero banner tagline through customize menu

    */

    function customize_appearance( \WP_Customize_Manager $manager)
    {
      // htjp customize section
      $manager->add_section('htjp_appearance', [
        'title' => 'Customize Hero Banner'
      ]);

      // setting and control hero banner background color
      $manager->add_setting('banner_background_color', [
        'default' => '#000000',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
      ]);

      $manager->add_control( new \WP_Customize_Color_Control( $manager, 'banner_background_color', [
        'section' => 'htjp_appearance',
        'setting' => 'banner_background_color',
        'label' => 'Background color'
      ]));

      // setting and control hero banner tagline color
      $manager->add_setting('banner_tagline_color', [
        'default' => '#FFFFFF',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
      ]);

      $manager->add_control( new \WP_Customize_Color_Control( $manager, 'banner_tagline_color', [
        'section' => 'htjp_appearance',
        'setting' => 'banner_tagline_color',
        'label' => 'Tagline color'
      ]));
    }

    /*
        creating a sidebar to add tag cloud in the footer

    */

      function register_widgets()
      {
        register_sidebar([
          'id' =>'footer',
          'name' => 'Sidebar footer'
        ]);
      }

      /*
        meta-box: adding an input box for event links
        TO-DO (optional) : turning it into a class in seperated file
      */
       function add_event_link($postType, $post)
       {
        if($postType === 'post' && current_user_can('publish_posts', $post))
        {
          add_meta_box('htjp_event_link', 'Link to event page', 'App\render_url_input', 'post', 'side', 'high');
        }

       }

       function render_url_input($post)
       {
          // $category = get_the_category($post->ID)[0]->name;
          // if($category === 'Events')
          {
            $event_url = get_post_meta($post->ID, 'htjp_event_link', true);
            ?>
            <label class="components-base-control__label" for="htjp_event_link">Insert event link here</label>
            <input
              class="components-base-control__input"
              type="text"
              name="htjp_event_link"
              id="htjp_event_link"
              placeholder="e.g. https://htglobalsummitlive.peatix.com/view"
              value="<?= $event_url ? $event_url : ' ' ?>"
              >
            <?php
          }
       }

       function save_event_link($post)
       {
        // var_dump($_POST); die();
        if(array_key_exists('htjp_event_link', $_POST) && current_user_can('publish_posts', $post))
        {
          if($_POST['htjp_event_link'] === "")
          {
            delete_post_meta($post, 'htjp_event_link');
          }else {
            $event_url = sanitize_text_field( $_POST['htjp_event_link'] );
            update_post_meta($post, 'htjp_event_link',$event_url);
          }
        }
       }

  //---------------------------adding actions here------------------------------------------//

    add_action('after_setup_theme', 'App\theme_supports');
    add_action('wp_enqueue_scripts', 'App\register_assets');
    add_action('customize_register',  'App\customize_appearance');

    // adding meta box and updating its value
    add_action('add_meta_boxes', 'App\add_event_link', 10, 2);
    add_action('save_post', 'App\save_event_link');

    // adding js for customize menu (banner bckgd color)
    add_action('customize_preview_init', function()
      {
        wp_enqueue_script('htjp_appearance', get_template_directory_uri() . '/assets/customize.js', ['jquery-core', 'customize-preview'], false, true);
      }
    );

    // adding widgets / sidebar
    add_action('widgets_init', 'App\register_widgets');

  //--------------------------adding filters here------------------------------------------//

    add_filter('nav_menu_css_class', 'App\navbar_li_class');
    add_filter('nav_menu_link_attributes', 'App\navbar_link_class');
    add_filter('next_post_link', 'App\post_link_attributes');
    add_filter('previous_post_link', 'App\post_link_attributes');


