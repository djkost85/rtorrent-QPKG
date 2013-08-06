$(function() {

	/*** Links con target = _blank ***/
	$('a[rel="external"]').click(function () {
		$(this).attr({'target':'_blank'});
	});

	// Do our DOM lookups beforehand
	var sections = $(".position");
	var navigation_links = $("nav ul:first-child a");

	console.log(sections);

	sections.waypoint(function(event, direction) {
	  	var active_section = $(this);
	  	console.log(direction);
		if (direction === "up")
			active_section = active_section.prev();
		
		if(!active_section.attr('id')) {
				active_section = $('div#header');
			}
		console.log(active_section.attr('id'));
		

		var active_link = $('nav a[href="#' + active_section.attr("id") + '"]');
		navigation_links.removeClass("active");
		active_link.addClass("active");
	}, { offset: '55%' })


	/*
	$('#iframecontent').waypoint(function(event, direction) {
		if (direction === "down") {
		  	$('#iframecontent').slideUp(function() {
			    $('#iframecontent').html('');
			});
		}
	}, { offset: '-50%' })



	
	navigation_links.click( function(event) {

		$.scrollTo(
			$(this).attr("href"),
			{
				duration: 400,
				offset: { 'left':0, 'top':-0.15*$(window).height() }
			}
		);
		event.preventDefault();
	});
	*/
	$("nav a").click( function(event) {
		var $link = $(this).attr('href');
		$('html, body').stop().animate({
	            scrollTop: $($link).offset().top - 0.11*$(window).height()
	        }, 500);
		event.preventDefault();
	});


});


$(document).ready(function($) {



	$('#work a').click(function(event){
		
		var $this = $(this);
		$('#fb-loading').show();
		$('#iframecontent').slideUp(function() {
		    $('#iframecontent').html('');
		});
		$('html, body').stop().animate({
	            scrollTop: $('#work').offset().top - $('.nav-container').height()+30
	        }, 500, function(){
		        	$('#iframecontent').load($this.attr('href'), function(){
		        		$('#iframecontent').slideDown();
		        		$('#fb-loading').hide();
		        		//$('#slider, div.img-container, .data-container').css('height', $('#slider img').height());
		        		$('#iframecontent #slider').responsiveSlides({
                            auto: false,
                            pager: true,
                            nav: true,
                            speed: 300,
                            namespace: "transparent-btns"
                        });
			            $('a.fb-close').on("click", function(event){
					        $('#iframecontent').slideUp('fast', function() {
					            $('#iframecontent').html('');
					        });
					        event.preventDefault();
					    });
					    /*** Links con target = _blank ***/
						$('a[rel="external"]').click(function () {
							$('a[rel="external"]').attr({'target':'_blank'});
						});
		        	});
		        	
	        });

	        event.preventDefault();
	});

   

	$('#work a').hover(function(){
		$(this).find('figcaption').animate({ 
			opacity: 1
		}, { duration: 100, queue: false });
    }, function(){
		$(this).find('figcaption').animate({ 
			opacity: 0
		}, { duration: 100, queue: false });
    });


    $('ul.socialdata a.sp').hover(function(){
		$(this).animate({ 
			marginTop: '5px'
		}, { duration: 100, queue: false });
    }, function(){
		$(this).animate({ 
			marginTop: '10px'
		}, { duration: 100, queue: false });
    });

    $('ul.social li, nav ul:last-child li').hover(function(){
		$(this).animate({ 
			marginTop: '-5px'
		}, { duration: 100, queue: false });
    }, function(){
		$(this).animate({ 
			marginTop: '0'
		}, { duration: 100, queue: false });
    });
	
	$('#about a.git').click(function(){
		$('html, body').stop().animate({
	            scrollTop: $('#contact').offset().top - $('.nav-container').height()+30
	        }, 500);

	        event.preventDefault();
	});

	

	$('form button').click(function () {

		
		var nameValue = $('input[name=form_name]').val();
		var emailValue = $('input[name=form_email]').val();
		var commentValue = $('textarea[name=form_comment]').val();
		var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	
		
		if(!nameValue[0])
			$('input[name=form_name]').stop()
				.animate({ paddingLeft: '4%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '4%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '3%' },100);
			

		if((!emailValue[0]) || (!regex.test(emailValue)))
			$('input[name=form_email]').stop()
				.animate({ paddingLeft: '4%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '4%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '3%' },100);

		
	
		if(!commentValue[0])
			$('textarea[name=form_comment]').stop()
				.animate({ paddingLeft: '4%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '4%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '3%' },100);

		

		if ((!commentValue[0]) || ((!emailValue[0]) || (!regex.test(emailValue))) || (!commentValue[0])){
			$('form button').css('background', '#cc5153').stop()
				.animate({ paddingLeft: '2%' },100)
				.animate({  paddingLeft: '-2%' },100)
				.animate({  paddingLeft: '2%' },100)
				.animate({  paddingLeft: '-2%' },100)
				.animate({  paddingLeft: '0' },100);
			return false;
		} 
		

		var dataString = 'name='+ nameValue + '&email=' + emailValue + '&comment=' + commentValue;
		//alert (dataString);return false;
		
		$.ajax({
	      type: "POST",
	      url: "/docinclude/www/mail.php",
	      beforeSend: function(html) {
	      	$('form button').css('background', '#9FCDC5').html('Sending...'); 
	      },
	      data: dataString,
	      success: function(html) {
		        console.log(html);
		        $('form button').html('¿Another one?');
		    }
	     });

		return false;
        
	});

});
