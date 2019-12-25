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
		<title>Contact - Alpha by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/register.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Alpha</a> by HTML5 UP</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down">Layouts</a>
								<ul>
									<li><a href="generic.html">Generic</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="elements.html">Elements</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option One</a></li>
											<li><a href="#">Option Two</a></li>
											<li><a href="#">Option Three</a></li>
											<li><a href="#">Option Four</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="#" class="button">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>編輯書籍</h2>
						<p>編輯你的書，讓你的書賣出去，發大財</p>
					</header>
				</section>
				<section class = "container">
				  <form name="form" method="POST" action="<?php echo $editFormAction; ?>" style="margin:0 ;">
						<div class="box row">
							<div class="col-5" style=" padding: 0px; align-self:center">
								<img id="output" style="width: 330px;"/>
							</div>
							<div class="col-7">
								
									<div class="row gtr-50 gtr-uniform">
										<div class="col-2">	</div>
										<div class="col-2" style="align-self:center">
											<p>ISBN</p> 
										</div>
										<div class="col-8">
											<input type="text" name="ISBN" id="ISBN" value="" />
										</div>

										<br>

										<div class="col-2">		</div>
										<div class="col-2" style="align-self:center">
											<p>書本名稱</p> 
										</div>
										<div class="col-8">
											<input type="text" name="Name" id="Name" value="" />
										</div>

										<br>

										<div class="col-2"> </div>
										<div class="col-2" style="align-self:center">
											<p>作者名稱</p> 
										</div>
										<div class="col-8">
											<input type="text" name="Author_name" id="Author_name" value="" />
										</div>

										<br>

										<div class="col-2"> </div>
										<div class="col-2" style="align-self:center" >
											<p>出版社</p> 
										</div>
										<div class="col-8">
											<input type="text" name="Publisher" id="Publisher" value="" />
										</div>

										<br>

										<div class="col-2"> </div>
										<div class="col-2" style="align-self:center">
											<p>類別</p> 
										</div>
										<div class="col-8">
											<label for="Category"></label>
											<select name="Category" id="Category">
                                                <option value ="0">童話故事</option>
                                                <option value ="1">恐怖小說</option>
										  </select>
										</div>

										<br>

										<div class="col-2"> </div>
										<div class="col-2" style="align-self:center">
											<p>書本價格</p>
										</div>
										<div class="col-8">
											<input type="text" name="Cost" id="Cost" value="" />
										</div>

										<br>

										<div class="col-2"> </div>
										<div class="col-2" style="align-self:center">
											<p>書本描述</p>
										</div>
										<div class="col-8">
											<input type="text" name="Description" id="Description" value="" />
										</div>

									</div>
								
							</div>
							<br>
							<div class="col-5" style="margin-top:10px; padding-left: 0px;">
								<input type="button" value="上傳圖片" style="margin-top: -10px;"/>
									<input type="file" accept="image/*" onchange="loadFile(event)" value="上傳圖片" accept="image/png,image/jpg,image/jpeg" id="customFileInput" style="opacity:0; position:absolute; margin: 0px 0px 0px -90px;" />
									<script>
										var loadFile = function(event) {
											var reader = new FileReader();
											reader.onload = function(){
											var output = document.getElementById('output');
											output.src = reader.result;
											};
											reader.readAsDataURL(event.target.files[0]);
										};
										</script>
							</div>
							<div class="col-7">

							</div>
							<div class="col-12">

								<div class="col-6"> </div>
								<div class="col-6">
									<ul class="actions special">
										<li><input type="submit" value="修改書籍" /></li>
									</ul>
								</div>
							</div>
						</div>
						<input type="hidden" name="MM_insert" value="form">
					</form>
				</section>
					
				

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
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
