<?php

$page = 'teachers-leaving';

include '../../database_connection.php';

include '../../functions.php';

if(!is_admin_login())
{
	header('location:../../index.php');
	exit();
}


include '../admin-header.php';

?>

<div class="container-fluid py-4">
	<div class="dropdown">
		<h1 class="mb-5">Teachers Leave Register</h1>
	</div>

	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<a href="/dashboard/teachers-leaving/request">
					<div class="card-body text-white">
						<h5 class="text-center">Request Leave</h5>
					</div>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<a href="/dashboard/teachers-leaving/download" style="text-decoration: none; color: inherit;">
					<div class="card-body text-white">
						<h5 class="text-center">Download</h5>
					</div>
				</a>
			</div>
		</div>

        <div class="col-xl-3 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<a href="/dashboard/teachers-leaving/absent" style="text-decoration: none; color: inherit;">
					<div class="card-body text-white">
						<h5 class="text-center">Absent Teachers List</h5>
					</div>
				</a>
			</div>
		</div>

	</div>
</div>

<?php

include '../admin-footer.php';

?>