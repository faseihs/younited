<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location :login-form.html');
}
require_once("pdo_database.php");
$email=$_SESSION['email'];
$id=$_SESSION['uid'];
if(isset($_POST['update'])){
    $new_name=$_POST['name'];
    $new_dob=$_POST['bday'];
    $new_email=$_POST['email'];
    $new_city=$_POST['city'];
    $new_institute=$_POST['institute'];
    $new_age=$_POST['age'];
    $new_address=$_POST['address'];

    //Inserting into Users Code
    
    $ins=$dbCon->prepare("UPDATE users SET name =:name , email=:email , dob=:dob WHERE email=:old_email");
    $ins->bindParam(':name',$new_name);
	$ins->bindParam(':email',$new_email);
    $ins->bindParam(':old_email',$email);
    $ins->bindParam(':dob',$new_dob);
    $ins->execute();

    //Inserting into Profile Code

    $ins=$dbCon->prepare("UPDATE profile SET City =:city , Age=:age , Address=:address , Institute=:inst WHERE id=:id");
    $ins->bindParam(':city',$new_city);
	$ins->bindParam(':age',$new_age);
    $ins->bindParam(':address',$new_address);
    $ins->bindParam(':inst',$new_institute;
    $ins->execute();

}


//Calling for Data
	
$stmt = $dbCon->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email',$email);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$e_id=$results[0]['id'];
$e_name=$results[0]['name'];
$e_email=$results[0]['email'];
$e_dob=$results[0]['dob'];

$stmt1 = $dbCon->prepare("SELECT * FROM profile WHERE id = :id");
$stmt1->bindParam(':id',$e_id);
$results1 = $stmt->fetchAll(PDO::FETCH_ASSOC);

$e_city=$results1[0]['City'];
$e_age=$results1[0]['Age'];
$e_address=$results1[0]['Address'];
$e_institute=$results1[0]['Institute'];


//End Calling Data Part


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Younited | Edit Profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
    <link href="edit_profile.css" rel="stylesheet" /> 
    
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
       <div class="progress-div col-md-6">
            <div class="progress">
                    <div id="bar" class="progress-bar-striped">
                            1%
                    </div>
                  </div>
           </div> 
    <style>
        .progress-div{
            height: 100vh;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .progress{
            height: 50px;
            position:relative;
            top:50%;
            width:100%;
            background-color: #ddd;
        }
        #bar{
            width: 1%;
            color:white;
            background-color: #2c475c;
            height: 100%;
        }
    </style>
        
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
                <a href="#" class="btn btn-simple">NewsFeed</a>
            </li>
            <li>
                <a href="#" class="btn btn-simple">Messages</a>
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
        <div class="profile-background" style="background-image:url(bg1.jpg);"> 
        </div>
        <div class="profile-content section-nude">
            <div class="container">
                <div class="row owner">
                    <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                        <div class="avatar">
                            <img src="assets/paper_img/flume.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                    </div>
                </div>     
                <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form action="edit_profile.php" method="post" class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input name="name" required type="text" class="form-control" value="<?php echo $e_name ?>">
                                    </div>
                                    <div class="col-md-6">
                                            <label>Birthday</label>
                                            <input name="dob" required class="datepicker form-control" type="text" value="<?php echo $e_dob ?>">
                                        </div>
                                </div>

                                <div class="row">
                                        <div class="col-md-6">
                                                <label>Email</label>
                                                <input name="email" required type="email" class="form-control" value="<?php echo $e_email ?>">
                                            </div>
                                    
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input name="city" required type="text" class="form-control" value="<?php echo $e_city ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Age</label>
                                        <input name="age" required type="number" class="form-control" value="<?php echo $e_age ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Address</label>
                                        <input name="address" required type="text" class="form-control" value="<?php echo $e_address ?>">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Institue</label>
                                        <input name="institute" required type="text" class="form-control" value="<?php echo $e_institute ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Profile Photo</label>
                                        <input name="profile_pic" type="file" accept="image/*"  class="form-control" placeholder="New Profile Photo">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button type="submit" id="update" class="btn btn-danger btn-block btn-lg btn-fill">Update</button>
                                    </div>
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
        $(".progress-div").nextAll().hide();
        function move() {
            var elem = document.getElementById("bar"); 
            var width = 1;
            var id = setInterval(frame, 10);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                    $(".progress-div").fadeOut("slow",function(){$(".progress-div").nextAll().fadeIn();});

                } else {
                    width++; 
                    elem.style.width = width + '%'; 
                    elem.innerHTML = width * 1 + '%';
                }
            }
        }
move();
    </script>
    </body>
    </html> 
