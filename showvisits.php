<?php
$start=session_start();
$username = $_SESSION['name'];
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
					<li><a href="#">Последние визиты</a></li>
					<li><a href="checkvisit.php">Запись на прием</a></li>
				</ul>
				</li>
				<li><a href="showcard.php">Медкарта</a></li>
				<li><a href="letter.php">Письмо врачу</a></li>
				<li><a href="complain.php">Пожаловаться</a></li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<p>
		<?php
		if ($username!='') {
			$link = mysqli_connect("localhost", "people", "12345", "medsys");
			$adition = mysqli_query($link, "SET NAMES 'cp1251';");
			$q = mysqli_query($link, "select doctors.doctype, users.surname, users.firstname, users.lastname, visits.date, visits.time from doctors, users, visits where doctors.docname = users.username and doctors.docname = visits.docname and visits.username = '$username' order by visits.date desc limit 10");
			 if (!$q):
			  echo 'Ошибка запроса.<br>';
			 endif;
				 // Выводим заголовок таблицы:
			echo "<table  border=\"1\" bordercolor=\"#00ced1\" width=\"100%\" bgcolor=\"#d7fafc\">";
			echo "<tr><td>Врач</td><td>Фамилия врача</td><td>Имя врача</td><td>Отчество врача</td><td>Дата</td>";
			echo "<td>Время</td>"; //td
			// Выводим таблицу:

			for ($c=0; $c<mysqli_num_rows($q); $c++)
			{echo "<tr>";
			$f = mysqli_fetch_array($q);
			echo "<td>$f[doctype]</td><td>$f[surname]</td><td>$f[firstname]</td><td>$f[lastname]</td><td>$f[date]</td>";
			echo "<td>$f[time]</td>";
			echo "</tr>";}//конец цикла вывода таблицы
			echo "</table>";
		}
		?>
	</header>
</body>
</html>