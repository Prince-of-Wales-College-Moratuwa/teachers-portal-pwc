<?php

$page = 'index';

include '../database_connection.php';

include '../functions.php';

if(!is_admin_login())
{
	header('location:../index.php');
	exit();
}


include 'admin-header.php';

?>


<div class="container-fluid py-4">
	<div class="dropdown">
		<h1 class="mb-5"> Dashboard </h1>
	</div>

	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary text-white mb-4">
				<a href="/dashboard/periodcount">
					<div class="card-body text-white">
						<h5 class="text-center">Project "8න් කීයද?"</h5>
					</div>
				</a>
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<a href="/dashboard/teachers-leaving/" style="text-decoration: none; color: inherit;">
					<div class="card-body text-white">
						<h5 class="text-center">Teachers' Leaving</h5>
					</div>
				</a>
			</div>
		</div>

		
		<iframe src="https://status.princeofwales.edu.lk/badge?theme=light" width="250" height="30"
            frameborder="0" scrolling="no" style="color-scheme: normal"></iframe>

	</div>
</div>

<?php

include 'admin-footer.php';

?>