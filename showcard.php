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
				<li><a href="userlk.php">�������</a></li>
				<li><a href="#">��������� . . .</a>
				<ul>
					<li><a href="showvisits.php">��������� ������</a></li>
					<li><a href="#">������ �� �����</a></li>
				</ul>
				</li>
				<li><a href="#">��������</a></li>
				<li><a href="letter.php">������ �����</a></li>
				<li><a href="complain.php">������������</a></li>
				<li><a href="index.php">�����</a></li>
			</ul>
		</nav>
		<form method="post" action="">
		<p>
		<table "margin":"auto">
		<tr>
		<td>��������� �����:</td>
		<td><input type=text name="doctype" value="" class="field"></td>
		</tr>
		<tr>
		<td>����:</td>
		<td><input type=date name="date" value="" class="field"></td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="����������� �����">&nbsp;
		</td>
		</tr>
		</table>
		<p>
		</form>
		<?php
		$doctype = trim($_POST["doctype"]);
		$date = trim($_POST["date"]);
		if ($doctype!='' && $date!='') {
			$link = mysqli_connect("localhost", "people", "12345", "medsys");
			$adition = mysqli_query($link, "SET NAMES 'cp1251';");
			$q = mysqli_query($link, "select doctors.doctype, users.surname, users.firstname, users.lastname, cards.date, cards.diagnosis, cards.notes from doctors, users, cards where doctors.docname = users.username and doctors.docname = cards.docname and cards.date = '$date' and doctors.doctype = '$doctype' and cards.username = '$username'");
			 if (!$q):
			  echo '������ �������.<br>';
			 endif;
				 // ������� ��������� �������:
			echo "<table  border=\"1\" bordercolor=\"#00ced1\" width=\"100%\" bgcolor=\"#d7fafc\">";
			echo "<tr><td>����</td><td>������� �����</td><td>��� �����</td><td>�������� �����</td><td>����</td><td>�������</td>";
			echo "<td>������������</td>"; //td
			// ������� �������:

			for ($c=0; $c<mysqli_num_rows($q); $c++)
			{echo "<tr>";
			$f = mysqli_fetch_array($q);
			echo "<td>$f[doctype]</td><td>$f[surname]</td><td>$f[firstname]</td><td>$f[lastname]</td><td>$f[date]</td><td>$f[diagnosis]</td>";
			echo "<td>$f[notes]</td>";
			echo "</tr>";}//����� ����� ������ �������
			echo "</table>";
		}
		?>
	</header>
</body>
</html>