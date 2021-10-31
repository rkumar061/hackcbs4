
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addmission Form</title>
</head>
<body>
    <style>
    *{
    margin:0px;
    padding: 0px;
    

    }
    .container{
        max-width: 80%;
        color:rgb(228, 220, 220);
        background:white;
        padding:34px;
        margin:auto;
    }
    .container h1 {
        text-align: center;
        font-size: 43px;
    }
    .container p {
        text-align: center;
        font-size: 17px;
    }
    input {
        width:80%;
        margin: 9px;
        font-size: 14px;
        padding: 7px;
        border-radius: 10px;
    }
    textarea{
        width:80%;
        margin: 9px;
        font-size: 14px;
        padding: 7px;
        border-radius: 10px; 
    }
    form{
        display: flex;
        flex-direction: column;

    }
    .btn {
        border: floralwhite;
        border-radius: 12px;
        height: auto;
        width: 100px;
        padding: 12px;
        
    }
    </style>
    <?php
        session_start();  
        include 'header.php';
        include '../dbdetails.php';
    ?>  
    <section>
        <div class="container">
            <h1>APPLICATION FORM</h1>
            <p>Enter your details</p>

            <form action="application_form.php" method="post">
            <input type="text" name="age" id="age" placeholder="age" />
            <input type="text" name="email" id="name" placeholder="enter your email" />
            <input type="text" name="phone number" id="phno" placeholder="enter your emergency phone number">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="date" name="date" id="date">
            <input type="time" name="time" id="time">
            <textarea name="problem " id="problem" placeholder= "describe your problem" cols="30" rows="10"></textarea>
            <button class="btn" type="submit">submit</button>
            </form>
        </div>
    </section>
    
</body>
</html>
