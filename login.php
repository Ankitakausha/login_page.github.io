<?php
$login = False;
$showError = False ;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 include 'partial/_dbconnect.php';
 $email = $_POST["email"];
 $password = $_POST["password"];
$sql = "Select * from form2 where email='$email'And password='$password' limit 1";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num == 1){
  $login = false;
   session_start();
  while($row = mysqli_fetch_assoc($result)) {
    
    $_SESSION['username'] = $row['username'];
   $_SESSION['email'] = $email;
   $_SESSION['phone'] = $row['phone'];
  }
   
   $_SESSION['loggedin'] = true;
   
   header("location: wellcome.php");
     }
    
    else{
        $showError = "Invalid Credentilas";
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

    <title>login</title>
    <style>
    .background{
            width: 100%;
            height: 745px;
            position: absolute;
            z-index: -1; 
            opacity: 0.6;
        }
        </style>
  </head>
  <body>
  <img class="background" src="bgphoto1.jpg">
  <?php require 'partial/_nav.php'?>
  <?php 
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
          </div> ';
  }
    if($showError){
     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $login .'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> ';
  }
    ?>
    <div class="container my-4  col-md-5">
     <h1 class="text-center">LOGIN</h1>
     <form action="/work/login.php" method="post">
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
      
        <button type="submit" class="btn btn-primary">SignUp</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>