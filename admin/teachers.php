<?php include('header.php');?>
<?php include('../connection.php');?>

       <!-- page content -->
       <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Teachers <small>Details</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                
            

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Teachers<small>details</small></h2>
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
                        See Teacher details.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Specialization</th>
                          <th>Photo</th>
                          <th>Password</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
          

                      <tbody>
                          
<?php
$query = 'SELECT * FROM faculty';
$res  = mysqli_query($link,$query)or die('Error querying database.');
if(mysqli_num_rows($res) > 0)
	{
		while ($row = mysqli_fetch_array($res))
		{
		
?>
                        <tr>
                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['description'];?></td>
                          <td><?php echo $row['specialization'];?></td>
                          <td>
				<img class="img-fluid rounded-circle w-50 mb-3" src="../<?php echo $row['photo'];?>" style="width:50px;height:50px;" alt="<?php echo $row['name'];?>" >
				</td>
				
                          <td><?php echo $row['password'];?></td>
                          <td><button class="btn btn-success">Edit</button></td>
                          
                          <td><a href='deleteteacher.php?del=<?php echo $row['id'];?>'><button class="btn btn-danger">Delete</button> </a></td>
                         
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