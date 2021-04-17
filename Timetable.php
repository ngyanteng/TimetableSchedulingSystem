<?php include("header.php");?> 
	<title>Timetable</title>
<?php include("container.php");?>
	
	<!-- Select blackout slot modal -->
	<div class="modal fade" id="blackout-modal" tabindex="-1" role="dialog" aria-labelledby="blackout-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="blackout-modal-label">Select black out slot</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			  <div class="form-group">
				<select name="blackout-slot" id="blackout-slot" class="custom-select" form="timetableForm">
				    <option value="-1" selected>None</option>
					<option value="1">Monday, 9.00am - 11.00am</option>
					<option value="2">Monday, 11.00am - 1.00pm</option>
					<option value="3">Monday, 2.00pm - 4.00pm</option>
					<option value="4">Monday, 4.00pm - 6.00pm</option>
					<option value="5">Tuesday, 9.00am - 11.00am</option>
					<option value="6">Tuesday, 11.00am - 1.00pm</option>
					<option value="7">Tuesday, 2.00pm - 4.00pm</option>
					<option value="8">Tuesday, 4.00pm - 6.00pm</option>
					<option value="9">Wednesday, 9.00am - 11.00am</option>
					<option value="10">Wednesday, 11.00am - 1.00pm</option>
					<option value="11">Wednesday, 2.00pm - 4.00pm</option>
					<option value="12">Wednesday, 4.00pm - 6.00pm</option>
					<option value="13">Thursday, 9.00am - 11.00am</option>
					<option value="14">Thursday, 11.00am - 1.00pm</option>
					<option value="15">Thursday, 2.00pm - 4.00pm</option>
					<option value="16">Thursday, 4.00pm - 6.00pm</option>
					<option value="17">Friday, 9.00am - 11.00am</option>
					<option value="18">Friday, 11.00am - 1.00pm</option>
					<option value="19">Friday, 2.00pm - 4.00pm</option>
					<option value="20">Friday, 4.00pm - 6.00pm</option>
				</select>
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
			</div>
		  </div>
		</div>
	  </div>
	  
	  <!-- Select trimester modal -->
	  <div class="modal fade" id="trimester-modal" tabindex="-1" role="dialog" aria-labelledby="trimester-modal-label" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="trimester-modal-label">Select trimester</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="timetable-form" name="timetable-form" id="timetableForm" action="handle_timetable.php" method="POST">
			  <div class="modal-body">
				<div class="form-group">
				  <select name="trimester-id" id="trimester-id" class="custom-select">
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
				  <script type="text/javascript">
					document.getElementById('trimester-id').value = "<?php echo $_POST['trimester-id'];?>";
				  </script>
				</div>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary" name="action" value="filter">Select</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	  
	  <!-- Filter subject modal -->
	  <div class="modal fade" id="filter-subject-modal" tabindex="-1" role="dialog" aria-labelledby="subject-modal-label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="subject-modal-label">Filter subject</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="filter-subject-form" name="filter-subject-form" id="filterSubjectForm">
			<div class="modal-body">
				<div class="form-group">
				  <select name="subject-code" id="subject-code" class="custom-select" size="10">
				    <option value="none" selected>-- Filter subject --</option>
					<?php
						//connect to server
						include('src/db/connect_db.php');
						$query = "SELECT subj_code, subj_name FROM subjects ORDER BY subj_name";
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
	  
	  <!-- Filter lecturer modal -->
	  <div class="modal fade" id="filter-lecturer-modal" tabindex="-1" role="dialog" aria-labelledby="lecturer-modal-label" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="lecturer-modal-label">Filter lecturer</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="filter-lecturer-form" name="filter-lecturer-form" id="filterLecturerForm">
			<div class="modal-body">
				<div class="form-group">
				  <select name="lecturer-code" id="lecturer-code" class="custom-select" size="10">
				    <option value="none" selected>-- Filter lecturer --</option>
					<?php
						//connect to server
						include('src/db/connect_db.php');
						$query = "SELECT lect_code FROM lecturers ORDER BY lect_code";
						$result = $conn->query($query);
						if (!$result) 
							die('Couldn\'t fetch records');
						while ($row = $result->fetch_array(MYSQLI_NUM)) {
							echo '<option value="'.$row[0].'">'.$row[0].'</option>';
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
	  <h3 id="page-title">Timetable</h3>
	  
	  <!-- Toolbar -->
	  <div id="toolbar">
	    <div class="btn-group role="group">
	    <button type="submit" class="btn common-btn generate-btn" name="action" value="generate" form="timetableForm">Generate</button>
		<button type="button" class="btn common-btn blackout-btn" data-toggle="modal" data-target="#blackout-modal"><i class="fas fa-cog"></i></button>
		</div>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#trimester-modal">
		  Select Trimester
		</button>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#filter-subject-modal">
		  Filter Subject
		</button>
		<button type="button" class="btn common-btn" data-toggle="modal" data-target="#filter-lecturer-modal">
		  Filter Lecturer
		</button>
	  </div>
	  
	  <!-- Timetable table -->
	  <table id="timetable-table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" data-toggle="table" data-toggle="table" data-show-columns="true" data-toolbar="#toolbar">
		<thead>
		  <tr>
			<th>Time
			</th>
			<th>Monday
			</th>
			<th>Tuesday
			</th>
			<th>Wednesday
			</th>
			<th>Thursday
			</th>
			<th>Friday
			</th>
		  </tr>
		</thead>
	    <tbody>
		<?php include('view_timetable.php');?>
		</tbody>
	  </table>

	</div>

<?php include("footer.php");?> 