<?php
$page = 'teachers-leaving';
include '../admin-header.php';

// Include the file that establishes the database connection
include '../../database_connection.php';

// Initialize $result variable
$result = [];
$search_date = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the date from the form
    $search_date = $_POST['date'];

    // SQL query to fetch absent teachers
    $sql = "SELECT name, number 
    FROM teachers_leave 
    WHERE :date >= datestart AND :date < datereturn";

    // Prepare and execute the SQL statement with the date parameter
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':date', $search_date);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Search Absent Teachers by Date</h1>

    <!-- Breadcrumb -->
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/teachers-leaving">Teachers' Leave</a></li>
        <li class="breadcrumb-item active">Search by Date</li>
    </ol>

    <!-- Form -->
    <div class="card mb-4">
        <div class="card-header">
            Search Absent Teachers by Date
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-control">
                Enter Date: <input type="date" name="date" class="form-control" value="<?php echo $search_date; ?>"><br>
                <input type="submit" value="Search" class="btn btn-success">
            </form>
        </div>
    </div>

    <!-- Display table if result exists -->
    <?php if (!empty($result)) : ?>
        <h2>Absent Teachers on <?php echo date('M d, Y', strtotime($search_date)); ?></h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['number']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>No absent teachers found for the selected date.</p>
    <?php endif; ?>

<?php 
include '../admin-footer.php';
?>
</div>
