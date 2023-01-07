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
					<li><a href="showvisits.php">Последние визиты</a></li>
					<li><a href="checkvisit.php">Запись на прием</a></li>
				</ul>
				</li>
				<li><a href="showcard.php">Медкарта</a></li>
				<li><a href="#">Письмо врачу</a></li>
				<li><a href="complain.php">Пожаловаться</a></li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<form method="post">
		<p>
		<table "margin":"auto">
		<tr>
		<td>Должность врача:</td>
		<td><input type=text name="doctype" value="" class="field"></td>
		</tr>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Далее">&nbsp;
		</td>
		</tr>
		</table>
		</form>
		<?php
		$doctype = $_POST["doctype"];
		if ($doctype!=''){
			$_SESSION['doctype'] = $doctype;
			echo("<script>location.href='sendletter.php'</script>");
		}
		?>	
	</header>
</body>
</html>