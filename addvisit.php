<?php
$start=session_start();
$username = $_SESSION['name'];
$doctype = $_SESSION['doctype'];
$fio = $_SESSION['fio'];
$date = $_SESSION['date'];
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
				<li><a href="letter.php">Письмо врачу</a></li>
				<li><a href="complain.php">Пожаловаться</a></li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<?php
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		?>
		<form method="post" action="">
		<p>
		<table>
		<tr>
		<td>Должность врача:</td>
		<td><input type=text name="doctype" value="<?php echo $doctype?>" class="field" disabled></td>
		</tr>
		<tr>
		<td>ФИО врача:</td>
		<td><input type=text name="docname" value="<?php echo $fio?>" class="field" disabled></td>
		</tr>
		<tr>
		<td>Дата:</td>
		<td><input type=date name="date" value="<?php echo $date?>" class="field" disabled></td>
		</tr>	
		</table>
		<table>
		<tr>
		<td colspan="2">Время:</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '8:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="8:00">8:00';
		} else {
			echo '<input type=radio name="on" value="8:00" disabled>8:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '8:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="8:30">8:30';
		} else {
			echo '<input type=radio name="on" value="8:30" disabled>8:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '9:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="9:00">9:00';
		} else {
			echo '<input type=radio name="on" value="9:00" disabled>9:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '9:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="9:30">9:30';
		} else {
			echo '<input type=radio name="on" value="9:30" disabled>9:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '10:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="10:00">10:00';
		} else {
			echo '<input type=radio name="on" value="10:00" disabled>10:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '10:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="10:30">10:30';
		} else {
			echo '<input type=radio name="on" value="10:30" disabled>10:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '11:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="11:00">11:00';
		} else {
			echo '<input type=radio name="on" value="11:00" disabled>11:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '11:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="11:30">11:30';
		} else {
			echo '<input type=radio name="on" value="11:30" disabled>11:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '12:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="12:00">12:00';
		} else {
			echo '<input type=radio name="on" value="12:00" disabled>12:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '12:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="12:30">12:30';
		} else {
			echo '<input type=radio name="on" value="12:30" disabled>12:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '13:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="13:00">13:00';
		} else {
			echo '<input type=radio name="on" value="13:00" disabled>13:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '13:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="13:30">13:30';
		} else {
			echo '<input type=radio name="on" value="13:30" disabled>13:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '14:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="14:00">14:00';
		} else {
			echo '<input type=radio name="on" value="14:00" disabled>14:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '14:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="14:30">14:30';
		} else {
			echo '<input type=radio name="on" value="14:30" disabled>14:30';
		}
		?>
		</td>
		</tr>
		<tr>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '15:00'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="15:00">15:00';
		} else {
			echo '<input type=radio name="on" value="15:00" disabled>15:00';
		}
		?>
		</td>
		<td>
		<?php
		$que = mysqli_query($link, "select count(*) as cnt from visits where docname = (select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio') and date = '$date' and time = '15:30'");
		$res = mysqli_fetch_assoc($que);
		if ($res['cnt'] == 0){
			echo '<input type=radio name="on" value="15:30">15:30';
		} else {
			echo '<input type=radio name="on" value="15:30" disabled>15:30';
		}
		?>
		</td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="Записаться">&nbsp;
		</td>
		</tr>
		</table>
		</form>
		<?php
		$que = mysqli_query($link, "select docname from users join doctors on users.username = doctors.docname where doctors.doctype = '$doctype' and concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio'");
		$res = mysqli_fetch_assoc($que);
		$docusername = $res['docname'];
		
		$time = $_POST["on"];
		//проверка введенных данных на соответствие [фио врача - его логин - доктайп], [свободно ли время в конкретную дату]
		$result = mysqli_query($link, "SELECT username AS value FROM users WHERE concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio'");
		
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$docusername = $rows['value'];
			$result1 = mysqli_query($link, "SELECT doctype AS value FROM medsys.doctors WHERE docname = '$docusername'");
			if(!$result1) {
				die('Error: ' . mysqli_error($link));
			} else {
				$rows1 = mysqli_fetch_assoc($result1);
				$founddoctype = $rows1['value'];
			}
			if ($founddoctype != $doctype) {
				//echo "Врач с таким сочетанием должности и ФИО не найден";
			} else {
				//проверка, свободно ли время
				$result2 = mysqli_query($link, "SELECT COUNT(*) AS count FROM medsys.visits WHERE docname = '$docusername' and date = '$date' and time = '$time'");
				if(!$result2) {
					die('Error: ' . mysqli_error($link));
				} else {
					$num_rows = mysqli_fetch_assoc($result2);
					if($num_rows['count'] == 0) {
						//всё ок, можно записывать
						$adding = mysqli_query($link, "INSERT INTO medsys.visits (username,date,time,docname) VALUES ('$username', '$date', '$time', '$docusername')");
						if (!$adding){
							die('Error: ' . mysqli_error($link));
						} else {
							echo "Регистрация успешна";
						}
					} else {
						echo "Время занято";
					}
				}
			}
		}
		?>
	</header>
</body>
</html>