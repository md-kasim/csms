<div class="navbar navbar-expand-sm navbar-dark bg-primary px-sm-5 affix">
	<img src="./images/laptop_icon.png" class="navbar-brand icon" />
	<ul class="navbar-nav align-items-center">
		<li class="nav-item ml-5 my-auto font-weight-bold h4">
			<a href="home" class="nav-link">Products</a>
		</li>
		<li class="nav-item ml-5 my-auto font-weight-bold h4">
			<a href="cart" class="nav-link"><span><i class="fas fa-cart-plus"></i></span> Cart <?php echo count($carted_products); ?></a>
		</li>
		<?php if(isset($_SESSION['csms_admin'])){ ?>
		<li class="nav-item ml-5 my-auto font-weight-bold h4">
			<a href="employee.php" class="nav-link">Employee</a>
		</li>
		<?php } ?>
	</ul>
	<div class="ml-auto d-flex">
		<form action="home.php" method="get" class="form-inline">
			<input type="text" name="search" placeholder="Search Products" class="form-control form-control-sm" style="background: var(--mainWhite); " required>
			<button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
		</form>
	</div>
	<div class="ml-auto"><a class="button" href="logout" title="Logout"><span class=""><i class="fas fa-user"></i></span></a></div>
</div>