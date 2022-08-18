<?php

//connecting to database via config.php inpartials folder//
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
include 'config.php';

//fetching data//

$p_code = $_POST['p_code'];
$sql = "DELETE FROM product WHERE product_code='$p_code'";
mysqli_query($conn, $sql);
include "_editproduct1.php";
}
