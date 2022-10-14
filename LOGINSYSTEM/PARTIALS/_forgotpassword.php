<?php
//connecting to database via config.php inpartials folder//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'config.php';
  session_start();
  //fetching details//
  if(!isset($_SESSION['userhere']))
  {
    header("location:../login.php");
  }

  $user = $_SESSION["userhere"];
  $pass = $_POST['Password'];
  $cpass = $_POST['cPassword'];

  if ($pass == $cpass) {
    $sql = "UPDATE `login` SET `Password`='$pass' WHERE Username='$user'";
    $result=mysqli_query($conn, $sql);
    if ($result) {
      session_unset();
      session_destroy();
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your password is now changed you can <a href="../login.php">login</a> now!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> ';
    } }
    else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>  "Password does not match!!"
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
  </button>
</div> ';
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script>
    window.history.pushState({page: 1}, "", "");

window.onpopstate = function(event) {
    if(event){
        window.location.href = '../login.php';
        // Code to handle back button or prevent from navigation
    }
}
  </script>
</head>

<body>
  <div class="container my-4">
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <div class="card" style="width: 18rem;">

          <div class="card-body">


            <h4 class="text-center">Enter New Password 🔑</h4>
            <form action="_forgotpassword.php" method="post">

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="Password" name="Password" required minlength="8" maxlength="18">
              </div>

              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="cPassword" name="cPassword" required minlength="8" maxlength="18">
              </div>
              <button type="submit" class="btn btn-primary">Change</button><br>
            </form>
          </div>
        </div>
      </div>
      <div class="col-4"></div>
    </div>
  </div>
</body>

</html>