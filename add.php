<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("database.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
        
    // checking empty fields
    if(empty($name) || empty($dob) || empty($email)|| empty($password))  {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($dob)) {
            echo "<font color='red'>Date of Birth field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
       // $result = mysqli_query($con, "INSERT INTO users(name,dob,email,password) VALUES('$name','$dob','$email', '$password')");
        $result = mysqli_query($con, "INSERT INTO users(name,email,dob,password,active) VALUES('$name','$email','$dob', '$password',0)");
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='cpanel.php'>View Result</a>";
      


    }
}
?>
</body>
</html>