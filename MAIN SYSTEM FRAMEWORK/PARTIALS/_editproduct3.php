<?php

//using session to take product code//
session_start();
//connecting to database via config.php inpartials folder//

include 'config.php';

//fetching data//

$col_name = $_POST['c_name'];
$col_value = $_POST['new_value'];
$p_code = $_SESSION['product_code'];
//seeting alert as true//
$alert = true;

$sql = "UPDATE product set $col_name=$col_value WHERE product_code=$p_code";
try {
    mysqli_query($conn, $sql);
    $checksql = "SELECT * FROM `product` WHERE product_code='$p_code'";
    $result = mysqli_query($conn, $checksql);
    $data = mysqli_fetch_row($result);
    $alert = false;
} catch (exception $excpect) {
    $alert = true;
}
$checksql = "SELECT * FROM `product` WHERE product_code='$p_code'";
$result = mysqli_query($conn, $checksql);
$data = mysqli_fetch_row($result);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


</head>

<body>
    <!--navbar-->

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../homepage.php">Main Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../LOGINSYSTEM/login.php">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    
    <div class='container'>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
        <?php

        if ($alert == false) {
            echo '<div class="alert alert-primary" role="alert">
            Product Code And Name Are Not Editable!..<a href="_editproduct1.php">back</a>
          </div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Details updated 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div> 

        <div class="container my-4">
            <h2 class="text-center">Please Enter The Column Name And News Value Of The Detail You Would Like to Edit 📝</h2>
            <form action="_editproduct3.php" method="post">

                <div class="form-group">
                    <label for="prduct code">Column Name</label>
                    <input type="text" class="form-control" id="col_name" name="c_name" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="prduct name">New Value</label>
                    <input type="text" class="form-control" id="new_value" name="new_value" aria-describedby="emailHelp">
                </div>

                <button type="submit" class="btn btn-primary">GO</button>
            </form>
        </div>
        ';
        }
        else
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid or Missing credentials!!....<a href="_editproduct1.php">back</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div> ';
        }
        ?>
        <div class="container my-4">

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product_Code</th>
                        <th scope="col">Product_Name</th>
                        <th scope="col">Purchases</th>
                        <th scope="col">Sales</th>
                        <th scope="col">MRP</th>
                        <th scope="col">Wholesale_Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($data as $values) {
                            echo "<td>$values</td>";
                        }
                        ?>

        </div>
</body>

</html>