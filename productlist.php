<?php
include("include.php");
include("get_carted.php");
$restored = false;
$removed = false;
$added = false;
$edited = false;
if(isset($_SESSION['csms_product_edited'])){
	unset($_SESSION['csms_product_edited']);
	$edited = true;
}else if(isset($_SESSION['csms_product_added'])){
	unset($_SESSION['csms_product_added']);
	$added = true;
}
if(!isset($_SESSION['csms_admin'])){
	header('Location: home.php');
}
if(isset($_POST['restore'])){
	$product = unserialize($_POST['restore']);
	$product_id = $product['id'];
	$query1 = "UPDATE products SET status = TRUE WHERE id = '$product_id'";
	if(mysqli_query($con, $query1)){
		$restored = true;
	}
}else if(isset($_POST['remove'])){
	$product = unserialize($_POST['remove']);
	$product_id = $product['id'];
	$query2 = "UPDATE products SET status = FALSE WHERE id = '$product_id'";
	if(mysqli_query($con, $query2)){
		$removed = true;
	}
}
$q1 = "SELECT * from products";
$result1 = mysqli_query($con, $q1);
$products = mysqli_fetch_all($result1, MYSQLI_BOTH);
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Products</title>
	<?php include("links.php"); ?>
</head>
<body style="background-color: white !important;">
	<?php include("navbar.php"); ?>
	<div class="py-5 mt-5">
		<div class="container">
			<div class="d-flex"><a href="addproduct.php" class="btn btn-success align-self-end ml-auto">Add</a></div>
			<div class="row"><h1 class="mx-auto"><u>PRODUCT LIST</u></h1></div>
			<table class="table table-striped text-center">
				<tr class="thead-dark">
					<th>S.No.</th>
					<th>Product Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Cost Price</th>
					<th>Selling Price</th>
					<th></th>
					<th></th>
				</tr>
				<?php
				foreach ($products as $key => $product) {
					echo "<tr class='employee-row ".(($product['quantity']==0)?'bg-secondary text-light':'')."'><td>".($key+1)."</td><td>".$product['name']."</td><td>".$product['des']."</td><td>".$product['quantity']."</td><td>&#8377;".$product['costprice']."</td><td>&#8377;".$product['price']."</td><td><form action='addproduct.php' method='post'><button type='submit' name='edit_product' value='".serialize($product)."' class='btn btn-success text-light font-weight-bold'>Edit</button></form></td><td><form action='' method='post'><button type='submit' name='".(($product['status']==1)?'remove':'restore')."' value='".serialize($product)."' class='btn btn-danger text-light font-weight-bold'>".(($product['status']==1)?'Remove':'Restore')."</button></form></td></tr>";
				}
				?>
			</table>
		</div>
	</div>
	<?php if($restored||$removed||$edited||$added){ ?>
	<script type="text/javascript">
		swal({
			title: "Successfully <?php if($restored) echo 'Restored'; else if($removed) echo 'Removed'; else if($added) echo 'Added'; else if($edited) echo 'Edited'; ?>",
			icon: "<?php if($restored || $added || $edited) echo 'success'; else if($removed) echo 'warning' ?>",
		})
	</script>
	<?php } include("footer.php") ?>
</body>
</html>