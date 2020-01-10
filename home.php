<?php
include("include.php");
if(isset($_GET['search'])){
	$query2 = "SELECT * FROM products WHERE status=1 and name LIKE '%".$_GET['search']."%'";
	$result1 = mysqli_query($con, $query2);
	if($result1){
		$products = mysqli_fetch_all($result1, MYSQLI_BOTH);
	}else{
		$products = null;
	}
}else{
	$q1 = "SELECT * from products WHERE status=1";
	$result1 = mysqli_query($con, $q1);
	$rows = mysqli_fetch_all($result1, MYSQLI_BOTH);
	$no_of_products = count($rows);
	$no_of_page = ceil($no_of_products/24);
	$page = 1;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
	$products = array_slice($rows, ($page-1)*24, 24);
}

// For Cart
include("get_carted.php");
if(isset($_POST['inCart'])){
	$product = $_POST['inCart'];
	if(!in_array($product, $carted_products)){
		array_push($carted_products, $product);
	}
}
$_SESSION['inCart'] = $carted_products;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Computer Store</title>
	<?php include("links.php"); ?>
</head>
<body>
	<?php include("navbar.php"); 
	if($products){ ?>
	<div class="py-5 mt-3">
		<div class="container">
			<div class="row">
				<a href="records.php" class="btn btn-success mr-auto font-weight-bold">View Records</a>
				<?php if(isset($_SESSION['csms_admin'])){ ?>
					<a href="productlist.php" class="btn btn-danger ml-auto font-weight-bold">Edit Product</a>
				<?php } ?>
			</div>
			<div class="row">
				<?php foreach ($products as $product) { ?>
				<div class="col-9 mx-auto col-md-6 col-lg-3 my-3">
					<div class="card">
						<?php
						if($product['quantity']==0){
							echo '<span class="badge badge-danger">Out of Stock</span>';
						}else{
							echo '<span class="badge badge-primary">Quantity '.$product['quantity'].'</span>';
						}
						?>
						<div class="img-container p-5" style="height: 280px;">
							<img src="./images/products/<?php echo $product['image'] ?>" class="card-img-top rounded" style="height: 180px;" />
							<form action="" method="post">
								<input type="hidden" name="inCart" value='<?php echo serialize($product); ?>'>
								<button type="submit" class="cart-btn <?php if($product['quantity']==0){ echo 'disabled'; } ?>" <?php if($product['quantity']==0||in_array(serialize($product), $carted_products)){ echo 'disabled style="cursor: not-allowed;"'; } ?>><?php if(!in_array(serialize($product), $carted_products)){ ?><i class="fas fa-cart-plus"></i><?php } else echo 'inCart' ?></button>
							</form>
						</div>
						<div class="card-footer d-flex justify-content-between">
							<p class="align-self-center h6"><?php echo $product['name'] ?></p>
							<h5 class="font-italic" style="color: #1515bd">&#8377;<?php echo $product['price'] ?></h5>
						</div>
					</div>
				</div>
			<?php } if(isset($page)){ ?>
				<ul class="pagination pagination-lg mx-auto">
					<li class="page-item<?php if($page==1){ echo " disabled"; } ?>"><a class="page-link" href="home.php?page=<?php echo $page-1; ?>">Previous</a></li>
					<?php 
					for($ii=1;$ii<=$no_of_page;$ii++){
						echo '<li class="page-item'.(($ii==$page)?" active":"").'"><a class="page-link" href="home.php?page='.$ii.'">'.$ii.'</a></li>';
					}
					?>
					<li class="page-item<?php if($page==$no_of_page){ echo " disabled"; } ?>"><a class="page-link" href="home.php?page=<?php echo $page+1; ?>">Next</a></li>
				</ul>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php }
	else{?>
		<div class="vertical-center">
			<div class="jumbotron mx-auto">
				<h3 class="text-secondary">No Product has been found</h3>
				<a href="home.php" class="btn btn-lg btn-outline-primary">Continue Shopping . . .</a>
			</div>
		</div>	
	<?php } include("footer.php") ?>
</body>
</html>