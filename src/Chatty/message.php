<?php

    /*
    *   Date:
    *   Author:
    *   Description:
    */

    // Initialize the session
    session_start();

    require_once "config.php";

    //input validation
    $errors = Array();

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
 
        if (isset($_POST['msg'])){
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

       
