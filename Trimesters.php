<?php include('header.php');?>   
<title>Trimesters</title>
<?php include('container.php');?> 
	  
	 <!-- Add new trimester modal -->
	  <div class="modal fade" id="new-trimester-modal" tabindex="-1" role="dialog" aria-labelledby="new-trimester-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="new-trimester-modal-label">New trimester</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="new-trimester-form" name="new-trimester-form" id="newTrimesterForm">
			<div class="modal-body">
				<input type="hidden" for="data-type" name="data-type" value="trimesters"/> 
				<div class="form-group">
				  <label for="new-trimester-code" class="col-form-label">Trimester Code:</label>
				  <input type="text" class="form-control" name="new-trimester-code">
				</div>
				<div class="form-group">
				  <label for="new-trimester-name" class="col-form-label">Trimester Name:</label>
				  <input type="text" class="form-control" name="new-trimester-name">
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
	  
	  <!-- Edit trimester modal -->
	  <div class="modal fade" id="edit-trimester-modal" tabindex="-1" role="dialog" aria-labelledby="edit-trimester-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="edit-trimester-modal-label">Edit trimester</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="edit-trimester-form" name="edit-trimester-form" id="editTrimesterForm">
			<div class="modal-body">
				<input type="hidden" for="data-type" name="data-type" value="trimesters"/> 
				<input type="hidden" for="trimester-id" name="trimester-id"/> 
				<div class="form-group">
				  <label for="edit-trimester-code" class="col-form-label">Trimester Code:</label>
				  <input type="text" class="form-control" name="edit-trimester-code">
				</div>
				<div class="form-group">
				  <label for="edit-trimester-name" class="col-form-label">Trimester Name:</label>
				  <input type="text" class="form-control" name="edit-trimester-name">
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
	  
	  <!-- Delete trimester modal -->
	  <div class="modal fade" id="delete-trimester-modal" tabindex="-1" role="dialog" aria-labelledby="delete-trimester-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="delete-trimester-modal-label">Delete trimester</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="delete-trimester-form" name="delete-trimester-form" id="deleteTrimesterForm">
			<div class="modal-body">
			  <input type="hidden" for="data-type" name="data-type" value="trimesters"/>
			  <input type="hidden" for="trimester-id" name="trimester-id"/>
			  <p>Are you sure you want to delete this trimester? Classes in this trimester will also be deleted.</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Delete</button>
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Multi delete trimesters modal -->
	  <div class="modal fade" id="multi-delete-trimester-modal" tabindex="-1" role="dialog" aria-labelledby="multi-delete-trimester-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="multi-delete-trimester-modal-label">Delete trimesters</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="multi-delete-trimester-form" name="multi-delete-trimester-form" id="multiDeleteTrimesterForm">
			<div class="modal-body">
			  <input type="hidden" for="data-type" name="data-type" value="trimesters"/>
			  <p>Are you sure you want to delete this trimester? Classes in these trimesters will also be deleted.</p>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Delete</button>
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <div class="content-padding">
	  <h3>Trimesters</h3>
	  
	  <!-- Toolbar -->
	  <div id="toolbar">
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#new-trimester-modal">+ Add</button>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#multi-delete-trimester-modal">Delete</button>
	  </div>
	  
	  <!-- Trimester table -->
	  <table id="table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" data-toggle="table" data-search="true" data-show-columns="true" data-show-multi-sort="true" data-toolbar="#toolbar">
		<thead>
		  <tr>
			<th data-sortable="true">No.
			</th>
			<th data-sortable="true">Trimester Code
			</th>
			<th data-sortable="true">Trimester Name
			</th>
			<th>Actions
			</th>
		  </tr>
		</thead>
	    <tbody>
		<?php
		//connect to server
		include('src/db/connect_db.php');
		$count = 1;
		$query = "SELECT * FROM trimesters";
		$result = $conn->query($query);
		if (!$result) die('Couldn\'t fetch records');
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			echo '<tr data-id="'.$row[0].'">
				<td><input type="checkbox" name="trimester-checkbox[]" value="'.$row[0].'" form="multiDeleteTrimesterForm"> '.$count.'</td>
				<td class="trimester-code">'.$row[1].'</td>
				<td class="trimester-name">'.$row[2].'</td>
				<td>
				  <button type="button" class="btn btn-success edit-trimester-btn"><i class="fas fa-edit"></i></button>
				  <button type="button" class="btn btn-danger delete-trimester-btn"><i class="far fa-trash-alt"></i></button>
				</td>
				</tr>';
		  $count++;
		}
		?>
		</tbody>
	  </table>
	</div>

<?php include('footer.php');?> 