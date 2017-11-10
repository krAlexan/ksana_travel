<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Туристическое агенство KSANA TRAVEL</title>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="header">
		<div class="row">
			<div class="col l8 m12 s12">
				<nav class=" navMenu transparent">
					<ul id="dropdown" class="dropdown-content">
						<li><a href="index.php">ГЛАВНАЯ</a></li>
						<li><a href="services.php">УСЛУГИ</a></li>
						<li><a href="tour.php">ПОИСК ТУРА</a></li>
						<!-- <li><a href="country.php">СТРАНЫ</a></li> -->
						<li><a href="about.php">О КОМПАНИИ</a></li>
						<li><a href="testimon.php">ОТЗЫВЫ</a></li>
						<li class="active"><a href="contacts.php">КОНТАКТЫ</a></li>
					</ul>
					<ul id="nav-mobile" class="hide-on-med-and-down">
						<li><a href="index.php">ГЛАВНАЯ</a></li>
						<li><a href="services.php">УСЛУГИ</a></li>
						<li><a href="tour.php">ПОИСК ТУРА</a></li>
						<!-- <li><a href="country.php">СТРАНЫ</a></li> -->
						<li><a href="about.php">О КОМПАНИИ</a></li>
						<li><a href="testimon.php">ОТЗЫВЫ</a></li>
						<li class="active"><a href="contacts.php">КОНТАКТЫ</a></li>
					</ul>
					<ul class="hide-on-large-only right">
						<li><a class="dropdown-button" href="#!" data-activates="dropdown"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a></li>
					</ul>
				</nav>
			</div>
			<div class="col l2 hide-on-med-and-down contacts center">
				<div class="social">
					<a href="viber://add?number=%2B380501706056"><img src="img/social/viber.png" border="0" alt="VIBER"></a>
					<a href="https://www.instagram.com/ksanatravel/" target="_blank"><img src="img/social/inst.png" border="0" alt="INSTAGRAMM"></a>
					<a href="https://www.facebook.com/ksana.travel/" target="_blank"><img src="img/social/fb.png" border="0" alt="FACEBOOK"></a>
					<a href="whatsapp://send?phone=380501706056"><img src="img/social/whatsapp.png" border="0" alt="WHATSAPP"></a>
					<a href="skype:ksana7779?add" alt="SKYPE"><img src="http://www.techspot.com/images2/downloads/topdownload/2014/05/skype.png" border="0"></a>
				</div>
			</div>
			<div class="col l2 hide-on-med-and-down contacts center">
				<a href="tel:+380734275434" class="white-text">+380734275434</a>
				<a href="tel:+380501706056" class="white-text">+380501706056</a>
				
				<!-- подписаться на рассылку -->

				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header white-text">Подписаться на рассылку</div>
						<div class="collapsible-body orange">
							<div class="row">
								<?php
									if (isset ($_POST['subs'])) {
										$errorss = array();
										if( trim($_POST['name_subs']) == '' ){
											$errorss[] = 'Введите Имя';
										}
										if( trim($_POST['email_subs']) == '' ){
											$errorss[] = 'Введите Email';
										}
										if( empty($errorss)){
											$_POST['name_subs'] = htmlspecialchars($_POST['name_subs']);
											$_POST['email_subs'] = htmlspecialchars($_POST['email_subs']);
											$to = "alexsavch@meta.ua"; // поменять на свой электронный адрес
											$from = $_POST['email_subs'];
											$subject = "Подписчик с ".$_SERVER['HTTP_REFERER'];
											$message = "На рассылку подписался новый человек!\nИмя: ".$_POST['name_subs']."\nEmail: ".$from;
											$boundary = md5(date('r', time()));
											$filesize = '';
											$headers = "MIME-Version: 1.0\r\n";
											$headers .= "From: " . $from . "\r\n";
											$headers .= "Reply-To: " . $from . "\r\n";
											$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
$message="
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message";
  for($i=0;$i<count($_FILES['fileFF']['name']);$i++) {
     if(is_uploaded_file($_FILES['fileFF']['tmp_name'][$i])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'][$i])));
         $filename = $_FILES['fileFF']['name'][$i];
         $filetype = $_FILES['fileFF']['type'][$i];
         @$filesize += $_FILES['fileFF']['size'][$i];
         $message.="

--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
     }
   }
   $message.="
--$boundary--";
					mail($to, $subject, $message, $headers);
												echo '<div style="color: green; font-size: 120%;">'.$_POST['name_subs'].', Спасибо за подписку!</div>';
										}
										else {
											echo '<div style="color: red; font-size: 120%;">'.array_shift($errorss).'</div>';
										}
									}
									?>
								<form action="contacts.php" method="post" class="col s12">
									<div class="row">
										<div class="input-field col l12">
											<i class="material-icons prefix white-text">account_circle</i>
											<input name="name_subs" id="icon_prefix" type="text" class="validate" value="<?php echo $_POST['name_subs'] ?>">
											<label for="icon_prefix">Имя</label>
										</div>
										<div class="input-field col l12">
											<i class="material-icons prefix white-text">mail</i>
											<input name="email_subs" id="icon_telephone" type="tel" class="validate" value="<?php echo $_POST['email_subs'] ?>">
											<label for="icon_telephone">Email<span class="star">*</span></label>
										</div>
										<button type="submit" name="subs" class="btn sub waves-effect waves-light  green black-text">подписаться</button>
									</div>
								</form>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<main>
		<div class="row first">
			<!-- <div class="col l3 m3 s12 agency">
			</div> -->
			<div class="col l12 s12 ksana">
				<h1 class="center slogan">KSANA TRAVEL</h1>
				<p class="center slogan">туристическое агентство</p>
			</div>
			<!-- <div class="col l3 hide-on-med-and-down">
				<img src="img/2.png" >
			</div> -->
		</div>
		<div class="row contacts">
			<div class="col s12 m12 l6 cont">
				<a href="tel:+380734275434" class="white-text center" style="display: block;">+380734275434</a>
				<div class="social1 center">
					<a href="tel:+380501706056" class="white-text center">+380501706056</a>
					<a href="viber://add?number=%2B380501706056"><img src="img/social/viber.png" border="0" alt="VIBER"></a>
					<a href="whatsapp://send?phone=380501706056"><img src="img/social/whatsapp.png" border="0" alt="WHATSAPP"></a>
				</div>
				<p><a href="mailto:info.ksanatravel@gmail.com">info.ksanatravel@gmail.com</a></p><br>
				<div class="social2 center">
					<a href="https://www.instagram.com/ksanatravel/" target="_blank"><img src="img/social/inst.png" border="0" alt="INSTAGRAMM"></a>
					<a href="https://www.facebook.com/ksana.travel/" target="_blank"><img src="img/social/fb.png" border="0" alt="FACEBOOK"></a>
					<a href="skype:ksana7779?add" alt="SKYPE"><img src="http://www.techspot.com/images2/downloads/topdownload/2014/05/skype.png" border="0"></a>
				</div>
				<h4 class="white-text center">02105, г.Киев, пр. Мира 4, оф. 403</h4>
			</div>
			<div class="col s12 m12 l6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.878299606967!2d30.620566315731104!3d50.443367479474375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4c55ba305bd51%3A0x57f12e2dea8428fe!2z0L_RgNC-0YHQv9C10LrRgiDQnNC40YDRgywgNCwg0JrQuNGX0LI!5e0!3m2!1sru!2sua!4v1509482527839" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
		
	</main>
	<footer class="page-footer green">
		<div class="container">
			<div class="row">
				<h4 class="center">ПОДОБРАТЬ ТУР</h4>
				<?php
									if (isset ($_POST['action'])) {
										$errors = array();
										if( trim($_POST['name']) == '' ){
											$errors[] = 'Введите Имя';
										}
										/*if( trim($_POST['email']) == '' ){
											$errors[] = 'Введите Email';
										}*/
										if( trim($_POST['phone']) == '' ){
											$errors[] = 'Введите телефон';
										}
										/*if( trim($_POST['date']) == '' ){
											$errors[] = 'Введите Дату рождения';
										}*/
										/*if( trim($_POST['country']) == '' ){
											$errors[] = 'Введите свою страну';
										}*/
										/*if( trim($_POST['city']) == '' ){
											$errors[] = 'Введите Город';
										}*/
										/*if( trim($_POST['message']) == '' ){
											$errors[] = 'Введите сообщение';
										}*/
										/*if(!$_FILES['file']['name']){
											$errors[] = 'Вложите свою фотографию';
										}*/
										if( empty($errors)){
											$_POST['name'] = htmlspecialchars($_POST['name']);
											$_POST['email'] = htmlspecialchars($_POST['email']);
											$_POST['phone'] = htmlspecialchars($_POST['phone']);
											$_POST['country'] = htmlspecialchars($_POST['country']);
											$_POST['text'] = htmlspecialchars($_POST['text']);
											$to = "alexsavch@meta.ua"; // поменять на свой электронный адрес
											$from = $_POST['email'];
											$subject = "Заполнена контактная форма с ".$_SERVER['HTTP_REFERER'];
											$message = "Имя: ".$_POST['name']."\nEmail: ".$from."\nТелефон: ".$_POST['phone']."\nПожелания: ".$_POST['text'];
											$boundary = md5(date('r', time()));
											$filesize = '';
											$headers = "MIME-Version: 1.0\r\n";
											$headers .= "From: " . $from . "\r\n";
											$headers .= "Reply-To: " . $from . "\r\n";
											$headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

$message="
Content-Type: multipart/mixed; boundary=\"$boundary\"

--$boundary
Content-Type: text/plain; charset=\"utf-8\"
Content-Transfer-Encoding: 7bit

$message";
  for($i=0;$i<count($_FILES['fileFF']['name']);$i++) {
     if(is_uploaded_file($_FILES['fileFF']['tmp_name'][$i])) {
         $attachment = chunk_split(base64_encode(file_get_contents($_FILES['fileFF']['tmp_name'][$i])));
         $filename = $_FILES['fileFF']['name'][$i];
         $filetype = $_FILES['fileFF']['type'][$i];
         @$filesize += $_FILES['fileFF']['size'][$i];
         $message.="

--$boundary
Content-Type: \"$filetype\"; name=\"$filename\"
Content-Transfer-Encoding: base64
Content-Disposition: attachment; filename=\"$filename\"

$attachment";
     }
   }
   $message.="
--$boundary--";

		if ($filesize < 10000000) { // проверка на общий размер всех файлов. Многие почтовые сервисы не принимают вложения больше 10 МБ
			mail($to, $subject, $message, $headers);
												echo '<div style="color: green; font-size: 120%;">'.$_POST['name'].', Ваше сообщение получено, спасибо!</div>';
											} else {
												echo '<div style="color: red; font-size: 120%;">Извините, письмо не отправлено. Размер всех файлов превышает 10 МБ.</div>';
											}
										
										}
										else {
											echo '<div style="color: red; font-size: 120%;">'.array_shift($errors).'</div>';
										}
									}
									?>
				<form action="contacts.php" method="post" class="col l12">
					<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">account_circle</i>
						<input name="name" id="icon_prefix" type="text" class="validate" value="<?php echo $_POST['name'] ?>">
						<label for="icon_prefix">Имя</label>
					</div>
					<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">phone</i>
						<input name="phone" id="icon_telephone" type="tel" class="validate" value="<?php echo $_POST['phone'] ?>">
						<label for="icon_telephone">Телефон<span class="star">*</span></label>
					</div>
					<div class="input-field col l4 m6 s12">
						<i class="material-icons prefix">email</i>
						<input name="email" id="email" type="email" class="validate" value="<?php echo $_POST['email'] ?>">
						<label for="email" data-error="wrong" data-success="right">Email</label>
					</div>
					<div class="input-field col l4 m6 s12">
						<i class="fa fa-globe prefix" aria-hidden="true"></i>
						<input name="country" id="icon_telephone" type="tel" class="validate" value="<?php echo $_POST['country'] ?>">
						<label for="icon_telephone">Страна</label>
					</div>
					<div class="input-field col l5 m6 s12">
						<i class="material-icons prefix">mode_edit</i>
						<textarea name="text" id="textarea1" class="materialize-textarea" placeholder="Пожелания:кол-во людей, дата вылетов, кол-во ночей бюджет и тд.." value="<?php echo $_POST['text'] ?>"></textarea>
					</div>
					<div class="col l3 m6 s12">
						<div class="dws-button">
							<a>
								<button name="action" type="submit">
									<div class="b-demo">ОТПРАВИТЬ</div>
									<div class="b-text">ЗАПРОС</div>
									<div class="b-img"><img src="img/icon-b.png"></div>
								</button>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container center">
				<p>© Сайт создан компанией <a href="http://ara-space.com/" class="white-text">Ara-space.com</a></p>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/headhesive.min.js"></script>
	<script type="text/javascript" src="js/header.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109315719-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-109315719-1');
	</script>

</body>
</html>