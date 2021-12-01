<?php include "header.php"; ?>
<?php include "nav.php"; ?>
<div class="container" id="dashboard-container">
	<h1 class="text-center mt-4">Dashboard</h1>
	<hr>

	<div class="row">
		<div class="col-12">
			<!-- Data Table for All visitor list -->
			<table id="visitor-data-table" class="table table-striped">
		            <thead>
		            <tr>
		                <th>ID</th>
		                <th>Name</th>
		                <th>Address</th>
		                <th>Email</th>
		                <th>Phone Number</th>
		                <th>Why Visit</th>
		                <th class="text-center">Action</th>
		            </tr>
		        </thead>
		        <tbody>
		        		<?php 
							$sql = "SELECT * FROM visitor where status = 'active'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							  // output data of each row
							  while($row = $result->fetch_assoc()) { ?>
								<tr>
					                <td><?php echo $row['id']; ?></td>
					                <td><?php echo $row['name']; ?></td>
					                <td><?php echo $row['address']; ?></td>
					                <td><?php echo $row['email']; ?></td>
					                <td><?php echo $row['phone_no']; ?></td>
					                <td><?php echo $row['why_visit']; ?></td>
					                <td class="text-center">
					                	<a href="edit-data.php?id=<?php echo $row['id']; ?>" class="btn btn-success"> <i class="fas fa-edit"></i> Edit</a>
					                	<a href="delete-data.php?d_data=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
					                </td>
					            </tr>
						<?php }
							}
						?>
		            
		            
		        </tbody>
		        <tfoot>  	

		            <tr>
		                <th>ID</th>
		                <th>Name</th>
		                <th>Address</th>
		                <th>Email</th>
		                <th>Phone Number</th>
		                <th>Why Visit</th>
		                <th  class="text-center">Action</th>
		            </tr>
		        </tfoot>
		    </table>

		</div>
	</div>



	
</div>
<?php include "footer.php"; ?>