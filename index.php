<?php
include("config.php");
session_start();
if(isset($_SESSION['csms_username'])){
	header('Location: home.php');
}
$invalid = false;
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$q1 = "SELECT * FROM employee WHERE username='$username'";
	$result1 = mysqli_query($con, $q1);
	$row = mysqli_fetch_array($result1);
	if($password==$row['password']){
		$_SESSION['csms_username'] = $username;
        $_SESSION['csms_user_id'] = $row['id'];
        if($row['admin']==1){
            $_SESSION['csms_admin'] = 1;
        }
		header('Location: home.php');
	}else{
		$invalid = true;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Computer Store</title>
	<?php include("links.php") ?>
</head>
<body>
<div class="lgn-bg">
    <div class="vertical-center">
        <div class="card bg-warning mx-auto" style="width:18rem;">
            <div class="card-body">
                <?php if($invalid){?><small><div class="alert alert-danger text-center">Incorrect Login Details</div></small><?php } ?>
                <div class="card-title font-weight-bold btn btn-primary btn-block mt-1">Employee</div>
                <div class="card-text">
                	<form action="" method="POST" class="was-validated">
                    	<label>Username :</label>
                    	<input type="text" class="form-control" name="username" required />
                    	<label>Password :</label>
                    	<input type="password" class="form-control mb-3" name="password" required />
                    	<input type="submit" class="btn btn-block btn-success my-2" value="LOGIN" />
                	</form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php") ?>
</body>
</html>