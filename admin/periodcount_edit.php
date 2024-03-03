<?php
$page = 'periodcount';
include '../database_connection.php';
include '../functions.php';

if (!is_admin_login()) {
    header('location:../admin_login.php');
    exit();
}

include 'admin-header.php';

$class = $_GET['class'];
$day = $_GET['day'];

$query = "SELECT * FROM period_log_g6 WHERE class = :class";
$statement = $connect->prepare($query);
$statement->bindParam(':class', $class);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'period_') === 0) {
                $period = substr($key, 7); 
                
                $query = "UPDATE period_log_g6 SET $day = :value WHERE class = :class AND period = :period";
                $statement = $connect->prepare($query);
                $statement->bindParam(':value', $value);
                $statement->bindParam(':class', $class);
                $statement->bindParam(':period', $period);
                $statement->execute();
            }
        }
        
        $message = "Records updated successfully.";
        
        
    } catch (PDOException $e) {
        $message = "Error updating records: " . $e->getMessage();
    }
}

?>

<div class="container-fluid py-4" style="min-height: 700px;">
    <h1>Edit - Grade <?php echo $class; echo " | "; echo $day;?></h1>
    <ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            Edit - Grade <?php echo $class; ?>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <?php
                    $periods = range(1, 8);
                    foreach ($periods as $period): ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Period <?php echo $period; ?></label>
                            <select name="period_<?php echo $period; ?>" class="form-control">
                                <?php
                                $query = "SELECT $day FROM period_log_g6 WHERE class = :class AND period = :period";
                                $statement = $connect->prepare($query);
                                $statement->bindParam(':class', $class);
                                $statement->bindParam(':period', $period);
                                $statement->execute();
                                $value = $statement->fetchColumn();
                                ?>
                                <option value="✓" <?php if ($value == '✓') echo 'selected'; ?>>✓</option>
                                <option value="0" <?php if ($value == '0') echo 'selected'; ?>>0</option>
                                <option value="✗" <?php if ($value == '✗') echo 'selected'; ?>>✗</option>
                            </select>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-4 mb-3 text-center">
                    <input type="submit" name="submit" class="btn btn-success" value="Edit" />
                </div>
            </form>
            <?php if (!empty($message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
            <script>
                setTimeout(function () {
                    window.location.href = '/project-8n-kiiyada?class=<?php echo $class; ?>';
                }, 500);
            </script>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php
include 'admin-footer.php';
?>
