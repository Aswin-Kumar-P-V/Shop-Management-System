<?php

//connecting to database via config.php inpartials folder//

include 'config.php';

//fetching data//

$p_code = $_POST['p_code'];
$p_name = $_POST['p_name'];

//setting alert as false//
$alert = false;

if ($p_code != null || $p_name != null) {
    $checksql = "SELECT * FROM `product` WHERE product_code='$p_code' AND product_name='$p_name'";
    $result = mysqli_query($conn, $checksql);
    if (mysqli_num_rows($result) == 1) {
        $sql = "DELETE FROM product WHERE product_code='$p_code'";
        mysqli_query($conn, $sql);
    } else {
        $alert = true;
    }
} else {
    $alert = true;
}
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
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Missing or invalid credentials.. <a href="../deleteproduct.php">try again</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    } else {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>  "Product details deleted..<a href="../deleteproduct.php">delete another product?</a>"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
</body>

</html>