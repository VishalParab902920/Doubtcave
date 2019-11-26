<?php include'../connection.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
</head>
<?php include 'header.php';?>

	<body id="LoginForm">
		
           
 </form>
	
		
 	 
		
	
	<div class="container padding">
        
        	<div class="panel text-center">
        		<div class="panel-heading">
        			<h3> Insert Product</h3>
			 			</div>
			 			
			 			
			    		<form action="" role="form" method="post" enctype="multipart/form-data">
			    				
			    					<h6>Name:</h6>
									<div class="form-group">
			                			<input type="text" name="name"  placeholder="Name" required="required">
			    				</div>
			    					<div class="form-group">	
			    						<select name="category"  placeholder="Category" required="required">
			    							<option>student</option>
			    							<option>teacher</option>
			    						</select>
			    					</div>

									<input type="file" name="file_img" vaue="file_img"/>
			    		

									<h6>Discription:</h6>
									<div class="form-group">
			                			<input type="text" name="discription"  placeholder="discription" required="required">
			    					
			    				</div>
			    				
			    					
			    			
			    				
			    				
			    					<div class="form-group"><h6>Price</h6>
			    						<input type="text" name="price" placeholder="Price" required="required">
			    					
			    				</div>
			    				
			    		
			    			
			    			<input type="submit" name="submit-product" value="Submit" class="btn btn-info btn-block">
			    		
                        </form>
                        <a href="deleteproduct.php" type="submit" value="Delete Products" class="btn btn-danger">Delete Products</a></button>

                        


                            <?php
							if (isset($_POST['submit-product'])) {
									$name=$_POST['name'];
									$category=$_POST['category'];
									$cat=$_POST['cat'];
									$price=$_POST['price'];
									$discription=$_POST['discription'];
									$posterid=$_SESSION['username'];
									
									
									$image_tmp=$_FILES['file_img']['tmp_name'];
									$image=$_FILES['file_img']['name'];
									$filetype=$_FILES["file_img"]["type"];
									$imagepath="product-img/".$image;
									move_uploaded_file($image_tmp,$imagepath);

									if(mysqli_query($link,"insert into product(name,category,img,price,cat,discription,posterid) value('$name','$category','$image','$price','$cat','$discription','$posterid')"))
									{
										echo "<script>alert('Data saved')</script>";
									}   
									else 
									{
									    echo "<script>alert('Data not saved')</script>";                          	# code...
									}                              
								    }                         
							?>                     
</div>
                 </div>

</div>
         </div>
              </div>

              <?php include 'footer.php';?>
                  

</body>
</html>