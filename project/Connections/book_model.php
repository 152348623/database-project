<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_book_model = "localhost";
$database_book_model = "book_model";
$username_book_model = "admin";
$password_book_model = "1234";
$book_model = mysql_pconnect($hostname_book_model, $username_book_model, $password_book_model) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES UTF8"); 
if(!isset($_SESSION)){
	session_start();
}
?>