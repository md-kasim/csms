<?php
include("include.php");
include("get_carted.php");
if(isset($_SESSION['csms_admin']))
	$query = "SELECT * FROM history";
else{
	$query = "SELECT * FROM history WHERE employee=".$_SESSION['csms_user_id'];
}
if($result = mysqli_query($con, $query)){
	$rows = mysqli_fetch_all($result, MYSQLI_BOTH);
	$records = array();
	foreach ($rows as $key => $row) {
		$row['customer'] = mysqli_fetch_array(mysqli_query($con, "SELECT name FROM customers WHERE id = ".$row['customer']))['name'];
		$row['employee'] = mysqli_fetch_array(mysqli_query($con, "SELECT username FROM employee WHERE id = ".$row['employee']))['username'];
		$q = "SELECT * FROM bill WHERE bill=".$row['id'];
		$result1 = mysqli_query($con, $q);
		$products = mysqli_fetch_all($result1, MYSQLI_BOTH);
		$row['product'] = "<table width='100%'>";
		$row['quantity'] = "";
		$row['price'] = "";
		foreach ($products as $key => $product) {
			$row['product'] .= "<tr width='100%'><td>".mysqli_fetch_array(mysqli_query($con, "SELECT name FROM products WHERE id = ".$product['product']))['name']."</td><td>".$product['quantity']."</td><td>".$product['price']."</td></tr>";
		}
		$row['product'] .= "</table>";
		array_push($records, $row);
	}
}
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
			<div class="row"><h1 class="mx-auto"><u>RECORDS</u></h1></div>
			<table class="table table-striped text-center">
				<tr class="thead-dark">
					<th>S.No.</th>
					<th>Employee</th>
					<th>Customer</th>
					<th>Product Name - Quantity - Price(&#8377;)</th>
					<th>Amount(&#8377;)</th>
					<th>Date</th>
				</tr>
				<?php
				foreach ($records as $key => $record) {
					echo "<tr class='employee-row'><td>".($key+1)."</td><td>".$record['employee']."</td><td>".$record['customer']."</td><td>".$record['product']."</td><td>".$record['amount']."</td><td>".$record['date']."</td></tr>";
				}
				?>
			</table>
		</div>
	</div>
	<?php include("footer.php") ?>
</body>
</html>