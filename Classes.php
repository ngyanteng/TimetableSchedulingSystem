<?php include("header.php");?> 	
<title>Classes</title>
<?php include("container.php");?> 

	  <!-- Add new class modal -->
	  <div class="modal fade" id="new-class-modal" tabindex="-1" role="dialog" aria-labelledby="new-class-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="new-class-modal-label">New class</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="new-class-form" name="new-class-form" id="newClassForm">
			  <div class="modal-body">
			    <input type="hidden" for="data-type" name="data-type" value="classes"/> 
				<input type="hidden" for="trim-id" name="trim-id" value="none"/>
				<div class="form-group">
				  <label for="new-subject-code" class="col-form-label">Subject Code:</label>
				  <select name="new-subject-code" id="new-subject-code" class="custom-select">
				    <option value="none" selected>-- Select subject code --</option>
					<?php
					//connect to server
					include('src/db/connect_db.php');

					$query = "SELECT subj_code FROM subjects ORDER BY subj_code";
					$result = $conn->query($query);
					if (!$result) 
						die('Couldn\'t fetch records');
					while ($row = $result->fetch_array(MYSQLI_NUM)) {
						echo '<option value="'.$row[0].'">'.$row[0].'</option>';
					}
					?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="new-class-code" class="col-form-label">Class Code:</label><br>
				  <input type="text" class="form-control" name="new-class-code">
				</div>
				<div class="form-group add-lecturer">
				  <label for="new-lecturer-code[]" class="col-form-label">Lecturer Code:</label>
				  <div class="input-group">
				    <span id="wrapper">
				      <select name="new-lecturer-code[]" id="new-lecturer-code" class="custom-select" >
				      <option value="none" selected>-- Select lecturer code --</option>
					  <?php include('fetch_lect.php');?>
				      </select>
				    </span>
				    <button type="button" class="btn btn-success input-group-btn add-lecturer-btn"><i class="fas fa-user-plus"></i></button>
				  </div>
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
	  
	  <!-- Edit class modal -->
	  <div class="modal fade" id="edit-class-modal" tabindex="-1" role="dialog" aria-labelledby="edit-class-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="edit-class-modal-label">Edit class</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="edit-class-form" name="edit-class-form" id="editClassForm">
			  <div class="modal-body">
			    <input type="hidden" for="data-type" name="data-type" value="classes"/> 
			    <input type="hidden" for="class-id" name="class-id"/> 
			    <div class="form-group">
				  <label for="edit-subject-code" class="col-form-label">Subject Code:</label>
				  <select name="edit-subject-code" id="edit-subject-code" class="custom-select">
					<?php
					//connect to server
					include('src/db/connect_db.php');

					$query = "SELECT subj_id, subj_code FROM subjects ORDER BY subj_code";
					$result = $conn->query($query);
					if (!$result) 
						die('Couldn\'t fetch records');
					while ($row = $result->fetch_array(MYSQLI_NUM)) {
						echo '<option value="'.$row[0].'">'.$row[1].'</option>';
					}
					?>
				  </select>
				</div>
				<div class="form-group">
				  <label for="edit-class-code" class="col-form-label">Class Code:</label><br>
				  <input type="text" class="form-control" name="edit-class-code">
				</div>
				<div class="form-group add-lecturer">
				  <label for="edit-lecturer-code" class="col-form-label">Lecturer Code:</label>
				  <div class="input-group">
				    <span id="wrapper">
				      <select name="edit-lecturer-code" id="edit-lecturer-code" class="custom-select">
					  <?php include('fetch_lect.php');?>
				      </select>
				    </span>
				    <button type="button" class="btn btn-success input-group-btn add-lecturer-btn"><i class="fas fa-user-plus"></i></button>
				  </div>
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
	  
	  <!-- Delete class modal -->
	  <div class="modal fade" id="delete-class-modal" tabindex="-1" role="dialog" aria-labelledby="delete-class-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="delete-class-modal-label">Delete class</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="delete-class-form" name="delete-class-form" id="deleteClassForm">
			<div class="modal-body">
			  <input type="hidden" for="data-type" name="data-type" value="classes"/>
			  <input type="hidden" for="class-id" name="class-id"/>
			  <p>Are you sure you want to delete this class?</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Delete</button>
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Multi delete classes modal -->	  
	  <div class="modal fade" id="multi-delete-class-modal" tabindex="-1" role="dialog" aria-labelledby="multi-delete-class-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="multi-delete-class-modal-label">Delete classes</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="multi-delete-class-form" name="multi-delete-class-form" id="multiDeleteClassForm">
			<div class="modal-body">
			  <input type="hidden" for="data-type" name="data-type" value="classes"/>
			  <p>Are you sure you want to delete selected classes?</p>
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
	  <div class="modal fade" id="import-classes-modal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="importModalLabel">Import CSV file</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="import-classes-form" name="import-classes-form" id="importClassesForm" action="src/form/import_csv.php" method="POST" enctype="multipart/form-data">
			  <input type="hidden" for="trim-id" name="trim-id" value="none"/>
			  <input type="hidden" for="data-file" name="data-file" value="classes"/>
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
	  <div class="modal fade" id="trimester-modal" tabindex="-1" role="dialog" aria-labelledby="trimester-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="trimester-modal-label">Select Trimester</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="select-trimester-form" name="select-trimester-form" id="selectTrimesterForm">
			<div class="modal-body">
				<div class="form-group">
				  <select name="trimester-code" id="trimester-code" class="custom-select">
				    <option value="none" selected>-- Select trimester --</option>
					<?php
					//connect to server
					include('src/db/connect_db.php');

					$query = "SELECT * FROM trimesters ORDER BY trim_code";
					$result = $conn->query($query);
					if (!$result) 
						die('Couldn\'t fetch records');
					while ($row = $result->fetch_array(MYSQLI_NUM)) {
						echo '<option value="'.$row[0].'">'.$row[1].'</option>';
					}
					?>
				  </select>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Select</button>
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  
	<div class="content-padding">
	<h3 id="page-title">Classes</h3>
	
	  <!-- Toolbar -->
	  <div id="toolbar">
		<button type="button" class="btn common-btn btn-add" data-toggle="modal" data-target="#new-class-modal" disabled>+ Add</button>
		<button type="button" class="btn common-btn btn-import" data-toggle="modal" data-target="#multi-delete-class-modal" disabled>Delete</button>
		<button class="btn common-btn btn-import" data-toggle="modal" data-target="#import-classes-modal" disabled>
		  Import CSV File
		</button>
		<form class="export-subject-form" name="export-subject-form" id="exportSubjectForm" action="src/form/export_csv.php" method="POST" style="display: inline;">
		  <input type="hidden" for="data-type" name="data-type" value="classes"/> 
		  <input type="hidden" for="trim-id" name="trim-id" value="none"/>
		  <input type="hidden" for="trim-code" name="trim-code" value="none"/>
		  <button type="submit" class="btn common-btn btn-export" disabled>
		    Export CSV File
		  </button>
		</form>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#trimester-modal">
		  Select Trimester
		</button>
	  </div>
	  
	  <!-- Classes table -->
	  <table id="classes-table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" data-toggle="table" data-search="true" data-show-columns="true" data-show-multi-sort="true" data-toolbar="#toolbar">
		<thead>
		  <tr>
			<th data-sortable="true">No.
			</th>
			<th data-sortable="true">Subject Code
			</th>
			<th data-sortable="true">Class Code
			</th>
			<th data-sortable="true">Lecturer Code
			</th>
			<th>Actions
			</th>
		  </tr>
		</thead>
	    <tbody>
		<?php
		include("src/db/connect_db.php");

		$count = 1;
		$query = "SELECT * FROM classes";
		$result = $conn->query($query);
		if (!$result) die('Couldn\'t fetch records');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			echo '<tr data-id="'.$row[0].'" data-trim="'.$row[4].'" class="d-none">
					<td><input type="checkbox" name="class-checkbox[]" value="'.$row[0].'" form="multiDeleteClassForm"> '.$count.'</td>
					<td class="subject-code">'.$row[1].'</td>
					<td class="class-code">'.$row[2].'</td>
					<td class="lecturer-code">'.$row[3].'</td>
					<td>
					  <button type="button" class="btn btn-success edit-class-btn"><i class="fas fa-edit"></i></button>
					  <button type="button" class="btn btn-danger delete-class-btn"><i class="far fa-trash-alt"></i></button>
					</td>
				  </tr>';
			$count++;
		}
		?>
		<tr>
		  <td colspan="7" class="text-center">Select a trimester.</td>
		</tr>
		<tr class="d-none">
		  <td colspan="7" class="text-center">No classes found in this trimester.</td>
		</tr>
		</tbody>
	  </table>

	</div>

<?php include("footer.php");?> 