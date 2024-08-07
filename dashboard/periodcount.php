<?php
$page = 'periodcount';
include '../database_connection.php';
include '../functions.php';

if (!is_admin_login()) {
    header('location:../index.php');
    exit();
}

include 'admin-header.php';

// Get the user's role
$user_role = $_SESSION['admin_role'];

?>

<div class="container-fluid py-4">
    <div class="dropdown">
        <h1 class="mb-5">Project "8න් කීයද?"</h1>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $grades = ['6', '7', '8', '9', '10', '11'];
            $classes = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

            $allowed_grades = [];
            switch ($user_role) {
                case 'Principal':
                case 'Admin':
                    $allowed_grades = array_merge($grades, ['Grade 12', 'Grade 13']);
                    break;
                case 'Deputy Principal (6-8)':
                    $allowed_grades = ['6', '7', '8'];
                    break;
                case 'Deputy Principal (9-11)':
                    $allowed_grades = ['9', '10', '11'];
                    break;
                case 'Deputy Principal (A/L)':
                case 'Sectional Head Science':
                case 'Art Sectional Head':
                case 'Commerce Sectional Head':
                case 'Tech Sectional Head':
                    $allowed_grades = ['Grade 12', 'Grade 13'];
                    break;                        
                case 'Grade 6 Sectional Head':
                    $allowed_grades = ['6'];
                    break;
                case 'Grade 7 Sectional Head':
                    $allowed_grades = ['7'];
                    break;
                case 'Grade 8 Sectional Head':
                    $allowed_grades = ['8'];
                    break;
                case 'Grade 9 Sectional Head':
                    $allowed_grades = ['9'];
                    break;
                case 'Grade 10 Sectional Head':
                    $allowed_grades = ['10'];
                    break;
                case 'Grade 11 Sectional Head':
                    $allowed_grades = ['11'];
                    break;
            }

            foreach ($grades as $grade) {
                
                if (in_array($grade, $allowed_grades)) {
            ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#classModal<?= str_replace(' ', '', $grade) ?>">
                                Grade <?= $grade ?>
                            </button>
                        </div>
                    </div>

                    <!-- Modal for <?= $grade ?> -->
                    <div class="modal fade" id="classModal<?= str_replace(' ', '', $grade) ?>" tabindex="-1" role="dialog" aria-labelledby="classModalLabel<?= str_replace(' ', '', $grade) ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="classModalLabel<?= str_replace(' ', '', $grade) ?>">Select Class for Grade <?= $grade ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <select id="classSelect<?= str_replace(' ', '', $grade) ?>" class="form-control">
                                        <?php
                                        foreach ($classes as $class) {
                                            $classValue = $grade . '-' . $class;
                                        ?>
                                            <option value="<?= $classValue ?>"><?= $classValue ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="redirectToClass('<?= $grade ?>')">Select</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            
            // Display Grade 12 button after Grade 11
            if (in_array('Grade 12', $allowed_grades)) {
            ?>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <a href="/dashboard/periodcount-12al.php" class="btn btn-primary btn-lg">Grade 12</a>
                </div>
            </div>
            <?php
            }

            // Display Grade 13 button after Grade 12
            if (in_array('Grade 13', $allowed_grades)) {
            ?>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <a href="/dashboard/periodcount-13al.php" class="btn btn-primary btn-lg">Grade 13</a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        function redirectToClass(grade) {
            var selectedClass = '';
            if (grade === 'Grade 12') {
                selectedClass = document.getElementById("classSelectGrade12").value;
            } else if (grade === 'Grade 13') {
                selectedClass = document.getElementById("classSelectGrade13").value;
            } else {
                selectedClass = document.getElementById("classSelect" + grade).value;
            }
            <?php if ($user_role === 'Deputy Principal (6-8)' || $user_role === 'Deputy Principal (9-11)' || $user_role === 'Deputy Principal (A/L)' || $user_role === 'Principal') { ?>
                window.location.href = "/project-8n-kiiyada?class=" + selectedClass;
            <?php } else { ?>
                window.location.href = "/dashboard/periodcount-day.php?class=" + selectedClass; // Default redirection for other users
            <?php } ?>
        }
    </script>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include 'admin-footer.php';
?>
