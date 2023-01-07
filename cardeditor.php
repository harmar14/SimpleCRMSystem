<?php
$start=session_start();
$username = $_SESSION['name'];
$date = $_SESSION['date'];
$time = $_SESSION['time'];
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
					<li><a href="editcard.php">Карты</a></li>
				</ul>
				</li>
				<li><a href="index.php">Выйти</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<?php
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		
		$date = date_format(date_create($date), 'Y-m-d');

		$result = mysqli_query($link, "SELECT username AS value FROM medsys.visits WHERE date = '$date' and time = '$time'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$cus = $rows['value'];
		}
		if ($cus!='') {
			$result = mysqli_query($link, "SELECT firstname AS value FROM medsys.users WHERE username = '$cus'");
			if(!$result) {
				die('Error: ' . mysqli_error($link));
			} else {
				$rows = mysqli_fetch_assoc($result);
				$firstname = $rows['value'];
			}
			$result = mysqli_query($link, "SELECT lastname AS value FROM medsys.users WHERE username = '$cus'");
			if(!$result) {
				die('Error: ' . mysqli_error($link));
			} else {
				$rows = mysqli_fetch_assoc($result);
				$lastname = $rows['value'];
			}
			$result = mysqli_query($link, "SELECT surname AS value FROM medsys.users WHERE username = '$cus'");
			if(!$result) {
				die('Error: ' . mysqli_error($link));
			} else {
				$rows = mysqli_fetch_assoc($result);
				$surname = $rows['value'];
			}
			$fio = $surname.' '.$firstname.' '.$lastname;
			$result = mysqli_query($link, "SELECT birthday AS value FROM medsys.users WHERE username = '$cus'");
			if(!$result) {
				die('Error: ' . mysqli_error($link));
			} else {
				$rows = mysqli_fetch_assoc($result);
				$birthday = $rows['value'];
			}
		}
		?>
		<table>
		<tr>
		<td>Дата приема:</td>
		<td><input type=date name="date" value="<?php echo $date?>" class="field" readonly></td>
		</tr>
		<tr>
		<td>Время приема:</td>
		<td><input type=time name="time" value="<?php echo $time?>" class="field" readonly></td>
		</tr>
		<tr>
		<td>Пациент:</td>
		<td><input type=text name="fio" value="<?php echo $fio?>" class="field" readonly></td>
		</tr>
		<tr>
		<td>Дата рождения:</td>
		<td><input type=date name="birthday" value="<?php echo $birthday?>" class="field" readonly></td>
		</tr>
		<tr>
		<td>Диагноз:</td>
		<td><input type=text name="diagnosis" value="" class="field"></td>
		</tr>
		<tr>
		<td>Рекомендации:</td>
		<td><input type=text name="recomendations" value="" class="field"></td>
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
		$diagnosis = trim($_POST["diagnosis"]);
		$recomendations = trim($_POST["recomendations"]);
		$check = mysqli_query($link, "SELECT COUNT(*) AS count FROM medsys.cards WHERE username = '$cus' and date = '$date' and docname = '$username'");
		if (!$check){
			die('Error: ' . mysqli_error($link));
		} else {
			$num_rows = mysqli_fetch_assoc($check);
			if ($date == date("Y-m-d")) {
				if($num_rows['count'] == 0) {
					$adding = mysqli_query($link, "INSERT INTO medsys.cards (username, diagnosis, notes, date, docname) VALUES ('$cus', '$diagnosis', '$recomendations', '$date', '$username')");
					if (!$adding){
						die('Error: ' . mysqli_error($link));
					} else {
						echo "Успешно записано!";
					}
				} else {
					$adding = mysqli_query($link, "UPDATE medsys.cards SET diagnosis = '$diagnosis', notes = '$recomendations' WHERE username = '$cus' and date = '$date' and docname = '$username'");
					if (!$adding){
						die('Error: ' . mysqli_error($link));
					} else {
						echo "Успешно обновлено!";
					}
				}
			} else {
				echo "Изменения в карту можно вносить только в день приема";
			}
		}
		
		?>
	</header>
</body>
</html>