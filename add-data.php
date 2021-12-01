<?php include "header.php"; ?>
<?php include "nav.php"; ?>
<?php 
	$msg = "";
	$error = "";
	if (isset($_POST['add_data_btn'])) {
		$name = $_POST['name'];
		$date_time = date('Y-m-d H:i:s');
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone_no'];
		$why_visit = $_POST['why_visit'];
		$status = "active";


		$sql = "INSERT INTO visitor(visit_date_time, name, address, email, phone_no, why_visit, status) VALUES ('$date_time', '$name', '$address', '$email', '$phone_no', '$why_visit', '$status')";
		// echo $sql;

		if ($conn->query($sql) === true) {
			$msg =  "New Visitor Entry Successfull!";
		}else{
			$error = "Error: ".$conn->error;
		}
	}


 ?>



<div class="container p-0" id="dashboard-container">
	<h1 class="text-center mt-4 mb-3">Add Data</h1>

	<div class="row justify-content-center">
		<div class="col-8">
			<form method="post" action="">
				<?php
					if (!empty($msg)) {
						echo '<div class="alert alert-success">'.$msg.'</div>';
					}

					if (!empty($error)) {
						echo '<div class="alert alert-danger">'.$error.'</div>';
					}
				 ?>
			  <div class="mb-3">
			    <label for="input-name" class="form-label">Name</label>
			    <input type="text" name="name" class="form-control" id="input-name" aria-describedby="input-name" placeholder="Enter Name Here...">
			  </div>

			  <div class="mb-3">
			    <label for="input-address" class="form-label">Address</label>
			    <input type="text" name="address" class="form-control" id="input-address" aria-describedby="input-address" placeholder="Enter Address Here..">
			  </div>

			  <div class="mb-3">
			    <label for="input-phone-no" class="form-label">Phone Number</label>
			    <input type="text" name="phone_no" class="form-control" id="input-phone-no" aria-describedby="input-phone-no" placeholder="Enter Contact Number Here..">
			  </div>

			  <div class="mb-3">
			    <label for="input-email" class="form-label">Email address</label>
			    <input type="email" name="email" class="form-control" id="input-email" aria-describedby="input-email" placeholder="Enter Email Here...">
			  </div>

			  <div class="mb-3">
			    <label for="input-why-visit" class="form-label">Why Visit US</label>
			    <textarea type="text" name="why_visit" class="form-control" id="input-why-visit"></textarea>
			  </div>
			  <button type="submit" name="add_data_btn" class="btn btn-primary" >Add Data</button>
			</form>
		</div>
	</div>


	
</div>
<?php include "footer.php"; ?>