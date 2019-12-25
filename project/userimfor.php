<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Userimfor</title>
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
						<li><a href="home.php">HOME</a></li>
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
						<li><a href="homeBeforeSign.php" class="button">LOGOUT</a></li> <!-- 跳message 按下後跳轉頁面 -->
					</ul>
				</nav>
			</header>

			<!-- Main -->
				<section id="main" class="container medium">
					
					<div class="box">
					    <div class ="imfor" style = "text-align: center;"><h2>個人資訊</h2>
						<form method="post" action="#">
							<div class="row gtr-50 gtr-uniform">
										<div class="col-3">

										</div>
										<div class="col-1" style="align-self:center">
											<p>帳號</p> 
										</div>
										<div class="col-5">
											<input type="text" name="Account" id="name" value="" />
										</div>
                                        <div class="col-3">

										</div>
								    <br>
								<div class="col-3">

								</div>
								<div class="col-1" style="align-self:center">
									<p>密碼</p> 
								</div>
								<div class="col-5">
									<input type="text" name="Account" id="name" value="" />
								</div>
								<div class="col-3">

								</div>
						        <br>
                                <div class="col-3">

								</div>
								<div class="col-1" style="align-self:center">
									<p>名字</p> 
								</div>
								<div class="col-5">
									<input type="text" name="Account" id="name" value="" />
								</div>
								<div class="col-3">

								</div>
								<br>
								<div class="col-3">

								</div>
								<div class="col-1" style="align-self:center" >
									<p>電子郵件</p> 
								</div>
								<div class="col-5">
									<input type="text" name="Account" id="name" value="" />
								</div>
								<div class="col-3">

								</div>
								<br>
								<div class="col-3">

								</div>
								<div class="col-1" style="align-self:center">
									<p>電話號碼</p> 
								</div>
								<div class="col-5">
									<input type="text" name="Account" id="name" value="" />
								</div>
								<div class="col-3">

								</div>
								<br>
								<div class="col-4">

								</div>
								<div class="col-5">
									<ul class="actions special">
										<li><input type="submit" value="修改完成" /></li>
									</ul>
								</div>
								<div class="col-3">

								</div>
							</div>
								
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