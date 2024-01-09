function login() {
	$("#loginform").on("submit", function (e) {
		e.preventDefault();
		var parametros = $(this).serialize();
		$.ajax({
			type: "post",
			url: $(this).attr("action"),
			datatype: "json",
			data: parametros,
			success: function (datos) {
				if (datos == "1") {
					$(location).attr("href", "Admin");
				} else if (datos == "2") {
					$(location).attr("href", "Doctor");
				} else if (datos == "3") {
					$(location).attr("href", "Enfermera");
				} else {
					msj = "Nick o contraseña erroneos";
					$("#errorLogin").removeAttr("hidden").html(msj);
					setTimeout(function () {
						$("#errorLogin").attr("hidden", true);
					}, 4000);
				}
			},
		});
	});
}

$(document).ready(function () {
	login();
});
