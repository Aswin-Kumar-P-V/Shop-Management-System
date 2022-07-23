<?php
include "session.php";?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Main Page</title>
</head>

<body>

  <!--navbar-->

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="homepage.php">Main Page</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

    <div class="container my-4">
        <h1 class="text-center">Please Enter The Product Details 📝</h1>
        <form action="PARTIALS/_addproduct.php" method="post">

            <div class="form-group">
                <label for="prduct code">Product Code</label>
                <input type="text" class="form-control" id="p_code" name="p_code" aria-describedby="emailHelp">
            </div>
            
            <div class="form-group">
                <label for="prduct name">Product Name</label>
                <input type="text" class="form-control" id="p_name" name="p_name" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="purchases">Stock available</label>
                <input type="text" class="form-control" id="purchases" name="purchases" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="MRP">MRP</label>
                <input type="text" class="form-control" id="mrp" name="mrp" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="wholesale rate">Wholesale Rate</label>
                <input type="text" class="form-control" id="w_rate" name="w_rate" aria-describedby="emailHelp">
            </div>



            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>

</body>

</html>