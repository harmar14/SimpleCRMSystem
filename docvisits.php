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
				<li><a href="doclk.php">Профиль</a></li>
				<li><a href="#">Посещения</a>
				<ul>
					<li><a href="#">Таблица приемов</a></li>
					<li><a href="editcard.php">Карты</a></li>
				</ul>
				</li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<table "margin":"auto">
		<tr>
		<td>Дата:</td>
		<td><input type=date name="date" value="" class="field"></td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Просмотреть">&nbsp;
		</td>
		</tr>
		</table>
		<p>
		</form>
		<?php
		$date = trim($_POST["date"]);
		if ($date!='') {
			$link = mysqli_connect("localhost", "people", "12345", "medsys");
			$adition = mysqli_query($link, "SET NAMES 'cp1251';");
			$q = mysqli_query($link, "select visits.date, visits.time, users.surname, users.firstname, users.lastname from visits, users where visits.docname = '$username' and visits.date = '$date' and visits.username = users.username");
			 if (!$q):
			  echo 'Ошибка запроса.<br>';
			 endif;
				 // Выводим заголовок таблицы:
			echo "<table  border=\"1\" bordercolor=\"#00ced1\" width=\"100%\" bgcolor=\"#d7fafc\">";
			echo "<tr><td>Дата</td><td>Время</td><td>Фамилия пациента</td><td>Имя пациента</td>";
			echo "<td>Отчество пациента</td>"; //td
			// Выводим таблицу:

			for ($c=0; $c<mysqli_num_rows($q); $c++)
			{echo "<tr>";
			$f = mysqli_fetch_array($q);
			echo "<td>$f[date]</td><td>$f[time]</td><td>$f[surname]</td><td>$f[firstname]</td>";
			echo "<td>$f[lastname]</td>";
			echo "</tr>";}//конец цикла вывода таблицы
			echo "</table>";
		}
		?>
	</header>
</body>
</html>