<?php
$to = "haunt62@wru.vn";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: hienpt62@wru.vn" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to, $subject, $txt);
?>