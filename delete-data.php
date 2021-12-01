<?php include "config.php"; ?>
<?php 
	if (isset($_GET['d_data'])) {
		$id = $_GET['d_data'];

		if (isset($_POST['conf_btn'])) {
			$conf_txt = $_POST['confirmText'];

			if ($conf_txt == "DEL$id") {
				$sql="DELETE FROM visitor WHERE id = $id";
				if ($conn->query($sql) === true) {
					echo "Data deleted Successfull!";
					header('location:dashboard.php');
				}else{
					$error = "Error: ".$conn->error;
				}
			}else{
				echo "Somthing Wrong! please try again.";
			}
			
		}

		
		
	}else{
		header('location:dashboard.php');
	}

 ?>

<form action="" method="post">
	<b>Please Type '<?php echo 'DEL'.$id; ?>'</b><br>
	<input type="text" name="confirmText">
	<input type="submit" name="conf_btn" value="Confirm">

</form>