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
		width: 300px; /* ������ ������� */
		margin: left; /* ����������� ������� �� ������ ����  */
		margin-left: 545px; /* ������ ����� */
	   }
	</style>
</head>
<body bgcolor="#d7fafc">
	<header>
		<nav class="dws-menu">
			<ul>
				<li><a href="doclk.php">�������</a></li>
				<li><a href="#">���������</a>
				<ul>
					<li><a href="docvisits.php">������� �������</a></li>
					<li><a href="#">�����</a></li>
				</ul>
				</li>
				<li><a href="index.php">�����</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<table "margin":"auto">
		<tr>
		<td>���� ������:</td>
		<td><input type=date name="date" value="" class="field"></td>
		</tr>
		<tr>
		<td>����� ������:</td>
		<td><input type=time name="time" value="" class="field"></td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="������������� �����">&nbsp;
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
			echo "����� ��������� ��� ����";
		}
		?>
	</header>
</body>
</html>