<?php
session_start();
if (isset($_SESSION['uid'])){
echo $_SESSION['uid'];
include '../dbdetails.php';


}
else{
    header("Location: http://localhost/h4c/psy-session/");
}
?>