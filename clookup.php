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
		width: 1000px; /* Ширина таблицы */
		margin: auto;
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
					<li><a href="adduser.php">Пациента</a></li>
				</ul>
				</li>
				<li><a href="#">Жалобы</a></li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<br>
		<?php
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		$q = mysqli_query($link, "select concat(part1.surname, ' ', part1.firstname, ' ', part1.lastname) as complainter, concat(part2.surname, ' ', part2.firstname, ' ', part2.lastname) as bad_doc, complaints.complaint from complaints left join users as part1 on complaints.user = part1.username left join users as part2 on complaints.doc = part2.username");
		if (!$q):
			echo 'Ошибка запроса.<br>';
		endif;
		// Выводим заголовок таблицы:
		echo "<table  border=\"1\" bordercolor=\"#00ced1\" width=\"100%\" bgcolor=\"#d7fafc\">";
		echo "<tr><td>Врач</td><td>Пациент</td><td>Жалоба</td>";
		// Выводим таблицу:
		for ($c=0; $c<mysqli_num_rows($q); $c++)
			{echo "<tr>";
			$f = mysqli_fetch_array($q);
			echo "<td>$f[bad_doc]</td><td>$f[complainter]</td><td>$f[complaint]</td>";
			echo "</tr>";}//конец цикла вывода таблицы
		echo "</table>";
		?>
	</header>
</body>
</html>