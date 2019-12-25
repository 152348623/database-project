<?php require_once('Connections/book_model.php'); ?>
<?php
$sql = sprintf("INSERT INTO cart (customer_id,Book_id) VALUES('%s','%s')",$_SESSION["user_id"],$_POST["Book_id"]);
mysql_query($sql);
?>