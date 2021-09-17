<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains code.
    */

    // Include config file
    require_once "config.php";
    require_once "message.php";
    
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chatty</title>
            <link rel="stylesheet" href="styles.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
    <body>

        <div id="chathist">
            <?php
                $query = "SELECT * FROM chats ORDER BY dt DESC LIMIT 100";
                $exec = $link->query($query);
                while ($row = $exec->fetch_array()){
                    echo $output;
                }
            ?>
        </div>

        <form>
            <label for="username">Username</label>
            <input type="text" name="username"><br><br>
            <label for="message">Message</label>
            <input type="text" name="message"><br><br>
            <button style="height: 30px; width: 80px;" id="btn">Send</button>
        </form>

        <script>
            $(document).ready(function(){
                $("btn").click(function(){
                    $("#chathist").load("message.php");
                });
            });    
        </script>

    </body>
</html>