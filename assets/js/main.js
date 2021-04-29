$(document).ready(function () {
	
    $('body, .js-img-load').imagesLoaded({ background: !0 }).always( function( instance ) {
	    preloader(); //Init preloader
    });

    function preloader() {
        var tl = anime.timeline({}); 
        tl
        .add({
            targets: '.preloader',
            duration: 1,
            opacity: 1
        })
        .add({
            targets: '.circle-pulse',
            duration: 300,
            //delay: 500,
            opacity: 1,
            zIndex: '-1',
            easing: 'easeInOutQuart'
        },'+=500')
        .add({
            targets: '.preloader__progress span',
            duration: 500,
            width: '100%',
			easing: 'easeInOutQuart'
        },'-=500')
        .add({
            targets: '.preloader',
            duration: 500,
            opacity: 0,
            zIndex: '-1',
            easing: 'easeInOutQuart'
        });
    };
    /*===================================================*/

 });
// Other functions
function enableReg(){
	$('#home').slideUp(200);
	$('#reg').slideDown(200);
}
function disableReg(){
	$('#reg').slideUp(200);
	$('#home').slideDown(200);
}

// ===================//
// 		Login	 	//
// ==================//
var ready = false;
function validate(id){
	if ($(id).val() == '') {
		$(id).addClass('danger');
	}else{
		$(id).removeClass('danger');
		ready = true;
	}
}
function checkPassword(id) {
    if (($(id).val() == '') || ($(id).val() !== $('#regPassword').val())) {
        $(id).addClass('danger');
    }else{
        $(id).removeClass('danger');
        ready = true;
    }
}
function loginInit() {
	// Check ready state
	if (ready){
		$.ajax({
					type:'POST',
					url:'assets/php/validate.php',
					data: {
						username : $('#username').val(),
						password : $('#password').val()
					},
					success: function () {
						var username = $('#username').val();
						$.session.set('username',username);
						window.location.replace("user");
					}
	});
}
}
function register() {
        if (ready){
        $.ajax({
                    type:'POST',
                    url:'assets/php/register.php',
                    data: {
                        username : $('#regUsername').val(),
                        password : $('#regPassword').val()
                    },
                    success: function () {
                        alert('done');
                    }
    });
}
}