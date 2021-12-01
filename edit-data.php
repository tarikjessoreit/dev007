<?php include "header.php"; ?>
<?php include "nav.php"; ?>
<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		// for view data
		$sql = "SELECT * FROM visitor where id = $id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    $name = $row['name'];
		    $address = $row['address'];
		    $email = $row['email'];
		    $p_no = $row['phone_no'];
		    $why_visit = $row['why_visit'];
		  }
		}else{
			header('location:dashboard.php');
		}
	}else{
		header('location:dashboard.php');
	}


	// for update data
	if (isset($_POST['up_btn'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone_no'];
		$why_visit = $_POST['why_visit'];

		$sql = "UPDATE visitor SET name='$name',address='$address',email='$email',phone_no='$phone_no',why_visit='$why_visit' WHERE id = $id";
		// echo $sql;

		if ($conn->query($sql) === true) {
			$msg =  "Data Update Successfull!";
		}else{
			$error = "Error: ".$conn->error;
		}
	}




 ?>


<div class="container p-0" id="dashboard-container">
	<h1 class="text-center mt-4 mb-3">Edit Data</h1>

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
			    <input type="text" name="name" class="form-control" id="input-name" aria-describedby="input-name" placeholder="Enter Name Here..." value="<?php echo $name;?>">
			  </div>

			  <div class="mb-3">
			    <label for="input-address" class="form-label">Address</label>
			    <input type="text" name="address" class="form-control" id="input-address" aria-describedby="input-address" placeholder="Enter Address Here.." value="<?php echo $address;?>">
			  </div>

			  <div class="mb-3">
			    <label for="input-phone-no" class="form-label">Phone Number</label>
			    <input type="text" name="phone_no" class="form-control" id="input-phone-no" aria-describedby="input-phone-no" placeholder="Enter Contact Number Here.." value="<?php echo $p_no;?>">
			  </div>

			  <div class="mb-3">
			    <label for="input-email" class="form-label">Email address</label>
			    <input type="email" name="email" class="form-control" id="input-email" aria-describedby="input-email" placeholder="Enter Email Here..." value="<?php echo $email;?>">
			  </div>

			  <div class="mb-3">
			    <label for="input-why-visit" class="form-label">Why Visit US</label>
			    <textarea type="text" name="why_visit" class="form-control" id="input-why-visit"><?php echo $why_visit;?></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary" name="up_btn">Update</button>
			</form>
		</div>
	</div>


	
</div>
<?php include "footer.php"; ?>