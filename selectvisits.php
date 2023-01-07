<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Document</title>
<body>
<?php

$link = mysqli_connect("localhost", "people", "12345", "medsys");
$adition = mysqli_query($link, "SET NAMES 'cp1251';");
$q = mysqli_query($link, "select doctors.doctype, users.surname, users.firstname, users.lastname, visits.date, visits.time from doctors, users, visits where doctors.docname = users.username and doctors.docname = visits.docname");
 if (!$q):
  echo 'Ошибка запроса.<br>';
 endif;

	 // Выводим заголовок таблицы:
echo"<table border=\"1\" bordercolor=\"#00ced1\" width=\"50%\" bgcolor=\"#d7fafc\">";
echo "<tr><td>Врач</td><td>Фамилия врача</td><td>Имя врача</td><td>Отчество врача</td><td>Дата</td>";
echo "<td>Время</td>"; //td
// Выводим таблицу:

for ($c=0; $c<mysqli_num_rows($q); $c++)
{echo "<tr>";
$f = mysqli_fetch_array($q);
echo "<td>$f[doctype]</td><td>$f[surname]</td><td>$f[firstname]</td><td>$f[lastname]</td><td>$f[date]</td>";
echo "<td>$f[time]</td>";
echo "</tr>";}//конец цикла вывода таблицы
echo "</table>";
//print("Нажмите <a href=http://localhost/www/lab14_3/lab14_3.php>ЗДЕСЬ</a>, чтобы вернуться");

?>
</body></html>