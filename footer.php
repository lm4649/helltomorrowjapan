</div>
  <?php wp_footer() ?>
  <style>
    .tag-cloud-link {
    display: inline-block;
    border: solid 1px white;
    padding: 2px 4px;
    border-radius: 8px;
    margin: 2px auto;
    }
  </style>
    <footer>
        <?= get_sidebar('footer') ?>
        <hr align="center" width="15%" color="white"/>
        <div class="social-links pt-3">
          <a href="https://www.facebook.com/HelloTomorrowJP" target="blank">
            <i class="fab fa-facebook-square"></i>
          </a>
          <a href="https://www.linkedin.com/company/hello-tomorrow-japan" target="blank">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="<?=get_site_url()?>/contact-us">
            <i class="far fa-envelope"></i>
          </a>
        </div>
        <div class="footer-lower-part">
          <div class="copyright">
            <i class="far fa-copyright"> 2020 Hello Tomorrow Japan</i>
          </div>
          <div class="footer-legal-links">
            <a href="#" target="blank">Terms of Use</a>
            <span> | </span>
            <a href="#" target="blank">Privacy Policy</a>
          </div>
        </div>
    </footer>
  </body>
</html>
