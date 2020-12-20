 		


 		$.ajax({
			url: 'Controllers/authController.php',
			type: 'GET',
			dataType: 'json',
 		})
		.done(function(data) {
			console.log(data)
 			let jorge=JSON.stringify(data)
			$("#datapas").html(jorge)
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		