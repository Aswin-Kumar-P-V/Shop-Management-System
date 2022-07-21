<?php

//connecting to database via config.php inpartials folder//

include 'config.php';

//fetching data//

$p_code = $_POST['p_code'];
$p_name = $_POST['p_name'];

//setting alert //


if ($p_code != null || $p_name != null) {
    $checksql = "SELECT * FROM `product` WHERE product_code='$p_code' AND product_name='$p_name'";
    $result = mysqli_query($conn, $checksql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_row($result);
        $alert = false;
    } else {
        $alert = true;
    }
} else {
    $alert = true;
}
session_start();
$_SESSION['product_code']=$p_code;
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <!--navbar-->

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../homepage.php">Main Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
   

    <?php
    if ($alert == true) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Missing or invalid credentials.. <a href="_editproduct1.php">try again</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    } else {
        echo "
        <div class='alert alert-primary' role='alert'>
        Product Code And Name Are Not Editable!..<a href='_editproduct1.php'>back</a>
      </div><div class='container my-4'>
        
        <table class='table table-striped table-bordered'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>Product_Code</th>
                    <th scope='col'>Product_Name</th>
                    <th scope='col'>Purchases</th>
                    <th scope='col'>Sales</th>
                    <th scope='col'>MRP</th>
                    <th scope='col'>Wholesale_Rate</th>
                </tr>
            </thead>
            <tbody><tr>";
        foreach ($data as $values) {
                echo "
                    <td>$values</td>";
            }
        echo'<div class="container my-4">
        <h2 class="text-center">Please Enter The Column Name And News Value Of The Detail You Would Like to Edit 📝</h2>
        <form action="_editproduct3.php" method="post">

            <div class="form-group">
                <label for="prduct code">Column Name</label>
                <input type="text" class="form-control" id="c_name" name="c_name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="prduct name">New Value</label>
                <input type="text" class="form-control" id="new_value" name="new_value" aria-describedby="emailHelp">
            </div>

            <button type="submit" class="btn btn-primary">GO</button>
        </form>
        <br><br>
    </div>'
        ;
    }
    if($alert==false)
    echo"
    <h2 class='text-center'> Product Details📦👁️‍🗨️</h2><br><br>";
    ?>
</body>
</html>