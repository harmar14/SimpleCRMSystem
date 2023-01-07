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
		
	</header>
</body>
</html>