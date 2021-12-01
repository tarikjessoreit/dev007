<?php include "header.php"; ?>

<?php if (isset($_SESSION['login_info'] )) {
	header('location:dashboard.php');
} ?>

<?php 
	$error = "";
	if (isset($_POST['go_btn'])) {
		$pin = md5($_POST['pin_input']);

		$sql = "SELECT * FROM user_pin WHERE pin_no = '$pin'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION['login_info'] = true;
			header('location:dashboard.php');
		}else{
			echo "Invalid PIN";
		}
	}

 ?>

	<div class="container-fluid" id="login-contaianer">
		<div class="row">
			<div class="col-12">
				<form action="" method="post">
					<?php 
						if (!empty($error)) {
							echo '<div class="alert alert-danger">'.$error.'</div>';
						}
					?>
					<div class="input-group mb-3">
					  <input type="password" name="pin_input" class="form-control" placeholder="Enter PIN" aria-label="Recipient's username">
					  <button name="go_btn" class="input-group-text btn btn-primary px-4" id="go-btn">Go</button>
					</div>
				</form>
				<a href="reg.php">Reset PIN</a>
			</div>
		</div>
	</div>
<?php include "footer.php"; ?>