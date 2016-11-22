<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dokument bez tytułu</title>
</head>

<body style="background-color:blue">

<div style="width:460px; margin:0 auto 0 auto; background-color:gray; padding:20px;">



<?php
// set some variables
$host = "127.0.0.1";
$port = 25003;

// don't timeout!
set_time_limit(0);



// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
// bind socket to port
$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
// start listening for connections
$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
// accept incoming connections
// spawn another socket to handle communication
$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
// read client input
$input = socket_read($spawn, 10240) or die("Could not read input\n");
// clean up input string
$input = trim($input);
echo "Wiadomosc od klienta : ".$input;



$imagedata = file_get_contents("upload/1.jpg");
             // alternatively specify an URL, if PHP settings allow
$base64 = base64_encode($imagedata);




socket_write($spawn, $base64, strlen ($base64)) or die("Could not write output\n");


// close sockets
socket_close($spawn);
socket_close($socket);

?>


</div>
</body>
</html>