<?php
$con = mysqli_connect("localhost", "root", "", "pitanja");

if (mysqli_connect_errno()){
    echo "Greška u konekciji: " . mysqli_connect_error();
}
mysqli_set_charset($con,"utf8");
?>