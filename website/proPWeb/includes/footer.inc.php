<footer class="container-fluid ">
  <div class="footer">
    <div class="row space-footer">
      <div class="col-sm-4 pt-3">
        <h3> FAQ </h3>
        <p><a href="./faq.php">Frequently asked questions</a></p>
      </div>
      <div class="col-sm-4 pt-3" id="footer-contact">
        <h3>Contact us</h3>
        <p><i class="fa fa-phone" aria-hidden="true"></i>+31 68487642</p>
        <p><i class="fa fa-envelope-o" aria-hidden="true"></i>booking@olala.lala </p>
      </div>
      <div class="col-sm-4 pt-3">
        <h3>follow us on</h3>
        <div class="row-inline">
          <div class="col-4 social-media-icons"><a href="http://www.facebook.com" target="_blank"><img
                class="social-icon text-left" src="assets/img/facebook_icon.png" alt="Facebook" /></a><a
              href="https://www.instagram.com/" target="_blank"><img class="social-icon"
                src="assets/img/instagram_icon.png" alt="Instagram" /></a><a href="http://www.twitter.com"
              target="_blank"><img class="social-icon" src="assets/img/twitter_icon.png" alt="Twitter" /></a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/function.js"></script>
  <script src="assets/js/logn.js"></script>
  <!-- <script src="assets/js/sgnup.js"></script> -->
  <!-- <script src="assets/js/FAQ.js"></script> -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/signup.js"></script>
  <!-- <script src="assets/js/signup.js"></script> -->

  <script>
    $( document ).ready(function() {
      // Hide on load
      $('#booktickets').hide();
      $('.event-day-container').hide();

      // Go to events
      $('.js-open-events').click(function() {
        $('#booktickets').hide(1500);
        $('.event-day-container').show(1500);
        // $('html,body').animate({
        //   scrollTop: document.body.scrollHeight},"slow");
        window.scrollBy(0,350);
      });

      // Go to book a ticket section
      $('.js-open-bookaticket').click(function (){
        $('.event-day-container').hide();
        $('#booktickets').show(1500);
        $('html, body').animate({
            scrollTop: $("#booktickets").offset().top
        }, 3000);
      });

      $('.js-open-lost-found').click(function() {
        window.open('#', '_blank');
      });

      $('.js-open-reviews').click(function() {
        window.open('#', '_blank');
      });

    });
  </script>
