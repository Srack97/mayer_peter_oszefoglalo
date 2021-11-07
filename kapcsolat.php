<?php

$conn = new mysqli('localhost','root','','mayer_peter_webshop');
if($conn->errno > 0){
    die('Az adatbázis nem elérhető!');
} 
$conn->set_charset("utf8");