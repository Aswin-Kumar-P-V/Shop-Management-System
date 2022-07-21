<?php

//connecting to database via config.php inpartials folder//

include 'config.php';

//fetching data//

$p_code=$_POST['p_code'];
$p_name=$_POST['p_name'];
$purchases=$_POST['purchases'];
$mrp=$_POST['mrp'];
$w_rate=$_POST['w_rate'];

//alert for primary key duplication//

$uniquep_code=true;

//checking for duplicateprimary key or product code//

$checksql="SELECT * FROM `product` WHERE product_code='$p_code'";
$result=mysqli_query($conn,$checksql);
$no_of_cols=mysqli_num_rows($result);

$alert='';
//Setting alert as true by default//

if($p_code==null || $p_name==null || $p_name==null || $purchases==null || $mrp==null || $w_rate==null)
{
  $alert=true;
}

if($no_of_cols<1 && $alert==false){
$alert=true;
$sql="INSERT INTO `product` (`product_code`, `product_name`, `purchases`, `sales`, `mrp`, `wholesale_rate`) VALUES ('$p_code', '$p_name', '$purchases', '', '$mrp', '$w_rate')";
    try
    {
        $result=mysqli_query($conn,$sql);
    }
    catch(exception $except)
    {
        $alert=false;
        echo$except;
    }
}
else{
    $uniquep_code=false;
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

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../homepage.php">Main Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

    <?php
    if($alert && $uniquep_code)
    {
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Product has been added <br> Click  <a href="../addproduct.php">here</a> to go back
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    else 
    {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Missing or invalid credentials!!  <br>  <a href="../addproduct.php">try again?</a> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }

    ?>
  </body>
</html>