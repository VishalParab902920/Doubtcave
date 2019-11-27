<?php
    session_start();
    include '../connection.php';

    if(! empty( $_GET ))
  {
      if(isset( $_GET['teacher_id']))
      {
        $teacher_id = $_GET['teacher_id'];  
      }
  }
?>

<html>

    <head>
        <title>Student Edit</title>

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
            color: black;
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

    <?php
    $query = "SELECT * FROM faculty where id=$teacher_id";
    $res  = mysqli_query($link,$query)or die('Error querying database.');
    $row=mysqli_fetch_assoc($res);
    ?>

    <center>
        <div id="form">
        <form action="" method="POST">
            <label><h1></h1></label>
            <br>
            <div>
            <h1><label>ID : <?php echo $row['id']; ?></label>
            <br>

            <label>Name : </label>
            <input type="text" name="name" placeholder="<?php echo $row['name']; ?>">
            <br>

            <label>Password : </label>
            <input type="text" name="pass" placeholder="<?php echo $row['password']; ?>">
            <br>
            </h1>
            </div>
            <a href="students.php">
            <input type="button" class="btn btn-Danger" value="Close" name="Close" style="width:200px; height:50px; margin-right:100px;margin-top:20px;">
            </a>
            <input type="submit" class="btn btn-primary" value="Save" name="submit" style="width:200px; height:50px; margin-left:100px;margin-top:20px;">
        </form>
        <div>
        </center>
    </body>


    <?php
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['name']) || !empty($_POST['pass']))
        {
            if(!empty($_POST['name']))
            {
                $name=$_POST['name'];
                $sql = "UPDATE faculty SET name='$name' where id ='$teacher_id'";
                if(mysqli_query($link, $sql))
                {
                    echo "Records inserted successfully.";
                    $name='';
                } 
                else
                {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                $name='';
            }
            
            if(!empty($_POST['pass']))
            {
                $pass=$_POST['pass'];
                $sql = "UPDATE faculty SET password='$pass' where id ='$teacher_id'";
                if(mysqli_query($link, $sql))
                {
                    echo "Records inserted successfully.";
                    $pass='';
                } 
                else
                {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                $pass='';
            }
            header('Location:teachers.php');
        }

    }
    ?>
</html>
