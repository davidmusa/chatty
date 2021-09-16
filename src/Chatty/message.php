<?php
    $query = "SELECT * FROM chats LIMIT 1000";
    $exec = $link->query($query);

    $output = "";
    while ($row = $exec->fetch_array()) {
        $message = $row['msg'];
        $username = $row['uname'];
        $time = $row['dt'];
        $output .= "<br><div class='message'>[" . $time . "] " . $username . " > " . $message . "</div>";
    }

?>

