<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <style>
        .intro{
            color: #fff;
            text-align: center;
            font-size: 50dp;
            text-decoration: bold;
            font-family: "Century Gothic" ;
            background-color: #000;
            padding: 10px;
            /* box-shadow: ; */

        }
    </style>
</head>
<body>
    <div class="intro">
        <?php
            include 'dbdetails.php';
            $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
            echo "connection established succesfully"."<br>";

        ?>
        
    </div>
</body>
</html>