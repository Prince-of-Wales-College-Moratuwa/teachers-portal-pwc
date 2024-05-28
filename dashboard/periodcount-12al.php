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
        <h1 class="mb-5">8න් කීයද? - Grade 12</h1>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $streams = ['Science', 'Commerce', 'Tech', 'Art'];

            $allowed_grades = [];
            switch ($user_role) {
                case 'Principal':
                case 'Admin':
                case 'Deputy Principal (A/L)':
                    $allowed_grades = $streams;
                    break;
                case 'Sectional Head Science':
                    $allowed_grades = ['Science'];
                    break;
                case 'Art Sectional Head':
                    $allowed_grades = ['Art'];
                    break;
                case 'Commerce Sectional Head':
                    $allowed_grades = ['Commerce'];
                    break;
                case 'Tech Sectional Head':
                    $allowed_grades = ['Tech'];
                    break;
            }

            $classes = ['A', 'B', 'C', 'D', 'E']; 

            ?>

            <?php
            foreach ($streams as $stream) {
                if (in_array($stream, $allowed_grades)) {
            ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#classModal<?= str_replace(' ', '', $stream) ?>">
                                 <?= $stream ?>
                            </button>
                        </div>
                    </div>

                    <!-- Modal for <?= $stream ?> -->
                    <div class="modal fade" id="classModal<?= str_replace(' ', '', $stream) ?>" tabindex="-1" role="dialog" aria-labelledby="classModalLabel<?= str_replace(' ', '', $stream) ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="classModalLabel<?= str_replace(' ', '', $stream) ?>">Select Class for <?= $stream ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <select id="classSelect<?= str_replace(' ', '', $stream) ?>" class="form-control">
                                        <?php
                                        foreach ($classes as $class) {
                                            $classValue = '12-' . $class . ' ' . $stream;
                                        ?>
                                            <option value="<?= $classValue ?>"><?= $classValue ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="redirectToClass('<?= $stream ?>')">Select</button>
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
        function redirectToClass(stream) {
            var selectedClass = document.getElementById("classSelect" + stream.replace(/\s+/g, '')).value;
            <?php if ($user_role === 'Deputy Principal (6-8)' || $user_role === 'Deputy Principal (9-11)' || $user_role === 'Deputy Principal (A/L)' || $user_role === 'Principal') { ?>
                window.location.href = "/project-8n-kiiyada?class=" + selectedClass;
            <?php } else { ?>
                window.location.href = "/dashboard/periodcount-day.php?class=" + selectedClass;
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
