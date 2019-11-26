<?php
session_start();

 if(isset($_POST["std_submit"]))
 {
$con = mysqli_connect('localhost','root','','id11382069_doubtcave');
$id =$_POST['std_uid'];
$pass = $_POST['std_pass'];
$q = "select * from student where id = '$id' and password ='$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if($num == 1)
{  
    $temp=$row["name"];
    $_SESSION['Name'] = $temp;
   $_SESSION['Identity'] = $id;
	header('Location:faculty.php');
}
else
{
	header('location: SignIn.php'); 
}
}

if(isset($_POST["tr_submit"]))
{
$con = mysqli_connect('localhost','root','','id11382069_doubtcave');
$id =$_POST['tr_uid'];
$pass = $_POST['tr_pass'];
$q = "select * from faculty where id = '$id' and password ='$pass'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if($num == 1)
{  
   $temp=$row["name"];
   $_SESSION['Name'] = $temp;
  $_SESSION['Identity'] = $id;
   header('Location:facultyHome.php');
}
else
{
   header('location: SignIn.php'); 
}
}

?>
<!doctype html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>DoubtCave</title>
</head>

<body background="images/bg.jpg" style="background-repeat: repeat; background-size: 500px;">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        function validateSTDForm() {
            var x = document.forms["std_SignIn_Form"]["uid"].value;
            var y = document.forms["std_SignIn_Form"]["pass"].value;
            if (x == "" || y == "") {
                alert("Fill out the details correctly");
                return false;
            }
        }

        function validateTRForm() {
            var x = document.forms["tr_SignIn_Form"]["uid"].value;
            var y = document.forms["tr_SignIn_Form"]["pass"].value;
            if (x == "" || y == "") {
                alert("Fill out the details correctly");
                return false;
            }
        }
    </script>


    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images\DoubtCave_Logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Doubtcave
        </a>
    </nav>

    <div class="container">
        <div class="row" style="margin-top: 150px;">
            <div class="col-md-6">
                <div class="SignInBox">

                    <p style="font-size: 25px; font-weight: 60;">Student</p>
                    <form name="std_SignIn_Form" method="POST"  onsubmit="return validateSTDForm()">
                        <div>
                            <input type=text name="std_uid" placeholder="ID" class="SignIn_input">
                        </div>
                        <div>
                            <input type="password" name="std_pass" placeholder="Password" class="SignIn_input">
                        </div>
                        <button type="submit" class="btn btn-outline-info" name="std_submit" style="margin-top: 20px;">
                        Sign In
                    </button>

                    </form>
                  
                </div>
            </div>
            <div class="col-md-6">
                <div class="SignInBox">
                    <p style="font-size: 25px; font-weight: 60;">Faculty</p>
                    <form name="tr_SignIn_Form" method="POST" onsubmit="return validateTRForm()">
                        <div>
                            <input type=text name="tr_uid" placeholder=" Uid " class="SignIn_input">
                        </div>
                        <div>
                            <input type="password" name="tr_pass" placeholder="Password" class="SignIn_input">
                        </div>

                        <button type="submit" class="btn btn-outline-info" name="tr_submit" style="margin-top: 20px;">
                        Sign In
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>