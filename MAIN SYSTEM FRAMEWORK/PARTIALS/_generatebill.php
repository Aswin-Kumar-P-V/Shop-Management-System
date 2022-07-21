
    <?php

    $isfill = true;
    $name = $_POST['name'];
    $quantity = $_POST['product'];
    //saving quantity
    if ($isfill == false || $name == null || $quantity == null) {
        echo '<!doctype html>
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
      
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Missing or invalid credentials <a href="../generatebill.php">go back</a> and try again"
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> </body>
</html>';
    } else {
        include 'config.php';

        //$regex="[0-9]";



        //creating tabel//

       
        //echo preg_match( $phone,$regex);
        $sql = "CREATE TABLE `rdbms_minproject`.`$name` (`product_code` VARCHAR(50) PRIMARY KEY NOT NULL , `product_name` VARCHAR(20) NOT NULL , `product_quantity` INT(5) NOT NULL , `product_price` INT(10) NOT NULL ) ";
        session_start();
        if (isset($quantity)) {
            $_SESSION['quantity'] = $quantity;
            $_SESSION['tablename'] = $name;
        }
        try {
            $result = mysqli_query($conn, $sql);
            header("location: _generatebill2.php");
        } catch (exception $except) {
            $isfill = false;
        }
    }

    ?>
