<?php
include "session.php";
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //fetching values
    $p_name = $_POST['productlist'];
    $p_quantity = $_POST['p_quantity'];
    $error = false;
    //fething mrp
    $sql = "SELECT mrp FROM `product` WHERE  product_name='$p_name'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_row($result);
    //validating input data and updating session quantity
    if (mysqli_num_rows($result) == 0 || $p_name == null || $p_quantity == null) {
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
        $sql2="SELECT product_code FROM `product` WHERE product_name='$p_name'";
        $result1= mysqli_query($conn,$sql2);
        $data1= mysqli_fetch_row($result1);
        $mysql = "INSERT INTO `$tablename` (`product_code`, `product_name`, `product_quantity`, `product_price`) VALUES ('$data1[0]', '$p_name', '$p_quantity', '$price')";
        $result = mysqli_query($conn, $mysql);

        //updating sales and purchases value

        $sql = "SELECT sales,purchases FROM `product` WHERE product_name='$p_name'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_row($result);
        $newsales = $data[0] + $p_quantity;
        $newpurchases = $data[1] - $p_quantity;
        $sql = "UPDATE product set sales=$newsales WHERE product_name='$p_name'";
        $query = "UPDATE product set purchases=$newpurchases WHERE product_name='$p_name'";
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $query);
    }


    //taking value of quantity
    $_SESSION['quantity']--;
    if ($_SESSION['quantity'] == 0) {
        header("location: viewbill.php");
    }
}
$sql = "SELECT * FROM `product` WHERE 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result);


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<script>
    function display()
    {
        alert("Product is added to bill");
    }
</script>
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
                    <img src="../IMAGES/bill2.gif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                        <div class="container">

                            <form method="POST" action="_generatebill2.php">
                                <div class="form-group">
                                    <label for="prduct code">Product:</label>
                                    <select name="productlist" id="product list">
                                        <option value="Select">Select</option>
                                        <?php
                                        foreach ($data as $values) 
                                        {
                                            echo "<option value='$values[1]'>$values[0].$values[1]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="prduct name">Product quantity</label>
                                    <input type="number" class="form-control" id="p_quantity" name="p_quantity"  aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="display()" name="save">Save</button><br>
                            </form>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

</body>

</html>