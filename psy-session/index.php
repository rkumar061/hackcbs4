
<?php
session_start();
include '../dbdetails.php';
include 'header.php';
if(isset($_POST['email'])){
 $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
// echo "connection established succesfully"."<br>";
$email = $_POST["email"];
$pass=$_POST["pass"];

$q = $pdo->prepare('SELECT * FROM user WHERE email = ? && pass=?');
$q->execute([$email,$pass]);
$result=$q->fetch(PDO::FETCH_OBJ);
if ($q->rowCount() > 0)
{


$role=$result->role;
$_SESSION['uid']=$result->u_id;

    if($role==1){
        header("Location: http://localhost/hackcbs4/psy-session/patient-dashboard.php");
    }
    else if($role==2){
        header("Location: http://localhost/hackcbs4/psy-session/psy-dashboard.php");
    }
    
   

} 
else {

echo "<label> incorrect password</label>";
 
   
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="fonts.css">
    <title>Document</title>
</head>
<body>

  <div class="login-box" style="font-family: 'Titillium Web', sans-serif;">
    <h2>Login</h2>
    <form action="index.php" method="post">
      <div class="user-box">
        <input type="text" name="email" required>
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" name="pass" required>
        <label>Password</label>
      </div>
      <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </button>
    </form>
</div> 

</body>
</html>
