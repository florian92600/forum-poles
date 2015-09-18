<?php
$error = '';
if ( !empty($_POST) ) {

	if ( $_POST['password'] === $_POST['password_'] ) {

		$sql= 'INSERT INTO users (pseudo, email, password) VALUES ("' . $_POST['pseudo'] . '", "' . $_POST['email'] . '", "' . $_POST['password'] . '");';
		$pdo->query($sql);
		$request = $pdo->query('SELECT * FROM users WHERE email = "' . $_POST['email'] . '" AND password = "' . $_POST['password'] . '";');
		$result = $request->fetchAll();
		if ( $result ) {
			$_SESSION['user'] = $result[0];
			header('Location:./');
			die();
		}

	} else {

		$error = 'Les mots de passe sont différents !';

	}
}

?>