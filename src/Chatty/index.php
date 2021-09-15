<?php

    /*
    * Date: 2021-08-30  
    * Author: David Musa
    * Description: This file contains the HTML code.
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
    <title>Chatty</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<script>

function show_func(){
 
 var element = document.getElementById("chathist");
    element.scrollTop = element.scrollHeight;
  
 }

 </script>
  
<form id="myform" action="index.php" method="POST" >

<div class="inner_div" id="chathist">

<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "chatty";
    $con = new mysqli($host, $user, $pass, $db_name);
    
    $query = "SELECT * FROM chats";
    $run = $con->query($query);
    $i=0;
    
    while($row = $run->fetch_array()) :
    if($i==0){
    $i=5;
    $first=$row;
 ?>

 <?php echo $row['msg']; ?> <br/>

    <div>

        <?php echo $row['uname']; ?>,
            <?php echo $row['dt']; ?>

    </div>

<br/><br/>

<?php
    }
    else
    {
    if($row['uname']!=$first['uname'])
    {
?>

<?php echo $row['msg']; ?>

 <div>

  <?php echo $row['uname']; ?>,
        <?php echo $row['dt']; ?>

</div>

<br/><br/>

<?php

}
else
{

?>

<div>

    <?php echo $row['msg']; ?>
    <?php echo $row['uname']; ?>,
    <?php echo $row['dt']; ?>

</div>

<br/><br/>

<?php
}
}
endwhile;
?>

    <footer>

        <table>

            <tr>
            <th>
                <input  class="input1" type="text"
                        id="uname" name="uname"
                        placeholder="Name">
                </th>
                <th>
                    <textarea id="msg" name="msg"
                        rows='3' cols='50'
                        placeholder="Type your message">
                    </textarea></th>
                <th>
                    <input class="input2" type="submit"
                    id="submit" name="submit" value="send">
                </th>               
            </tr>

        </table> 

    </footer>

</main>   
</div>
 
</body>
</html>