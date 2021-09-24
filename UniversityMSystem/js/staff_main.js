$(document).ready(function(){
	$('#president_info').hover(function(){
		$('#staff_icon').attr('src', 'images/staff/president_icon.png');
	},function(){
		$('#staff_icon').attr('src', 'images/staff/staff_icon.png');
	});
	$('#provost_info').hover(function(){
		$('#staff_icon').attr('src', 'images/staff/provost_icon.png');
	},function(){
		$('#staff_icon').attr('src', 'images/staff/staff_icon.png');
	});
	$('#board_info').hover(function(){
		$('#staff_icon').attr('src', 'images/staff/trusty_icon.png');
	},function(){
		$('#staff_icon').attr('src', 'images/staff/staff_icon.png');
	});


	// Add read More link
	 var readMoreHTMl = $('.read-more').html();
      var len = readMoreHTMl.length;
      var lessText = readMoreHTMl.substr(0, 100);
      if(len > 100){
        $('.read-more').html(lessText+'...').append('<a href="" class="read-more-link">Read More</a>');
      }else{
        $('.read-more').html(readMoreHTMl);
      }


      $("body").on("click", ".read-more-link", function(event){
        event.preventDefault();
        $(this).parent('.read-more').html(readMoreHTMl).append('<a href="" class="read-less-link">Show Less</a>');
      });

      $('body').on('click', '.read-less-link', function(event){
        event.preventDefault();
        $(this).parent('.read-more').html(readMoreHTMl.substr(0,100)).append('<a href="" class="read-more-link">Read More</a>');
      });

      $('.videoThum').click(function(){
		var indexNum = $(this).index();
		$('.presidentVideo').each(function(){
			$('.presidentVideo').addClass('d-none');
			$('.videoThum').removeClass('active');	
		});
		$(".presidentVideo:eq("+indexNum+")").removeClass("d-none");
		$(".videoThum:eq("+indexNum+")").addClass("active");
	});
});