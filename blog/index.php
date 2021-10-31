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
    <link rel="stylesheet/less" type="text/css" href="blog.less" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/4.1.2/less.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/4.1.2/less.min.js" integrity="sha512-eXBn7AaMbUOWb3PSDhwcjByoM89FeO1SF9Jww6kqPYQkBrGZvqAKFbtqLHh5O95rYA/AOtWZ0QRO2S6rP+KsUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>blog</title>
</head>
<body>
    <div class="container">
      <ul class="cards">
          <?php 
          if ($b->rowCount() > 0)
          { 
            while($blogs=$b->fetch(PDO::FETCH_OBJ))
            {
          ?>
              <li class="cards__item">
                  <div class="card">
                    <div class="card__image" style="background-image: url('https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80');"></div>
                      <div class="card__content">
                      <div class="card__title"><?php echo $blogs->title ?></div>
                      <p class="card__text"><?php echo $blogs->description ?></p>
                      <button class="btn btn--block card__btn"><a href="blog.php?bid=<?php echo $blogs->b_id;?>" style="color: #000; font-family: 'Roboto','Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: bold;">READ MORE</a></button>
                    </div>
                  </div>
              </li>
              <?php
            }}
            ?>
        </ul>
    </div>
</body>
</html>