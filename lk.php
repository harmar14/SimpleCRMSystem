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
				<li><a href="lk.php">�������</a></li>
				<li><a href="#">�������� . . .</a>
				<ul>
					<li><a href="addadmin.php">��������������</a></li>
					<li><a href="adddoctor.php">�����</a></li>
					<li><a href="adduser.php">��������</a></li>
				</ul>
				</li>
				<li><a href="clookup.php">������</a></li>
				<li><a href="index.php">�����</a></li>
			</ul>
		</nav>
		<?php
		$link = mysqli_connect("localhost", "people", "12345", "medsys");
		$adition = mysqli_query($link, "SET NAMES 'cp1251';");
		$result = mysqli_query($link, "SELECT surname AS value FROM medsys.users WHERE username = '$username'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$surname = $rows['value'];
		}
		$result = mysqli_query($link, "SELECT firstname AS value FROM medsys.users WHERE username = '$username'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$firstname = $rows['value'];
		}
		$result = mysqli_query($link, "SELECT lastname AS value FROM medsys.users WHERE username = '$username'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$lastname = $rows['value'];
		}
		$result = mysqli_query($link, "SELECT email AS value FROM medsys.users WHERE username = '$username'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$email = $rows['value'];
		}
		$result = mysqli_query($link, "SELECT phone AS value FROM medsys.users WHERE username = '$username'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$phone = $rows['value'];
		}
		$result = mysqli_query($link, "SELECT address AS value FROM medsys.users WHERE username = '$username'");
		if(!$result) {
			die('Error: ' . mysqli_error($link));
		} else {
			$rows = mysqli_fetch_assoc($result);
			$address = $rows['value'];
		}
		?>
		<form method="post" action="">
		<p>
		<table>
		<tr>
		<td>�����:</td>
		<td><input type=text name="login" value="<?php echo $username?>" class="field"></td>
		</tr>
		<tr>
		<td>�������:</td>
		<td><input type=text name="surname" value="<?php echo $surname?>" class="field"></td>
		</tr>
		<tr>
		<td>���:</td>
		<td><input type=text name="firstname" value="<?php echo $firstname?>" class="field"></td>
		</tr>
		<tr>
		<td>��������:</td>
		<td><input type=text name="lastname" value="<?php echo $lastname?>" class="field"></td>
		</tr>
		<tr>
		<td>E-mail:</td>
		<td><input type=text name="email" value="<?php echo $email?>" class="field"></td>
		</tr>
		<tr>
		<td>����� ��������:</td>
		<td><input type=text name="phone" value="<?php echo $phone?>" class="field"></td>
		</tr>
		<tr>
		<td>�����:</td>
		<td><input type=text name="address" value="<?php echo $address?>" class="field"></td>
		</tr>
		</table>
		<p>
		<table>
		<tr>
		<td>
		<input class="buttons" type=submit name="Submit" value="�������������">&nbsp;
		</td>
		</tr>
		</table>
		</form>
		<?php
		$email1 = strtolower(trim($_POST["email"]));
		$phone1 = trim($_POST["phone"]);
		$address1 = trim($_POST["address"]);
		$surname1 = trim($_POST["surname"]);
		$firstname1 = trim($_POST["firstname"]);
		$lastname1 = trim($_POST["lastname"]);
		if (($email1!=$email && $email1!='') || ($phone1!=$phone && $phone1!='') || ($address1!=$address && $address1!='') || ($surname1!=$surname && $surname1!='') || ($firstname1!=$firstname && $firstname1!='') || ($lastname1!=$lastname && $lastname1!='')) {
			$result = mysqli_query($link, "UPDATE medsys.users SET firstname='$firstname1', lastname='$lastname1', surname='$surname1', email='$email1', address='$address1', phone='$phone1' WHERE username='$username'");
			if(!$result) {
				echo "���-�� ����� �� ���";
				exit;
			} else {
				echo("<script>location.href='admin.php'</script>");
			}
		}
		?>
	</header>
</body>
</html>