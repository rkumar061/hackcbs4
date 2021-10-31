<?php
    include 'header.php';
    include '../dbdetails.php';
    $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
           
      $b = $pdo->prepare('SELECT * FROM blog');
      $b->execute();
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
</head>
<body>
    <div class="container">
        <?php 
        if ($b->rowCount() > 0)
        { 
          while($blogs=$b->fetch(PDO::FETCH_OBJ))
          {
        ?>
        <div class="blog">
                <a href="blog.php?bid=<?php echo $blogs->b_id; ?>" style="color:black;"> <h1><?php echo $blogs->title; ?></h1></a>
            </div>
            <?php
          }}
          ?>
        </div>
    </div>
</body>
</html>