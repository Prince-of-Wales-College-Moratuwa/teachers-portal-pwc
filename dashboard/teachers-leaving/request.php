<?php
// Include necessary files and establish database connection
$page = 'teachers-leaving';
include '../../database_connection.php';
include '../../functions.php';

require('../fpdf/fpdf.php');

// Check if user is logged in as admin
if (!is_admin_login()) {
    header('location:../index.php');
    exit();
}

// Check if the form is submitted
if (isset($_POST['request_leave'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $number = $_POST['number'];
    $designation = $_POST['designation'];
    $daycount = $_POST['daycount'];
    $leavesthisyear = $_POST['leavesthisyear'];
    $date1stappoi = $_POST['date1stappoi'];
    $datestart = $_POST['datestart'];
    $datereturn = $_POST['datereturn'];
    $Reason = $_POST['Reason'];
    $leavetype = $_POST['leavetype'];

    // Prepare SQL statement
    $sql = "INSERT INTO teachers_leave (name, number, designation, daycount, leavesthisyear, date1stappoi, datestart, datereturn, Reason, leavetype) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Prepare and execute the SQL statement with positional placeholders
    $stmt = $connect->prepare($sql);
    $stmt->execute([$name, $number, $designation, $daycount, $leavesthisyear, $date1stappoi, $datestart, $datereturn, $Reason, $leavetype]);


    // Redirect to requested.php after successful submission
    header('Location: requested.php');
    exit();
}

// Include header
include '../admin-header.php';
?>

<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Application for Leave</h1>

    <!-- Breadcrumb -->
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/teachers-leaving">Teachers' Leave</a></li>
        <li class="breadcrumb-item active">Application</li>
    </ol>

    <!-- Form -->
    <div class="card mb-4">
        <div class="card-header">
            Application for Leave
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Form fields -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Teacher's Number</label>
                            <input type="number" name="number" id="number" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Number of Days Leave Applied For</label>
                            <input type="number" name="daycount" id="daycount" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Number of Leaves Taken in Current Year</label>
                            <input type="number" name="leavesthisyear" id="leavesthisyear" class="form-control"
                                required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Date of First Appointment</label>
                            <input type="date" name="date1stappoi" id="date1stappoi" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Start Date of the Leave</label>
                            <input type="date" name="datestart" id="datestart" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Date of Return for Duties</label>
                            <input type="date" name="datereturn" id="datereturn" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="leavetype">Type of Leave</label>
                            <select class="form-select" id="leavetype" name="leavetype" required>
                                <option value="none" disabled selected>---Select---</option>
                                <option value="casual">Casual</option>
                                <option value="medical">Medical</option>
                                <option value="maternity">Maternity</option>
                                <option value="duty">Duty</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Reason</label>
                            <textarea id="Reason" name="Reason" rows="4" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>



        <div class="mt-4 mb-3 text-center">
            <input type="submit" name="request_leave" class="btn btn-success" value="Request" />
        </div>
        </form>
    </div>
</div>
</div>

<?php
// Include footer
include '../admin-footer.php';
?>