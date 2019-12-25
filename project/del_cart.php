<?php require_once('Connections/book_model.php'); ?>
<?php
if(isset($_POST)){
	mysql_select_db($database_book_model, $book_model);
	$sql = sprintf("DELETE FROM cart WHERE id = '%s'",$_POST["id"]);
	mysql_query($sql);
	header("Location:cart.php");
}
?>