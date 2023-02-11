document.querySelector('.visible-btn').addEventListener('click', (e) => {
	e.preventDefault();
	const pass_input = document.getElementById('user_pass');
	const eye = document.getElementById('eye');

	if (pass_input['type'] == 'password') {
		eye['src'] = "./views/imgs/ojo_cerrado.png";
		pass_input['type'] = 'text';
	} else {
		eye['src'] = "./views/imgs/ojo_abierto.png";
		pass_input['type'] = 'password';
	}
});
