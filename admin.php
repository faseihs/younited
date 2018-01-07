<?php
session_start();
if(isset($_SESSION['admin']))
    {
        header("location:cpanel.php");
    }
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  

<div class="pen-title">
  <h1>Admin Login</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    
  </div>
  <div class="form">
    <h2>Login to YouNited Database</h2>
    <form name="form1" method="post" action="cpanel.php">
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
     <!--<button>Login</button>-->
        <input type="submit" name="submit" value="Go">
    </form>
  </div>
  
  
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
