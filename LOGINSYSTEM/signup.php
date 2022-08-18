<?php

//connecting to database via config.php inpartials folder//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    //Setting alert as error by default//

    $alert = false;

    //fetching details//

    $username = $_POST["Username"];
    $pass = $_POST["Password"];
    $cpass = $_POST["Cpassword"];
    $dob = $_POST["Dob"];

    //checking whether the username is unique or not//

    $isunique = true;     //at this pointassuming the username is unique//

    //validating entries by user and updating the databse//

    if (($pass == $cpass) && $isunique) {
        //setting the error alerts by default as true//

        $alert = false;

        $sql = "INSERT INTO `login` (`Username`, `Password`, `DOB`) VALUES ('$username', '$pass', '$dob')";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (exception $except) {
            $isunique = false;
        }
    } else {
        $alert = true;
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
        function preventback() {
            window.history.forward()
        };
        setTimeout("preventback()", 0);
        window.onunload = function() {
            null;
        }
    </script>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($alert == false && $isunique == true) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created you can <a href="login.php">login</a> now!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
        } else if ($alert == true) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>  "Password does not match!!"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
        }
        if (!$isunique) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Error!</strong> Username exists use another username!!"
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
           </button>
       </div> ';
        }
    }
    ?>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
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
                    <img src="PARTIALS/signup.gif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="container my-4">
                            <h3 class="text-center">Signup 📝</h3>
                            <form action="signup.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="Username" name="Username" aria-describedby="emailHelp" required>

                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="Password" name="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="Cpassword" name="Cpassword" required>
                                    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                                </div>
                                <div class="form-group">
                                    <label for="DOB">Date of birth</label>
                                    <input type="date" class="form-control" id="Dob" name="Dob" required>
                                </div>
                                <button type="submit" class="btn btn-primary">SignUp</button>
                                <button type="button" class="btn btn-link"><a href="login.php">Login</a></button>

                            </form>
                        </div>
                    </div>
                    <div class='col-4'></div>

                </div>
            </div>


            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </form>
</body>

</html>