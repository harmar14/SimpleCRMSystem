<?php
$start=session_start();
$username = $_SESSION['name'];
$doctype = $_SESSION['doctype'];
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
		<td>Логин:</td>
		<td><input type=text name="login" value="<?php echo $username?>" class="field" disabled></td>
		</tr>
		<tr>
		<td>Должность врача:</td>
		<td><input type=text name="doctype" value="<?php echo $doctype?>" class="field" disabled></td>
		</tr>
		<?php
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		$que = mysqli_query($link, "select concat(users.surname,' ',users.firstname,' ',users.lastname) as fio from users join doctors on doctors.docname = users.username where doctors.doctype = '$doctype'");
		if (!$que){
			echo 'Ошибка запроса.<br>';
		} else {
			echo "<tr><td>ФИО врача:</td><td><select name = 'fio' class = 'select'>";
			echo "<option value='0'></option>";
			while($object = mysqli_fetch_array($que)){
				echo "<option value = '$object[fio]' >$object[fio]</option>";
			}
			echo "</select></td></tr>";
		}
		?>
		</table>
		<table>
		<tr>
		<td width="100">Текст письма:</td>
		<td><textarea name="lettertext" cols = "40" rows="5" class="field" style="width:100%"></textarea></td>
		</tr>
		</table>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Отправить">&nbsp;
		</td>
		</tr>
		</table>
		</form>
		<?php
		$fio = $_POST["fio"];
		$lettertext = $_POST["lettertext"];
		if ($username!='' && $doctype!='' && $fio!='' && $lettertext!=''){
			$q_user = mysqli_query($link, "select email from users where username = '$username'");
			$f_user = mysqli_fetch_array($q_user);
			$q_doc = mysqli_query($link, "select email from doctors left join users on doctors.docname = users.username where doctype =  '$doctype' and concat(surname,' ',firstname,' ',lastname) =  '$fio'");
			$f_doc = mysqli_fetch_array($q_doc);

			$addressee  = $f_doc[email]; // кому отправляем
			$sub='письмо от пациента'; //тема письма
			$email=$f_user[email]; // от кого
			$send = mail ($addressee,$sub,$lettertext,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

			echo("<script>location.href='user.php'</script>");
		}
		?>		
	</header>
</body>
</html>