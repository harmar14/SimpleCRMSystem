<?php
$start=session_start();
$_SESSION['name'] = '';
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
</head>
<body>
	<header>
		<!-- Slider Wrapper -->
		<div class="css-slider-wrapper">
			<input type="radio" name="slider" class="slide-radio1" checked id="slider_1">
			<input type="radio" name="slider" class="slide-radio2" id="slider_2">
			<input type="radio" name="slider" class="slide-radio3" id="slider_3">
			<input type="radio" name="slider" class="slide-radio4" id="slider_4">
		  
			<!-- Slider Pagination -->
			<div class="slider-pagination">
				<label for="slider_1" class="page1"></label>
				<label for="slider_2" class="page2"></label>
				<label for="slider_3" class="page3"></label>
				<label for="slider_4" class="page4"></label>
			</div>
		  
			<!-- Slider #1 -->
			<div class="slider slide-1">
				<img src="images/slide1.jpg" alt="">
			</div>
		  
			<!-- Slider #2 -->
			<div class="slider slide-2">
				<img src="images/slide2.jpg" alt="">
			</div>
		  
			<!-- Slider #3 -->
			<div class="slider slide-3">
				<img src="images/slide3.jpg" alt="">
			</div>
		  
			<!-- Slider #4 -->
			<div class="slider slide-4">
				<img src="images/slide4.jpg" alt="">
			</div>
		</div>
	
		<nav class="dws-menu">
			<ul>
				<li><a href="#openModal">Войти</a></li>
			</ul>
		</nav>
		<div id="openModal" class="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title">Требуется авторизация</h3>
						<a href="#close" title="Close" class="close">х</a>
					</div>
					<div class="modal-body">    
						<div class="tab">
							<button class="tablinks" onclick="openEvent(event, 'SignIn')"><h3>Вход</h3></button>
							<button class="tablinks" onclick="openEvent(event, 'SignUp')"><h3>Регистрация</h3></button>
						</div>

						<!-- Tab content -->
						<form method="POST" action="">
						<div id="SignIn" class="tabcontent">
						<table>
							<tr>
							<td>Имя пользователя</td>
							<td><input type=text name="in_login" value="" class="field"></td>
							</tr>
							<tr>
							<td>Пароль</td>
							<td><input type=password name="in_password" value="" class="field"></td>
							</tr>
							</table>
							<p>
							<input type=submit name="Submit" value="OK" class="buttons">&nbsp;
							<input type=reset name="Reset" value="Сброс" class="buttons">
						</div>
						<div id="SignUp" class="tabcontent">
						<table>
							<tr>
							<td>Имя пользователя</td>
							<td><input type=text name="login" value="" class="field"></td>
							</tr>
							<tr>
							<td>E-mail</td>
							<td><input type=text name="email" value="" class="field"></td>
							</tr>
							<tr>
							<td>Пароль</td>
							<td><input type=password name="password" value="" class="field"></td>
							</tr>
							<tr>
							<td>Подтвердите пароль</td>
							<td><input type=password name="validate_password" value="" class="field"></td>
							</tr>
							</table>
							<p>
							
							<input type=submit name="Submit" value="OK" class="buttons">&nbsp;
							<input type=reset name="Reset" value="Сброс" class="buttons">
						</div>
						</form>
						<?php
						$login = trim($_POST["login"]);
						$email = strtolower(trim($_POST["email"]));
						$password = trim($_POST["password"]);
						$valid_pass = trim($_POST["validate_password"]);
						$in_login = trim($_POST["in_login"]);
						$in_password = trim($_POST["in_password"]);
						if ($in_login=='' && $in_password=='') {
							if ($login!='' && $email!='' && $password!='' && $valid_pass==$password){
								if (!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)) {
									echo "Проверьте правильность введенного E-mail";
									exit;
								} else {
									$link = mysqli_connect("localhost", "people", "12345", "medsys");
									$result = mysqli_query($link, "SELECT COUNT(*) AS count FROM medsys.registration WHERE username = '$login'");
									$result2 = mysqli_query($link, "SELECT COUNT(*) AS count2 FROM medsys.users WHERE email = '$email'");
									if(!$result || !$result2) {
										die('Error: ' . mysqli_error($link));
									} else {
										$num_rows = mysqli_fetch_assoc($result);
										$num_rows2 = mysqli_fetch_assoc($result2);
										if($num_rows['count'] == 0 && $num_rows2['count2'] == 0){
											$adding = mysqli_query($link, "INSERT INTO medsys.registration (username,password) VALUES ('$login',md5('$password'))");
											$adding2 = mysqli_query($link, "INSERT INTO medsys.users (username,email) VALUES ('$login','$email')");
											$adding3 = mysqli_query($link, "INSERT INTO medsys.roles (username,role) VALUES ('$login','user')");
											if (!$adding && !$adding2 && !$adding3){
												die('Error: ' . mysqli_error($link));
											} else {
												echo "Регистрация успешна. Перейтите на вкладку [Вход], чтобы войти";
											}
										} else {
											echo "Такое имя пользователя или E-mail уже существует";
										}
									}
								}
							} else {
								print "Необходимо заполнить все поля";
							}
						}
						if ($in_login!='' && $in_password!='') {
							$link = mysqli_connect("localhost", "people", "12345", "medsys");
							$result = mysqli_query($link, "SELECT COUNT(*) AS count FROM medsys.registration WHERE username = '$in_login' and password = md5('$in_password')");
							if(!$result) {
								die('Error: ' . mysqli_error($link));
							} else {
								$num_rows = mysqli_fetch_assoc($result);
								if($num_rows['count'] != 0) {
									$result2 = mysqli_query($link, "SELECT role AS info FROM medsys.roles WHERE username = '$in_login'");
									if(!$result2) {
										die('Error: ' . mysqli_error($link));
									} else {
										$_SESSION['name'] = $in_login; //сохранение имени пользователя в сессию
										$rows = mysqli_fetch_assoc($result2);
										//переход по ссылке в лк в зависимости от роли
										if($rows['info'] == 'admin'){
											echo("<script>location.href='admin.php'</script>");
										}
										if($rows['info'] == 'doctor'){
											echo("<script>location.href='doctor.php'</script>");
										}
										if($rows['info'] == 'user'){
											echo("<script>location.href='user.php'</script>");
										}
									}
								} else {
									echo "Аккаунт не найден. Проверьте правильность ввода данных или зарегистрируйтесь";
								}
							}	
						}
						if (($in_login=='' && $in_password!='')||($in_login!='' && $in_password=='')) {
							print "Не хватает данных для авторизации";
						}
						?>
						<script>
						function openEvent(evt, eventName) {
						  // Declare all variables
						  var i, tabcontent, tablinks;

						  // Get all elements with class="tabcontent" and hide them
						  tabcontent = document.getElementsByClassName("tabcontent");
						  for (i = 0; i < tabcontent.length; i++) {
							tabcontent[i].style.display = "none";
						  }

						  // Get all elements with class="tablinks" and remove the class "active"
						  tablinks = document.getElementsByClassName("tablinks");
						  for (i = 0; i < tablinks.length; i++) {
							tablinks[i].className = tablinks[i].className.replace(" active", "");
						  }

						  // Show the current tab, and add an "active" class to the button that opened the tab
						  document.getElementById(eventName).style.display = "block";
						  evt.currentTarget.className += " active";
						}
						</script>
					</div>
				</div>
			</div>
		</div>
	</header>
</body>
</html>