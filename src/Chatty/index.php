<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains the HTML file.
    */

session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="chatlog">
        
    </div>
    <div id="userinput">
        <input type="text" id="uname" name="uname" placeholder="Name"></input>
        <input type="text" id="msg" name="msg" placeholder="Message"></input>
        <input type="submit">
    </div>
</body>
</html>