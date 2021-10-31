<?php
session_start();
if (isset($_SESSION['uid'])){


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .profile-wrapper{
        margin:0px;
        display: flex;
        justify-content: space-between;
        align-items:center;
        padding:40px;
        font-family: 'Ubuntu', sans-serif;
        color: rgb(224,255,255);
    }

    .patient-name{
        font-size:50px;
        font-weight: medium;
    }

    .patient-id{
        padding-top:4px;
    }

    .profile-btn-wrapper{
        width: 25%;
        display:flex;
        justify-content: space-between;
        align-items:center;
        font-family: inherit;
    }

    .meetings-btn{
      background:rgb(224,255,255);
      color: rgba(0,0,0,1);
      padding: 15px;
      border-radius:15px;
      border: none;
      transition: 0.3s;
      font-family: inherit;
      font-weight:bold;
      font-size: 18px;
    }

    .meetings-btn:hover{
        background:none;
      color: rgb(224,255,255);
      padding: 15px;
      font-weight: bold;
      border-radius: 30px;
      border: 3px solid rgb(224,255,255); 
      font-family: inherit;
      font-size: 18px;

    }

    .anchor-btn{
      margin: 0px;
      padding: 0px;
      font-family: inherit;
      text-decoration: none;
      color: inherit;
    }

    .content-wrapper{
      padding-left:10px;
      padding-right:10px;
      margin:0px;
    }

    .table-general{
        width:100%;
        align: center;
        background: none;
        border: 0px;
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .table-general thead{
        background-color: rgba(0,0,0,0.5);
        color: rgb(224,255,255);
        text-align: center;
        font-family: 'Ubuntu', sans-serif;
        font-size:18px;
    }

    .table-general th{
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        margin:0px; 
    }

    .table-general tbody{
        background-color: rgba(0,0,0, 0.7);
        color: rgb(224,255,255);
        text-align: center;
        font-family: 'Ubuntu', sans-serif;
        font-size: 15px;
    }

    .table-general td{
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .table-p-btn{
      background:rgb(224,255,255);
      color: rgba(0,0,0,1);
      padding: 6px;
      border-radius:0px;
      border: none;
      transition: 0.3s;
      font-family: inherit;
      font-weight:bold;
    }

    .table-p-btn:hover{
      background:none;
      color: rgb(224,255,255);
      padding: 6px;
      font-weight: bold;
      border-radius: 15px;
      border: 3px solid rgb(224,255,255); 
      font-family: inherit;
    }

    .table-header{
        font-family:'Ubuntu', sans-serif;
        font-size: 25px;
        font-weight:medium;
        color: rgb(224,255,255);
    }

</style>

<body>
    <?php 
        include 'header.php';
        include '../dbdetails.php';
        $pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password);
        
        $s = $pdo->prepare('SELECT * FROM session WHERE p_id = ? && done=0');
        $s->execute([$_SESSION['uid']]);
        // $nsession=$s->fetch(PDO::FETCH_OBJ);

    ?>

    <section class="profile-wrapper">
        <div>
            <span class="patient-name"><?Php echo 'Hello, '.$result->name;?></span><br><br>
            <!-- <span class="patient-id">Your : 12</span> -->
        </div>
        <div class="profile-btn-wrapper">
            <button class="meetings-btn new-application"><a class="anchor-btn" href="#">New Application</a></button>
        </div>
</section>
<section class="content-wrapper">
<section>
    <br><br><span class="table-header">Active Sessions</span><br><br>
    <table cellspacing="0px" class="table-general current-session-table">
        <thead>
            <tr>
                <th><h1>Psychologist Name</h1></th>
                <th><h1>Problem</h1></th>
                <th><h1>Remarks</h1></th>
                <th><h1>Schedule</h1></th>
                <th><h1>Meeting Link</h1></th>
            </tr>
        </thead>
        <tbody><?php
        if ($s->rowCount() > 0)
      { 
          while($nsession=$s->fetch(PDO::FETCH_OBJ))
          {
            $psy = $pdo->prepare('SELECT * FROM user WHERE u_id = ?');
            $psy->execute([$nsession->psy_id]);
            $psyname=$psy->fetch(PDO::FETCH_OBJ);

            $p = $pdo->prepare('SELECT * FROM patient WHERE u_id = ?');
            $p->execute([$_SESSION['uid']]);
            $pdetail=$p->fetch(PDO::FETCH_OBJ);
            ?>
            <tr>
                <td class="table-psy-name"><?Php echo $psyname->name;?></td>
                <td class="table-p-problem"><?Php echo $pdetail->problem;?></td>
                <td class="table-psy-remarks"><?Php echo $nsession->remark;?></td>
                <td class="table-session-schedule"><?Php echo $nsession->date;?></td>
                <td class="table-meeting-link"><button class="table-p-btn"><a href="<?Php echo $nsession->link;?>" class="anchor-btn">Join Now</a></button></td>
            </tr>
            <?php
        }}?>
        </tbody>
    </table>
</section>
<br><br><span class="table-header">Old Sessions</span><br><br>
<section>
    <table cellspacing="0px" class="table-general old-session-table">
        <thead>
            <tr>
                <th><h1>Psychologist Name</h1></th>
                <th><h1>Problem</h1></th>
                <th><h1>Remarks</h1></th>
                <th><h1>Schedule</h1></th>
                <th><h1>Reports</h1></th>
            </tr>
        </thead> 
        <tbody>
        <?php
        $so = $pdo->prepare('SELECT * FROM session WHERE p_id = ? && done=1');
        $so->execute([$_SESSION['uid']]);
        if ($so->rowCount() > 0)
      { 
        //   echo 'old session';
          while($osession=$so->fetch(PDO::FETCH_OBJ))
          {
            $psy = $pdo->prepare('SELECT * FROM user WHERE u_id = ?');
            $psy->execute([$osession->psy_id]);
            $psyname=$psy->fetch(PDO::FETCH_OBJ);

            $p = $pdo->prepare('SELECT * FROM patient WHERE u_id = ?');
            $p->execute([$_SESSION['uid']]);
            $pdetail=$p->fetch(PDO::FETCH_OBJ);
            ?>
            <tr>
                <td class="table-psy-name"><?Php echo $psyname->name;?></td>
                <td class="table-p-problem"><?Php echo $pdetail->problem;?></td>
                <td class="table-psy-remarks"><?Php echo $osession->remark;?></td>
                <td class="table-session-schedule"><?Php echo $osession->date;?></td>
                <td class="table-meeting-link"><button class="table-p-btn"><a href="<?Php echo 'report.php?sid='.$osession->s_id;?>" class="anchor-btn">view report</a></button></td>
            </tr>
            <?php
        }}?>
        </tbody> 
    </table>
</section>
</section>     
</body>
</html>
