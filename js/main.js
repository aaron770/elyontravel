jQuery(function($) {'use strict',

	
    

	// accordian
	$('.accordion-toggle').on('click', function(){
		$(this).closest('.panel-group').children().each(function(){
		$(this).find('>.panel-heading').removeClass('active');
		 });

	 	$(this).closest('.panel-heading').toggleClass('active');
	});

	//Initiat WOW JS
	new WOW().init();


    /*$(function(){         
        jQuery('.showSingle').click(function(){
              jQuery('.tab-content').hide();
              jQuery('#tab'+$(this).attr('target')).show();
        });
     });*/


	// portfolio filter
	$(window).load(function(){'use strict';
		var $portfolio_selectors = $('.portfolio-filter >li>a');
		var $portfolio = $('.portfolio-items');
		$portfolio.isotope({
			itemSelector : '.portfolio-item',
			layoutMode : 'fitRows'
		});
		
		$portfolio_selectors.on('click', function(){
			$portfolio_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$portfolio.isotope({ filter: selector });
			return false;
		});
	});
//if (window.location.pathname.match(/.+services.html/g)) {alert("service")} else if(window.location.pathname.match(/.+contact-us.html/g)) {alert("contact")}
	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		var dataString;

		if (window.location.pathname.match(/.+services.html/g)) {
			var theLocation = "services.html";
			var from_city = $('[name="from_city"]').val();
	        var to_city = $('[name="to_city"]').val();
	        var ticket_type = $('[name="ticket_type"]').val();
	        var depart = $('[name="depart"]').val();
	        var Treturn = $('[name="return"]').val();
	        var nonstop = $('[name="nonstop"]').val();
	        var flexible = $('[name="flexible"]').val();
	        var Tclass = $('[name="class"]').val();
	        var passengers = $('[name="passengers"]').val();
	        var fname = $('[name="fname"]').val();
	        var lname = $('[name="lname"]').val();
	        var email = $('[name="email"]').val();
	        var subject = $('[name="subject"]').val();
	        var message = $('[name="message"]').val();
	         var phone = $('[name="phone"]').val();
	        var referred = $('[name="referred"]').val();
	        dataString = 'location=' + theLocation +'&from_city='+ from_city + '&to_city=' + to_city + '&ticket_type=' + ticket_type + '&depart=' + depart + '&return=' + Treturn + '&nonstop=' + nonstop +
         '&flexible=' + flexible + '&class=' + Tclass + '&passengers=' + passengers + '&fname=' + fname + '&lname=' + lname + '&email=' + email  +
          '&subject=' + subject + '&message=' + message + '&phone=' + phone + '&referred=' + referred;
//alert(dataString);
		} else if(window.location.pathname.match(/.+contact-us.html/g)) {
			var theLocation = "contact-us.html";
			var name =  $('[name="name"]').val();
			var email =  $('[name="email"]').val();
			var phone = $('[name="phone"]').val();
			var company = $('[name="company"]').val();
			var subject = $('[name="subject"]').val();
			var message = $('[name="message"]').val();
			dataString ='location=' + theLocation +'&name='+ name + '&email=' + email + '&phone=' + phone + '&company=' + company + '&subject=' + subject + '&message=' + message;
//alert(dataString);
		}
//alert(dataString);

		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: dataString,

			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">' + data.message + '</p>').delay(7000).fadeOut();
		});
	});

	/*confirm email*/
	$('#emailConfirm').blur(function() {
		var email      = document.getElementById('email').value;
		var confirmail = document.getElementById('emailConfirm').value;
		if (email != confirmail) {
			$('#emailError').css({'display': 'block', 'background-color': '#e35152'});
		} else {
			$('#emailError').css('display', 'none');
		}
});
	
	//goto top
	$('.gototop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});	

	//Pretty Photo
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});	
});