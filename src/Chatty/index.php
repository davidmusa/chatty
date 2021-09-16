<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains code.
    */

    // Include config file
    require_once "config.php";
    require_once "message.php";

    // Initialize the session
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

        <div id="chathist">
            <?php
                echo $output;
            ?>
        </div>

        <form>
            <label for="username">Username</label>
            <input type="text" name="username"><br><br>
            <label for="message">Message</label>
            <input type="text" name="message"><br><br>
            <button style="height: 30px; width: 80px;" onclick="get_message()">Send</button>
        </form>

        <script>

        function get_message() {

            var loader = '<div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
            document.getElementById("chathist").innerHTML = loader;

            var q_username = document.getElementById("username");
            var q_message = document.getElementById("message");

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("chathist").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "message.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("submit=true&username=" + q_username + "&message=" + q_message);
        }

    </script>

    </body>
</html>