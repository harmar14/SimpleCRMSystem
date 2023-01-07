<?php
$start=session_start();
$username = $_SESSION['name'];
$_SESSION['date'] = '';
$_SESSION['time'] = '';
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
					<li><a href="docvisits.php">Таблица приемов</a></li>
					<li><a href="#">Карты</a></li>
				</ul>
				</li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<table "margin":"auto">
		<tr>
		<td>Дата приема:</td>
		<td><input type=date name="date" value="" class="field"></td>
		</tr>
		<tr>
		<td>Время приема:</td>
		<td><input type=time name="time" value="" class="field"></td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Редактировать карту">&nbsp;
		</td>
		</tr>
		</table>
		<p>
		</form>
		<?php
		$time = trim($_POST["time"]);
		$date = trim($_POST["date"]);
		if ($time!='' && $date!='') {
			$_SESSION['date'] = $date;
			$_SESSION['time'] = $time;
			echo("<script>location.href='cardeditor.php'</script>");
		} else {
			echo "Нужно заполнить оба поля";
		}
		?>
	</header>
</body>
</html>