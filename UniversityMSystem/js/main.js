//including wow
new WOW().init();
// Fuclty
$(document).ready(function(){
 
      // Start Faculty Sign Up form
      $('.facdepartment-erro-message').hide();
      $('.facfname-erro-message').hide();
      $('.faclname-erro-message').hide();
      $('.facId-erro-message').hide();
      $('.facbirth-erro-message').hide();
      $('.facemail-erro-message').hide();

      var facdepartment_error = false;
      var facfname_error = false;
      var faclname_error = false;
      var facid_error = false;
      var facbirth_error = false;
      var facemail_error = false;
      var facpassword_error = false;
      var facconpassword_error = false;

      $('#facDepartment').focusout(function(){
        check_departmentname();
      });

      $('#facfirstname').focusout(function(){
        check_firstname();
      });

      $('#faclastname').focusout(function(){
        check_lastname();
      });

      $('#facSignUpid').focusout(function(){
        check_ID();
      });

      $('#facBirthDate').focusout(function(){
        check_birthdate();
      });

      $('#facSignUpEmail').keyup(function(){
        check_email();
      });

      function check_departmentname(){
        var departmentname = $('#facDepartment').val();
        $('.facdepartment-erro-message').show();
        if(departmentname == "")
        {
          $('.facdepartment-erro-message').text("Select you Department");
          $('.facdepartment-erro-message').css({'color':'red', 'font-size':'12px'});
          facdepartment_error = true; 
        }
        else{
          $('.facdepartment-erro-message').text("");
        }
      }

      function check_firstname(){
        var pattern = /^[a-zA-Z]*$/;
        var fname = $('#facfirstname').val();
        $('.facfname-erro-message').show();
        if(pattern.test(fname) && fname != ""){
          $('.facfname-erro-message').text("");
        }
        else{
          $('.facfname-erro-message').text("Enter valid your First Name");
          $('.facfname-erro-message').css({'color':'red', 'font-size':'12px'});
          facfname_error = true;
        }
      }

       function check_lastname(){
        var pattern = /^[a-zA-Z]*$/;
        var lname = $('#faclastname').val();
        $('.faclname-erro-message').show();
        if(pattern.test(lname) && lname != ""){
          $('.faclname-erro-message').text("");
        }
        else{
          $('.faclname-erro-message').text("Enter valid your Second name");
          $('.faclname-erro-message').css({'color':'red', 'font-size':'12px'});
          faclname_error = true;
        }
      }

      function check_ID(){
        var pattern = /^[a-zA-Z]{3}[0-9]{8}$/;
        var ID = $('#facSignUpid').val();
        $('.facId-erro-message').show();
        if(pattern.test(ID) && ID != ""){
          $('.facId-erro-message').text("");
        }
        else{
          $('.facId-erro-message').text("Invalid");
          $('.facId-erro-message').css({'color':'red', 'font-size':'12px'});
          facid_error = true;
        }
      } 

      function check_birthdate(){
        var pattern = /^([0-9]{4}-[0-9]{2}-[0-9]{2})$/;
        var birthdate = $('#facBirthDate').val();
        $('.facbirth-erro-message').show();
        if(pattern.test(birthdate) && birthdate != ""){
          $('.facbirth-erro-message').text("");
        }
        else{
          $('.facbirth-erro-message').text("Invalid");
          $('.facbirth-erro-message').css({'color':'red', 'font-size':'12px'});
        }
      }

       function check_email(){
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $('#facSignUpEmail').val();
         $('.facemail-erro-message').show();
        if(pattern.test(email) && email != ""){
          $('.facemail-erro-message').text("");
        }
        else{
          $('.facemail-erro-message').text("Invalid");
          $('.facemail-erro-message').css({'color':'red', 'font-size':'12px'});
          facemail_error = true;
        }
      }

      function check_password(){
        var password = $('#facPassword').val();
        if(password == ""){
          $('.facpass-error-message').text("blank Password");
          $('.facpass-error-message').css({'color':'red', 'font-size':'12px'});
          facpassword_error = true;
        }
      }

      function check_confirmpassword(){
        var confirmpassword = $('#facConfirmPassword').val();
        if(confirmpassword == ""){
          $('.facconpass-error-message').text("blank confirm Password");
          $('.facconpass-error-message').css({'color':'red', 'font-size':'12px'});
          facconpassword_error = true;
        }
      }

      $('.facultysignupform').submit(function(){
        facdepartment_error = false;
        facfname_error = false;
        faclname_error = false;
        facid_error = false;
        facbirth_error = false;
        facemail_error = false;
        facpassword_error = false;
        facconpassword_error = false;
        check_departmentname();
        check_firstname();
        check_lastname();
        check_ID();
        check_birthdate();
        check_email();
        check_password();
        check_confirmpassword();
        if(facdepartment_error == false && facfname_error == false && faclname_error == false && facid_error == false && facbirth_error == false && facemail_error == false && facpassword_error == false && facconpassword_error == false){
          return true;
        }
        else{
          alert("Please fill up the form correctly");
          return false;
        }
      });

      const changePassMsg = function(el,text,color){
        el.text(text).css({'color':color, 'font-size': '12px'});
      };

      const changeConPassMsg = function(el,text,color)
      {
        el.text(text).css({'color':color, 'font-size': '12px'});
      }

      $('#facPassword').keyup(function()
      {
        let len = this.value.length;
        const message = $('.msg');
        if(len == 0){
          $(".passprogbar").css({'background-color': 'red', 'width': '0%', });
           changePassMsg(message,'blank Password','red');  
        }
        else if(len > 0 && len <= 4){
          $(".passprogbar").css({'background-color': 'red', 'width': '33.33%', }); 
          changePassMsg(message,'Too weak','red');  
        }
        else if(len > 4 && len <= 8){ 
          $(".passprogbar").css({'background-color': 'yellow', 'width': '66.66%', });
          changePassMsg(message,'Cauld be Srong','yellow');   
        }
        else{
          $(".passprogbar").css({'background-color': 'green', 'width': '100%', }); 
          changePassMsg(message,'Too Strong','green','green');  
        }

        var pass = $(this).val();
        var conPass = $('#facConfirmPassword').val();
        let conpasslen = conPass.length;
        if (pass == conPass && pass != "" && conPass != "") {
          changeConPassMsg($('#conPassMsg'),'Matched','green');
        }
        else if(conpasslen == 0)
        {
          changeConPassMsg($('#conPassMsg'),'Blank confirm password','red');
        }
        else{
          changeConPassMsg($('#conPassMsg'),'Not match','red');
        }
      });

      $('#facConfirmPassword').keyup(function(){
        var pass = $('#facPassword').val();
        var conPass = $(this).val();
        if (pass == conPass && pass != "" && conPass != "") {
          changeConPassMsg($('#conPassMsg'),'Matched','green');
        }
        else if(conPass.length == 0)
        {
          changeConPassMsg($('#conPassMsg'),'Blank confirm password','red');
        }
        else
        {
          changeConPassMsg($('#conPassMsg'),'Not Match','red');
        }
      });
      // End Faculty Sign Up form

      // Forget Password or Recovery Password Start

      $('#facForgetID_error_message').hide();
      $('#facForgetEmail_error_message').hide();

      $('#facForgatedID').focusout(function(){
        check_facforgetID();
      });
      $('#facForgetedemail').focusout(function(){
        check_facforgetEmail();
      });

      var facForgatedIDinfo = false;
      var facForgatedEmailinfo = false;

      function check_facforgetID(){
        var pattern = /^[a-zA-Z]{3}[0-9]{8}$/;
        var forgetinfoID = $('#facForgatedID').val();
        $('#facForgetID_error_message').show();
        if(pattern.test(forgetinfoID) && forgetinfoID != ""){
          $('#facForgetID_error_message').text("");
        }else{
          $('#facForgetID_error_message').css({'color':'#660505','font-size':'12px'});
          $('#facForgetID_error_message').text("Invalid");
          facForgatedIDinfo = true;
        }
      }

      function check_facforgetEmail(){
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var forgetinfoEmail = $('#facForgetedemail').val();
        $('#facForgetEmail_error_message').show();

        if(pattern.test(forgetinfoEmail) && forgetinfoEmail != ""){
          $('#facForgetEmail_error_message').text("");
        }else{
          $('#facForgetEmail_error_message').css({'color':'#660505','font-size':'12px'});
          $('#facForgetEmail_error_message').text("Invalid");
          facForgatedEmailinfo = true;
        }
      }

      $('#facForgetpassFrom').submit(function(){
        facForgatedIDinfo = false;
        facForgatedEmailinfo = false;

        check_facforgetID();
        check_facforgetEmail();
        if(facForgatedIDinfo == false && facForgatedEmailinfo == false){
          return true;
        }else{
          alert("Please fill up the form correctly");
          return false;
        }
      });

      $('.collapse').on('shown.bs.collapse', function () {
          $(this).parent().find('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
      }).on('hidden.bs.collapse', function () {
          $(this).parent().find(".fa-minus").removeClass("fa-minus").addClass("fa-plus");
      });

    });




