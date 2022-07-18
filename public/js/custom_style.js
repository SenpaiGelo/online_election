$(document).ready(()=>{
  	 switcher()
})

var switcher = ()=>{

	var switch_sign_up = ()=>{
		$(document).on('click', '.sign-in-switch-btn' , ()=>{
			$('.sign-in-switch-btn i').removeClass("fa-toggle-off")
			$('.sign-in-switch-btn i').addClass("fa-toggle-on")
			$('.sign-in-switch-btn b').text("Sign In")

			$('.sign-in-switch-btn').addClass("sign-up-switch-btn")
			$('.sign-in-switch-btn').removeClass("sign-in-switch-btn")

			$('.sign-in-pane').addClass('d-none')
			$('.sign-up-pane').removeClass('d-none')

		})
	}
	switch_sign_up()

	var switch_sign_in = ()=>{
		$(document).on('click', '.sign-up-switch-btn' , ()=>{
			$('.sign-up-switch-btn i').removeClass("fa-toggle-on")
			$('.sign-up-switch-btn i').addClass("fa-toggle-off")
			$('.sign-up-switch-btn b').text("Sign Up")

			$('.sign-up-switch-btn').addClass("sign-in-switch-btn")
			$('.sign-up-switch-btn').removeClass("sign-up-switch-btn")

			$('.sign-up-pane').addClass('d-none')
			$('.sign-in-pane').removeClass('d-none')
		})
	}
	switch_sign_in()

}