<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- form validation -->
<!-- Change the "src" attribute according to your installation path -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery"></script>
<!-- Change the "src" attribute according to your installation path -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="../js/form-validation.js"></script>
<script src="../js/formStep.js"></script>

<script type="text/javascript">
     // $('#exampleModal').modal('show')

     // jSuites.crop(document.getElementById('image-cropper'), {
     //      area: [280, 280],
     //      crop: [150, 150],
     // })

     // document.getElementById('image-getter').onclick = function() {
     //      document.getElementById('image-cropper-result').children[0].src = document.getElementById('image-cropper').crop.getCroppedImage().src;
     //      console.log(document.getElementById('image-cropper').crop.getCroppedImage());
     // }

     $(document).ready(function() {
          $('#sidebarCollapse').on('click', function() {
               $('#sidebar').toggleClass('active');
          });
     });
</script>
<script type="text/javascript">
     function googleTranslateElementInit() {
          new google.translate.TranslateElement({
               pageLanguage: 'en',
               layout: google.translate.TranslateElement.InlineLayout.SIMPLE
          }, 'google_translate_element');
     }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
     setInterval(function() {
          if (document.getElementById('alertActivation')) {
               document.getElementById('alertActivation').classList.add("d-none")
          }
     }, 10000);
</script>
</body>

</html>