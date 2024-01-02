<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}
else{
   $loggedin = false;
}
 echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/work">AdminLogin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="/work/wellcome.php">Home</a>
        </li>';
        if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/work/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/work/sign.php">Signin</a>
        </li>';
      }
        if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/work/logout.php">Logout</a>
        </li>';
      }
       echo '<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> 
    </div>
  </div>
</nav>';
?>


