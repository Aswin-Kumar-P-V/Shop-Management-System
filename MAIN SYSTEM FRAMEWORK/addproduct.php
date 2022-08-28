<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //connecting to database via config.php inpartials folder//

    include 'config.php';
    include "session.php";
    //fetching data//

    $p_code = $_POST['p_code'];
    $p_name = $_POST['p_name'];
    $purchases = $_POST['purchases'];
    $mrp = $_POST['mrp'];
    $w_rate = $_POST['w_rate'];

    //alert for primary key duplication//

    $uniquep_code = true;

    //checking for duplicateprimary key or product code//

    $checksql = "SELECT * FROM `product` WHERE product_code='$p_code'";
    $result = mysqli_query($conn, $checksql);
    $no_of_cols = mysqli_num_rows($result);

    if ($no_of_cols < 1) {

        $sql = "INSERT INTO `product` (`product_code`, `product_name`, `purchases`, `sales`, `mrp`, `wholesale_rate`) VALUES ('$p_code', '$p_name', '$purchases', '', '$mrp', '$w_rate')";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (exception $except) {
            echo $except;
        }
    } 
    else 
    {
        $uniquep_code = false;
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

    <!--navbar-->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($uniquep_code == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Duplicate Product Code!! <br>  
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div> ';
        } else {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Product has been added 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }}
    ?>
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Main Page</title>
    <script >
        function myFunction() {
            if(!confirm("Do you want to Add the product?"))
            {
                return false;
            }
        }
    </script>
</head>

<body>

    <!--navbar-->

    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="homepage.php">Main Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container my-4">
        <h1 class="text-center">Please Enter The Product Details 📝</h1>
        <form action="addproduct.php" method="post" onsubmit="return myFunction()">

            <div class="form-group">
                <label for="prduct code">Product Code</label>
                <input type="number" min="1" max="100000" class="form-control" id="p_code" name="p_code" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="prduct name">Product Name</label>
                <input type="text" class="form-control" id="p_name" name="p_name" aria-describedby="emailHelp" required >
            </div>

            <div class="form-group">
                <label for="purchases">Stock available</label>
                <input type="number" min="1" max="100000" class="form-control" id="purchases" name="purchases" aria-describedby="emailHelp" required>
            </div>

            <div class="form-group">
                <label for="MRP">MRP</label>
                <input type="text" minlength="1" maxlength="100000"  class="form-control" id="mrp" name="mrp" aria-describedby="emailHelp" required pattern="[+-]?([0-9]*[.])?[0-9]+" title="Please Enter numerical value">
            </div>

            <div class="form-group">
                <label for="wholesale rate">Wholesale Rate</label>
                <input type="text" minlength="1" maxlength="100000" class="form-control" id="w_rate" name="w_rate" aria-describedby="emailHelp" required pattern="[+-]?([0-9]*[.])?[0-9]+" title="Please Enter numerical value">
            </div>



            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

</body>

</html>