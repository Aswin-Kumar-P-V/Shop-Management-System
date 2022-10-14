<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        .container-fluid {

            width: 40%;
            margin-left: 21%;

        }
    </style>
</head>

<body>
    <!--navbar-->

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="">
            <a class="navbar-brand" href="../homepage.php">Main Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav><br><br>
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
    include "config.php";
    include "session.php";
    $name = $_SESSION['tablename']; ?>
    <div class="container">
        <p>
        <h4>Shop Name : My Shop <br> Address : Pulinkunnu, Alappuzha</h4><br>
        <h4>Customer Name :<?= $name; ?><h4>
    </div>
    <?php
    $total = 0;
    $mysql = "SELECT * FROM `$name` WHERE 1";
    $result = mysqli_query($conn, $mysql);
    $rows = mysqli_fetch_all($result);
    echo '<div class="container"><table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product quantity</th>
                    <th scope="col">MRP</th>
                    
                </tr>
            </thead>
            <tbody>';
    foreach ($rows as $values) {
        echo "<tr>
                    <th scope='row'>$values[0]</th>
                    <td>$values[1]</td>
                    <td>$values[2]</td>
                    <td>$values[3] rs</td>
                  </tr>";
        $total += $values[3];
    }
    echo "<tr>
                    <th scope='row'><b>TOTAL</b></th>
                    <td></td>
                    <td></td>
                    <th>$total rs</th>
                  </tr>
                  <tr><td></td><td colspan='2'><div class='tet-centre'><button type='button' class='container-fluid btn btn-primary' onclick='window.print()'>Print</button></div></td><td></td>";
    $sql = "DROP TABLE `$name`";
    $result = mysqli_query($conn, $sql);

    ?>
</body>

</html>