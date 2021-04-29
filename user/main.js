$(document).ready(function () {
	if ($.session.get("username")) {

	}else{
		window.location.replace("../");
	}

})

/*Logout*/
function logout() {
	$.session.clear();
	window.location.replace("../assets/php/logout.php")
}
