<?php

$page = 'teachers-leaving';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ref_no"])) {
    // Get reference number from the form
    $ref = $_POST["ref_no"];

    // Include necessary files
    require('../fpdf/fpdf.php');
    include '../../database_connection.php';

    // Construct SQL query with reference number
    $sql = "SELECT * FROM teachers_leave WHERE number = :ref";

    // Prepare and execute the SQL query using PDO
    $statement = $connect->prepare($sql);
    $statement->bindParam(':ref', $ref, PDO::PARAM_STR);
    $statement->execute();

    // Fetch the result
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Create PDF
    $pdf = new FPDF();
    $pdf->AddPage('P','A4');
    $pdf->SetMargins(10, 1, 5);
    $pdf->SetAutoPageBreak(true, 7);

    $pdf->AddFont('helvetica', '', 'helvetica.php');

    // Set font
    $pdf->SetFont('Arial', '', 11);

    // Display the title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, "TEACHERS' LEAVE REGISTER", 0, 1, 'C');
    $pdf->Ln();

    // Display the main information only once
    if (!empty($result)) {
        $row = $result[0]; // Get the first record
        $name = $row['name'];
        $number = $row['number'];
        $designation = $row['designation'];
        $date1stappoi = $row['date1stappoi'];

        // Main information
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 10, "1. Name: $name", 0, 1);
        $pdf->Cell(0, 10, "2. Designation: $designation", 0, 1);
        $pdf->Cell(0, 10, "3. Registration Number: $number", 0, 1);
        $pdf->Cell(0, 10, "4. Date of First Appointment: $date1stappoi", 0, 1);
        $pdf->Ln();
    }

    // Additional data table
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(45, 10, "Date Start", 1);
$pdf->Cell(45, 10, "Date Return", 1);
$pdf->Cell(45, 10, "Reason", 1);
$pdf->Cell(45, 10, "Leave Type", 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 11);
foreach($result as $row) {
    $pdf->Cell(45, 10, $row['datestart'], 1);
    $pdf->Cell(45, 10, $row['datereturn'], 1);
    $pdf->Cell(45, 10, $row['Reason'], 1);
    $pdf->Cell(45, 10, $row['leavetype'], 1);
    $pdf->Ln();
}


    // Output the PDF
    $pdf->Output("$number - Teachers' Leave Register.pdf", 'D');
}
?>




<?php 
include '../admin-header.php';
?>

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Download Leave Register</h1>

    <!-- Breadcrumb -->
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/teachers-leaving">Teachers' Leave</a></li>
        <li class="breadcrumb-item active">Download</li>
    </ol>

    <!-- Form -->
    <div class="card mb-4">
        <div class="card-header">
            Download Leave Register
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-control">
                Enter Reference Number: <input type="text" name="ref_no" class="form-control"> <br>
                <input type="submit" value="Generate PDF" class="btn btn-success">
            </form>
        </div>
    </div>
    
<?php 
include '../admin-footer.php';
?>
</div>

