<?php
include("include.php");
include("get_carted.php");
$restored = false;
$removed = false;
$added = false;
$edited = false;
if(isset($_SESSION['csms_employee_edited'])){
	unset($_SESSION['csms_employee_edited']);
	$edited = true;
}else if(isset($_SESSION['csms_employee_added'])){
	unset($_SESSION['csms_employee_added']);
	$added = true;
}
if(isset($_POST['restore'])){
	$employee = unserialize($_POST['restore']);
	$query1 = "UPDATE employee SET status=TRUE WHERE id='".$employee["id"]."'";
	if(mysqli_query($con, $query1)){
		$restored = true;
	}
}else if(isset($_POST['remove'])){
	$employee = unserialize($_POST['remove']);
	$query1 = "UPDATE employee SET status=FALSE WHERE id='".$employee["id"]."'";
	if(mysqli_query($con, $query1)){
		$removed = true;
	}
}
$q1 = "SELECT * FROM employee WHERE admin=0";
$result = mysqli_query($con, $q1);
$employees = mysqli_fetch_all($result, MYSQLI_BOTH);
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Employees</title>
	<?php include("links.php"); ?>
</head>
<body>
	<?php include("navbar.php"); ?>
	<div class="py-5 mt-5">
		<div class="container">
			<div class="d-flex"><a href="addemployee.php" class="btn btn-success align-self-end ml-auto">ADD</a></div>
			<div class="row"><h1 class="mx-auto"><u>EMPLOYEE LIST</u></h1></div>
			<table class="table table-striped text-center">
				<tr class="thead-dark">
					<th>S.No.</th>
					<th>Username</th>
					<th>Employee Name</th>
					<th>E-mail</th>
					<th>Phone No</th>
					<th>Address</th>
					<th>Created Date</th>
					<th>Last Login</th>
					<th></th>
					<th></th>
				</tr>
				<?php
				foreach ($employees as $key => $employee) {
					echo "<tr class='employee-row'><td>".$key."</td><td>".$employee['username']."</td><td>".$employee['f_name']." ".$employee['l_name']."</td><td>".$employee['email']."</td><td>".$employee['phone_number']."</td><td>".$employee['Address']."</td><td>".$key."</td><td>".$key."</td><td><form action='addemployee.php' method='post'><button type='submit' name='edit_employee' value='".serialize($employee)."' class='btn btn-success text-light font-weight-bold'>Edit</button></form></td><td><form action='' method='post'><button type='submit' name='".(($employee['status']==1)?'remove':'restore')."' class='btn btn-danger text-light font-weight-bold' value='".serialize($employee)."'>".(($employee['status']==1)?'Remove':'Restore')."</button></form></td></tr>";
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