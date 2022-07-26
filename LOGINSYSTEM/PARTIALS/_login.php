<?php

//connecting to database via config.php inpartials folder//

include 'config.php';

//if username exists//

$ifexists=true;

//fetching details//

$username=$_POST["Username"];
$pass=$_POST["Password"];
session_start();
$_SESSION['login_user']=$username;

//checking is username exists//

$usernameexists=false;
$isvalid=false;

$checkusername="SELECT * FROM login WHERE Username='$username'";
$result=mysqli_query($conn,$checkusername); //is in bit format
if(mysqli_num_rows($result)==1)
{
    $usernameexists=true;

    
    $data=mysqli_fetch_row($result); //arrayformat

    //checking if credentials are valid//

    if($data[0]==$username && $data[1]==$pass)
    {
        header("Location: ../../MAIN SYSTEM FRAMEWORK/homepage.php"); //redirection
        $isvalid=true;
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
</head>
<body>
<?php
    if($usernameexists==false)
    {
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> User profile does not exist ... please <a href="../signup.php">sign up</a> to create a user profile or<a href="../login.php">try again</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    else if($isvalid==false)
    {
     echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>  "Password not valid ...<a href="../login.php">Try again</a>"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
</body>
</html>