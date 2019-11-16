<?php
	include_once "src/Database.php";
	$db = Database::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, user-scalable=no, 
    		initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<title>Product</title>

    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" 
    		integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<link rel="stylesheet" href="style.css">
    </head>
    <body>
    	<div class="container">
    		<div class="card"> 
    			<div class="card-header"> 
    				<h1><a href="#">Add new product</a></h1>
    			</div>
    			<div class="card-body"> 
    				<?php
    					include_once "control.php";
    				?>
    				<form action="" method="post"> 
    					<div class="row"> 
    						<div class="col-md-8">
    							<input type="hidden" name="id" value="<?php echo $id?>"> 
    							<div class="form-group"> 
    								<label for="title">Product</label>
    								<input type="text" name="title" value="<?php echo $title?>" class="form-control" required>
    							</div>
    							<div class="form-group"> 
    								<label for="price">Price</label>
    								<input type="text" name="price" value="<?php echo $price?>" class="form-control" required>
    							</div>
    							<div class="form-group"> 
    								<label for="fname">Description</label>
    								<textarea id="description" name="description" class="form-control" rows="5"> 
    								<?php echo $description?></textarea>
    							</div>
    							<div class="form-group"> 
    								<label for="properties">Properties</label>
    								<textarea id="properties" name="properties" class="form-control" rows="5"> 
    								<?php echo $properties?></textarea>
    							</div>
    							<?php if($update == true): ?>
    								<button type="submit" name="update" class="btn btn-info">Update</button>
    							<?php else: ?>
    								<button type="submit" name="add-product" class="btn btn-info">Submit</button>
    							<?php endif; ?>
    						</div>
    					</div>
    				</form>
    			</div>
    		</div>
    	</div>
    	<div class="container"> 
    		<div class="card"> 
    			<div class="card-body"> 
    				<table class="table table-hover table-stripped">
    					<thead> 
    						<tr> 
    							<th>ID</th>
    							<th>Title</th>
    							<th>Price</th>
    							<th>Description</th>
    							<th>Properties</th>
    							<th>Action</th>
    						</tr>
    					</thead>
    					<?php
    						$query = mysqli_query($db->getConnection(),
    							"SELECT * FROM Product ORDER BY id ASC");
							while($row = mysqli_fetch_array($query))
							{    						
								echo '<tbody>'; 
		    					echo "<td>{$row['id']}</td>";
		    					echo "<td>{$row['title']}</td>";
		    					echo "<td>{$row['price']}</td>";
		    					echo "<td>{$row['description']}</td>";
		    					echo "<td>{$row['properties']}</td>";
		    					echo "<td><a href=\"?edit={$row['id']}\" class=\"btn btn-info\">Edit</a></td>";
		    					echo "<td><a href=\"?delete={$row['id']}\" class=\"btn btn-danger\">Delete</a></td>";
			    				echo '</tbody>';
							}
    					?>
    				</table>
    			</div>
    		</div>
    	</div>
	</body>
</html>