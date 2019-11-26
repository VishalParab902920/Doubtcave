<?php
session_start();
include 'connection.php';

$user_id=$_SESSION['Identity'];
$receiver_id = $_REQUEST["receiverID"];

$query="UPDATE chats 
                    SET isSolved=1 
                    where sendersID='$user_id' and receiversID='$receiver_id' 
                    or 
                    sendersID='$receiver_id' and receiversID='$user_id'";
                    $res  = mysqli_query($link,$query)or die('Error querying database.');
                    if(strlen($user_id)==10)
                    {
                        header("Location: studentHome.php");
                    }
                    else if(strlen($user_id)==6)
                    {
                        header("Location: facultyHome.php");
                    }
?>