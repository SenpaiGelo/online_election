$(document).ready(()=>{
	authenticator()
	students()
	partylists()
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

var partylists = () =>{

	var previewLogo = () =>{
		$(document).on('change', '#partylist-logo' , ()=>{
            if($('#partylist-logo').val() == ""){
                $('#previewlogo').attr('src' , "./includes/images//partylist-logo/default-logo-partylist.png");
            }
            else{
                $('#previewlogo').attr('src' , URL.createObjectURL(event.target.files[0]));
            }
        })
	}
	previewLogo()

	var create = () =>{
		$('#form-partylist').submit(function(e){
			e.preventDefault()
			$.ajax({
				url: "./views/PartylistView.php",
				method: "POST",
				data: new FormData(this),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function(response){
					if(response.status == "success"){
						alert(response.messages)
						$('#form-partylist')[0].reset();
						$('#previewlogo').attr('src' , "./includes/images//partylist-logo/default-logo-partylist.png");
						view()
					}
					else{
						alert(response.messages)
					}
				}
			})
		})
	}
	create()

	var view = () =>{
		$.ajax({
			url: "./views/PartylistView.php",
			method: "POST",
			data: {"method":"view"},
			dataType: 'json',
			success: (response)=>{
				$('#fetchPartylist').html("")
				$('#fetchPartylist').html(response)
			}
		})
	}
	view()

	var del = () =>{
		$(document).on('click','#del-partylist', function(){
			
			var remove = confirm("Delete Partylist")
			if(remove){
				$.ajax({
					url: "./controllers/PartylistController.php",
					method: "POST",
					data: {"method":"del", "id":$(this).attr('data-id') , "logo":$(this).attr('data-logo') },
					dataType: 'json',
					success: (response)=>{
						if(response.status == "success"){
							alert(response.messages)
							view()
						}
					}
				})
			}
			else{
				alert("cancelled")
			}
		})
	}
	del()

}

