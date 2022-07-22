<?php
//connecting to database via config.php inpartials folder//

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
if($data!=null)
{
    echo"<div class='alert alert-primary' role='alert'>
    Your password is '$pass[0]'....Please proceed to <a href='../login.php'>login</a>
  </div>";
}
else
{
  echo"<div class='alert alert-danger' role='alert'>
    Invalid credentials <a href='../forgotpassword.php'>try again</a>
  </div>";
}

?>
</body>
</html>