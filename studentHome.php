<?php
    session_start();
    include 'connection.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="chat.css" />
    <script src="main.js" lang="javascript"></script>
    <script>
    $( '.friend-drawer--onhover' ).on( 'click',  function() {
  
    $( '.chat-bubble' ).hide('slow').show('slow');
  
    });
    </script>
</head>
<body>

<?php

                
$user_id=$_SESSION['Identity'];
if(! empty( $_GET ))
{
    if(isset( $_GET['receiver_id']))
    {
      $receiver_id = $_GET['receiver_id'];  
    }
}
else
{
    $receiver_id = 201901;
}


$q="Select * from student where id=$user_id";
$res  = mysqli_query($link,$q)or die('Error querying database.');
$row = mysqli_fetch_assoc($res);

?>
<div class=" container-fluid">
        <div class="row no-gutters">
          <div class="col-md-4 border-right">
            <div class="settings-tray row">
              <div class="col">
              <img class="profile-image" src="$row['photo']" alt="Profile img">
              <span >
                <b>
                <?php echo $row['name']; ?>
                </b>
              </span>
              </div>
              <div class="col">
              <a href="logout.php">
                <input type="button" class="btn btn-outline-dark" value="Logout" style="width:80px">
              </a>
              </div> 
            </div>

            <div class="search-box">
              <div class="input-wrapper">
                <i class="material-icons">search</i>
                <input placeholder="Search here" type="text">
              </div>
            </div>

            <?php
            
            	$query="Select * from faculty";
            	$res  = mysqli_query($link,$query)or die('Error querying database.');
                if(mysqli_num_rows($res) > 0)
	            {
		            while ($row = mysqli_fetch_array($res))
		            {
            	
            ?>
            <a style="text-decoration:none;" href="studentHome.php?receiver_id=<?php echo $row["id"]; ?>" >
            <div class="friend-drawer friend-drawer--onhover">
              <img class="profile-image" src="<?php echo $row["photo"] ?>" alt="">
              <div class="text">
                <h6><?php echo $row["name"] ?></h6>
                <p class="text-muted"><?php echo $row["description"] ?></p>
              </div>
            </div>
            </a>
            <hr>
            <?php
		            }
	            }
            ?>
          </div>
          <div class="col-md-8">
            <div class="settings-tray">
                <div class="friend-drawer no-gutters friend-drawer--grey">
                <?php
                $query="Select * from faculty where id=$receiver_id";
                $res  = mysqli_query($link,$query)or die('Error querying database.');
                $row = mysqli_fetch_array($res);
                
                ?>
                <img class="profile-image" src="<?php echo $row["photo"] ?>" alt="">
                <div class="text">
                  <h6><?php echo $row["name"] ?></h6>
                </div>
                <span class="settings-tray--right">
                <a href="setDoubtSolved.php?receiverID=<?php echo $receiver_id;?>">
                <input type="button" class="btn btn-outline-dark" value="Solved    ">
                </a>                
                </span>
              </div>
            </div>
            <!-- Chat  Panel -->
            <div class="chat-panel">
            <div  style="overflow-y:none;">
                <div id="chats" style="overflow-x:hidden;overflow-y:auto;">

                </div>
             </div>
            </div>
         
              <div class="row">
                <div class="col-12">
                  <div class="chat-box-tray">
                   <form action="" method="POST">
                   <input type="text" name="message" placeholder="Type your message here...">
                   <button name="submit">
                      <i class="material-icons">send</i>
                   </button>
                   </form>

                   <?php
                   if(isset($_POST["submit"]))
                   {
                    if(!empty($_POST['message']))
                    {
                      $msg=$_POST['message'];
                      $sql = "INSERT INTO chats (sendersID, receiversID,message) VALUES ('$user_id','$receiver_id','$msg')";
                      if(mysqli_query($link, $sql))
                      {
                        $query="UPDATE chats 
                        SET isSolved=0 
                        where sendersID='$user_id' and receiversID='$receiver_id' 
                        or 
                        sendersID='$receiver_id' and receiversID='$user_id'";
                        $res  = mysqli_query($link,$query)or die('Error querying database.');


                      } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                      }
                      $msg='';
                    }
                   }

                   ?>
                   
                  <script type="text/javascript">
                  function chatRefresh(r_id)
                  {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() 
                    {
                      var data_changed = document.getElementById("chats").innerHTML.trim().localeCompare(this.responseText.trim());
                      if (this.readyState == 4 && this.status == 200 && this.responseText && data_changed == -1 ) 
                      {
                        document.getElementById("chats").innerHTML = this.responseText;
                      }
                    };
                    xhttp.open("GET", "std_process.php?receiverID="+r_id, true);
                    xhttp.send();
                  }
                    var r_id="<?php echo $receiver_id?>";
                    chatRefresh(r_id);


                    var myVar;
                    function myFunction() {
                      myVar = setInterval(alertFunc, 2500);
                    }
                    function alertFunc() {
                      var r_id="<?php echo $receiver_id?>";
                      chatRefresh(r_id);
                    }
                    myFunction();

                  </script>

                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
      </body>
      
      </html>