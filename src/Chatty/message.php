<?php

    /*
    *   Date:
    *   Author:
    *   Description:
    */

    //1. INPUT
    //2. VALIDATE INPUT
    //3. BUSINESS LOGIC
    //4. OUTPUT

    require_once "config.php";

    //input validation
    $errors = Array();

    if(isset($_POST['submit'])){

        $username= mysqli_real_escape_string(
            $link, $_REQUEST['uname']);
        $message = mysqli_real_escape_string(
            $link, $_REQUEST['msg']);
        date_default_timezone_set('America/Toronto');
            $time_date=date('y-m-d h:ia');
        
    $sql = "INSERT INTO chats (uname, msg, dt) VALUES ('$username', '$message', '$time_date')";
    if(mysqli_query($link, $sql)){
        ;
    } else{
        echo "ERROR: Message not sent!!!";
    }
     // Close connection
    mysqli_close($link);

    }

    $query = "SELECT * FROM chats ORDER BY dt DESC LIMIT 100";
    $exec = $link->query($query);

    $output = "";
    while ($row = $exec->fetch_array()) {
        $message = $row['msg'];
        $username = $row['uname'];
        $time = $row['dt'];
        $output .= "<br><div class='message'>[" . $time . "] " . $username . " > " . $message . "</div>";
    }

    if(isset($_POST)) {
        if(isset($_POST['uname'])) {
            $username = htmlspecialchars($_POST['uname']);
            if (empty($username)) {
            } else {
                $errors[] = "Please write your name";
            } 
            } else {
            $errors [] = "You did not submit anything";
            }

        if (isset($_POST['msg'])) {
            $message = htmlspecialchars($_POST['msg']);
            if (empty($message)) {
            } else {
                    $errors[] = "Please write your message";
            }
            } else {
            $errors [] = "You did not submit anything";
            }
    }

?>

       
