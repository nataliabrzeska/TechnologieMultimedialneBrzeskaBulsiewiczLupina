<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dokument bez tytułu</title>
</head>

<body style="background-color:blue">

<div style="width:460px; margin:0 auto 0 auto; background-color:gray; padding:20px;">
<center><h1>Upload Zdjęcia na serwer</h1></center>
<form enctype="multipart/form-data" action="upload.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="50000" />
<input name="plik" type="file" />
<input type="submit" value="Wyślij plik" />
</form>


<?php
@$plik_tmp = $_FILES['plik']['tmp_name'];
@$plik_nazwa = $_FILES['plik']['name'];
@$plik_rozmiar = $_FILES['plik']['size'];

if(is_uploaded_file($plik_tmp)) {
     move_uploaded_file($plik_tmp, "upload/1.jpg");
    echo "</br>Plik o rozmiarze 
    <strong>$plik_rozmiar bajtów</strong> został przesłany na serwer!";
}
?> 
</div>
</body>
</html>