function handleLogIn(event) {
	event.preventDefault();
	usernameInput = document.getElementById('usernameInput');
	username = usernameInput.value;
	passwordInput = document.getElementById('passwordInput');
	password = passwordInput.value;

	requestObject = {
		'username': username,
		'password': password
	}

	//console.log(store.get('username'))
	//console.log(requestObject)

	xhr('POST', '/api/login', JSON.stringify(requestObject))
		.success(serverResponded);
}

function serverResponded(data) {
	if(data.success) {
		store.set('username', data.username)
		alert('Log in succeeded!');
	}
	else {
		alert("Your username or password was incorrect.\nPlease try again.");
	}
}