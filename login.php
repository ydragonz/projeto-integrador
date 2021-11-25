<?php

require_once 'config.php';
$conn = new mysqli($host, $user, $password, $dbname);

session_start();

if($conn->connect_error) {

}
else {
    
}
?>