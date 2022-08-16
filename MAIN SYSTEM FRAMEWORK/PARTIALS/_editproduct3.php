<?php

//using session to take product code//
include "session.php";
//connecting to database via config.php inpartials folder//

include 'config.php';

//fetching data//

$p_code=$_POST['p_code'];
$p_stock=$_POST['purchases'];
$mrp=$_POST['mrp'];
$w_rate=$_POST['w_rate'];
//seeting alert as true//
$alert = true;

$sql = "UPDATE product set `purchases`='$p_stock',`mrp`='$mrp',`wholesale_rate`='$w_rate' WHERE product_code=$p_code";
try {
    mysqli_query($conn, $sql);
    $checksql = "SELECT * FROM `product` WHERE product_code='$p_code'";
    $result = mysqli_query($conn, $checksql);
    $data = mysqli_fetch_row($result);
    $alert = false;
} catch (exception $excpect) {
    $alert = true;
}
header('location: _editproduct1.php');
?>