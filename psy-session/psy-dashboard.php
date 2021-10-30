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
    .content-wrap{
      padding-left:10px;
      padding-right:10px;
      margin:0px;
    }

    .psy-table{
      width:100%;
      align: center;
      background: none;
      border: 0px;
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;

    }

    .psy-table thead{
      background-color: rgba(0,0,0,0.5);
      color: rgb(224,255,255);
      text-align: center;
      font-family: 'Ubuntu', sans-serif;
      font-size:18px;
    }

    .psy-table th{
      padding-left: 15px;
      padding-right: 15px;
      padding-top: 10px;
      margin:0px;
    }

    .psy-table tbody{
       background-color: rgba(0,0,0, 0.7);
       color: rgb(224,255,255);
       text-align: center;
       font-family: 'Ubuntu', sans-serif;
       font-size: 15px;
    }

    .psy-table td{
     padding-left: 15px;
      padding-right: 15px;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .psy-table-schedule-date{
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .psy-table-report{
      text-align:center;
    }

    .psy-table-btn{
      background:rgb(224,255,255);
      color: rgba(0,0,0,1);
      padding: 6px;
      border-radius:0px;
      border: none;
      transition: 0.3s;
      font-family: inherit;
      font-weight:bold;
    }

    .psy-table-btn:hover{
      background:none;
      color: rgb(224,255,255);
      padding: 6px;
      font-weight: bold;
      border-radius: 15px;
      border: 3px solid rgb(224,255,255); 
      font-family: inherit;
    }

</style>
<body>
<?php
  include 'header.php';
  ?>  


<section class="profile-wrap">
    <div>
        <?php
          $host="mysql-55985-0.cloudclusters.net:17298";
          $user="admin";
          $password="9iYYKkqv";
          $database="h4c";
          $u_id = 100 ;
          $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
          $psy = $pdo->prepare('SELECT * FROM psy WHERE u_id = ?');
          $psy->execute([$_SESSION['uid']]);
          // $psy->execute([$psy]);
          $psydetails=$psy->fetch(PDO::FETCH_OBJ);
          

          
        ?>
        <span class="profile-wrapper-name"><?php echo $psydetails->PsyName ?></span>
         <br><span class="profile-wrapper-certificates"><?php echo $psydetails->degree ?><br> <?php echo $psydetails->specialities ?> </span>
    </div>
</section>
<section class="content-wrap">
<table class="psy-table" cellspacing="0px">
 	<thead>
 		<tr>
 			<th><h1>Patient Name</h1></th>
       <th><h1>Remarks</h1></th>
 			<th><h1>Reports</h1></th>
 			<th><h1>Schedule</h1></th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
       <!-- Requires Backend Job -->
 			<td class="psy-table-patient-name">Sonia Gandhi</td>
       <td class="psy-table-remark">Pappu Ki Maa</td>
 			<td class="psy-table-report"><button class="psy-table-btn">Reports</button></td>
 			<td class="psy-table-schedule-date"><span>11/12/2013</span><button class="psy-table-btn">Join Now</button></td>
 		</tr>
 	</tbody>
 </table>
</section>
</body>
</html>