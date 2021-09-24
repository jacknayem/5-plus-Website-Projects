
// ===============home section====================

  jQuery(window).scroll(function(){
    var vscroll = jQuery(this).scrollTop();
    jQuery('#logotext').css({"transform" : "translate(0px, "+vscroll/2+"px)"
    });
  });
// =====================Tab=======================
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
//HTML Document is loaded. DOM is ready. 

$(function(){

  // ------- WOW ANIMATED ------ //
  wow = new WOW(
  {
    mobile: false
  });
  wow.init();

  // ------- JQUERY PARALLAX ---- //
  function initParallax() {
    $('#home').parallax("100%", 0.1);
    $('#gallery').parallax("100%", 0.3);
    $('#menu').parallax("100%", 0.2);
    $('#team').parallax("100%", 0.3);
    $('#contact').parallax("100%", 0.1);

  }
  // initParallax();

  // HIDE MOBILE MENU AFTER CLIKING ON A LINK
  // $('.navbar-collapse a').click(function(){
  //       $(".navbar-collapse").collapse('hide');
  //   });

  // // NIVO LIGHTBOX
  // $('#gallery a').nivoLightbox({
  //       effect: 'fadeScale',
  //   });

});


jQuery(document).ready(function ($) {


    /*---------------------------------------------*
     * Counter 
     ---------------------------------------------*/

    // $('.statistic-counter').counterUp({
    //     delay: 10,
    //     time: 2000
    // });
    // $('.statistic').counterUp({
    //     delay: 10,
    //     time: 2000
    // });

// main-menu-scroll

    jQuery(window).scroll(function () {
        var top = jQuery(document).scrollTop();
        var height = 300;
        //alert(batas);

        if (top > height) {
            jQuery('.navbar-fixed-top').addClass('menu-scroll');
        } else {
            jQuery('.navbar-fixed-top').removeClass('menu-scroll');
        }
    });

// scroll Up

    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('.scrollup').fadeIn('slow');
        } else {
            $('.scrollup').fadeOut('slow');
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });



//    $('#menu').slicknav();

    // $('#mixcontent').mixItUp({
    //     animation: {
    //         animateResizeContainer: false,
    //         effects: 'fade rotateX(-45deg) translateY(-10%)'
    //     }
    // });


    // $('.dropdown-menu').click(function (e) {
    //     e.stopPropagation();
    // });


    //End
});




$(document).on("scroll", function () {
    if ($(document).scrollTop() > 120) {
        $("nav").addClass("small");
    } else {
        $("nav").removeClass("small");
    }
});

$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') ) {
        $(this).collapse('hide');
    }
});

