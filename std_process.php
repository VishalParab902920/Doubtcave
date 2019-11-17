<?php

session_start();

$user_id=$_SESSION['Identity'];
$receiver_id = $_REQUEST["receiverID"];

$link  = mysqli_connect('localhost','root','','id11382069_doubtcave')or die('Error connecting to MySQL server.');

$query="Select * from chats where sendersId='$user_id' and receiversID='$receiver_id' or sendersId='$receiver_id' and receiversID='$user_id'" ;
$res  = mysqli_query($link,$query)or die('Error querying database.');

if(mysqli_num_rows($res) > 0)
{
    while ($row = mysqli_fetch_array($res))
    {
        if(strlen($row["sendersID"])==6)
        {
echo "
<div class='row no-gutters>
<div class='col-md-3'>
  <div class='chat-bubble chat-bubble--left'>
"
.$row["message"].
"
  </div>
</div>
</div>
";

    }
    else if(strlen($row["sendersID"])==10)
    {
echo "
<div class='row no-gutters'>
<div class='col-md-3 offset-md-9'>
  <div class='chat-bubble chat-bubble--right'>
  "
.$row["message"].
"
  </div>
</div>
</div>
";
        }
    }
}

?>