function load_msg(){
	var username = $('#name').val();
	var msgusername = $('.media-heading').val();

	$.ajax({
		type:"POST",
		url:"chat.php",
		data:"",
		cache:false,
		success:function(html){
			$('#messages-container').html(html);
			$('#loader').remove();
			if(msgusername == username){
				document.getElementById("chat-hiso").scrollTop = document.getElementById("chat-hiso").scrollHeight;
				document.getElementById("messages-container").scrollTop = document.getElementById("messages-container").scrollHeight;
			}

		}
	});
}

setInterval(function(){load_msg()},1000);
	
	


function send(){
	
		var msg = document.getElementById('msg').value;
		var name = document.getElementById('name').value;
		msg = escape(msg);
		alert(msg);


		
		var datastring = 'name='+name+'&msg='+msg;
		if(msg !=''){
		$.ajax({
			type:"POST",
			url:"send.php",
			data: datastring,
			cache: false,
			success:function(html){
				var audio = new Audio('Assets/chat.ogg');
				audio.play();
				document.getElementById('msg').innerHTML='';
				document.getElementById('msg').value='';
				document.getElementById("chat-history").scrollTop = document.getElementById("chat-history").scrollHeight;
				
				

			}
		}); 
	}
		return false;
	
}

function changepassword()	{
	var oldpass = $('#oldstuff').val();
	var newpass = $('#new-password').val();
	var username = $('#name').val();
	alert(oldpass);
	if(oldpass == $('#old-password').val()){
		$('#change-btn').addClass('animate rubberBand').text('Working...');
			$.ajax({
			type:"POST",
			url:"change-password.php",
			data:"newpass="+newpass+"&username="+username,
			cache:false,
			success:function(html){
				$('#modalerr').html(html);
				$('.modal-body').html("<h1>Password Changed.<small>To change password again.Log out then log in again</small></h1>");
			}

			});
		}else{
			$('#modalerr').html("<b color='red'>Invalid Current password</b>")
		}
		return false;
}



function showfooter(){
	$('footer').removeClass('fucked').fadeIn('slow').addClass('animated pulse');

}

$(document).ready(function(){
	
	$('#close').click(function(){
		$('footer').fadeOut('fast');

	});


});















	function validate(){
		var name= document.getElementById('name').value;
		

		var err ='';
		if(name==null || name ==''){
			
			err += '\n Name is empty';
			//strobe('name');
		}
		
		if(document.getElementById('msg').innerHTML==null || document.getElementById('msg').innerHTML==' '){
			
			err +='\n message empty';
			//strobe('msg');
		}
		if(err == ''){
			return true;
		}else{
			return false;
			alert('Errors: '+err);
		}
	}

	/*function strobe(id){
		document.getElementById(id)style.border="1px solid red";
		setTimeout(default,100);
		document.getElementById(id)style.border="1px solid red";


	}
	function default(){
		document.getElementById('name').style.border='1px solid gray';
		document.getElementById('msg').style.border='1px solid gray';
	}*/

