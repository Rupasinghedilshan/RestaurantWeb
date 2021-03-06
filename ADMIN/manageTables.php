<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Managing Restaurant Tables</title>
</head>
	
<body>

	<?php
	//include('security.php');
	session_start();
	
	include('includes/header.php'); 
	include('includes/navbar.php'); 
	$connection = mysqli_connect("localhost","root","","final_project");
	?>
	
	<!--modal for adding new tables-->
	<div class="modal fade" id="tabledetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
	  <div class="modal-dialog" role="document"> 
		<div class="modal-content"> 
		  <div class="modal-header"> 
			<h5 class="modal-title" style="color: chocolate" id="exampleModalLabel">New Table Adding</h5> 
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
			  <span aria-hidden="true">&times;</span> 
			</button> 
		  </div>  
		  <form action="admin.php" method="POST"> 

				<div class="modal-body"> 

					<div class="form-group">
						<label> table id </label>
						<input type="text" name="tbid" class="form-control" placeholder="This will automatically generate" readonly> 
					</div>
					<div class="form-group">
						<label> Table Number </label>
						<input type="text" name="tnumber" class="form-control" placeholder="Enter Table Number" > 
					</div>
				</div>                   

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" name="addTable" class="btn btn-primary">Add New Table</button>
				</div>
			</form>

		</div>
	  </div>
	</div>
	
	<!--retrive data from database-->
	<div class="container-fluid">

	<div class="card shadow mb-4">
	  <div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Tables Managing
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#tabledetail">
				  Add New Table  
			</button>
		</h6>
	  </div>

	  <div class="card-body">

	<!--    session for showing the message-->   

	   <?php 
		  if(isset($_SESSION['success']) && $_SESSION['success'] != '') 
			 {
			  echo '<h2 style="color: crimson">'.$_SESSION['success'].'</h2>';
			  unset($_SESSION['success']);
			 }

		  if(isset($_SESSION['status']) && $_SESSION['status'] != '') 
			 {
			  echo '<h2 style="color: crimson">'.$_SESSION['status'].'</h2>';
			  unset($_SESSION['status']);
			 }
		 ?>

		<div class="table-responsive">


		 <?php
			$connection = mysqli_connect("localhost", "root", "", "final_project");
			$query = "SELECT * FROM tables";
			$query_run = mysqli_query($connection,$query);
		 ?>

		  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			  <tr>
				<td> Table ID </td>
				<td> Table Number </td>

				<td> EDIT </td>
				<td> DELETE </td>
			  </tr>
			</thead>
			<tbody>

			 <?php
				if(mysqli_num_rows($query_run) > 0)
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
						?>

			  <tr>
			   <td><?php echo $row['tbid']; ?></td>
			   <td><?php echo $row['tnumber']; ?></td>

				<td>
					<form action="tableDUpdate.php" method="post">
						<input type="hidden" name="edit_tbid" value="<?php echo $row['tbid'];?>">
						<button type="submit" data-toggle="" name="editTable" class="btn btn-success" data-target="">EDIT</button>
					</form>
				</td>
				<td>
					<form action="admin.php" method="post">
					  <input type="hidden" name="delete_tbid" value="<?php echo $row['tbid'];?>">
					  <button type="submit" name="deleteTable" class="btn btn-danger"> DELETE </button>
					</form>
				</td>
			  </tr>

			<?php
					}
				}

				else
				{
					echo "No record found!";
				}

				?>

			</tbody>
		  </table>

		</div>
	  </div>
	</div>
	</div>

	
	
	
	
	<?php
	include('includes/scripts.php');
	include('includes/footer.php');
	?>
	
</body>
</html>
