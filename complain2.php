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
					<li><a href="checkvisit.php">������ �� �����</a></li>
				</ul>
				</li>
				<li><a href="showcard.php">��������</a></li>
				<li><a href="letter.php">������ �����</a></li>
				<li><a href="#.php">������������</a></li>
				<li><a href="index.php">�����</a></li>
			</ul>
		</nav>
		<form method="post">
		<p>
		<table "margin":"auto">
		<tr>
		<td>�����:</td>
		<td><input type=text name="login" value="<?php echo $username?>" class="field" disabled></td>
		</tr>
		<tr>
		<td>��������� �����:</td>
		<td><input type=text name="doctype" value="<?php echo $doctype?>" class="field" disabled></td>
		</tr>
		<?php
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		$que = mysqli_query($link, "select concat(users.surname,' ',users.firstname,' ',users.lastname) as fio from users join doctors on doctors.docname = users.username where doctors.doctype = '$doctype'");
		if (!$que){
			echo '������ �������.<br>';
		} else {
			echo "<tr><td>��� �����:</td><td><select name = 'fio' class = 'select'>";
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
		<td width="100">����� ������:</td>
		<td><textarea name="complaint" cols = "40" rows="5" class="field" style="width:100%"></textarea></td>
		</tr>
		</table>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="������������">&nbsp;
		</td>
		</tr>
		</table>
		</form>
		<?php
		$fio = $_POST["fio"];
		$complaint = $_POST["complaint"];
		if ($username!='' && $doctype!='' && $fio!='' && $complaint!=''){
			$adding = mysqli_query($link, "INSERT INTO complaints (user, doc, complaint) VALUES ('$username', (select username from users join doctors on doctors.docname = users.username where concat(users.surname,' ',users.firstname,' ',users.lastname) = '$fio' and doctors.doctype = '$doctype'), '$complaint')");
			if (!$adding){
				//die('Error: ' . mysqli_error($link));
			} else {
				echo("<script>location.href='user.php'</script>");
			}
		}
		?>		
	</header>
</body>
</html>