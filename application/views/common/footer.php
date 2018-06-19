<footer class="text-center" style="margin-top:100px; margin-bottom: 0px;">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip"  title="TO TOP" style="text-decoration: none">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <ul>
    <li>
      <a href="faq.php">FAQ</a>
    </li>
    <li>
      <a href="faq.php#return">Policies</a>
    </li>
    <li>
      <a href="faq.php">Order</a>
    </li>
    <li>
      <a href="faq.php">asdasd</a>
    </li>
  </ul>
</footer>
<script type="text/javascript">
	$(document).ready(function(){
  // Initialize Tooltip
 $('[data-toggle="tooltip"]').tooltip();
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

});
</script>
