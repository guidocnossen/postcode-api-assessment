$(document).ready(function() {
  
  //custom validator for zip field
  $.validator.addMethod('zipValidation', function(value, element) {
    return this.optional(element) || /^[0-9]{4}[a-zA-Z]{2}$/.test(value);
  }, "Foutief postcode format (Gebruik '1234AB' format).");

  // define form contstants 
  var form = $(".zipcode-form"); 
  var apiError = $('.api-error');
  var zip = $('input[name=zip]');

  // validate form 
  form.validate({
    rules: {
      mail : {
        email:true,
        required: true,
      },
      naam: {
        required: true,
      },
      achternaam: {
        required: true,
      },
      zip: {
        required: true, 
        zipValidation: true, 
      },
      number: {
        required: true, 
      }
    },
    messages : {
      mail: {
        email: "e-mail formaat is niet correct.",
        required: "Vul een e-mailadres in.",
      },      
      naam: {
        required: "Vul een naam in."
      },
      achternaam: {
        required: "Vul een achternaam in.",
      },
      zip: {
        required: "Vul een postcode in.",
      },
      number: {
        required: "Vul een huisnummer in.",
      }
    }
  });

  // trigger submit action and get api call data
  form.submit(function(e){

    if (form.valid()) {
      e.preventDefault();
      var data = '';
      $.get('proxy.php', $(this).serialize() )
        .done(function(data){
              var obj = JSON.parse(data);
              if (obj.hasOwnProperty('street')) {
                showResults(obj, form.serializeArray());
              } else {
                showError(); 
              }
        });
    }
   });

  // show submitted results 
  function showResults(results, form) {

      var formContainer = $('.api-form');
      var apiResult = $(".api-result");

      var email = apiResult.find("#mail");
      var name = apiResult.find("#name"); 
      var zip = apiResult.find("#zip");
      var number = apiResult.find("#number");
      var address = apiResult.find("#address");

      email.html(form[0].value);
      name.html(form[1].value + ' ' + form[2].value );
      zip.html(form[3].value);
      number.html(form[4].value);
      address.html(results.street + ' ' + results.number + ', ' + results.city);

      formContainer.hide();
      apiResult.show();
  }

  // show error
  function showError() {
      apiError.html('Inzending kon niet worden voltooid. Combinatie van postcode en huisnummer is niet correct! Probeer het opnieuw.')
      apiError.show(); 
  }

  zip.keyup(function() {
    if (apiError.is(":visible")) {
      apiError.hide();
    }
  })

});