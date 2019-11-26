<?php	
session_start();

	$link  = mysqli_connect('localhost','root','','doubtcave')or die('Error connecting to MySQL server.');
	

$searchKeyword = $whrSQL='';
	if(isset($_POST['searchSubmit']))
	{
	    $searchKeyword = $_POST['keyword'];
	   //$searchKeyword = preg_replace("#[^0-9a-z]#i","",searchKeyword);
        if(!empty($searchKeyword))
        {
          $whrSQL= "WHERE (name LIKE '%".$searchKeyword."%' OR description LIKE '%".$searchKeyword."%' OR specialization LIKE '%".$searchKeyword."%')"; 
            
        }
	    
	}

$result = $link->query("SELECT * FROM Faculty $whrSQL");

function highlightWords($text, $word){
    $text = preg_replace('#'. preg_quote($word) .'#i', '<span style="background-color: #F9F902;">\\0</span>', $text);
    return $text;
}
?>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap 4 Introduction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
		
	<link rel="stylesheet" type="text/css" href="style.css">

	
</head>
<body>

<section id = "team">

<div class ="container my-3 py-5 text-center">
    <div class = "search_my">
		<form>
			<input type="text" class = "Search1"  name="keyword" value="<?php echo $searchKeyword; ?>" placeholder="search....">
			<input type ="submit" name = "searchSubmit" value="Search" class="btn btn-outline-secondary">
            
            <a href="faculty.php" class= "btn btn-outline-secondary">Reset</a>
			</form>
        </div>
    
 <div class = "col">
  <h1> Our Team </h1>
  <p style="font-size:20px;" class = "row mt-3" > Our expertise are here to solve your doubts, make sure it is worth their time and efforts. </p>
</div>
        
		
   

<div class ="row mb-5">

<?php
$query = 'SELECT * FROM faculty';
$res  = mysqli_query($link,$query)or die('Error querying database.');
if(mysqli_num_rows($res) > 0)
	{
		while ($row = mysqli_fetch_array($res))
		{
		
        
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc()){
                $name= !empty($searchKeyword)?highlightWords($row['name'],$searchKeyword):$row['name'];
                $description= !empty($searchKeyword)?highlightWords($row['description'],$searchKeyword):$row['description'];        
           ?>   
            
	     <div class = "col-md-4">	
	 		<div class="card" >
			<div class="card-body">
			<form method = "post">
				<img class="img-fluid rounded-circle w-50 mb-3" src="<?php echo $row['photo'];?>" size="300x300" alt="Card image" >
                
				
					<h3 class="card-title"> <?php echo $name;?> </h3>
					<p class="card-text"> <?php echo $description;?></p>
					<a href="#" class="btn btn-primary">Ask questions?</a>
					</form>
			</div>
		</div>
	 </div>
	
		
	
	<?php
					}
	 }
            ?>
    <?php
            
        }
        
        }
    else{
        ?>
    <p> no post found....</p>
    <?php
    }
			?>
    
			
	
    
    </div>
</div>  
</section>
</body>
</html>
