<?php
include_once('database.php');
$curr_date=date("h:i:sa");
$view_str="login-form.php has been accessed at ".$curr_date;
file_put_contents('files/views.txt', $view_str, FILE_APPEND);
$message = "";
if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $dob = date('Y-m-d',strtotime($dob));

  $password = $_POST['password'];
  
    $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($query) > 0)
    {
      $message = "Email Already Exists.";
    }
    else
    {
   
    $password = sha1($password);
    $query = mysqli_query($con,"INSERT into users(name,email,dob,password) values('$name','$email','$dob','$password')") or die("could not insert data into database");
    
    $query = mysqli_query($con,"SELECT id FROM users WHERE email = '$email'") or die("could not find id from database");
    $row = mysqli_fetch_assoc($query);
    $id = $row['id'];

    $query = mysqli_query($con,"INSERT INTO profile (id) VALUES('$id')") or die("could not insert id in profile");
    $message = "Registration Complete. Please sign in to continue.";

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
    <link href="pre-loader.css" rel="stylesheet" />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
        
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    <!-- Scripts -->
    
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
	<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1616910688352669',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.11'
    });

    /*FB.getLoginStatus(function(response){
    	if(response.status === 'connected')
    		{
  			document.getElementById('loginfb').style.visibility = 'hidden';
  			alert('You are connected.');
  		}
    	else if(response.status === 'not_authorized')
    		alert("you're not authorized.");
    	else
    		alert("You are not connected to facebook");
    }

    	);*/
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function login()
  {
  	FB.login(function(response){
  		if(response.status === 'connected')
  		{
  			//document.getElementById('loginfb').style.visibility = 'hidden';
			getInfo();
			
  			
  		}
    		
    	else if(response.status === 'not_authorized')
    		alert("you're not authorized.");
    	else
    		alert("You are not connected to facebook");

  	}, {scope: 'email,user_birthday'});
  }
  	
  	// getting basic user info
	
	function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,email,gender,birthday,id,picture,name'}, function(response) 
			{
				document.getElementById('sname').value = response.first_name + " " + response.last_name;
				document.getElementById('sbirthday').value = response.birthday;
				document.getElementById('semail').value = response.email;
				
			});
		}

</script>
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

    .register-card{
        max-width: 90vh !important;
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
                        <div class="col-md-10 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Signup</h3>
                                <form class="contact-form" method = "post" action = "signup.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="btn-tooltip" data-toggle="tooltip" data-placement="top" title="Your Full Name">Name</label>
                                                <input class="form-control" type="text" name = "name" placeholder="Name" id = "sname" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="btn-tooltip" data-toggle="tooltip" data-placement="right" title="Select Date Of Birth">Date Of Birth</label>
                                                <input class="datepicker form-control" type="text" name = "dob" placeholder="Your DOB" id = "sbirthday" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="btn-tooltip" data-toggle="tooltip" data-placement="left" title="Your Email">Email</label>
                                                <input class="form-control" type="email" placeholder="Email" name = "email" id = "semail"required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="btn-tooltip" data-toggle="tooltip" data-placement="right" title="Upper Case , Lower Case and Number/Special Characters">Password</label>
                                                <input class="form-control" type="password" placeholder="Password"  name = "password" required>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-info btn-fill btn-block" name = "submit" >Signup</button>
                                        </div>
                                        <div class="row">
                                            <button class="btn btn-info btn-fill btn-block" id = "loginfb" onclick = "login()">Signup with facebook</button>
                                        </div>

                                        <div class="row">
                                          <?php
                                          if($message != "")
                                            echo "<p class = 'alert alert-info' style = 'text-align:center; margin-top:15px;'>$message</p>";
                                          ?>
                                        </div>

										
										<div class="row">
                                           
                                        </div>
                                    </form>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>     
        </div>
    </div>      
    <script>
        $('.btn-tooltip').tooltip();
    </script>
</body>


    
</html>