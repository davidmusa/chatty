<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains code.
    */

// Initialize the session
session_start();

// Include config file
require_once "config.php";

if (isset($_POST['submit'])){
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. "
          . mysqli_connect_error());
}
  
// Escape user inputs for security
$un= mysqli_real_escape_string(
      $link, $_REQUEST['uname']);
$m = mysqli_real_escape_string(
      $link, $_REQUEST['msg']);
date_default_timezone_set('America/Toronto');
$ts=date('y-m-d h:ia');
  
// Attempt insert query execution
$sql = "INSERT INTO chats (uname, msg, dt)
        VALUES ('$un', '$m', '$ts')";
if(mysqli_query($link, $sql)){
    ;
} else{
    echo "ERROR: Message not sent!!!";
}
 // Close connection
mysqli_close($link);
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
<body>
    
</body>
</html>