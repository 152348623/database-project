<?php require_once('Connections/book_model.php'); ?>
<?php
if ((isset($_POST['delid'])) && ($_POST['delid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM book WHERE Book_id='%s'",$_POST['delid']);

  mysql_select_db($database_book_model, $book_model);
  $Result1 = mysql_query($deleteSQL, $book_model) or die(mysql_error());
}

mysql_select_db($database_book_model, $book_model);
$query_Recordset1 = "SELECT * FROM book";
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
		<title>Contact - Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Alpha</a> by HTML5 UP</h1>
					<nav id="nav">
						<ul>
							<li><a href="administrator-home.html" style="font-family:Microsoft JhengHei;">首頁</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down" style="font-family:Microsoft JhengHei;">NAME</a>
 								<ul>
									<li><a href="generic.html" style="font-family:Microsoft JhengHei;">會員資料</a></li>
									<li><a href="searchorder.html" style="font-family:Microsoft JhengHei;">訂單編號</a></li>
								</ul>
							</li>
							<li><a href="#" class="button" style="font-family:Microsoft JhengHei;">登出</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>Shelves</h2>
						<p>Shelves</p>
					</header>
					
					<div class="box">
						<div class = "bookbutton row ">
							<div class = "col-10">

							</div>
							<div class = "col-3">
							  <input type="button" onclick="javascript:location.href='AddBook.php'" value="新增書籍">
								
							</div>
						</div>
						<br>
						<table class="order table">
							<tr>
								<th>書本ISBN</th>
								<th>書本名稱</th>
								<th>作者名稱</th>
								<th>出版社</th>
								<th>類別</th>
								<th>書本價格</th>
								<th>書本描述</th>
								<th></th>
								<th></th>
							</tr>
                            <?php do { ?>
							<tr>
								<td><?php echo $row_Recordset1["ISBN"]; ?></td>
								<td><?php echo $row_Recordset1["Name"]; ?></td>
								<td><?php echo $row_Recordset1["Author_name"]; ?></td>
								<td><?php echo $row_Recordset1["Publisher"]; ?></td>
								<td><?php if($row_Recordset1["Category"] == 0){
												echo "童話故事";
										  }
										  else if($row_Recordset1["Category"] == 1){
											  	echo "恐怖小說";
										  }?></td>
								<td><?php echo $row_Recordset1["Cost"]; ?></td>
								<td><?php echo $row_Recordset1["Description"]; ?></td>
                                <form id="form1" name="form1" method="post" action="" >
								<td><input type="submit" name="button" id="button" value="下架">
                                <input type="hidden" name="delid" id="delid" value="<?php echo $row_Recordset1["Book_id"] ?>">
								</td>
								<td><input type="submit" name="button" id="button" value="編輯">
                                <input type="hidden" name="delid" id="delid" value="<?php echo $row_Recordset1["Book_id"] ?>">
                                </td>
                                </form>
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
