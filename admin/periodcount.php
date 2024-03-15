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
                    $allowed_grades = $grades;
                    break;
                case 'Deputy Principal (6-8)':
                    $allowed_grades = ['6', '7', '8'];
                    break;
                case 'Deputy Principal (9-11)':
                    $allowed_grades = ['9', '10', '11'];
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

                    <!-- Modal -->
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
            ?>
        </div>
    </div>

    <script>
        function redirectToClass(grade) {
            var selectedClass = document.getElementById("classSelect" + grade).value;
            window.location.href = "/admin/periodcount-day.php?class=" + selectedClass;
        }
    </script>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
include 'admin-footer.php';
?>
