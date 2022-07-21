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
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
      <div class="card" style="width: 18rem;">
  <img src="PARTIALS/login.gif" class="card-img-top" alt="...">
  <div class="card-body">
    
  
    <h4 class="text-center">Login to our web-application 🔑</h4>
    <form action="PARTIALS/_login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp">

      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="Password" name="Password">
      </div>


      <button type="submit" class="btn btn-primary">Login</button><br>
      New user?<br>
      <a href="signup.php">Signup</a><br>
      <a href="forgotpassword.php">Forgot password?</a>

    </form>
    </div>
</div>
      </div>
      <div class="col-4"></div>
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