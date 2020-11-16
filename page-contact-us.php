<?php get_header()?>
<h1 class="text-center mt-5">Contact Us</h1>

<div class="alert alert-dark alert-dismissible fade" role="alert">
  <strong>Thank you!</strong> Your message has been to sent to Hello-Tomorrow Japan.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="d-flex justify-content-center my-5 rounded shadow">
  <?php echo do_shortcode( '[contact-form-7 id="36" title="Contact form 1"]' ); ?>
</div>

<script>
  let wpcf7Elm = document.querySelector( '.wpcf7' );
  wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
    let myAlert = document.querySelector('.alert');
    myAlert.classList.add("show");
  });
</script>
<?php get_footer()?>
