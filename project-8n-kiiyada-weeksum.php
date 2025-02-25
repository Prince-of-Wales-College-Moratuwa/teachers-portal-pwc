<!DOCTYPE html>
<html lang="en">

<head>
<title>Week Sum - Project "8න් කීයද?"</title>

    <?php include 'header.php';
include 'greetings.php'; 

$grade = $_GET['grade'];
    
    ?>

<?php    
date_default_timezone_set('Asia/Colombo');
$start_of_week = date('d/m/Y', strtotime('monday this week'));
$end_of_week = date('d/m/Y', strtotime('friday this week'));
?>

</head>

<body>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Project "8න් කීයද?"</h6>
                <h1 class="">"සති සාරාංශය -  <?php echo $grade ?> ශ්‍රේණිය"</h1>
                <h6 class="mb-5"><?php echo $start_of_week; ?> සිට
                    <?php echo $end_of_week; ?> දක්වා</h6>
            </div>


<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Class</th>
                    <th scope="col">Mon</th>
                    <th scope="col">Tue</th>
                    <th scope="col">Wed</th>
                    <th scope="col">Thu</th>
                    <th scope="col">Fri</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $classLetters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

                foreach ($classLetters as $classLetter) {
                
                    $class = $grade . '-' . $classLetter;

                ?>
                    <tr>
                        <th scope="row"><?php echo $class; ?></th>
                        <td><?php echo getDayCount($class, 'mon'); ?></td>
                        <td><?php echo getDayCount($class, 'tue'); ?></td>
                        <td><?php echo getDayCount($class, 'wed'); ?></td>
                        <td><?php echo getDayCount($class, 'thu'); ?></td>
                        <td><?php echo getDayCount($class, 'fri'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
function getDayCount($class, $day) {
    global $connect;
    $query = "SELECT COUNT(*) AS count FROM period_log_g6 WHERE class = '$class' AND $day IN ('✓', '🞷')";
    $statement = $connect->prepare($query);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row['count'];
}
?>




        </div>
    </div>


    <?php include 'footer.php'; ?>

</body>

</html>