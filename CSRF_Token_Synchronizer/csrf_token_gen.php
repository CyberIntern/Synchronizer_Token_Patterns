<?php

session_start();
$csrf_file = fopen("csrf_token.txt", "w") or die("Unable to open file containing csrf token"); 
$_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
$csrf_token_value = $_SESSION['csrf_token'].",";
fwrite($csrf_file, $csrf_token_value);
$session_id = session_id();

setcookie('csrf_cookie',$session_id,time()+60*60*24*30,'/');

$session_id_value = $session_id."\n";
fwrite($csrf_file, $session_id_value);
fclose($csrf_file);

echo $_SESSION['csrf_token'];

?>