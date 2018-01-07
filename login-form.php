<?php
    session_start();
    $message = "";
    $curr_date=date("h:i:sa");
    $view_str="login-form.php has been accessed at ".$curr_date;
    file_put_contents('files/views.txt', $view_str, FILE_APPEND);
    include_once('database.php');
    if(isset($_GET["logoutid"]))
    {
      $uid = $_GET["logoutid"];
      $query2 = mysqli_query($con,"UPDATE users set active = '0' WHERE id = '$uid'") or die("na baba na");
      $message = "You have successfully logout.";
      $_SESSION = array();
      session_destroy();
      $message = "you have been logged out.";
    }

    if(isset($_SESSION['id']))
    {
        header("location:news_feed.php");
    }
  
  
  
  
    

    if(isset($_POST['email'] ) && isset($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

    $password = sha1($password);

    $query = mysqli_query($con,"SELECT * FROM users WHERE password = '$password' && email = '$email'");
    if(mysqli_num_rows($query) === 1)
    {
      $row = mysqli_fetch_assoc($query);
      session_start();
      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['email']=$row['email'];
      header("Location:news_feed.php");
    }
    else
    {
      $message = "Email or Password doesn't exist.";
    }
    }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>YouNited | Login</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
    <link href="pre-loader.css" rel="stylesheet" />
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    <!-- SCripts -->
   
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    
    <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    <script src="pre-loader.js" type="text/javascript"></script>
    
    <!--  Plugins -->
    <script src="assets/js/ct-paper-checkbox.js"></script>
    <script src="assets/js/ct-paper-radio.js"></script>
    <script src="assets/js/bootstrap-select.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/ct-paper.js"></script>
</head>
<body>
<div class="pre-loader">
                <!-- Loading square for squar.red network -->
<span class="loader"><span class="loader-inner"></span></span>
</div>
    <nav class="navbar navbar-ct-transparent navbar-fixed-top" role="navigation-demo" id="register-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#">
            <div class="logo-container">
                 <div class="logo">
                     <img src="logo.png" alt="YouNited">
                 </div>
                 <div class="brand">
                     You Nited
                 </div>
             </div>
       </a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="btn btn-simple">About US</a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#" target="_blank" class="btn btn-simple"><i class="fa fa-facebook"></i></a>
            </li>
           </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-->
    </nav> 
    <style>
    .register-card{
        background-color: #66615b !important;
    }

    .title{
        color: whitesmoke !important;
    }
    .register-background{
        background: url(bg.jpg) !important;
    }
    </style>
    <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Login</h3>
                                <form class="register-form" method = "post" action = "login-form.php">
                                    <label>Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>

                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    <button class="btn btn-info btn-fill btn-block">Login</button>
                                    <button style="color:white;" type="button" class="btn btn-danger btn-block btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Click here to Reset Your Password">Forgot Password</button>

                                    <?php
                                          if($message != "")
                                            echo "<p class = 'alert alert-info' style = 'text-align:center; margin-top:15px;'>$message</p>";
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>     
        </div>
    </div>      

</body>
<script>
    $('.btn-tooltip').tooltip();
</script>
</html>