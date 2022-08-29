<?php
include "config.php";
include "session.php";

$p_code = $_POST['p_code'];
$sql = "SELECT * FROM `product` WHERE product_code=$p_code";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result);
foreach($result as $value){
    $pname=$value['product_name'];


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
    <script >
        function myFunction() {
            if(alert("Caution!! \n Any changes made will be updated.."))
            {
                return false;
            }
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
                    <img src="../IMAGES/product.gif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">
                        <div class="container">

                            <form method="POST" action="_editproduct3.php">
                                <div class="form-group">
                                    <label for="prduct code">Product Code : </label>
                                    <input type="text" name="p_code" value=<?php echo $data[0][0]?> readonly>
                                </div>
                                <div class="form-group">
                                    <label for="prduct name">Product Name : </label><br>
                                    <label><?php echo $data[0][1];?></label> 
                                </div>

                                <div class="form-group">
                                    <label for="purchases">Stock available</label>
                                    <input type="number" min="1" max="100000" class="form-control" id="purchases" name="purchases" aria-describedby="emailHelp" value=<?php echo $data[0][2]?> >
                                </div>

                                <div class="form-group">
                                    <label for="MRP">MRP</label>
                                    <input type="text" minlength="1" maxlength="100000" class="form-control" id="mrp" name="mrp" aria-describedby="emailHelp" pattern="[+-]?([0-9]*[.])?[0-9]+" title="Please Enter numerical value" value=<?php echo $data[0][4]?>>
                                </div>

                                <div class="form-group">
                                    <label for="wholesale rate">Wholesale Rate</label>
                                    <input type="text" minlength="1" maxlength="100000" class="form-control" id="w_rate" name="w_rate" aria-describedby="emailHelp" pattern="[+-]?([0-9]*[.])?[0-9]+" title="Please Enter numerical value" value=<?php echo $data[0][5]?>>
                                </div>
                                <button type="submit" class="btn btn-primary" name="save" onclick="myFunction()">Update</button><br>
                            </form>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

</body>

</html>