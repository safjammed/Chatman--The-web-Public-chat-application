$(document).ready(function(){
	$('.card-alt').click(function(){
		$('#reg-name').focus();

	});

	$('#reg-username').blur(function(){
		var username = $('#reg-username').val();
		if(username != '' || username !=null){
			$.ajax({
			type:"POST",
			url:"user-check.php",
			data:"username="+username,
			cache:false,
			success:function(html){
				$('#username-avl').stop().html(html);

			}

			});
		}

	});

	$('#reg-repassword').blur(function(){
		var password = $('#reg-password').val();
		var repassword = $('#reg-repassword').val();
		if(password != '' && repassword != ''){
			if(password == repassword){
				$('#repassword-avl').stop().html('<b>Password Match</b>');
			}else{
				$('#repassword-avl').stop().html('<b>Password Mismatch</b>');
			}
		}

	});

	$('#reg-email').keypress(function(){
		var email=$('#reg-email').val();
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
		    $('#email-avl').stop().html('<b>not an email address</b>');
		 }else{
		 	$.ajax({
			type:"POST",
			url:"email-check.php",
			data:"email="+email,
			cache:false,
			success:function(html){
				$('#email-avl').stop().html(html);

			}

			});
		 }
			
	});



});

function validate_form(){
	var email=$('#reg-email').val();
	var username=$('#reg-username').val();
	var name=$('#reg-name').val();
	var password=$('#reg-password').val();
	var repassword=$('#reg-repassword').val();

	if(email != '' || username != '' || name != '' || password != '' || repassword != ''){
		return true;
	}else{
		alert('Come On! You Know i cant let u in unless you provide all of the info!! Fill all the fields of the regestration form');
		return false;
	}
}