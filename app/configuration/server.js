$(document).ready(()=>{
	studentlog()
	create_account()
})

var studentlog = () =>{
	$('#form-sign-in').submit(function(e){
		e.preventDefault()
		$.ajax({
			url: "../app/views/AuthView.php",
			method: "POST",
			data: { "method":"student", "email":$('#sign-in-email').val() , "password":$('#sign-in-password').val() },
			dataType: "json",
			success: (response)=>{
				if(response.status == "success"){
					location.href=response.location
				}
				else{
					$('#sign-in-messages').text(response.messages)
					$('#sign-in-messages').removeClass('d-none')
					$('#sign-in-btn').addClass('disabled')
					setTimeout(()=>{
						$('#sign-in-messages').addClass('d-none')
						$('#sign-in-btn').removeClass('disabled')
					}, 2500)
				}
			}
		})
	})
}

var create_account = ()=>{
	$(document).on('submit' , '#form-sign-up' , function(e){
		e.preventDefault()
		$.ajax({
			url: "../app/controllers/AuthController.php",
			method: "POST",
			data: {"method":"create" , "email": $('#sign-up-email').val() , "sid": $('#sign-up-sid').val() , "firstname": $('#sign-up-firstname').val(), "lastname": $('#sign-up-lastname').val() , "password": $('#sign-up-password').val() },
			dataType: "json",
			success: function(response){
				if(response.status == "success"){
					$('#form-sign-up')[0].reset();
					alert("success")
				}
				else{
					$('#sign-up-messages').text(response.messages)
					$('#sign-up-messages').removeClass('d-none')
					$('#sign-up-btn').addClass('disabled')
					setTimeout(()=>{
						$('#sign-up-messages').addClass('d-none')
						$('#sign-up-btn').removeClass('disabled')
					}, 2500)
				}
			}
		})
	})
}
