<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Document</title>
<body>
<?php

$link = mysqli_connect("localhost", "people", "12345", "medsys");
$adition = mysqli_query($link, "SET NAMES 'cp1251';");
$q = mysqli_query($link, "select doctors.doctype, users.surname, users.firstname, users.lastname, visits.date, visits.time from doctors, users, visits where doctors.docname = users.username and doctors.docname = visits.docname");
 if (!$q):
  echo '������ �������.<br>';
 endif;

	 // ������� ��������� �������:
echo"<table border=\"1\" bordercolor=\"#00ced1\" width=\"50%\" bgcolor=\"#d7fafc\">";
echo "<tr><td>����</td><td>������� �����</td><td>��� �����</td><td>�������� �����</td><td>����</td>";
echo "<td>�����</td>"; //td
// ������� �������:

for ($c=0; $c<mysqli_num_rows($q); $c++)
{echo "<tr>";
$f = mysqli_fetch_array($q);
echo "<td>$f[doctype]</td><td>$f[surname]</td><td>$f[firstname]</td><td>$f[lastname]</td><td>$f[date]</td>";
echo "<td>$f[time]</td>";
echo "</tr>";}//����� ����� ������ �������
echo "</table>";
//print("������� <a href=http://localhost/www/lab14_3/lab14_3.php>�����</a>, ����� ���������");

?>
</body></html>