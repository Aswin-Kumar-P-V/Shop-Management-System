<?php

//connecting to database via config.php inpartials folder//

include 'config.php';

//Setting alert as error by default//

$alert=false;

//fetching details//

$username=$_POST["Username"];
$pass=$_POST["Password"];
$cpass=$_POST["Cpassword"];
$dob=$_POST["Dob"];

//checking whether the username is unique or not//

$isunique=true;     //at this pointassuming the username is unique//

//validating entries by user and updating the databse//

if(($pass==$cpass) && $isunique)
{
    //setting the error alerts by default as true//

    $alert=false;

    $sql="INSERT INTO `login` (`Username`, `Password`, `DOB`) VALUES ('$username', '$pass', '$dob')";
    try
    {
        $result=mysqli_query($conn,$sql);
    }
    catch(exception $except)
    {
        $isunique=false;
    }
}
else
{
    $alert=true;
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
    if($alert==false && $isunique==true)
    {
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created you can <a href="../login.php">login</a> now!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    else if($alert==true)
    {
     echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>  "Password does not match...<a href="../signup.php">back</a>"
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if(!$isunique)
    {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Error!</strong> Username exists use another username...<a href="../signup.php">back</a>"
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
           </button>
       </div> ';
       }
    ?>
</body>
</html>