<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    include "config.php";
    //fetching values
    $p_code = $_POST['p_code'];
    $p_name = $_POST['p_name'];
    $p_quantity = $_POST['p_quantity'];
    $error = false;
    //fething mrp
    $sql = "SELECT mrp FROM `product` WHERE product_code ='$p_code' AND product_name='$p_name'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_row($result);
    //validating input data and updating session quantity
    if (mysqli_num_rows($result) == 0 || $p_code == null || $p_name == null || $p_quantity == null) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Missing or invalid credentials ... try again"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
        $_SESSION['quantity']++;
    } else {
        $tablename = $_SESSION['tablename'];
        $price = $p_quantity * $rows[0];
        $mysql = "INSERT INTO `$tablename` (`product_code`, `product_name`, `product_quantity`, `product_price`) VALUES ('$p_code', '$p_name', '$p_quantity', '$price')";
        $result = mysqli_query($conn, $mysql);

        //updating sales value

    $sql = "SELECT sales FROM `product` WHERE product_code=$p_code and product_name='$p_name'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_row($result);
    $newsales = $data[0] + $p_quantity;
    $sql = "UPDATE product set sales=$newsales WHERE product_code=$p_code";
    $result = mysqli_query($conn, $sql);
    }
    

    //taking value of quantity
    $_SESSION['quantity']--;
    if ($_SESSION['quantity'] == 0) {
        header("location: viewbill.php");
    }
}
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
        </div>
    </nav>

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
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <img src="../IMAGES/product.gif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                        <div class="container">
                            <form method="POST" action="_generatebill2.php">
                                <div class="form-group">
                                    <label for="prduct code">Product Code</label>
                                    <input type="text" class="form-control" id="p_code" name="p_code" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="prduct name">Product Name</label>
                                    <input type="text" class="form-control" id="p_name" name="p_name" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="prduct name">Product quantity</label>
                                    <input type="number" class="form-control" id="p_quantity" name="p_quantity" aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary" name="save">Save</button><br>
                            </form>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

</body>

</html>