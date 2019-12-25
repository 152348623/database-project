<?php require_once('Connections/book_model.php'); ?>
<?php
if ((isset($_POST['delid'])) && ($_POST['delid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM order_list WHERE Order_number='%s'",$_POST['delid']);

  mysql_select_db($database_book_model, $book_model);
  $Result1 = mysql_query($deleteSQL, $book_model) or die(mysql_error());
}


mysql_select_db($database_book_model, $book_model);
if(isset($_POST["button3"]) && $_POST["search"] != ""){
$query_Recordset1 = sprintf("SELECT * FROM order_list WHERE %s = %s",$_POST["type"],$_POST["search"]);
}
else
{
	$query_Recordset1 = "SELECT * FROM order_list";
}
$Recordset1 = mysql_query($query_Recordset1, $book_model) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>北科訂書系統-查詢商品</title>
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
						<h2>Search Order</h2>
						<p>Search your order</p>
					</header>
					<div class="box">
						<table class="order table">
							<tr>
								<th>訂單編號</th>
								<th>賣家編號</th>
								<th>顧客編號</th>
								<th>狀態</th>
								<th>運送方式</th>
								<th>詳細</th>
								<th>刪除</th>
							</tr>
                            <?php do { ?>
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
								<td><form id="form1" name="form1" method="post" action="managedetailorder.php">
                                    <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset1['Order_number']; ?>" />
                                    <input type="submit" name="button" id="button" value="詳細" />
                                  </form></td>
								<td><form id="form2" name="form2" method="post" action="">
                                    <input type="submit" name="button2" id="button2" value="刪除" />
                                    <input name="delid" type="hidden" id="delid" value="<?php echo $row_Recordset1['Order_number']; ?>" />
                                  </form></td>
							</tr>	
                            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
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
<?php
mysql_free_result($Recordset1);
?>
