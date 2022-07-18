$(document).ready(()=>{
	studentlog()
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
					setTimeout(()=>{
						$('#sign-in-messages').addClass('d-none')
					}, 2000)
				}
			}
		})
	})
}
