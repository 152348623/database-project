<?php require_once('Connections/book_model.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO book (ISBN, Name, Author_name, Publisher, Category, Cost, `Description`, Seller_id) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                       $_POST['ISBN'],
                       $_POST['Name'],
                       $_POST['Author_name'],
                       $_POST['Publisher'],
                       $_POST['Category'],
                       $_POST['Cost'],
                       $_POST['Description'],
                       $_SESSION["user_id"]);
					   
  mysql_select_db($database_book_model, $book_model);
  $Result1 = mysql_query($insertSQL, $book_model) or die(mysql_error());
}
if(!isset($_SESSION["user_id"])){
	mysql_select_db($database_book_model, $book_model);
	$query_Recordset1 = sprintf("SELECT * FROM `user` WHERE Account = '%s'",$_SESSION["MM_Username"]);
	$Recordset1 = mysql_query($query_Recordset1, $book_model) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$_SESSION["user_id"] = $row_Recordset1["Id"];
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
		<title>北科訂書系統-結帳最後確認</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/register.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/check-total.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		
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
					<header>
						<h2>確認結帳</h2>
						<p>請填入相關資訊，以便取貨</p>
					</header>
				</section>
				<section class = "container">
				  <form name="form" method="POST" action="<?php echo $editFormAction; ?>" style="margin:0 ;">
						<div class="box row">
							
							<div class="col-12">
								
									<div class="row gtr-50 gtr-uniform">
										<div class="col-1"></div>
										<div class="col-2" style="align-self:center">
											<p>收件人姓名：</p> 
										</div>
										<div class="col-7">
											<input type="text" name="name" id="name" value="" />
										</div>
										<div class="col-2"></div>

										<br>

										<div class="col-1"></div>
										<div class="col-2" style="align-self:center">
											<p>手機：</p> 
										</div>
										<div class="col-7">
											<input type="text" name="cellphone" id="cellphone" value="" />
										</div>
										<div class="col-2"></div>

										<br>

										<div class="col-1"></div>
										<div class="col-2" style="align-self:center">
											<p>宅配地址：</p> 
										</div>
										<div class="col-7">
											<input type="text" name="adress_name" id="adress_name" value="" />
										</div>
										<div class="col-2"></div>

										<br>
										<div class="col-12" style="padding-left: 0px;">
											<p class="pay-content" >
												※ 注意事項：貨到付款
											</p>
										</div>
										

									</div>
								
							</div>
							<br>
						
							<div class="col-12 div-total">
							<div class="col-1"> </div>

								<div class="col-4 pay"> 
									<p class="pay-total-text">
										總金額：
									</p>
									<p class="pay-total-number">
									123456
									</p>
								</div>
								<div class="col-7 go">
									<ul class="actions special">
										<li><input type="submit" value="送出" /></li>
									</ul>
								</div>
							</div>
						</div>
						<input type="hidden" name="MM_insert" value="form">
					</form>
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
<?php
mysql_free_result($Recordset1);
?>
