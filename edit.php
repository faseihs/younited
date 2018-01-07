<?php
// including the database connection file
include_once("database.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];  
    $password=$_POST['password'];
    
    // checking empty fields
    if(empty($name) || empty($dob) || empty($email)|| empty($password)) {            
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
            echo "<font color='red'>Password is empty.</font><br/>";
        }
    } else {    
        //updating the table
        $result = mysqli_query($con, "UPDATE users SET name='$name',dob='$dob',email='$email', password='$password' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: cpanel.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $dob = $res['dob'];
    $email = $res['email'];
    $password = $res['password'];
}
?>
<html>
   
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="cpanel.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>DOB</td>
                <td><input type="date" name="dob" value="<?php echo $dob;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>