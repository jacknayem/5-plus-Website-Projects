//including wow
new WOW().init();

$(document).ready(function(){

    // *********
        $(document).ready(function(){
            $('.collapse').on('shown.bs.collapse', function(){
                $(this).parent().find('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
            }).on('hidden.bs.collapse', function(){
                $(this).parent().find('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
            });
        });

    // Admin side navigation bar

    function fullScreenNavBar(){
        $("#navbar_open").click(function(){
            $("#sidenavbar").css({'width':'100%','margin-top':'2px','margin-buttom':'2px'});
            $("#sidenavbody").css({'height':'100%'});
            $('#navbar_open').css({'margin-left': '22%'});
            $('body').css({'background':'linear-gradient(to right, #666633 0%, #afaf5f 100%)'});
        });
    }
    function sortScreenNavBar(){
        $("#navbar_open").click(function(){
            $("#sidenavbar").css({'width':'25%','margin-top':'2px','margin-buttom':'2px'});
            $("#sidenavbody").css({'height':'100%'});
            $('#navbar_open').css({'margin-left': '21%'});
            $('body').css({'background':'linear-gradient(to right, #666633 0%, #afaf5f 100%)'});
        });
    }

        if ($(window).width() < 500) {
            fullScreenNavBar();
        }
        else{
            sortScreenNavBar();
        }

    $(window).resize(function(){
        if ($(window).width() < 500) {
            fullScreenNavBar();
        }
        else{
            sortScreenNavBar();
        }
    });

    $("#navbar_close").click(function(){
        $("#sidenavbar").css({'width':'0%','margin-top':'2px','margin-buttom':'2px'});
        $("#sidenavbody").css({'height':'10%'});
        $('#navbar_open').css({'margin': '5px'});
        $('body').css({'background':'linear-gradient(to right, #666633 0%, #999966 100%)'});
    });

    // faculty

    $('.facSignupID_error_message').hide();
    $('.facSignupBirth_error_message').hide();
    $('.facSignupEmail_error_message').hide();

    var facinfoID = false;
    var facinfoBirth = false;
    var facinfoEmail = false;

    $('#facsignupInfo').focusout(function(){
        check_IDinfo();
      });
    $('#facsignupBirthDateInfo').focusout(function(){
        check_DateofBirth();
    });

    $('#facsignupEmailInfo').focusout(function(){
        check_email();
    });

    var error_msgDesign = $('.facSignupID_error_message,.facSignupBirth_error_message, .facSignupEmail_error_message').css({'color':'#f47f90','font-size':'12px'});

    function check_IDinfo(){
        var pattern = /^[a-zA-Z]{3}[0-9]{8}$/;
        var facIDinfo = $('#facsignupInfo').val();
        $('.facSignupID_error_message').show();
        if(pattern.test(facIDinfo) && facIDinfo != ""){
            $('.facSignupID_error_message').text("");
        }
        else{
            $('.facSignupID_error_message').text("Invalid ID");
            error_msgDesign;
            facinfoID = false;
        }
    }

    function check_DateofBirth(){
        var pattern = /^([0-9]{4}-[0-9]{2}-[0-9]{2})$/;
        var facbirthinfo = $('#facsignupBirthDateInfo').val();
        $('.facSignupBirth_error_message').show();
        if(pattern.test(facbirthinfo) && facbirthinfo != ""){
            $('.facSignupBirth_error_message').text("");
        }
        else{
           $('.facSignupBirth_error_message').text("Invalid"); 
           error_msgDesign;
           facinfoBirth = true;
        }
    }

    function check_email()
    {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var facemailinfo = $('#facsignupEmailInfo').val();
        $('.facSignupEmail_error_message').show();
        if(pattern.test(facemailinfo) && facemailinfo != ""){
            $('.facSignupEmail_error_message').text("");
        }
        else{
           $('.facSignupEmail_error_message').text("Invalid"); 
           error_msgDesign;
           facinfoEmail = true;
        }
    }

    $('#facSignUpInfoform').submit(function(){
        $('.testform').text("Invalid");
        facinfoID = false;
        facinfoBirth = false;
        facinfoEmail = false;
        check_IDinfo();
        check_DateofBirth();
        check_email();
        if(facinfoID == false && facinfoBirth == false && facinfoEmail == false){
          // alert("Inserted");
          return true;
        }
        else{
          alert("Please fill up the form correctly");
          return false;
        }
      });

    // Search Faculty information

    $("#searchFacultyInfo").focusin(function(){
        $(".searchWarming").text("<Exa: CSE05807103>");
        $(".searchWarming").css({'margin-left':'20%','color':'#e8e9ea','font-size':'12px'});
    });
    $("#searchFacultyInfo").keyup(function(){
        var searchval = $('#searchFacultyInfo').val();
        var tr = [];

        $('#factable').find('td').each(function(){
            var value = $(this).html();

            if(value.includes(searchval)){
                tr.push($(this).closest('tr'));
            }
        });
        if(searchval == ''){
            $('tr').show();
        }
        else{
            $('tr').not('thead tr').hide();
            tr.forEach(function(el){
                el.show();
            });
        }
    });

    // faculty appontment information
    var appointment_title_error = false;
    var appointment_body_error = false;

    $('#appointment_title').focusout(function(){
        check_title();
    });


    function check_title(){
        var val = $('#appointment_title').val();
        if(val == ""){
            $('.appointment_title_error_message').text("Please Enter the title");
            $('.appointment_title_error_message').css({'color':'#490308'});
            appointment_title_error = true;
        }
        else{
            $('.appointment_title_error_message').text("");
        }
    }

    $('#appointment_post').click(function(){
        appointment_title_error = false;
        check_title();
        if(appointment_title_error == true){
            alert("Fill up the post");
        }

    });

    // faculty retirmnet information
    var retirement_title_error = false;

    $('#retirement_title').focusout(function(){
        check_retirement_title();
    });

    function check_retirement_title(){
        var retirement_val = $('#retirement_title').val();
        if(retirement_val == ""){
            $('.retirement_title_error_message').text("Please Enter the title");
            $('.retirement_title_error_message').css({'color':'#490308'});
            retirement_title_error = true;
        }else{
            $('.retirement_title_error_message').text("");
        }
    }

     // faculty housing information
    var housing_title_error = false;

    $('#housing_title').focusout(function(){
        check_housing_title();
    });

    function check_housing_title(){
        var housing_val = $('#housing_title').val();
        if(housing_val == ""){
            $('.housing_title_error_message').text("Please Enter the title");
            $('.housing_title_error_message').css({'color':'#490308'});
            housing_title_error = true;
        }else{
            $('.housing_title_error_message').text("");
        }
    }

    // faculty development information
    var development_title_error = false;

    $('#development_title').focusout(function(){
        check_development_title();
    });

    function check_development_title(){
        var development_val = $('#development_title').val();
        if(development_val == ""){
            $('.development_title_error_message').text("Please Enter the title");
            $('.development_title_error_message').css({'color':'#490308'});
            development_title_error = true;
        }else{
            $('.development_title_error_message').text("");
        }
    }

    // faculty helth care information
    var faculty_helth_title_error = false;
    $('#helth_care_title').focusout(function(){
        check_faculty_helth_title();
    });

    function check_faculty_helth_title(){
        var faculty_helth_val = $('#helth_care_title').val();
        if(faculty_helth_val == ""){
            $('.helth_care_title_error_message').text("Please Enter the title");
            $('.helth_care_title_error_message').css({'color':'#490308'});
            faculty_helth_title_error = true;
        }else{
            $('.helth_care_title_error_message').text("");
        }
    }
    
});