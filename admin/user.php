<?php 
    session_start();
    include 'inc/header.php'; 
		include 'inc/conn.php';
		
		$edit_state = false;
		// Update
	if (isset($_POST['update'])) {
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		
		mysqli_query($conn, "UPDATE users SET firstname = '$firstname', lastname = '$lastname',email = '$email', phone = '$phone' WHERE user_id = $id");
		header("Location:user.php?Updated");
		exit();
	}

	// Fetch Data into textbox
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id");
		$record = mysqli_fetch_array($rec);
		$firstname = $record['firstname'];
		$lastname = $record['lastname'];
		$email = $record['email'];
		$phone = $record['phone'];
	}

	// Delete
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		mysqli_query($conn, "DELETE FROM users WHERE user_id = $id");
		header("Location:user.php?Deleted");
	}

	// View 
	$sql = "SELECT * FROM users ORDER BY user_id DESC";
	$result = mysqli_query($conn, $sql);

?>
<?php include 'inc/horizonnav.php'; ?>     
<div class="container-fluid">
	<div class="row">
		<h3 class="center">User</h3>
		<div class="col s12 m3 l3 xl3 left black-text">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style="margin-top: 30px;">
				<div class="card-panel z-depth-2 hoverable">
						<div class="row">
								<div class="input-field">
										<input type="text" name="firstname" autocomplete="off" value="<?php echo $firstname; ?>" id="firstname">
										<label for="firstname">Firstname</label>
								</div>
						</div>
						<div class="row">
								<div class="input-field">
										<input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" autocomplete="off">
										<label for="lastname">Lastname</label>
								</div>
						</div>
						<div class="row">
								<div class="input-field">
										<input type="text" name="email" data-error="invalid" value="<?php echo $email; ?>" id="email" autocomplete="off">
										<label for="email">Email</label>
								</div>
						</div>
						<div class="row">
								<div class="input-field">
										<input type="text" id="phone" data-length="10" value="<?php echo $phone; ?>" name="phone" autocomplete="off">
										<label for="phone">Phone no</label>
								</div>
						</div>                    
						<div class="row">
							<div class="input-field">
								<?php if ($edit_state == false) : ?> 
								<input type="submit" value="Save" name="save" class="btn teal btn-small">
								<?php else: ?>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<input type="submit" value="Update" name="update" class="btn blue btn-small">
								<?php endif; ?>
							</div>
						</div>                    
				</div>
			</form>        
		</div>
		<div class="search">
			<div class="container">
				<form>
					<div class="input-field col s8 right" style="margin-top: 30px;">
						<input type="text" name="user" id="q" onkeyup="search()" autocomplete="off">
						<label for="label-icon"><i class="fa fa-search left"></i>Enter name to search</label>
					</div>
				</form>
			</div>
		</div>
		<div class="col s12 m9 l9 xl9 right  black-text" id="content">
			<table class="highlight responsive-table black-text" style="margin-top: 10px;"  id="searchTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php while ($row = mysqli_fetch_array($result)) { ?>
					<tr>	
						<td><?php echo $row['user_id']; ?></td>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone']; ?></td>
						<td>
							<a href="user.php?edit=<?php echo $row['user_id']; ?>" class="blue-text">edit <i class="fa fa-edit"></i></a> | 
							<a href="user.php?delete=<?php echo $row['user_id']; ?>" id="deleteBtn" class="red-text">delete <i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>    
</div>
<script>
// $("#deleteBtn").click(function(){
//         swal({
//             title: 'Are you sure?',
//             text: "You won't be able to revert this!",
//             type: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: 'Yes, delete it!'
//           }).then((result) => {
//             if (result.value) {
//               swal(
//                 'Deleted!',
//                 'Your file has been deleted.',
//                 'success'
//               )
//             }
//           });
//     });

function search() {
    // Declare variables 
    var input, filter, table, tr, td, i;
    input = document.getElementById("q");
    filter = input.value.toUpperCase();
    table = document.getElementById("searchTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
					tr[i].style.display = "none";
        }
      } 
    }
  }
</script>
<?php include 'inc/footer.php'; ?>

        