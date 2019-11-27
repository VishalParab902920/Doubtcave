<?php 
include 'header.php';
include '../connection.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <a href="students.php">
                  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user aero"></i></div>
                  <div class="count">
                     <?php
                     $q="Select id from student";
                     $res  = mysqli_query($link,$q)or die('Error querying database.');
                     $rows=mysqli_num_rows($res); 
                     echo $rows; 
                     ?> 
                    </div>
                  <h3>Students</h3>
                </div>
              </div>
              </a>
              <a href="teachers.php">
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user green"></i></div>
                  <div class="count">
                  <?php
                     $q="Select id from faculty";
                     $res  = mysqli_query($link,$q)or die('Error querying database.');
                     $rows=mysqli_num_rows($res); 
                     echo $rows; 
                     ?> 
                  </div>
                  <h3>Teachers</h3>
                </div>
              </div>
              </a>
              <a href="reports.php">
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user blue"></i></div>
                  <div class="count">
                  <?php
                     $q="Select id from reports";
                     $res  = mysqli_query($link,$q)or die('Error querying database.');
                     $rows=mysqli_num_rows($res); 
                     echo $rows; 
                     ?> 
                  </div>
                  <h3>Reports</h3>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>

<?php include('footer.php');?>