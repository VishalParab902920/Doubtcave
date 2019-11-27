<?php 
include 'header.php';
include '../connection.php';
?>

       <!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reports <small>Details</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                
            

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reports<small>details</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        See Reports of student details.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Student</th>
                          <th>Reported by</th>
                          <th>Reason</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $q="Select * from reports";
                        $res  = mysqli_query($link,$q)or die('Error querying database.');
                        if(mysqli_num_rows($res) > 0)
	                      {
                          while ($row = mysqli_fetch_array($res))
                          {
                            $query_std="Select name from student where id=$row[student_id]";
                            $res_std  = mysqli_query($link,$query_std)or die('Error querying database.');
                            $row_std = mysqli_fetch_array($res_std);

                            $query_tr="Select name from faculty where id=$row[faculty_id]";
                            $res_tr  = mysqli_query($link,$query_tr)or die('Error querying database.');
                            $row_tr = mysqli_fetch_array($res_tr);
                            ?>
                            <tr>
                            <td><?php echo $row_std['name']; ?></td>
                            <td><?php echo $row_tr['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            </tr>
                            <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>

            </div>
           </div>
        </div>
            

<?php include('footer.php');?>