<?php

$page = 'periodcount';

include '../database_connection.php';

include './admin-functions.php';
include '../functions.php';


if(!is_admin_login())
{
	header('location:../admin_login.php');
	exit();
}

include 'admin-header.php';

$class = $_GET['class'];

?>

<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Edit - Grade <?php echo $class; ?></h1>

	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
		<li class="breadcrumb-item active">Period Count</li>
	</ol>

	<div class="card mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">
					<i class="fas fa-table me-1"></i> Period Count
				</div>
			
			</div>
		</div>
		<div class="card-body">
			<table id="datatablesSimple">
				<thead>
					<tr>
						<th>Grade</th>
						<th></th>
					</tr>
				</thead>

				<tbody>

	
				<tr>
				<td>Monday</td>
<td><a href="../admin/periodcount_edit.php?class=<?php echo $class; ?>&day=mon" class="btn btn-sm btn-primary">Edit</a></td>
</tr>
<tr>
    <td>Tuesday</td>
    <td><a href="../admin/periodcount_edit.php?class=<?php echo $class; ?>&day=tue" class="btn btn-sm btn-primary">Edit</a></td>
</tr>
<tr>
    <td>Wednesday</td>
    <td><a href="../admin/periodcount_edit.php?class=<?php echo $class; ?>&day=wed" class="btn btn-sm btn-primary">Edit</a></td>
</tr>
<tr>
    <td>Thursday</td>
    <td><a href="../admin/periodcount_edit.php?class=<?php echo $class; ?>&day=thu" class="btn btn-sm btn-primary">Edit</a></td>
</tr>
<tr>
    <td>Friday</td>
    <td><a href="../admin/periodcount_edit.php?class=<?php echo $class; ?>&day=fri" class="btn btn-sm btn-primary">Edit</a></td>
</tr>





				</tbody>
			</table>
		</div>
	</div>

</div>

<?php
include 'admin-footer.php';
?>