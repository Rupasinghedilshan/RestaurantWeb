
<!--Edit admin details-->

<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

 
		<?php
			$connection = mysqli_connect("localhost","root","","final_project");

			if(isset($_POST['edit_btn']))
			{
				$uid = $_POST['edit_id'];
				$query = "SELECT * FROM user WHERE uid = '$uid' "; 
				$query_run = mysqli_query($connection, $query);

				foreach ($query_run as $row)
				{
					?>
					
		<div class="container-fluid">

		<!-- DataTales Example -->
		<div class="card shadow mb-4">
		  	<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Edit Admin Details
				</h6>
		  	</div>
		  	
		  	<form action="admin.php" method="POST">
		  	<div class="card-body">
		  	
		  		<div class="form-group">
					<label> User id </label>
					<input type="text" value="<?php echo $row['uid'] ?>" name="euid" class="form-control" placeholder="Enter User ID" readonly> 
				</div>
				<div class="form-group">
					<label> User Name </label>
					<input type="text" value="<?php echo $row['uname'] ?>" name="euname" class="form-control" placeholder="Enter User Name">
				</div>
				<div class="form-group">
					<label> User Password </label>
					<input type="text" value="<?php echo $row['upass'] ?>" name="eupass" class="form-control" placeholder="Update password">
				</div>
				<div class="form-group">
					<label>Contact</label>
					<input type="text" value = "<?php echo $row['contact'] ?>" name="econtact" class="form-control" placeholder="Enter mobile number">
				</div>
				
			</div>
			
			</div>
			<div class="modal-footer" align="center">
				<a href="adminProfile.php" class="btn btn-danger"> Cancel </a>
				<button type="submit" name="updateadminbtn" class="btn btn-primary">Update</button>
			</div>
			
			</form>
		</div>		

				<?php
				}
			}

?>
            
        

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>



