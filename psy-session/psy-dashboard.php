<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="fonts.css"/>
    <title>Document</title>
</head>
<style>
    body{
        margin: 0px;
    }

    .profile-wrap{
        padding: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-family: 'Ubuntu', sans-serif;
        background: linear-gradient(rgba(0,0,0, 0.8), rgba(255,255,255,0) 80%);
        color: rgb(224,255,255);
    }

    .profile-wrapper-name{
        font-size:50px;
        font-weight: medium;
    }

table{
    padding-left:40px;
    padding-right:40px;
    font-family: 'Courgette', cursive;
    table-layout: fixed;
}
.tbl-header{
    background: rgba(255,255,255,0.2);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 20px;
  color: #fff;
  
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
<script>
    $(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
<body>
    <?php
    session_start();
    include 'header.php';

    ?>

<section class="profile-wrap">
    <div>
        <span class="profile-wrapper-name"><?php echo $result->name; ?></span>
        <?php
          $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
          // echo "connection established succesfully"."<br>";
          
          $psy = $pdo->prepare('SELECT * FROM psy WHERE u_id = ?');
          $psy->execute([$_SESSION['uid']]);
          $psydetails=$psy->fetch(PDO::FETCH_OBJ)
        ?>
        <br><span class="profile-wrapper-certificates"> <?php echo $psydetails->degree.'<br>'.$psydetails->specialities ?></span>
    </div>
</section>
<section class="content-wrap">
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead><br><h3 style="text-align:center;color:#fff;">Upcoming Meetings</h3>
       
        <tr>
          <th>Patient Name</th>
          <th>Schedule</th>
          <th>remark</th>
          <th></th>
        </tr>
       
      </thead>
      
      <tbody>
        
     
        <?php
        include '../dbdetails.php';
      $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
      // echo "connection established succesfully"."<br>";
      
      $q = $pdo->prepare('SELECT * FROM patient WHERE psy_id = ? && status=0');
      $q->execute([$_SESSION['uid']]);
      // $result=$q->fetch(PDO::FETCH_OBJ);
      if ($q->rowCount() > 0)
      { 
        while($pdetails=$q->fetch(PDO::FETCH_OBJ))
        {
          $p = $pdo->prepare('SELECT * FROM user WHERE u_id = ?');
          $p->execute([$pdetails->p_id]);
          $pname=$p->fetch(PDO::FETCH_OBJ);

          $s = $pdo->prepare('SELECT * FROM session WHERE patient_id = ? && done=0');
          $s->execute([$pdetails->p_id]);
          $session=$s->fetch(PDO::FETCH_OBJ)
        ?>
         <tr>
        <th><?php echo  $pname->name; ?></th>
      <th><?php echo  $session->date.' | '.$session->time; ?></th>
      <th><?php echo  $session->remark; ?></th>
      <th><a href="<?php echo 'report.php?pid='.$session->patient_id; ?>">view report</a></th>
      <th><a href="<?php echo $session->link; ?>">join meeting</a></th>
      </tr>
      <?php
        }
      }
      ?>
      </tbody>
    </table>
  </div>
</section>
</body>
</html>