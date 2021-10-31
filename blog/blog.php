<?php
    include '../dbdetails.php';
    $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
           
      $b = $pdo->prepare('SELECT * FROM blog WHERE b_id = ?');
      $b->execute([$_GET['bid']]);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../psy-session/fonts.css"/>
    <title>blog-info</title>
</head>

<style>
    .container{
        display: flex;
        flex-direction: column;
        margin: 0px;
        padding: 10px 20px;
        background:rgba(0,0,0, 0.5);
        color: rgb(224,255,255);
        font-family: 'Noto Serif', serif;
    }

    .blog-title{
        font-family: inherit;
        font-weight: bold;
        color: inherit;
        font-size: 50px;
        text-transform:capitalize;
        text-align:center;

    }

    .blog-desc{
        font-family: 'Ubuntu', sans-serif;
        font-size:20px;
        font-weight:lighter;
        text-align:justify;

    }
 </style>   
<body>
    <?php include 'header.php' ?>
    <section class="container">
        <?php 
        
        if ($b->rowCount() > 0)
        {
            $blog=$b->fetch(PDO::FETCH_OBJ)
            ?>


        <div class="blog-title">
            <h1><?php echo $blog->title; ?></h1>
        </div>
        <div class="blog-desc">
            <p><?php echo $blog->content; ?></p>
        </div>


        
        <?php
        }
        ?>
    </section>
</body>
</html>