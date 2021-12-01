<?php include "header.php"; ?>
<?php include "nav.php"; ?>
<div class="container p-0" id="dashboard-container">
	<h1 class="text-center mt-4">Reset PIN</h1>

	<?php 

	if (isset($_POST['change_pin'])) {
		$oldPIN = valid_input($_POST['oldPIN']);
		$newPIN = valid_input($_POST['newPIN']);
		$confirmPIN = valid_input($_POST['confirmPIN']);

		$oldPIN = md5($oldPIN);

		$sql = "SELECT * FROM user_pin WHERE pin_no = '$oldPIN'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {

		  if ($newPIN == $confirmPIN) {
		  	$nPIN = md5($newPIN);
		  	$sqlu = "UPDATE user_pin SET pin_no = '$nPIN' WHERE id = 1";
		  	if ($conn->query($sqlu) === TRUE) {
			  echo "PIN Update Successfully";
			} else {
			  echo "Error: " . $conn->error;
			}

		  }else{
		  	echo "PIN is not matching";
		  }

		} else {
		  echo "Invalid Pin";
		}
	}



	 ?>


	<form action="" method="post">
		<input type="password" placeholder="Enter Old PIN" name="oldPIN" required>
		<input type="password" placeholder="Enter New PIN" name="newPIN" required>
		<input type="password" placeholder="Enter Confirm PIN" name="confirmPIN" required>
		<input type="submit" name="change_pin" value="Reset PIN">
	</form>



<?php function valid_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
} ?>
	
</div>
<?php include "footer.php"; ?>