<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wblog</title>
</head>
<style>
    .container {
	max-width:400px;
	width:100%;
	margin:0 auto;
	position:relative;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

#contact {
	background:#F9F9F9;
    padding:40px;
	margin:50px 0px;
}

#contact h3 {
	color: #F96;
	display: block;
	font-size: 30px;
	font-weight: 400;
}

#contact h4 {
	margin:5px 0 15px;
	display:block;
	font-size:13px;
}

fieldset {
	border: medium none !important;
	margin: 0 0 0;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
	border:1px solid #CCC;
	background:#FFF;
	margin:0 0 5px;
	padding:10px;
}

#contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
	-webkit-transition:border-color 0.3s ease-in-out;
	-moz-transition:border-color 0.3s ease-in-out;
	transition:border-color 0.3s ease-in-out;
	border:1px solid #AAA;
}

#contact textarea {
	height:100px;
	max-width:100%;
  resize:none;
}

#contact button[type="submit"] {
	cursor:pointer;
	border:none;
	background:#0CF;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	font-size:15px;
}

#contact button[type="submit"]:hover {
	background:#09C;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

#contact input:focus, #contact textarea:focus {
	outline:0;
	border:1px solid #999;
}
::-webkit-input-placeholder {
 color:#888;
}
:-moz-placeholder {
 color:#888;
}
::-moz-placeholder {
 color:#888;
}
:-ms-input-placeholder {
 color:#888;
}

</style>

<body>
    <?php include 'header.php' ?>
    <div class="container">  
  <form id="contact" action="writeblog.php" method="post">
    <h3>Write Your Blog</h3>
    <fieldset>
      <input name="title" placeholder="Title of your blog" type="text" tabindex="1" required>
    </fieldset>
    <fieldset>
    <fieldset>
      <input name="desc" placeholder="Add Description" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>
      <textarea name="content" placeholder="Type your blog.." tabindex="4" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Submit</button>
    </fieldset>
  </form>
 
  
</div>
</body>
</html>
<?php
    
    if (isset($_POST['content']) && $_POST['title']){
    $uid=$_SESSION['uid'];
    $title=$_POST['title'];
    $desc = $_POST['desc'];
    $content=$_POST['content'];
    include '../dbdetails.php';
    $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
        $sql="INSERT INTO `blog` (`b_id`, `u_id`, `title`, `description`, `content`) VALUES (NULL, ?, ?, ?, ?);" ;
        $q=$pdo->prepare($sql);
        $q->execute(array($uid,$title,$desc, $content));
}
?>