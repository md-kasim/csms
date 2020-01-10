<?php
include("include.php");
include("get_carted.php");
if(!isset($_SESSION['csms_admin'])){
	header('Location: home.php');
}
if(isset($_POST['save_employee'])){
	if(isset($_POST['id'])){
		$query1 = "UPDATE employee SET username='".$_POST["username"]."', f_name='".$_POST["f_name"]."', l_name='".$_POST["l_name"]."', email='".$_POST["email"]."', phone_number='".$_POST["phone_no"]."', Address='".$_POST["address"]."' WHERE id='".$_POST["id"]."'";
		if(mysqli_query($con, $query1)){
			$_SESSION['csms_employee_edited'] = true;
			header('Location: employee.php');
		}
	}else{
		if($_POST['pswd']==$_POST['cnfrm_pswd']){
			$query2 = "INSERT INTO employee VALUES(DEFAULT, '".$_POST["username"]."', '".$_POST["f_name"]."', '".$_POST["l_name"]."', '".$_POST["email"]."', '".md5($_POST["pswd"])."', '".$_POST["phone_no"]."', '".$_POST["address"]."', DEFAULT, DEFAULT)";
			if(mysqli_query($con, $query2)){
				$_SESSION['csms_employee_added'] = true;
				header('Location: employee.php');
			}
		}else $error="Password doesnot match.";
	}
}
$edit_employee = 0;
if(isset($_POST['edit_employee'])){
	$employee = unserialize($_POST['edit_employee']);
	$edit_employee = 1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
	<?php include("links.php"); ?>
</head>
<body>
	<?php include("navbar.php"); ?>
	<div class="py-5 mt-4">
		<form action="" method="post" class="form form-inline">
			<div class="container text-center">
				<div class="row my-4"><h1 class="mx-auto">EMPLOYEE DETAILS</h1></div>
				<?php if($edit_employee) echo "<input type='hidden' name='id' value='".$employee['id']."' />"; ?>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>First Name : </label></div>
					<div class="col-md-3 offset-md-1"><input type="text" name="f_name" class="form-control" value="<?php if($edit_employee) echo $employee['f_name']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Last Name : </label></div>
					<div class="col-md-3 offset-md-1"><input type="text" name="l_name" class="form-control" value="<?php if($edit_employee) echo $employee['l_name']; ?>" required>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>E-mail ID : </label></div>
					<div class="col-md-3 offset-md-1"><input type="email" name="email" class="form-control" value="<?php if($edit_employee) echo $employee['email']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Phone No. : </label></div>
					<div class="col-md-3 offset-md-1"><input type="number" name="phone_no" class="form-control" value="<?php if($edit_employee) echo $employee['phone_number']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Address : </label></div>
					<div class="col-md-3 offset-md-1"><input type="text" name="address" class="form-control" value="<?php if($edit_employee) echo $employee['Address']; ?>" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Username : </label></div>
					<div class="col-md-3 offset-md-1"><input type="text" name="username" class="form-control" value="<?php if($edit_employee) echo $employee['username']; ?>" required></div>
				</div>
				<?php if(!$edit_employee){ ?>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Password : </label></div>
					<div class="col-md-3 offset-md-1"><input type="password" name="pswd" class="form-control" required></div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 offset-md-2"><label>Confirm Password : </label></div>
					<div class="col-md-3 offset-md-1"><input type="password" name="cnfrm_pswd" class="form-control" required></div>
				</div>
				<?php } ?>
				<div class="row my-4">
					<button type="submit" class="btn btn-success btn-lg mx-auto" name="save_employee">ADD EMPLOYEE</button>
				</div>
			</div>
		</form>
	</div>
	<?php include("footer.php");
	if(isset($error)){?>
		<script type="text/javascript">
			swal({
				title: "<?php echo $error; ?>",
				icon: "warning",
			})
		</script>
	<?php } ?>
</body>
</html>
