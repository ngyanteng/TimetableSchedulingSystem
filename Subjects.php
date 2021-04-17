<?php include("header.php");?> 	
<title>Subjects</title>
<?php include("container.php");?> 	

	 <!-- Add new subject modal -->
	  <div class="modal fade" id="new-subject-modal" tabindex="-1" role="dialog" aria-labelledby="new-subject-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="new-subject-modal-label">New subject</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="new-subject-form" name="new-subject-form" id="newSubjectForm">
			  <div class="modal-body">
				<input type="hidden" for="data-type" name="data-type" value="subjects"/> 
				<div class="form-group">
				  <label for="new-subject-code" class="col-form-label">Subject Code:</label>
				  <input type="text" class="form-control" name="new-subject-code">
				</div>
				<div class="form-group">
				  <label for="new-subject-name" class="col-form-label">Subject Name:</label>
				  <input type="text" class="form-control" name="new-subject-name">
				</div>
				<div class="form-group">
				  <label for="new-specialization" class="col-form-label">Specialization:</label><br>
				  <input type="radio" name="new-specialization" value="NONE">
				  <label for="NONE">NONE</label>
				  <input type="radio" name="new-specialization" value="SE">
				  <label for="SE">SE</label>
				  <input type="radio" name="new-specialization" value="DS">
				  <label for="DS">DS</label>
				  <input type="radio" name="new-specialization" value="GD">
				  <label for="GD">GD</label>
				  <input type="radio" name="new-specialization" value="IS">
				  <label for="IS">IS</label>
				  <input type="radio" name="new-specialization"value="CS">
				  <label for="CS">CS</label>
				</div>
				<div class="form-group">
				  <label for="new-lecture-hours" class="col-form-label">Lecture Hours:</label><br>
				  <input type="number" class="form-control" name="new-lecture-hours" min="1" max="4">
				</div>
				<div class="form-group">
				  <label for="new-tutorial-hours" class="col-form-label">Tutorial Hours:</label><br>
				  <input type="number" class="form-control" name="new-tutorial-hours" min="1" max="4">
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
	  
	  <!-- Edit subject modal -->
	  <div class="modal fade" id="edit-subject-modal" tabindex="-1" role="dialog" aria-labelledby="edit-subject-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="editSubjectModalLabel">Edit subject</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="edit-subject-form" name="edit-subject-form" id="editSubjectForm">
			<div class="modal-body">
				<input type="hidden" for="data-type" name="data-type" value="subjects"/> 
				<input type="hidden" for="subject-id" name="subject-id"/> 
				<div class="form-group">
				  <label for="edit-subject-code" class="col-form-label">Subject Code:</label>
				  <input type="text" class="form-control" name="edit-subject-code">
				</div>
				<div class="form-group">
				  <label for="edit-subject-name" class="col-form-label">Subject Name:</label>
				  <input type="text" class="form-control" name="edit-subject-name">
				</div>
				<div class="form-group">
				  <label for="edit-specialization" class="col-form-label">Specialization:</label><br>
				  <input type="radio" name="edit-specialization" id="NONE" value="NONE">
				  <label for="NONE">NONE</label>
				  <input type="radio" name="edit-specialization" id="SE" value="SE">
				  <label for="SE">SE</label>
				  <input type="radio" name="edit-specialization" id="DS" value="DS">
				  <label for="DS">DS</label>
				  <input type="radio" name="edit-specialization" id="GD" value="GD">
				  <label for="GD">GD</label>
				  <input type="radio" name="edit-specialization" id="IS" value="IS">
				  <label for="IS">IS</label>
				  <input type="radio" name="edit-specialization" id="CS" value="CS">
				  <label for="CS">CS</label>
				</div>
				<div class="form-group">
				  <label for="edit-lecture-hours" class="col-form-label">Lecture Hours:</label><br>
				  <input type="number" class="form-control" name="edit-lecture-hours" min="1" max="4">
				</div>
				<div class="form-group">
				  <label for="edit-tutorial-hours" class="col-form-label">Tutorial Hours:</label><br>
				  <input type="number" class="form-control" name="edit-tutorial-hours" min="1" max="4">
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
	  
	  <!-- Delete subject modal -->
	  <div class="modal fade" id="delete-subject-modal" tabindex="-1" role="dialog" aria-labelledby="delete-subject-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="delete-subject-modal-label">Delete subject</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="delete-subject-form" name="delete-subject-form" id="deleteSubjectForm">
			<div class="modal-body">
			  <input type="hidden" for="data-type" name="data-type" value="subjects"/>
			  <input type="hidden" for="subject-id" name="subject-id"/>
			  <p>Are you sure you want to delete this subject?</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Delete</button>
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Multi delete subjects modal -->
	  <div class="modal fade" id="multi-delete-subject-modal" tabindex="-1" role="dialog" aria-labelledby="multi-delete-subject-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="multi-delete-subject-modal-label">Delete subjects</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="multi-delete-subject-form" name="multi-delete-subject-form" id="multiDeleteSubjectForm">
			<div class="modal-body">
			  <input type="hidden" for="data-type" name="data-type" value="subjects"/>
			  <p>Are you sure you want to delete selected subjects?</p>
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
	  <div class="modal fade" id="import-subject-modal" tabindex="-1" role="dialog" aria-labelledby="import-subject-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="import-subject-modal-label">Import CSV file</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="import-subject-form" name="import-subject-form" id="importSubjectForm" action="src/form/import_csv.php" method="POST" enctype="multipart/form-data">
			  <input type="hidden" for="data-file" name="data-file" value="subjects"/>
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
	  <h3>Subjects</h3>
	  
	  <!-- Toolbar -->
	  <div id="toolbar">
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#new-subject-modal">+ Add</button>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#multi-delete-subject-modal">Delete</button>
		<label class="btn common-btn" data-toggle="modal" data-target="#import-subject-modal">
		  Import CSV File
		</label>
		<form class="export-subject-form" name="export-subject-form" id="exportSubjectForm" action="src/form/export_csv.php" method="POST" style="display: inline;">
		  <input type="hidden" for="data-type" name="data-type" value="subjects"/> 
		  <button type="submit" class="btn common-btn">
		    Export CSV File
		  </button>
		</form>
	  </div>
	  
	  <!-- Subjects table -->
	  <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" data-toggle="table" data-search="true" data-show-columns="true" data-show-multi-sort="true" data-toolbar="#toolbar">
		<thead>
		  <tr>
			<th data-sortable="true">No.
			</th>
			<th data-sortable="true">Subject Code
			</th>
			<th data-sortable="true">Subject Name
			</th>
			<th data-sortable="true">Specialization
			</th>
			<th data-sortable="true">Lecture Hours
			</th>
			<th data-sortable="true">Tutorial Hours
			</th>
			<th>Actions
			</th>
		  </tr>
		</thead>
	    <tbody>
		<?php
		include("src/db/connect_db.php");
		$count = 1;
		$query = "SELECT * FROM subjects";
		$result = $conn->query($query);
		if (!$result) die('Couldn\'t fetch records');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			echo '<tr data-id="'.$row[0].'">
				<td><input type="checkbox" name="subject-checkbox[]" value="'.$row[0].'" form="multiDeleteSubjectForm"> '.$count.'</td>
				<td class="subject-code">'.$row[1].'</td>
				<td class="subject-name">'.$row[2].'</td>
				<td class="spec">'.$row[3].'</td>
				<td class="lect-hours">'.$row[4].'</td>
				<td class="tuto-hours">'.$row[5].'</td>
				<td>
				  <button type="button" class="btn btn-success edit-subject-btn"><i class="fas fa-edit"></i></button>
				  <button type="button" class="btn btn-danger delete-subject-btn"><i class="fas fa-trash-alt"></i></button>
				</td>
				</tr>';
		  $count++;
		}
		?>
		</tbody>
	  </table>

	</div>

<?php include("footer.php");?> 