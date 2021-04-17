<?php include('header.php');?> 
<title>Lecturers</title>
<?php include('container.php');?> 

	  <!-- Add new lecturer modal -->
	  <div class="modal fade" id="new-lecturer-modal" tabindex="-1" role="dialog" aria-labelledby="new-lecturer-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="new-lecturer-modal-label">New lecturer</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="new-lecturer-form" name="new-lecturer-form" id="newLecturerForm">
			  <div class="modal-body">
			    <input type="hidden" for="data-type" name="data-type" value="lecturers"/> 
				<div class="form-group">
				  <label for="new-lecturer-code" class="col-form-label">Lecturer Code:</label>
				  <input type="text" class="form-control" name="new-lecturer-code" id="new-lecturer-code">
				</div>
				<div class="form-group">
				  <label for="new-lecturer-name" class="col-form-label">Lecturer Name:</label>
				  <input type="text" class="form-control" name="new-lecturer-name" id="new-lecturer-name">
				</div>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Edit lecturer modal -->
	  <div class="modal fade" id="edit-lecturer-modal" tabindex="-1" role="dialog" aria-labelledby="edit-lecturer-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="edit-lecturer-modal-label">New lecturer</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="edit-lecturer-form" name="edit-lecturer-form" id="editLecturerForm">
			  <div class="modal-body">
			    <input type="hidden" for="data-type" name="data-type" value="lecturers"/> 
				<input type="hidden" for="lecturer-id" name="lecturer-id"/> 
				<div class="form-group">
				  <label for="edit-lecturer-code" class="col-form-label">Lecturer Code:</label>
				  <input type="text" class="form-control" name="edit-lecturer-code" id="edit-lecturer-code">
				</div>
				<div class="form-group">
				  <label for="edit-lecturer-name" class="col-form-label">Lecturer Name:</label>
				  <input type="text" class="form-control" name="edit-lecturer-name" id="edit-lecturer-name">
				</div>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary">Save</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Delete lecturer modal -->
	  <div class="modal fade" id="delete-lecturer-modal" tabindex="-1" role="dialog" aria-labelledby="delete-lecturer-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="delete-lecturer-modal-label">Delete lecturer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="delete-lecturer-form" name="delete-lecturer-form" id="deleteLecturerForm">
			  <div class="modal-body">
			    <input type="hidden" for="data-type" name="data-type" value="lecturers"/>
			    <input type="hidden" for="lecturer-id" name="lecturer-id"/> 
			    <p>Are you sure you want to delete this lecturer?</p>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary">Delete</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Multi delete lecturers modal -->
	  <div class="modal fade" id="multi-delete-lecturer-modal" tabindex="-1" role="dialog" aria-labelledby="multi-delete-lecturer-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="multi-delete-lecturer-modal-label">Delete lecturers</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="multi-delete-lecturer-form" name="multi-delete-lecturer-form" id="multiDeleteLecturerForm">
			  <div class="modal-body">
			    <input type="hidden" for="data-type" name="data-type" value="lecturers"/>
			    <p>Are you sure you want to delete selected lecturers?</p>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary">Delete</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Import csv file modal -->
	  <div class="modal fade" id="import-lecturer-modal" tabindex="-1" role="dialog" aria-labelledby="import-lecturer-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="import-lecturer-modal-label">Import CSV file</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="import-lecturer-form" name="import-lecturer-form" id="importLecturerForm" action="src/form/import_csv.php" method="POST" enctype="multipart/form-data">
			  <input type="hidden" for="data-file" name="data-file" value="lecturers"/>
			  <div class="modal-body">
		        <div class="btn-group" role="group" aria-label="import-csv-label">
				  <input type="file" class="btn common-btn" name="csv-import">
				</div>
			    <div class="modal-footer">
				  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  <button type="submit" class="btn btn-primary">Submit</button>
			    </div>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Export csv file modal -->
	  <div class="content-padding">
	  <h3>Lecturers</h3>
	  
	  <!-- Toolbar -->
	  <div id="toolbar">
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#new-lecturer-modal">+ Add</button>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#multi-delete-lecturer-modal">Delete</button>
		<label class="btn common-btn" data-toggle="modal" data-target="#import-lecturer-modal">
		  Import CSV File
		</label>
		<form class="export-lecturer-form" name="export-lecturer-form" id="exportSubjectForm" action="src/form/export_csv.php" method="POST" style="display: inline;">
		  <input type="hidden" for="data-type" name="data-type" value="lecturers"/> 
		  <button type="submit" class="btn common-btn">
		    Export CSV File
		  </button>
		</form>
	  </div>
	  
	  <!-- Lecturers table -->
	  <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" data-toggle="table"data-search="true" data-show-columns="true" data-show-multi-sort="true" data-toolbar="#toolbar">
		<thead>
		  <tr>
			<th data-sortable="true">No.
			</th>
			<th data-sortable="true">Lecturer Code
			</th>
			<th data-sortable="true">Lecturer Name
			</th>
			<th>Actions
			</th>
		  </tr>
		</thead>
	    <tbody>
		<?php
		//connect to server
		$servername = "localhost";
		$username = "root";
		$password = "";
		$sql = "";
		$count = 1;

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		if(!$conn)
			die("Could not connect to server: ".mysqli_connect_error());

		//select db
		$db_selected=mysqli_select_db($conn,"timetable_scheduling");

		$query = "SELECT * FROM lecturers";
		$result = $conn->query($query);
		if (!$result) die('Couldn\'t fetch records');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			echo '<tr data-id="'.$row[0].'">
				<td><input type="checkbox" name="lecturer-checkbox[]" value="'.$row[0].'" form="multiDeleteLecturerForm"> '.$count.'</td>
				<td class="lecturer-code">'.$row[1].'</td>
				<td class="lecturer-name">'.$row[2].'</td>
				<td>
				  <button type="button" class="btn btn-success edit-lecturer-btn"><i class="fas fa-edit"></i></button>
				  <button type="button" class="btn btn-danger delete-lecturer-btn"><i class="far fa-trash-alt"></i></button>
				</td>
				</tr>';
		  $count++;
		}
		?>
		</tbody>
	  </table>
	</div>

<?php include('footer.php');?> 