<?php
ob_start();

$timezone = date_default_timezone_set("Asia/Tokyo");

$con = mysqli_connect("localhost", "root", "", "favlines2");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}
?>
