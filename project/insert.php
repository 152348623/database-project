<?php require_once('Connections/book_model.php'); ?>
<?php
$insertSQL = sprintf("INSERT INTO order_list (Seller_id, Customer_id, `State`, Delivery) VALUES (%s, %s, %s, %s)",
                       $_POST["Seller_id"],
                       $_SESSION["user_id"],
                       '0',
				  	   '1');

mysql_select_db($database_book_model, $book_model);
$Result1 = mysql_query($insertSQL, $book_model) or die(mysql_error());

$select_sql = "SELECT * from order_list ORDER BY Order_number DESC LIMIT 0,1";
$row_select = mysql_query($select_sql);
$row_Recordset1 = mysql_fetch_assoc($row_select);
$insertGoTo = "success.php";


mysql_select_db($database_book_model, $book_model);
$sql = sprintf("UPDATE book SET Order_number='%s' WHERE Book_id ='%s'",$row_Recordset1["Order_number"],$_POST["Book_id"]);
printf($sql);
mysql_query($sql);
header(sprintf("Location: %s?id=%s", $insertGoTo,$row_Recordset1["Order_number"]));
 ?>