<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dokument bez tytułu</title>
</head>

<body style="background-color:blue">

<div style="width:460px; margin:0 auto 0 auto; background-color:gray; padding:20px;">


<?php
error_reporting(E_ALL);
$host    = "127.0.0.1";
$port    = 25003;
$message = "Witaj serwerze";
echo "Wiadomosc wysylana na serwer:".$message;
// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// connect to server
$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  




// send string to server
socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
// get server response
$result = socket_read ($socket, 10240) or die("Could not read server response\n");



file_put_contents('koncowka\zdjecie.jpg', base64_decode($result));


echo '<br /></br />Odpowiedz serwera:<br /><img src="koncowka\zdjecie.jpg" />';
// close socket
socket_close($socket);
?>

</div>
</body>
</html>