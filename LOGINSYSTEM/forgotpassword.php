<?php
//connecting to database via config.php inpartials folder//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'config.php';
//fetching details//

$username=$_POST["Username"];
$dob=$_POST["Dob"];

//Setting alert as error by default//

$alert=false;

//validating entries by user and updating the databse//

if($username!=null && $dob!=null)
{
    $sql="SELECT Password FROM login WHERE Username='$username' AND DOB='$dob'";
    $result=mysqli_query($conn,$sql);
    $data=mysqli_num_rows($result);
    $pass=mysqli_fetch_row($result);
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
    <script type="text/javascript">
    function preventback(){window.history.forward()};
    setTimeout("preventback()",0);
    window.onunload=function(){null;}
  </script>
  </head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if($data!=null)
{
    echo"<div class='alert alert-primary' role='alert'>
    Your password is '$pass[0]'....Please proceed to <a href='login.php'>login</a>
  </div>";
}
else
{
  echo"<div class='alert alert-danger' role='alert'>
    Invalid credentials
  </div>";
}
}
?>
</body>
</html>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script type="text/javascript">
    function preventback(){window.history.forward()};
    setTimeout("preventback()",0);
    window.onunload=function(){null;}
  </script>
</head>

<body>
  <div class="container my-4">
    <div class='row'>
      <div class='col-4'></div>
      <div class='col-4'>
        <div class="card" style="width: 18rem;">
          <img src="PARTIALS/forgot.png" class="card-img-top" alt="...">
          <div class="card-body">

            <h3 class="text-center">Forgot Password? 😶‍🌫️ Dont Worry</h3>
            <form action="forgotpassword.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp" required>
              </div>
              <div class="form-group">
                <label for="date of birth">Date Of Birth</label>
                <input type="date" class="form-control" id="Dob" name="Dob"  required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-link"><a href="login.php">Login</a></button>
            </form>
          </div>
          <div class='col-4'></div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>