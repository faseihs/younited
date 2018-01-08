

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>YouNited | Ali Danish</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="assets/css/examples.css" rel="stylesheet" /> 
    
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
           <div class="filter-black"></div> 
        </div>
        <div class="profile-content section-nude">
            <div class="container">
                <div class="row owner">
                    <div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
                        <div class="avatar">
                            <img src="assets/paper_img/flume.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                        <div class="name">
                            <h4 id = "na">Ali Danish</h4><h5 id = "oc">Student</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
                        <br />
                        <btn class="btn" data-toggle="popover" data-placement="top" title="Friend Request Sent"><i class="fa fa-cog"></i> Send Request</btn>
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
                    &copy; BESE-6B Students
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

        $(document).ready(function(){
        var url = window.location.href;

        var aho = url.split("=");
        var id = aho[1];
        
        $.getJSON("files/"+id+"/data.json", function(result){
        $("#na").html(result["user_info"]["name"]);
        $("#oc").html(result["user_info"]["occupation"]);
    });
});
        
            </script>
</body>



</html>