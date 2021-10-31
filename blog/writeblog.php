<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wblog</title>
</head>
<body>
    <form action="writeblog.php" method="post">
        <label>Title</label><br>
        <input type="text" name="title" id="title"><br>
        <label>Content of the blog</label><br>
        <textarea name="desc" index="desc"></textarea>
        <button type="submit">Publish</button>
    </form>
</body>
</html>
<?php
    session_start();
    if (isset($_POST['desc']) && $_POST['title']){
    $uid=$_SESSION['uid'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    include '../dbdetails.php';
    $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
        $sql="INSERT INTO `blog` (`b_id`, `u_id`, `title`, `description`) VALUES (NULL, ?, ?, ?);" ;
        $q=$pdo->prepare($sql);
        $q->execute(array($uid,$title,$desc));
        header("Location: http://localhost/hackcbs4/psy-session/psy-dashboard.php");
}
?>