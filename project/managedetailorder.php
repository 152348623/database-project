<?php require_once('Connections/book_model.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_POST['id'])) {
  $colname_Recordset1 = $_POST['id'];
}
mysql_select_db($database_book_model, $book_model);
$query_Recordset1 = sprintf("SELECT * FROM order_list WHERE Order_number = %s", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $book_model) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_book_model, $book_model);
$query_Recordset2 = sprintf("SELECT * FROM book WHERE Order_number = %s", $colname_Recordset1);
$Recordset2 = mysql_query($query_Recordset2, $book_model) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>北科訂書系統-管理者查看訂單</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
				<section id="main" class="container">
					<header>
						<h2>Manage All</h2>
						
					</header>
					<div class="box">
						<table class="order table">
							<tr>
								<th>訂單編號</th>
								<th>賣家編號</th>
								<th>買家編號</th>
								<th>狀態</th>
								<th>運送方式</th>
							    <td>書本名稱</td>
								<td>出版社</td>
								<td>價格</td>
                                <td></td>
								
							</tr>
							<tr>
								<td><?php echo $row_Recordset1['Order_number']; ?></td>
								<td><?php echo $row_Recordset1['Seller_id']; ?></td>
								<td><?php echo $row_Recordset1['Customer_id']; ?></td>
								<td><?php
									 if($row_Recordset1['State'] == 0){
										 echo "我忘記狀態0是啥了";
									 }
									 else if($row_Recordset1['State'] == 1){
										 echo "我忘記狀態1是啥了";
									 }
									 ?></td>
								<td><?php 
									if($row_Recordset1['Delivery'] == 0){
										 echo "我忘記交貨0是啥了";
									 }
									 else if($row_Recordset1['Delivery'] == 1){
										 echo "我忘記交貨1是啥了";
									 }?></td>
								<td><?php echo $row_Recordset2['Name']; ?></td>
								<td><?php echo $row_Recordset2['Publisher']; ?></td>
								<td><?php echo $row_Recordset2['Cost']; ?></td>
								<td><a href="searchorder.php">返回</a></td>
							</tr>		
						</table>
						<!--
						<form method="post" action="#">
							<div class="row gtr-50 gtr-uniform">
								<div class="col-2 col-12-mobilep">
									<input type="text" name="name" id="name" value="" placeholder="Name" />
								</div>
								<div class="col-2 col-12-mobilep">
									<input type="email" name="email" id="email" value="" placeholder="Email" />
								</div>
								<div class="col-2">
									<input type="text" name="subject" id="subject" value="" placeholder="Subject" />
								</div>
								<div class="col-2">
									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" value="Send Message" /></li>
									</ul>
								</div>
							</div>
						</form>
						-->
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