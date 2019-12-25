<?php require_once('Connections/book_model.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO `user` (Password, Account, Name, `E-mail`, Phone, Usertype) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
                       $_POST['Password'],
                       $_POST['Account'],
                       $_POST['Name'],
                       $_POST['E-mail'],
                       $_POST['Phone'],
                       '1');

  mysql_select_db($database_book_model, $book_model);
  $Result1 = mysql_query($insertSQL, $book_model) or die(mysql_error());

  $insertGoTo = "home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>北科訂書系統-註冊</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/register.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header" class="alt" style="background:#444; height:70px;">
				<img src="images/Logo.jpg" alt="NTUT Online Book Store Logo">
				<nav id="nav">
					<ul class="header-ul" style="margin-top: 10px">
						<li><a href="homeBeforeSign.php">HOME</a></li>
						<li>
							<a href="#" class="icon solid fa-angle-down">PERSONAL INFO</a>
							<ul>
								<li><a href="shelves.php">上下架</a></li>
									<ul>
										<li><a href="write-book.php">編輯書籍資訊</a></li>
										<li><a href="#">上下架書籍</a></li>
									</ul>
								<li><a href="cart.php">購物車</a></li>
								<li><a href="#">個人資料</a></li>
							</ul>
						</li>
						<li><a href="login.php" class="button">LOGIN</a></li> <!-- 跳message 按下後跳轉頁面 -->
					</ul>
				</nav>
			</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>註冊</h2>
						<p>立即加入，成為愛書的文青</p>
					</header>
					<div class="box">
						<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
							<div class="row gtr-50 gtr-uniform">
										<div class="col-3">

										</div>
										<div class="col-2 regiser-div" style="align-self:center">
											<p>帳號</p> 
										</div>
										<div class="col-4">
											<input type="text" name="Account" id="Account" value="" required="required" />
										</div>
                                        <div class="col-3">

										</div>
								<br>
								<div class="col-3">

								</div>
								<div class="col-2 regiser-div" style="align-self:center">
									<p>密碼</p> 
								</div>
								<div class="col-4">
									<input type="password" name="Password" id="Password" value="" required="required" />
								</div>
								<div class="col-3">

								</div>
						        <br>
                                <div class="col-3">

								</div>
								<div class="col-2 regiser-div" style="align-self:center">
									<p>名字</p> 
								</div>
								<div class="col-4">
									<input type="text" name="Name" id="Name" value="" required="required" />
								</div>
								<div class="col-3">

								</div>
								<br>
								<div class="col-3">

								</div>
								<div class="col-2 regiser-div" style="align-self:center" >
									<p>電子郵件</p> 
								</div>
								<div class="col-4">
									<input type="text" name="E-mail" id="E-mail" value="" required="required" />
								</div>
								<div class="col-3">

								</div>
								<br>
								<div class="col-3">

								</div>
								<div class="col-2 regiser-div" style="align-self:center">
									<p>電話號碼</p> 
								</div>
								<div class="col-4">
									<input type="text" name="Phone" id="Phone" value="" required="required" />
								</div>
								<div class="col-3">

								</div>
								<br>
								<div class="col-3">

								</div>
								<div class="col-5">
									<ul class="actions special">
										<li><input type="submit" name="button" id="button" value="送出" /></li>
									</ul>
								</div>
								<div class="col-4">

								</div>
							</div>
							<input type="hidden" name="MM_insert" value="form1">
								
						</form>
					</div>
				</section>

			<!-- Footer -->
			<footer id="footer">
				<section id="cta">
						<div class="row gtr-50 gtr-uniform">
							<div class="col-1"></div>
							<div class="col-4">
								<img src="images/Logo.jpg" alt="" class="footer-img">
							</div>
							<div class="col-5 footer-text">
								<p>Designed by Team 10</p> 
								<p>蔣馨慧 林孜頤 郭家佑 陳姵文 李艾芸 劉聰池</p> 
							</div>
							<div class="col-2 ">
							</div>
						</div>	

				</section>
			</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>