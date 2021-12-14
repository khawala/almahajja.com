 $(document).ready(function () {
  var input = document.querySelector("#telephone");
  var iti = window.intlTelInput(input, {
      utilsScript:'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.0/js/utils.js',
      separateDialCode:true,
      dropdownContainer:null,
     initialCountry: 'auto',
      geoIpLookup: function(callback) {
        callback('sa');
      } 
   });
    var handleChange = function() {
      $('#phonevalue').val(iti.getNumber());
    }
    input.addEventListener("countrychange", function() {
      input.value = '';
      $('#phonevalue').val(iti.getNumber());
    });
    
    input.addEventListener('change', handleChange);
    input.addEventListener('keyup', handleChange);
   

  });
  