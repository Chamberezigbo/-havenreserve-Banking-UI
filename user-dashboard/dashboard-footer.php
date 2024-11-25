<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<!-- form validation -->
<!-- Change the "src" attribute according to your installation path -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery"></script>
<!-- Change the "src" attribute according to your installation path -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="../assets/js/form-validation.js"></script>
<script src="../assets/js/formStep.js"></script>

<script type="text/javascript">
     function googleTranslateElementInit() {
          new google.translate.TranslateElement({
               pageLanguage: 'en',
               layout: google.translate.TranslateElement.InlineLayout.SIMPLE
          }, 'google_translate_element');
     }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
     $(document).ready(function() {
          $('#sidebarCollapse').on('click', function() {
               $('#sidebar').toggleClass('active');
          });
     });
</script>
<script>
     setInterval(function() {
          if (document.getElementById('alertActivation')) {
               document.getElementById('alertActivation').classList.add("d-none")
          }
     }, 10000);
</script>


<!-- for transfer carousal -->
  <script>
    // JavaScript for carousel buttons
    const carousel = document.getElementById('carousel');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');

    prevButton.addEventListener('click', () => {
      carousel.scrollBy({ left: -120, behavior: 'smooth' });
    });

    nextButton.addEventListener('click', () => {
      carousel.scrollBy({ left: 120, behavior: 'smooth' });
    });
  </script>
</body>

</html>