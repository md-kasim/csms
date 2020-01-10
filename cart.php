<?php
include("include.php");
include("get_carted.php");
if(isset($_POST['remove_from_cart'])){
	$index = $_POST['remove_from_cart'];
	unset($carted_products[$index]);
	$_SESSION['inCart'] = $carted_products;
}
else if(isset($_POST['order'])){
	$employee = $_SESSION['csms_user_id'];
	$customer = null;
	if(isset($_POST['cust_name'])){
		$name = $_POST['cust_name'];
		$phno = $_POST['phone'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$query2 = "INSERT INTO customers VALUES(DEFAULT, '$name', '$phno', DEFAULT, '$address', '$dob', '$employee', DEFAULT)";
		if(mysqli_query($con, $query2)){
			$customer = mysqli_insert_id($con);
		}
	}else{
		$customer = $_POST['customer'];
	}
	$orders = [];
	$amount = 0;
	foreach ($carted_products as $key => $row) {
		$order = unserialize($row);
		$order['ordered'] = $_POST["quantity".$order['id']];
		$amount += $order['ordered']*$order['price'];
		array_push($orders, $order);
	}
	$query = "INSERT INTO history VALUES(DEFAULT, '$employee', '$customer', '$amount', DEFAULT)";
	if(mysqli_query($con, $query)){
		$billno = mysqli_insert_id($con);
		$_SESSION['ordered'] = $orders;
		$query1 = "INSERT INTO bill VALUES";
		foreach ($orders as $key => $order) {
			$order_id = $order['id'];
			$order_price = $order['price'];
			$quantity = $order['ordered'];
			$rem = $order['quantity']-$quantity;
			$q = "UPDATE products SET quantity='$rem' WHERE id='$order_id'";
			if(mysqli_query($con, $q))
				$query1 = $query1."(DEFAULT, '$billno', '$order_id', '$order_price', '$quantity'), ";
		}
		$query1 = substr($query1, 0, -2);
		if(mysqli_query($con, $query1)){
			unset($_SESSION['inCart']);
			$_SESSION['customer'] = $customer;
			header('Location: bill.php');
		}
	}
}
else if(isset($_POST['cancel'])){
	unset($_SESSION['inCart']);
 	header('Location: home.php');
}
$query = "SELECT * FROM customers where status = 1";
$result = mysqli_query($con, $query);
$customers = mysqli_fetch_all($result, MYSQLI_BOTH);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<?php include("links.php") ?>
</head>
<body>
	<script type="text/javascript">
		
	</script>
	<?php include("navbar.php"); 
	if(!empty($carted_products)){
		$quantity=0;
		$price=0;
	?>
	<div class="py-5 mt-3">
		<form action="" method="post" class="form">
			<div class="container">
				<div class="row">
					<?php foreach ($carted_products as $index => $row) {
						$product = unserialize($row);
						$quantity += 1;
						$price += $product['price'];
					?>
					<div class="col-9 mx-auto col-md-6 col-lg-3 my-3">
						<div class="card">
							<span class="badge badge-primary">Total : <?php echo $product['quantity']; ?></span>
							<div class="img-container p-5" style="height: 280px;">
								<img src="./images/products/<?php echo $product['image'] ?>" class="card-img-top rounded" style="height: 120px;" />
								<br><br>
									<label class="label">Quantity : </label>
									<input type="number" name="quantity<?php echo $product['id']; ?>" min="1" max="<?php echo $product['quantity']; ?>" class="form-control form-control-sm" value="1" price="<?php echo $product['price']; ?>" onfocus="this.oldvalue=this.value;" onchange="new_price(this);this.oldvalue=this.value">
										<button type="submit" class="cart-btn" name="remove_from_cart" title="Remove From Cart" value="<?php echo $index; ?>"><i class="fas fa-trash-alt"></i></button>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<p class="align-self-center h6"><?php echo $product['name'] ?></p>
								<h5 class="font-italic" style="color: #1515bd">&#8377;<?php echo $product['price'] ?></h5>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="row" id="old-customer" style="display: block;">
					<label>Customer Name :</label>
					<select class="custom-select" name="customer">
						<option>---Select Customer---</option>
						<?php
						foreach ($customers as $key => $customer){
							echo "<option value=".$customer['id'].">".$customer['name']." - ".$customer['address']." - ".$customer['phno']."</option>";
						}
						?>
					</select>
				</div>
				<div class="row mt-2">
					<button type="button" id="btn-customer" class="btn btn-danger ml-auto" onclick="new_customer(); return false"> <b>+</b> New Customer</button>
				</div>
				<div class="row" id="new-customer" style="display: none;">
					<label>Customer Name : </label>
					<input type="text" name="cust_name" class="form-control" disabled>
					<label>Phone No. : </label>
					<input type="number" name="phone" class="form-control" disabled>
					<label>Year of Birth : </label>
					<input type="number" name="dob" class="form-control" disabled>
					<label>Address : </label>
					<input type="text" name="address" class="form-control" disabled>
				</div>
				<div class="row mt-4">
					<div class="mx-auto">
						<div name="order" class="btn btn-outline-success btn-lg mr-3">Quantity : <span id="quantity"><?php echo $quantity; ?></span></div>
						<div name="cancel" class="btn btn-outline-danger btn-lg">Price : <span id="price"><?php echo $price; ?></span></div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="mx-auto">
						<form action="" method="post">
							<button type="submit" onclick="return confirm_order();" name="order" class="btn btn-outline-success btn-lg mr-3">Confirm Order</button>
							<button type="submit" name="cancel" class="btn btn-outline-danger btn-lg">Cancel Order</button>
						</form>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php }
else{?>
<div class="vertical-center">
	<div class="jumbotron mx-auto">
		<h3 class="text-secondary">No Product is being added to cart</h3>
		<a href="home.php" class="btn btn-lg btn-outline-primary">Continue Shopping . . .</a>
	</div>
</div>	
<?php
} ?>
<script>
  	function new_price(e) {
		var quantity = document.getElementById('quantity');
		var price = document.getElementById('price');
		quantity.innerHTML = parseInt(quantity.innerHTML)+(e.value-e.oldvalue);
		price.innerHTML = parseInt(price.innerHTML)+(e.value-e.oldvalue)*e.getAttribute('price');
	}
  	function new_customer(e){
  		var new_customer = document.getElementById("new-customer");
  		if(document.getElementById("btn-customer").innerHTML == "Old Customer"){
	  		document.getElementById("old-customer").style.display = "block";
	  		new_customer.style.display = "none";
	  		document.getElementById("btn-customer").innerHTML = "<b>+</b> NEW Customer";
	  		var nodes = new_customer.childNodes;
	  		for(var i=0; i<nodes.length; i++){
	  			if(nodes[i].nodeName=="INPUT"){
	  				nodes[i].required = false;
	  				nodes[i].disabled = true;
		  		}
	  		}
		}else{
			document.getElementById("old-customer").style.display = "none";
			new_customer.style.display = "block";
			document.getElementById("btn-customer").innerHTML = "Old Customer";
			var nodes = new_customer.childNodes;
	  		for(var i=0; i<nodes.length; i++){
	  			if(nodes[i].nodeName=="INPUT"){
	  				nodes[i].required = true;
	  				nodes[i].disabled = false;
		  		}
	  		}
		}
	}
	function confirm_order(){
		var customer = document.getElementById("old-customer");
		var select = customer.childNodes[3];
		if(customer.style.display == "block" && customer.disabled == false && select.value == "---Select Customer---"){
			alert("Please select the Customer....");
			return false;
		}
		return true;
	}
</script>
<?php include("footer.php") ?>
</body>
</html>