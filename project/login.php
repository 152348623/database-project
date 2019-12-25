<?php require_once('Connections/book_model.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if(!isset($_SESSION["error"])){
	$_SESSION["error"] = 0;
}
if (isset($_POST['Account'])) {
  $loginUsername=$_POST['Account'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_book_model, $book_model);
  
  $LoginRS__query=sprintf("SELECT Account, Password FROM `user` WHERE Account = '%s' AND Password='%s'",
   $loginUsername, $password); 
   
  $LoginRS = mysql_query($LoginRS__query, $book_model) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	$_SESSION["error"] = 0;
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
	$_SESSION["error"] = 1;
    header("Location: ". $MM_redirectLoginFailed );
  }
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
		<title>Contact - Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/login.css" />
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
						<li><a href="login.php" class="button">LOGIN</a></li> <!-- 跳message 按下後跳轉頁面 -->
					</ul>
				</nav>
			</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>登入</h2>
						<p>趕快來買，趕快來賣</p>
					</header>
					<div class="box">
						<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-12">
									<input type="text" name="Account" id="name" value="" placeholder="Account" />
						        <br>
								<div class="col-12">
									<input type="text" name="Password" id="subject" value="" placeholder="Password" />
								</div>
                                <?php if($_SESSION["error"] == 1){ ?>
                                <br>
								<div class="col-12">
									帳號或密碼輸入錯誤
								</div>
                                <?php } ?>
							</div>
								<ul class="actions special">
									<li><input type="submit" name="button" id="button" value="登入" />
	  <input type="hidden" name="id" id="id" /></li>
	                                <li><a href="register.php"><input type="button" value="註冊"></a></li>
								</ul>
								
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