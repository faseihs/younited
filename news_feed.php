<?php
session_start();
include_once("database.php");
if(isset($_SESSION['id']) && isset($_SESSION['name']))
{
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
}
else
{
  header("location:login-form.php");
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>YouNited | HOME</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/ct-paper.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" /> 
    <link href="pre-loader.css" rel="stylesheet" /> 
    <link href="news_feed.css" rel="stylesheet" />
    
        
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

  <style>
  #suggested_search
  {
    width:300px;
    height:auto;
    background-color:#f5f5f5;
    position:fixed;
    top:90px;
    left:1060px;
    z-index:2;
    padding:20px;
    display:none;
    border-radius:5px;
  }
  
.sp{
  cursor:pointer;
  color:grey;
}

.sp:hover{
  color:red;
  
}
</style>
</head>
<body>
  <div id = "user" data-id = "<?php echo $id;?>"></div>
  <div id = "suggested_search"></div>
        <div class="pre-loader">
                <!-- Loading square for squar.red network -->
                    <span class="loader"><span class="loader-inner"></span></span>
            </div>
        <nav class="navbar navbar-ct-primary" role="navigation-demo">
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
                    <ul class="nav navbar-nav">
                            <li class="dropdown">
                                    <button id="acha" href="#" type="button" style="color:white;" class="dropdown-toggle btn btn-info" data-toggle="dropdown"><?php echo ucwords($_SESSION['name'])?><span class="caret"></span></button>
<!--                                  You can add classes for different colours on the next element -->
<script>
    
    $(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
  $('#acha').click(function(){
    $('.dropdown-submenu a.test').next('ul').toggle();
  })
});
</script>
                                    <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                                      <li class="dropdown-header">User Options</li>
                                      <li class="dropdown-submenu">
                                          <a class="test" href="#">Profile &nbsp;<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                                          <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                                              <li><a href="profile.php" tab-index="-1" href="#">View</a></li>
                                              <li><a href="edit_profile.php" tab-index="-1" href="#">Edit</a></li>
                                          </ul>
                                        </li>
                                      <li><a href="#">Search For Friends</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Change Password</a></li>
                                    </ul>
                            </li>
                            <li>
                          <a href="add_post.php" target="_blank" style="color:white;" class="btn btn-info">Add Post</a>
                        </li>
                        <li>
                          <a href="login-form.php?logoutid=1" target="_blank" class="btn btn-fill">Logout&nbsp;<span class="glyphicon glyphicon-log-out glyphicon-align-left" aria-hidden="true"></span></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                          <li>
                                <input type="text" style="margin-top:10px;" value="" placeholder="Search" id = "search" class="form-control text-center" />
								<p id = "results"></p>
                          </li>
                     </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-->
                </nav>

                <div class="wrapper">
                                <div class="profile-tabs">
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active"><a id="newsfeed" href="#follows" data-toggle="tab">News Feed</a></li>
                                                <li><a href="#following" data-toggle="tab">Friends</a></li>
                                                <li><a href="#notif" data-toggle="tab">Notifications</a></li>
                <!--                                 <li><a href="#following" data-toggle="tab">Following</a></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="my-tab-content" class="tab-content">
                                        <div class="tab-pane active" id="follows">
                                            
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                        <div id="carousel">
                                                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                                <div class="carousel slide" data-ride="carousel">
                                                        
                                                                      <!-- Indicators -->
                                                                      <ol class="carousel-indicators">
                                                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                                                      </ol>
         
                                                                      <!-- Wrapper for slides -->
                                                                      <div class="carousel-inner" style="background-color:white;">
                                                                        <div class="item active">
                                                                            <div class="container">
                                                                               
                                                                                <div class="row">
                                                                                    <div class="col-md-3 col-md-offset-2">
                                                                                        <h6>Faseih Saad added a post</h6>   
                                                                                    </div>
                                                                                    <div class="col-md-6 col-md-offset-1">
                                                                                            <button class="btn btn-default btn-sm" data-toggle="popover" data-placement="bottom" title="You have Liked this Post" >Like</button>
                                                                                            <button class="btn btn-primary btn-sm">Comment</button>    
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-md-offset-2">
                                                                                            <p>This the post text This the post text This the post text This the post text This the post text</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6 col-md-offset-2">
                                                                                                <img height="300px" src="faseih.jpg" class="image-thumnail img-responsive">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="item">
                                                                                <div class="container">
                                                                                   
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 col-md-offset-2">
                                                                                            <h6>Faseih Saad added a post</h6>   
                                                                                        </div>
                                                                                        <div class="col-md-6 col-md-offset-1">
                                                                                                <button class="btn btn-default btn-sm">Like</button>
                                                                                                <button class="btn btn-primary btn-sm">Comment</button>    
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6 col-md-offset-2">
                                                                                                <p>This the post text This the post text This the post text This the post text This the post text</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6 col-md-offset-2">
                                                                                                    <img src="faseih1.jpg" class="image-thumnail img-responsive">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                            </div>

                                                                                                                                                    <?php
    $query = mysqli_query($con,"SELECT p.post_id,p.post_img,p.post_text,u.name FROM posts p JOIN users u ON p.user_id = u.id WHERE p.user_id in (SELECT friend2 FROM friends WHERE friend1 = '$id') ORDER BY post_id DESC") or die("could not find posts");
      
    while ($row = mysqli_fetch_assoc($query)):
      
  ?>
                                                                        <div class="item">
                                                                                <div class="container">
                                                                                   
                                                                                    <div class="row">
                                                                                        <div class="col-md-3 col-md-offset-2">
                                                                                            <h6><?php echo $row["name"]?> added a post</h6>   
                                                                                        </div>
                                                                                        <div class="col-md-6 col-md-offset-1">
                                                                                                <button onclick = "send_like(this)" data-postid = "<?php echo $row['post_id']?>" data-id = "<?php echo $id?>" id = "<?php echo 'like'.$row['post_id']?>" class="btn btn-default btn-sm"><?php
  $post_id =  $row['post_id'];                                                                                             
  $query5 = mysqli_query($con,"SELECT * FROM likes Where user_id = '$id' and post_id = '$post_id'")  or die("bhai bhai bahi");
  if(mysqli_num_rows($query5) == 0)
  {
    echo "like";
  }
  else
  {
    echo "liked";
  }


                                                                                                ?></button>

                                                                                                <span id = "<?php echo 'numlike'.$row['post_id']?>"><?php
  $post_id = $row["post_id"];
      $query2 = mysqli_query($con,"SELECT count(post_id) as count_likes from likes where post_id = '$post_id'") or die("could not select from database");
      $row1 = mysqli_fetch_assoc($query2);
  echo $row1["count_likes"]
  ?></span>
                                                                                                <button class="btn btn-primary btn-sm">Comment</button>    
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-6 col-md-offset-2">
                                                                                                <p><?php echo $row["post_text"]?></p>
                                                                                            </div>
                                                                                        </div>

                                                                                        <?php
  
  if($row["post_img"] != "")
  {
    echo '<div class="row">
                                                                                            <div class="col-md-6 col-md-offset-2">
                                                                                                    <img src="photos/'.$row["post_img"].'" class="image-thumnail img-responsive">
                                                                                            </div>
                                                                                        </div>';
  }
  ?>
                                                                                        
                                                                                    </div>
                                                                            </div>
                                                                      

                                                                      <?php
  endwhile;?>

                                                                      </div>

                                                                      
                                                                    
                                                                      <!-- Controls -->
                                                                      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                                        <span class="fa fa-angle-left"></span>
                                                                      </a>
                                                                      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                                        <span class="fa fa-angle-right"></span>
                                                                      </a>
                                                                </div>
                                                            </div> <!-- end carousel -->
                                                            
                                                        </div> <!-- end wrapper -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane text-center" id="following">
                                                <div class="row">
                                                        <div class="col-md-6 col-md-offset-3">
                                                           
                                                                    <div class="row" style="margin-left:20px;">
                                                                            <div class="col-md-7 col-xs-4">
                                                                                    <h6><button data-toggle="modal" data-target="#myModal" class="btn btn-simple"> Ali Danish</button><br /><small>Student</small></h6>
                                                                            </div>
                                                                        <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-2">
                                                                            <img src="assets/paper_img/flume.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                                        </div>
                                                                       
                                                                    </div>
                                                                
                                                                <hr/>
                                                                
                                                                    <div class="row" style="margin-left:20px;">
                                                                            <div class="col-md-7 col-xs-4">
                                                                                    <h6><button class="btn btn-simple" data-toggle="modal" data-target="#myModal">Roha Asad</button><br /><small>Student</small></h6>
                                                                            </div>
                                                                        <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-2">
                                                                            <img src="assets/paper_img/banks.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                                        </div>
                                                                        
                                                                    </div>

                                                                      <hr/>
                                                                    <?php
  //echo $id;
    $query = mysqli_query($con,"SELECT * FROM users WHERE id in (SELECT friend2 FROM friends WHERE  friend1 = '$id')") or die("could not find friends in database");
    while($row = mysqli_fetch_assoc($query)):
  ?>

                                                                    <div class="row" style="margin-left:20px;">
                                                                            <div class="col-md-7 col-xs-4">
                                                                                    <h6><button class="btn btn-simple" data-toggle="modal" data-target="#myModal">
                                                                                    <div id = "friend" data-id = "<?php echo $row["id"]?>" onclick = "set_id(this)">
                                                                                    <?php echo $row["name"]?>
                                                                                    </div>
                                                                                      
                                                                                    </button></h6>
                                                                            </div>
                                                                        <div class="col-md-2 col-md-offset-0 col-xs-3 col-xs-offset-2">
                                                                            <img src="assets/paper_img/banks.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                                                        </div>
                                                                        
                                                                    </div>

                                                                    <hr/>
  <?php
  endwhile;
  ?>


                                                                
                                                            
                                                        </div>
                                                    </div>
                                        </div>
                                        <div class="tab-pane text-center" id="notif">
                                          <div class="row">
                                            <div class="col-md-5 col-md-offset-3">
                                              <p><a class="btn btn-simple">Faseih Saad</a>send you a friend request &nbsp;<button class="btn btn-fill btn-info">Accept</button></p>
                                              <p id = "notifs"></p>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    
                                </div>        
                            </div>
                        </div>
                    </div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h6 class="modal-title" id="myModalLabel"></h6>
                                </div>
                                <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4" id="sender">
                                                <p>This is sender<span class="glyphicon glyphicon-chevron-left glyphicon-align-right"></span></p>
                                            </div>
                                            <div class="divider"></div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-5" id="recipient">
                                                    <p><span class="glyphicon glyphicon-chevron-right glyphicon-align-left"></span>&nbsp;This is recipient </p>
                                                </div>
                                                <div class="divider"></div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-4" id="sender">
                                                        <p>This is recipient<span class="glyphicon glyphicon-chevron-left glyphicon-align-right"></span> </p>
                                                    </div>
                                                    <div class="divider"></div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-5" id="recipient">
                                                            <p><span class="glyphicon glyphicon-chevron-right glyphicon-align-left"></span>&nbsp;This is recipient</p>
                                                        </div>
                                                        <div class="divider"></div>
                                                    </div>
                                                  <div id = "bla"></div>
                                                
                                        
                                </div>
                                <div class="modal-footer">
                                        <div class="form-group">
                                                <input type="text" value="" placeholder="Send Message" class="form-control send" id = "msg" onKeyPress="checkSubmit(event,this)"/>
                                        </div>
                                  <div class="divider"></div>
                                  
                                  <div>
                                      <button type="button" class="btn btn-danger btn-simple close" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
<script>

  var x = document.getElementById("user");
var user_id = x.getAttribute("data-id");
    gsdk.initPopovers();
    $("[data-toggle=modal]").click(function(){
        var name=$(this).text();
        $('#myModal h6').text(name);
    });
	

  $(document).ready(function(){
    $('#search').keyup(function(){
      var results = "";
      var searchField = $('#search').val();
      
      if(searchField != "")
      {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          
        var res = this.responseText;

        if(res != "")
        {
          $('#suggested_search').show();
          $('#suggested_search').html(res);
        }
        else
        {
          $('#suggested_search').show();
        }
        
        }
        };
        xhttp.open("GET", "search.php?user_id=" + user_id + "&sval=" + searchField, true);
        xhttp.send();
        
              
      }
      else
      {
        $('#suggested_search').hide();
        
      }
            
              
            }); 
        });


  var id = -1;
  function set_id(x)
{
  id = x.getAttribute("data-id");
}

function checkSubmit(e,x) {

   if(e && e.keyCode == 13) {

      console.log("oye");
        var message = document.getElementById("msg").value;
        document.getElementById("msg").value = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      //document.getElementById("test").innerHTML = this.responseText;
      }
      };
      xhttp.open("GET", "message.php?msg=" + message+"&id=" + id, true);
      xhttp.send();

   }
}


function show_message(x)
{
  if(id >= 0)
  {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("bla").innerHTML = this.responseText;
      //alert(this.responseText);
      }
      };
      xhttp.open("GET", "show_message.php?id=" + id, true);
      xhttp.send();
  }
  
}



function show_notifications()
{
  //alert();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);
        document.getElementById("notifs").innerHTML = this.responseText;
            }
      };
 
      xhttp.open("GET", "notifications.php?id="+user_id, true);
      xhttp.send();
}


function send_like(x)
{
  id = x.getAttribute("data-id");
  post_id = x.getAttribute("data-postid");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var res = this.responseText;
        if(res != 'liked')
        {
          document.getElementById("like"+post_id).innerHTML = "liked";
          var lm = parseInt(document.getElementById("numlike"+post_id).innerHTML);
          lm = lm + 1;
          document.getElementById("numlike"+post_id).innerHTML = lm;
        }
      }
           
      };
      xhttp.open("GET", "likes.php?id=" + id+"&post_id=" + post_id, true);
      xhttp.send();


      

}

setInterval(show_notifications,1000);
    setInterval(show_message,200);
</script>
</body>
</html>