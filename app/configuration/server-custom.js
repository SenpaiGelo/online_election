$(document).ready(()=>{
	authenticator()
	students()
})

var authenticator = () =>{

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
	studentlog()

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
	create_account()

}

var students = () =>{

	var viewstudent = () =>{
		$.ajax({
			url: "./views/StudentView.php",
			method: "POST",
			data: {"method":"viewstudent" , "show":$('#student-show-students option:selected').val() },
			dataType: "json",
			success: function(response){
				$('#fetchstudent').html(response)
					
			}
		})
	}
	viewstudent()

	var viewstudent_show = () =>{
		$(document).on('change' , '#student-show-students ' , ()=>{
			$.ajax({
				url: "./views/StudentView.php",
				method: "POST",
				data: {"method":"viewstudent" , "show":$('#student-show-students option:selected').val() },
				dataType: "json",
				success: function(response){
					$('#fetchstudent').html("")
					$('#fetchstudent').html(response)
				}
			})
		})
	}
	viewstudent_show()

	var searchstudent = () =>{
		$(document).on('click', '#student-search-btn' , ()=>{
			$.ajax({
				url: "./views/StudentView.php",
				method: "POST",
				data: {"method":"searchstudent" , "find":$('#student-search-id').val() },
				dataType: "json",
				success: function(response){
					if(response.status == "success"){
						$('#fetchstudent').html("")
						$('#fetchstudent').html(response.messages)
					}
					else{
						$('#fetchstudent').html("")
						$('#fetchstudent').html(response.messages)
					}
				}
			})
		})
	}
	searchstudent()

}

