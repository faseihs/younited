<?php
include_once("database.php");
session_start();
$message = "";
if(isset($_SESSION['id']) && isset($_SESSION['name']))
{
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    if(isset($_POST["text"]) || isset($_FILES["photo"]))
    {
        $text = $_POST["text"];
        $profile = "";
        if($_FILES["photo"]["size"] != 0)
        {
            print_r($_FILES["photo"]);
            $profile = $_FILES["photo"];
            $profile_name = $profile['name'];
            $profile_location = $profile['tmp_name'];
            $profile_size = $profile['size'];
            $profile_error = $profile['error'];
        
            $profile_ext = explode(".",$profile_name);
            $profile_ext = strtolower(end($profile_ext));
            if($profile_ext === "jpg" || $profile_ext === "png")
        {
            if($profile_error === 0)
            {
                if($profile_size < 5000000)
                {
                    $des = "photos/".$profile_name;
                
                if(move_uploaded_file($profile_location,$des))
                {

                    $query = mysqli_query($con,"INSERT  INTO posts(user_id,post_text,post_img)VALUES('$id','$text','$profile_name')") or die("mysqli_error()");
                    $message = "Profile picture uploaded successfully";
                    
                }
                else
                {
                    $message = "Can't set picture"; 
                }
                }
                else
                {
                    $message = " picture is too large";
                }
            }
            else
            {
                $message = "Error in uploading the  picture.";
            }
        }
        else
        {
            $message = "pls upload jpg file or  png file for your profile picture.";
        }
        
        
        }
        else
        {
            $query = mysqli_query($con,"INSERT INTO posts(user_id,post_text,post_img)VALUES('$id','$text','')") or die(mysqli_error());
            $message = "Post added successfully";
        }

        
        
    }
}
else
{
    header("Location:login-form.php");
}
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>YouNited | Add Post</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
    <link href="add_post.css" rel="stylesheet" /> 
    <link href="parallax.css" rel="stylesheet" /> 
    
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
      

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
    <nav class="navbar navbar-ct-transparent navbar-relative " role="navigation-demo" id="register-navbar">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="logo-container">
            <div class="logo">
                <img src="logo.png" alt="YouNited">
            </div>
            <div class="brand">
                You Nited
            </div>
        </div>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="news_feed.php" class="btn btn-simple">NewsFeed</a>
            </li>
            <li>
                <a href="login-form.php?logoutid=1" class="btn btn-simple">Logout</a>
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

    <div class="wrapper">
        <div class="profile-background parallax" style="background-image:url(bg.jpg);"> 
        </div>
        <div class="profile-content section-nude">
            <div class="container">
                <div class="row owner">
                    <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                        <div class="avatar">
                            <img src="faseih1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                    </div>
                </div>     
                <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="add_post.php" method="post" class="contact-form" id="add_post"  enctype="multipart/form-data">
                            <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <label> Post Photo </label>
                                    <input  name="photo" id="post_pic" type="file"  class="form-control" placeholder="Post Photo">
                                    </div>
                            </div> 
                            <div class="row">
                            <label>Post Text</label>
                            <textarea name="text" class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
                            </div>
   
                            <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button  type="submit" name="add_post" id="add_post" class="btn btn-danger btn-block btn-lg btn-fill">Add Post</button>
                                    </div>

                            
                                </div>

                                <div class="row">
                                          <?php
                                          if($message != "")
                                            echo "<p class = 'alert alert-info' style = 'text-align:center; margin-top:15px;'>$message</p>";
                                          ?>
                                        </div>
                            </form>
                        </div>
                    </div>
            </div> 
        </div>
    </div>
    <footer class="footer-demo section-nude">
        <div class="container">
            <nav class="pull-left">
                <ul>
    
                    <li>
                        <h5>Web Engineering Project</h5>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; BESE-6B
            </div>
        </div>
    </footer>
    <script>

    </script>
    </body>
    </html> 
