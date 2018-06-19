
$(document).ready(function(){
	var owl = $(".product_carousel");
	owl.owlCarousel({
		margin: 10,
		nav:true,
		navText:['<div class="owl-nav-button"><i class="glyphicon glyphicon-chevron-left"></i></div>',
		'<div class="owl-nav-button"><i class="glyphicon glyphicon-chevron-right"></i></div>'],
		loop: true,
		responsive: {
			200: {items: 1},
			400: {items: 2},
			600: {items: 3},
			1000:{items:3}
		},
	});


	var owl1 = $(".offer_carousel");
	owl1.owlCarousel({
		margin: 10,
		loop:true,
		autoplay:true,
		autoplayHoverPause:true,
		nav:true,
		navText:['<div class="owl-nav-button"><i class="glyphicon glyphicon-chevron-left"></i></div>',
		'<div class="owl-nav-button"><i class="glyphicon glyphicon-chevron-right"></i></div>'],
		responsive: {
			0: {items: 1},
		},
	});


});

function display(evt, num) {
	  // Declare all variables
	  var i, tabcontent, tablinks;

	  // Get all elements with class="tabcontent" and hide them
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }

	  // Get all elements with class="tablinks" and remove the class "active"
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }

	  // Show the current tab, and add an "active" class to the button that opened the tab
	  document.getElementsByClassName("tabcontent")[num].style.display = "block";
	  evt.currentTarget.className += " active";
  }


  // ----------------------------USER  SIGNUP-----------------------------
  $(document).ready(function(){
  	$("#user-email").on('change',function(){

  		var email=$("#user-email").val();
  		var url=site_url('ajax/login/validate_user_signup/email');
  		$.ajax({
  				url:url,
				type:'POST',
				data:{
					email: email,
				},
				success:function(text){
					console.log(text);
					$("#email-alert").html(text);
				}
			});

  	});


  	$("#user-mobile").on('change',function(){

  		var mobile=$("#user-mobile").val();
  		var url=site_url('ajax/login/validate_user_signup/mobile');
  		$.ajax({
  			url:url,
  			type:'POST',
  			data:{
  				mobile: mobile,
  			},
  			success:function(text){
  				$("#mobile-alert").html(text);

  			}
  		});
  	});


  });


  // ----------------------------USER  LOGIN-----------------------------
  $(document).ready(function(){

  	$("#btn-login").on('click',function(){

  		var username=$("#login-username").val();
  		var password=$("#login-password").val();
  		var url=site_url('ajax/login/validate_user_signin');
  		
  		$.ajax({
  			url:url,
  			type:'POST',
  			data:{
  				username: username,
  				password:password,
  			},
  			success:function(text){
  				$("#login-alert").css({"display":"none"});
  				console.log(text);
  				if(text==2)
  				{   console.log(text);
  					$("#username-alert").html("<p style='color:red' >User name is required</p>");
  				}
  				else if(text==1)
  				{
  					$("#pswd-alert").html("<p style='color:red' >password is required</p>");
  				}	
  				else if(text==3)
  				{
  					$("#login-alert").css({"display":"block"});
  					$("#login-alert").html("<p style='color:red' >Username or Password is incorrect</p>");
  				}
  				else if(text==0)
  				{
  				  location.reload();
  				}

  			}
  		});
  	});
  });
  