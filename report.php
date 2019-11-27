<?php
    session_start();
    include 'connection.php';

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
        $receiver_id = 2019450002;
    }
    $previous = $_SERVER['HTTP_REFERER'];
?>

<html>

    <head>
        <title>Report</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="chat.css" />
    <script src="main.js" lang="javascript"></script>

        
    </head>

    <style>
        #form{
            background: white;
            width: 80%;
            height: 90%;
            border:solid lightpink 1px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: bold;
            color: darkgray;
            text-shadow: 0 1px 2px rgba(black,.15);
        }       
        
        textarea {
            width:80%;
            height: 70%;
            border: solid cyan 1px;
            resize: none;
        }

    </style>


    <body style="background:whitesmoke;">
    <center>
        <div id="form">
        <form action="" method="POST">
            <label><h1>Write the reason for reporting the student</h1></label>
            <br>
            <center><textarea name="desc"></textarea></center>
            <br>
            <a href="facultyHome.php">
            <input type="button" class="btn btn-Danger" value="Close" name="Close" style="width:200px; height:50px; margin-right:100px;margin-top:20px;">
            </a>
            <input type="submit" class="btn btn-primary" value="Submit" name="submit" style="width:200px; height:50px; margin-left:100px;margin-top:20px;">
        </form>
        <div>
        </center>
    </body>


    <?php
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['desc']))
        {
            $desc=$_POST['desc'];
            $sql = "INSERT INTO reports (student_id, faculty_id,description) VALUES ('$receiver_id','$user_id','$desc')";
            if(mysqli_query($link, $sql))
            {
                echo "Records inserted successfully.";
                $msg='';
            } 
            else
            {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
            $msg='';
            header('Location:facultyHome.php');
        }
    }
    ?>
</html>
