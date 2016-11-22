<?php
require 'class.PHPWebSocket.php';

// Funkcja będzie wywoływana przy każdej przychodzącej wiadomości
function wsOnMessage($clientID, $message, $messageLength, $binary) {
    global $Server;

    // wypisujemy w konsoli to, co przyszło
    printf("Client %s sent: %s\n",$clientID,$message);
    
    // odsyłamy wiadomość z przedrostkiem "Re:"
    $Server->wsSend($clientID, "Re: $message");
}

// Tworzymy klasę, podłączamy naszą funckję i uruchamiamy serwer 
$Server = new PHPWebSocket();
$Server->bind('message', 'onMessage');
$Server->wsStartServer('localhost', 9000);

?>
