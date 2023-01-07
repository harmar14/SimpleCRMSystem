<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
	<title>Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
	<style>
	   table {
		width: 300px; /* Ширина таблицы */
		margin: left; /* Выравниваем таблицу по левому краю  */
		margin-left: 530px; /* Отступ слева */
	   }
	</style>
</head>
<body bgcolor="#d7fafc">
	<header>
		<nav class="dws-menu">
			<ul>
				<li><a href="lk.php">Профиль</a></li>
				<li><a href="#">Добавить . . .</a>
				<ul>
					<li><a href="addadmin.php">Администратора</a></li>
					<li><a href="adddoctor.php">Врача</a></li>
					<li><a href="#">Пациента</a></li>
				</ul>
				</li>
				<li><a href="clookup.php">Жалобы</a></li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<table "margin":"auto">
		<tr>
		<td>Логин:</td>
		<td><input type=text name="login" value="" class="field"></td>
		</tr>
		<tr>
		<td>Пароль:</td>
		<td><input type=password name="password" value="" class="field"></td>
		</tr>
		<tr>
		<td>Фамилия:</td>
		<td><input type=text name="surname" value="" class="field"></td>
		</tr>
		<tr>
		<td>Имя:</td>
		<td><input type=text name="firstname" value="" class="field"></td>
		</tr>
		<tr>
		<td>Отчество:</td>
		<td><input type=text name="lastname" value="" class="field"></td>
		</tr>
		<tr>
		<td>Дата рождения:</td>
		<td><input type=text name="birthday" value="" class="field"></td>
		</tr>
		<tr>
		<td>Телефон:</td>
		<td><input type=text name="phone" value="" class="field"></td>
		</tr>
		<tr>
		<td>Адрес:</td>
		<td><input type=text name="address" value="" class="field"></td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Добавить">&nbsp;
		</td>
		</tr>
		</table>
		</form>
		<?php
		$login = trim($_POST["login"]);
		$password = trim($_POST["password"]);
		$phone = trim($_POST["phone"]);
		$firstname = trim($_POST["firstname"]);
		$lastname = trim($_POST["lastname"]);
		$surname = trim($_POST["surname"]);
		$address = trim($_POST["address"]);
		$birthday = trim($_POST["birthday"]);
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		if($login!='' && $password!='' && $firstname!='' && $lastname!='' && $phone!='' && $surname!='' && $address!='' && $birthday!='') {
			$result = mysqli_query($link, "SELECT COUNT(*) AS count FROM medsys.registration WHERE username = '$login'");
			if(!$result) {
				die('Error: ' . mysqli_error($link));
			} else {
				$num_rows = mysqli_fetch_assoc($result);
				if($num_rows['count'] == 0) {
					$adding = mysqli_query($link, "INSERT INTO medsys.registration (username,password) VALUES ('$login',md5('$password'))");
					$adding2 = mysqli_query($link, "INSERT INTO medsys.users (username,phone,firstname,lastname,surname,address,birthday) VALUES ('$login','$phone','$firstname','$lastname','$surname','$address','$birthday')");
					$adding3 = mysqli_query($link, "INSERT INTO medsys.roles (username,role) VALUES ('$login','user')");
					if (!$adding && !$adding2 && !$adding3){
						die('Error: ' . mysqli_error($link));
					} else {
						echo "Регистрация успешна";
					}
				}
			}
		} else {
			echo "Все поля являются обязательными к заполнению";
		}
		?>
	</header>
</body>
</html>