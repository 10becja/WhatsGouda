function handleNewUserSubmit(event) {
	event.preventDefault();
	username = document.getElementById('usernameInput').value;
	password = document.getElementById('passwordInput').value;
	confirmPassword = document.getElementById('ConfirmPasswordInput').value;
	email = document.getElementById('emailInput').value;
	if(password !== confirmPassword) {
		alert("Your passwords do not match");
		return;
	}

	requestObject = {
		'username': username,
		'password': password,
		'email': email
	};

	//console.log(requestObject);

	xhr('POST', '/api/newUser/', JSON.stringify(requestObject))
		.success(serverResponded);
}

function serverResponded(data) {
	if(data.success) {
		alert("Your account was created!");
	}
	else {
		alert(data.errormessage);
	}
}