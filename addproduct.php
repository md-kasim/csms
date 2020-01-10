<?php
include("include.php");
include("get_carted.php");
if(!isset($_SESSION['csms_admin'])){
	header('Location: home.php');
}
if(isset($_POST['save_product'])){
	if(isset($_POST['id'])){
		$q = "SELECT image from products WHERE id='".$_POST["id"]."'";
		$result = mysqli_query($con, $q);
		$image = mysqli_fetch_array($result);
		if($_FILES["pimage"])
			$extension = pathinfo($_FILES["pimage"]["name"], PATHINFO_EXTENSION);
		$query1 = "UPDATE products SET name='".$_POST["name"]."', price='".$_POST["price"]."', des='".$_POST["des"]."', quantity='".$_POST["quantity"]."', costprice='".$_POST["costprice"]."' WHERE id='".$_POST["id"]."'";
		if(mysqli_query($con, $query1)){
			if($_FILES["pimage"] && $image['image'] != $_FILES["pimage"]["tmp_name"]){
				$check = getimagesize($_FILES["pimage"]["tmp_name"]);
				if($check !== false && $_FILES["pimage"]["size"] <= 2000000){
					$target_file = "./images/products/".$_POST['id'].".".$extension;
					if(move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file)){
						$_SESSION['csms_product_edited'] = true;
						header('Location: productlist.php');
					}else $error = "Some Internal Error occured. Please try again later.";
				}else $error = "Image is not of correct type...";
			}
			$_SESSION['csms_product_edited'] = true;
			header('Location: productlist.php');
		}
	}else{
		$extension = pathinfo($_FILES["pimage"]["name"], PATHINFO_EXTENSION);
		$check = getimagesize($_FILES["pimage"]["tmp_name"]);
		if($check !== false && $_FILES["pimage"]["size"] <= 2000000){
			$query2 = "INSERT INTO products VALUES(DEFAULT, '".$_POST["name"]."', '".$_POST["id"].$extension."', '".$_POST["price"]."', '".$_POST["des"]."', '".$_POST["quantity"]."', '".$_POST["costprice"]."', DEFAULT)";
			if(mysqli_query($con, $query2)){
				$product_id = mysqli_insert_id($con);
				$target_file = "./images/products/".$product_id.".".$extension;
				if(move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file)){
					$_SESSION['csms_product_added'] = true;
					header('Location: productlist.php');
				}else $error = "Some Internal Error occured. Please try again later.";
			}
		}else $error = "Image is not of correct type...";
	}
}
$edit_product = 0;
if(isset($_POST['edit_product'])){
	$product = unserialize($_POST['edit_product']);
	$edit_product = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<?php include("links.php"); ?>
</head>
<body>
	<?php include("navbar.php"); ?>
	<div class="py-5 mt-5">
		<form action="" method="post" class="form form-inline" enctype="multipart/form-data">
			<div class="container text-center">
				<?php if($edit_product) echo '<input type="hidden" name="id" value="'.$product['id'].'">'; ?>
					
				<div class="row my-4"><h1 class="mx-auto">PRODUCT DETAILS</h1></div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Product Name : </label></div>
					<div class="col-md-3 offset-md-1"><input type="text" name="name" class="form-control" value="<?php if($edit_product) echo $product['name']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Description : </label></div>
					<div class="col-md-3 offset-md-1"><textarea name="des" class="form-control" cols="22" style="resize: none;" required><?php if($edit_product) echo $product['des']; ?></textarea>
				</div></div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Quantity : </label></div>
					<div class="col-md-3 offset-md-1"><input type="number" name="quantity" class="form-control" value="<?php if($edit_product) echo $product['quantity']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Cost Price (&#8377;) : </label></div>
					<div class="col-md-3 offset-md-1"><input type="number" name="costprice" class="form-control" value="<?php if($edit_product) echo $product['costprice']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Selling Price (&#8377;) : </label></div>
					<div class="col-md-3 offset-md-1"><input type="number" name="price" class="form-control" value="<?php if($edit_product) echo $product['price']; ?>" required></div>
				</div>
				<div class="row my-3">
					<div class="col-md-5 custom-file offset-md-3"><input type="file" name="pimage" class="custom-file-input" id="customFile"><label class="custom-file-label" for="customFile">Choose Product Image</label></div>
				</div>
				<div class="row my-4">
					<button type="submit" class="btn btn-success btn-lg mx-auto" name="save_product">SAVE PRODUCT</button>
				</div>
			</div>
		</form>
	</div>
	<?php if(isset($error)){ ?>
		<script type="text/javascript">
			swal({
			title: "<?php echo $error ?>",
			icon: "warning",
		})
		</script>
	<?php } ?>
	<script>
		$(".custom-file-input").on("change", function() {
  			var fileName = $(this).val().split("\\").pop();
  			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	</script>
	<?php include("footer.php") ?>
</body>
</html>