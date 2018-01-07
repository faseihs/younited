<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Fixed table header</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="csscpanel/style.css">

  <!-- Scripts -->
  <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
</head>

<body>
       <?php


//including the database connection file
include_once("database.php");
session_start();
//if(isset($_POST['submit'])) {    
   // $admin_name = $_POST['username'];
   // $admin_pass = $_POST['password'];
      // $admin_query="select * from Admin where username='$admin_name' AND password='$admin_pass'";  
  
    //$run_query=mysqli_query($con,$admin_query);
    //if(mysqli_num_rows($run_query)>0)  
    //{ 
$result = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC"); 
//}}
?>
    
  <section>
  <!--for demo wrap-->
  <h1>User Database</h1>
  <div class="tbl-header">
      <a href="add.html">Add New Data</a><br/><br/>
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <td>Name</td>
            <td>DOB</td>
            <td>Email</td>
            <td>Password</td>
            <td>Update</td>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        
        <tr>
            <?php 
        
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['dob']."</td>";
            echo "<td>".$res['email']."</td>"; 
            echo "<td>".$res['password']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<div>
        <h1>Server Stats</h1>
        <center>
        <p>Total Number of users are &nbsp;<span id="users"></span></p>
      
        <h1>Views Of Each Page</h1>
        <p>Total Total Views For login-form are &nbsp;<span id="login-views"></span></p>
        <p>Total Total Views For Signup are &nbsp;<span id="signup-views"></span></p>
        <p>Total Total Views For NewsFeed are &nbsp;<span id="newsfeed-views"></span></p>
        <p>Total Total Views For Profile are &nbsp;<span id="profile-views"></span></p>
        <p>Total Total Views For EditProfile are &nbsp;<span id="edit-views"></span></p>
        <h1> Page View Logs Logs</h1>
        <div id="logs"></div>
        
        </center>

</div>




  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
<script>
function update_users()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      }
      };
      xhttp.open("GET","no_of_users.php", true);
      xhttp.send();
}

function get_users()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("users").innerHTML = this.responseText;
      }
      };
      xhttp.open("GET","files/no_of_users.txt", true);
      xhttp.send();
}

function update_views(){
  var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      }
      };
      xhttp.open("GET","update_views.php", true);
      xhttp.send();
}

function get_views()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $json_data=JSON.parse(this.responseText);
        
        document.getElementById("login-views").innerHTML = $json_data['login-form.php'];
        document.getElementById("signup-views").innerHTML = $json_data['signup.php'];
        document.getElementById("newsfeed-views").innerHTML = $json_data['news_feed.php'];
        document.getElementById("profile-views").innerHTML = $json_data['profile.php'];
        document.getElementById("edit-views").innerHTML = $json_data['edit_profile.php'];

      }
      };
      xhttp.open("GET","files/no_of_views.json", true);
      xhttp.send();
}
function get_logs()
{
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var str=String(this.responseText);
        
        var splitted =str.split("\n");
        
        var output="";
        for(i in splitted){ 
        
        output+= "<p>"+splitted[i]+"</p>";
        }
        console.log(output);
        document.getElementById("logs").innerHTML = output;
      }
      };
      xhttp.open("GET","files/views.txt", true);
      xhttp.send();
}
setInterval(update_users,300);
setInterval(get_users,500);
setInterval(update_views,300);
setInterval(get_views,500);
setInterval(get_logs,500);
</script>
</body>
</html>
