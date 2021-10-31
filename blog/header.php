<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../psy-session/login.css"/>
    <link rel="stylesheet" type="text/css" href="../psy-session/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="../psy-session/body.css"/>
</head>
<style>

.header{
    background: linear-gradient(90deg, rgb(224, 255, 255) 30%,60%, rgb(6, 19, 31) 80%);
    margin: 0px;
    padding-left:20px;
    padding-top:15px;
    padding-bottom:15px;
    padding-right:20px;
    display: flex;
    justify-content:space-between;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    

}
img{
    height: 5rem;
}

.nav-banner{
    margin-top:auto;
    margin-bottom:auto;
    display:flex;
    justify-content: space-between;
    align-items: center;

}

.nav-item {
    letter-spacing:3px;
    font-size:15px;
    font-family: 'Titillium Web', sans-serif;
    font-weight:bold;
    color: white;
    text-decoration:none;
    padding: 12px;
}
a{
  text-decoration: none;
  color: white;
}

.nav-banner button span {
    position: absolute;
    display: block;
  }

.nav-banner form button {
    position: relative;
    display: inline-block;
    background: none;
    border: none;
    color: #03e9f4;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    letter-spacing: 4px;
  }
  
  .nav-banner button:hover {
    background: #03e9f4;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
  }
  
  .nav-banner button span:nth-child(1) {
    top: 0;
    left: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #03e9f4);
    animation: btn-anim1 1s linear infinite;
  }
  
  @keyframes btn-anim1 {
    0% {
      left: -100%;
    }
    50%,100% {
      left: 100%;
    }
  }
  
  .nav-banner button span:nth-child(2) {
    top: -100%;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #03e9f4);
    animation: btn-anim2 1s linear infinite;
    animation-delay: .25s
  }
  
  @keyframes btn-anim2 {
    0% {
      top: -100%;
    }
    50%,100% {
      top: 100%;
    }
  }
  
  .nav-banner button span:nth-child(3) {
    bottom: 0;
    right: -100%;
    width: 100%;
    height: 2px;
    background: linear-gradient(270deg, transparent, #03e9f4);
    animation: btn-anim3 1s linear infinite;
    animation-delay: .5s
  }
  
  @keyframes btn-anim3 {
    0% {
      right: -100%;
    }
    50%,100% {
      right: 100%;
    }
  }
  
  .nav-banner button span:nth-child(4) {
    bottom: -100%;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(360deg, transparent, #03e9f4);
    animation: btn-anim4 1s linear infinite;
    animation-delay: .75s
  }
  
  @keyframes btn-anim4 {
    0% {
      bottom: -100%;
    }
    50%,100% {
      bottom: 100%;
    }
  }

</style>
<body>
    <header class="header">
        <div class="logo-banner">
            <img src="../imgs/logo.png" alt=""/>
        </div>
        <?php 
       
        ?>
        <div class="nav-banner">
            <div>
              <?php
              if(isset($_SESSION['uid'])){
                
                include '../dbdetails.php';
                $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
                // echo "connection established succesfully"."<br>";
                

                $q = $pdo->prepare('SELECT * FROM user WHERE u_id = ?');
                $q->execute([$_SESSION['uid']]);
                $result=$q->fetch(PDO::FETCH_OBJ);
                ?>
                <span class="nav-item"><?php echo $result->name; ?></span>
              <?php }
              else{
                ?>
                  <span class="nav-item"><a href="#">Login</a></span>
                  <span class="nav-item"><a href="#">Register</a></span>
                  <?php
              }
              ?>
            </div>
            <div>
                <form  action="#">
                    <button class="nav-item" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Contact Us
                    </button>
                </form>
            </div>
            
        </div>
    </header>    
</body>
</html>