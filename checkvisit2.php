<?php
$start=session_start();
$username = $_SESSION['name'];
$date = $_SESSION['date'];
$doctype = $_SESSION['doctype'];
$_SESSION['fio'] = '';
?>
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
		margin-left: 545px; /* Отступ слева */
	   }
	</style>
</head>
<body bgcolor="#d7fafc">
	<header>
		<nav class="dws-menu">
			<ul>
				<li><a href="userlk.php">Профиль</a></li>
				<li><a href="#">Посещения . . .</a>
				<ul>
					<li><a href="showvisits.php">Последние визиты</a></li>
					<li><a href="#">Запись на прием</a></li>
				</ul>
				</li>
				<li><a href="showcard.php">Медкарта</a></li>
				<li><a href="letter.php">Письмо врачу</a></li>
				<li><a href="complain.php">Пожаловаться</a></li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<table "margin":"auto">
		<tr>
		<td>Должность врача:</td>
		<td><input type=text name="doctype" value="<?php echo $doctype?>" class="field" disabled></td>
		</tr>
		<tr>
		<td>Дата:</td>
		<td><input type=date name="date" value="<?php echo $date?>" class="field" disabled></td>
		</tr>

		<?php

		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		$que = mysqli_query($link, "select concat(users.surname,' ',users.firstname,' ',users.lastname) as fio from users join doctors on doctors.docname = users.username where doctors.doctype = '$doctype'");
		if (!$que):
			echo 'Ошибка запроса.<br>';
		endif;
			echo "<tr><td>ФИО врача:</td><td><select name = 'fio' class = 'select'>";
		echo "<option value='0'></option>";
		while($object = mysqli_fetch_array($que)){
			echo "<option value = '$object[fio]' >$object[fio]</option>";
		}
		echo "</select></td></tr>";
		?>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Далее">&nbsp;
		</td><td></td>
		</tr>
		</table>
		<p>
		</form>
		<?php
		$fio = $_POST["fio"];
		if ($fio!=''){
			$_SESSION['fio'] = $fio;
			echo("<script>location.href='addvisit.php'</script>");
		}
		?>
	</header>
</body>
</html>