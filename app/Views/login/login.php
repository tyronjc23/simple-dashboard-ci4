<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url('favicon.ico') ?>" />
	<title>Login</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<b>Tech</b>Apps
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Masuk Aplikasi</p>

				<div class="input-group mb-3">
					<input type="text" name="username" id="username" class="form-control" placeholder="email pengguna">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" name="password" id="password" class="form-control" placeholder="Kata sandi">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-4">
						<button type="submit" id="loginBtn" class="btn btn-primary btn-block">Masuk</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>

	<script type="text/javascript">
		$('body').on('keydown', '#username', handleKeyPress)
			.on('keydown', '#password', handleKeyPress)
			.on('click', '#loginBtn', login);

		function handleKeyPress(event) {
			if (event.keyCode === 13 || event.key === 'Enter') {
				login();
			}
		}

		async function login() {
			const args = {
				username: $('#username').val(),
				password: $('#password').val()
			}

			if (username === '') alert('Silahkan masukan email pengguna.');
			if (password === '') alert('Silahkan masukan kata sandi.');

			try {
				const response = await $.post('login', args);

				if (response.success) window.location.replace("/");
			} catch (error) {
				error.status === 500 ? alert(error.responseJSON.message) : alert(error.responseJSON.messages.error);
			}
		}
	</script>
</body>

</html>