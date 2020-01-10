<?php
include("include.php");
if(isset($_SESSION['customer'])&&isset($_SESSION['ordered'])){
	$customer_id = $_SESSION['customer'];
	$query = "SELECT * FROM customers WHERE id = '$customer_id'";
	$result = mysqli_query($con, $query);
	$customer = mysqli_fetch_array($result);
	$items = $_SESSION['ordered'];
}else{
	header('Location:cart.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<?php include("links.php") ?>
	<style type="text/css">
		@media print {
  			body * {
    			visibility: hidden;
  			}
  			#section-to-print, #section-to-print * {
    			visibility: visible;
  			}
  			#section-to-print {
    			position: absolute;
    			left: 0;
    			top: 0;
  			}
		}
		p{
			font-size: 1.5rem;
		}
		.detail{
			border-bottom: 1px dotted #000;
		    text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container" id="section-to-print">
		<div class="row">
			<h2 class="mx-auto mt-3">Computer Store</h2>
		</div>
		<div class="row">
			<p class="mx-auto mt-1">82K, NIT Sikkim</p>
		</div>
		<div class="row">
			<p class="mx-auto">
				Name : &nbsp;<span class="detail mr-5"><?php echo $customer['name']; ?></span>
				Age : &nbsp;<span class="detail mr-5"><?php echo date('Y')-$customer['yob']; ?> yrs</span>
				Mobile No. : &nbsp;<span class="detail mr-5"><?php echo $customer['phno']; ?></span>
			</p>
		</div>
		<div class="row">
			<p class="mx-auto">Address : &nbsp;<span class="detail"><?php echo $customer['address']; ?></span></p>
		</div>
		<div class="row"><h1 class="mx-auto">List of Items</h1></div>
		<table class="table table-striped">
			<tr>
				<th>S.No.</th>
				<th>Item</th>
				<th>Price(&#8377;)</th>
				<th>Quantity</th>
				<th>Amount(&#8377;)</th>
			</tr>
			<?php
			foreach ($items as $key => $item) {
			?>
			<tr><?php
				echo "<td>$key</td><td>".$item['name']."</td><td>".$item['price']."</td><td>".$item['ordered']."</td><td>".$item['price']*$item['ordered']."</td>";
				?>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div class="row">
		<div class="mx-auto my-4">
			<button class="btn btn-primary" onclick="window.print();">Print Bill</button>
			<a class="btn btn-primary" href="home.php">Continue Shopping</a>
		</div>
	</div>
</body>
</html>