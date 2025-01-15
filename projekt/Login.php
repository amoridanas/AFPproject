<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	require_once('database.php');
	login($username, $password);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Document</title>
</head>

<body>
	<div class="d-flex justify-content-center align-items-center vh-100">

		<form class="shadow w-450 p-3" method="post">

			<h4 class="display-4  fs-1">Bejelentkezés</h4><br>

			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $_GET['error']; ?>
				</div>
			<?php } ?>
			<?php if (isset($_GET['msg'])) { ?>
				<div class="alert alert-success" role="alert">
					<?php echo $_GET['msg']; ?>
				</div>
			<?php } ?>

			<div class="mb-3">
				<label class="form-label">Felhasznalónév</label>
				<input type="text" class="form-control" name="username">
			</div>

			<div class="mb-3">
				<label class="form-label">Jelszó</label>
				<input type="password" class="form-control" name="password">
			</div>

			<button type="submit" class="btn btn-primary">Bejelentkezés</button><br>
			<span>Még nincs fiókod?</span><a href="register.php">Regisztrálj!</a>
		</form>
	</div>
</body>

</html>