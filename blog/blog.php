<?php
    include 'header.php';
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
    <title>blog-info</title>
</head>
<body>
    <div class="container">
        <?php 
        
        if ($b->rowCount() > 0)
        {
            $blog=$b->fetch(PDO::FETCH_OBJ)
            ?>
        <div class="title">
            <h1><?php echo $blog->title; ?></h1>
        </div>
        <div class="desc">
            <p><?php echo $blog->description; ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>