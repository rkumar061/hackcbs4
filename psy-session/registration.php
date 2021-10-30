<?php
    include 'header.php';
    $passmatch=1;
    if(isset($_POST['name']))
    {
    $name= $_POST['name'];
    $email=$_POST['email'];
    $mobno=$_POST['mob-no'];
    $pass1=$_POST['password'];
    $pass2=$_POST['password2'];
    $role=1;
    
    // echo $name.$mobno.$pass1.$pass2.$email.$role ;
    
    $host="mysql-55985-0.cloudclusters.net:17298";
    $user="admin";
    $password="9iYYKkqv";
    $database="h4c";

    $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
  
    if($pass1==$pass2){
        echo "pass matched";
        $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
        $sql="INSERT INTO `user` (`name`, `email`, `ph_no`, `pass`, `role`) VALUES (?,?,?,?,?);" ;
        $q=$pdo->prepare($sql);
        $q->execute(array($name,$email,$mobno,$pass1,$role));
        header("Location: http://localhost/h4c/psy-session/");
    }
    else{
        $passmatch = 0;
        
    }
    }
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="login.css"/>
    <link rel="stylesheet" href="fonts.css"/>
</head>
<body>
  <div class="login-box" style="font-family: 'Titillium Web', sans-serif;">
    <h2>Register<br></h2>
    
    <form action="registration.php" method="post">
    <div class="user-box">
        <input type="text" name="name" id="name" required>
        <label>Name</label>
    </div>
    <div class="user-box">
        <input type="email" name="email" id="email" required>
        <label>Email</label>
    </div>
    <div class="user-box">
        <input type="number" name="mob-no" id="mob-no" required>
        <label>Mobile Number</label>
    </div>
    <div class="user-box">
        <input type="password" name="password" id="password" required>
        <label>Password</label>
    </div>
    <div class="user-box">
        <input type="password" name="password2" id="password2" required>
        <label>Re-enter password</label>
    </div>
      <?php
      if($passmatch==0){
          echo "<h5>Passwords not matched</h5>";
      }
    ?>
      <button type="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </button>
    </form>
  </div>    

<br>
</body>
</html>