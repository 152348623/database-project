<?php require_once('Connections/book_model.php'); ?>
<?php
if(!isset($_SESSION["user_id"])){
	mysql_select_db($database_book_model, $book_model);
	$query_Recordset1 = sprintf("SELECT * FROM `user` WHERE Account = '%s'",$_SESSION["MM_Username"]);
	$Recordset1 = mysql_query($query_Recordset1, $book_model) or die(mysql_error());
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	$totalRows_Recordset1 = mysql_num_rows($Recordset1);
	$_SESSION["user_id"] = $row_Recordset1["Id"];
}

mysql_select_db($database_book_model, $book_model);
$query_Recordset1 = sprintf("SELECT * FROM cart inner join `book` using (Book_id) WHERE Customer_id = '%s'",$_SESSION["user_id"]);
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
		<title>Cart</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <script src="jquery-3.2.1.min.js"></script>
    <script>
	function del(){
		$.post("del_cart.php", { id: $('input[name=choice]:checked').val()} );
		history.go(0);
	}
	</script>
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
						<h2>Cart</h2>
						<p>Your shopping cart</p>
					</header>
					
					<div class="box">
                    <form method="POST" action="checkout.php">
						<div class = "bookbutton row ">
							<div class = "col-9">

							</div>
							<div class = "col-3">
								<button type="submit" >結帳</button>
								<button onclick="del()">刪除</button>
							</div>
						</div>
						<br>
						<table class="order table">
							<tr>
								<th>選擇</th>
								<th>書本ISBN</th>
								<th>書本名稱</th>
								<th>作者名稱</th>
								<th>出版社</th>
								<th>書本價格</th>
								<th>書本描述</th>
							</tr>
                            <?php
							if(mysql_num_rows($Recordset1) != 0){
							 do{ ?>
							<tr>
							    <td><input type="radio" name="choice" value="<?php echo $row_Recordset1["id"] ?>"></td>
								
								<td><?php echo $row_Recordset1["ISBN"] ?></td>
								<td><?php echo $row_Recordset1["Name"] ?></td>
								<td><?php echo $row_Recordset1["Author_name"] ?></td>
								<td><?php echo $row_Recordset1["Publisher"] ?></td>
								<td><?php echo $row_Recordset1["Cost"] ?></td>
                                <td><?php echo $row_Recordset1["Description"] ?></td>
							</tr>	
                            <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
							}
							else
							{
								echo "<tr><td colspan='7'>購物車是空的唷!</td></tr>";
							}
							 ?>	
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
<?php
mysql_free_result($Recordset1);
?>
