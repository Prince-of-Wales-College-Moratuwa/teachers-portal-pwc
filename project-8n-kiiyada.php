<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project 8න් කීයද?</title>

    <?php include 'header.php';
    
$class = $_GET['class'];
    

    ?>

</head>

<body>

<?php

include 'database_connection.php';

$current_day = date('D');
if ($current_day === 'Mon') {
    $class = $_GET['class'];

    $query = "UPDATE period_log_g6 SET tue = NULL, wed = NULL, thu = NULL, fri = NULL WHERE class = :class";
    $statement = $connect->prepare($query);
    $statement->bindParam(':class', $class);
    $statement->execute();
}


?>



    <?php


$query = "SELECT 
            SUM(CASE WHEN mon = '✓' OR mon = '0' THEN 1 ELSE 0 END) AS count_mon,
            SUM(CASE WHEN tue = '✓' OR tue = '0' THEN 1 ELSE 0 END) AS count_tue,
            SUM(CASE WHEN wed = '✓' OR wed = '0' THEN 1 ELSE 0 END) AS count_wed,
            SUM(CASE WHEN thu = '✓' OR thu = '0' THEN 1 ELSE 0 END) AS count_thu,
            SUM(CASE WHEN fri = '✓' OR fri = '0' THEN 1 ELSE 0 END) AS count_fri
          FROM period_log_g6
          WHERE class='$class'";
$statement = $connect->prepare($query);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);
$count_mon = $row['count_mon'];
$count_tue = $row['count_tue'];
$count_wed = $row['count_wed'];
$count_thu = $row['count_thu'];
$count_fri = $row['count_fri'];


$query = "SELECT * FROM period_log_g6 WHERE class='$class'";
$statement = $connect->prepare($query);
$statement->execute();
$row = $statement->fetch(PDO::FETCH_ASSOC);

date_default_timezone_set('Asia/Colombo');
$start_of_week = date('d/m/Y', strtotime('monday this week'));
$end_of_week = date('d/m/Y', strtotime('friday this week'));


?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">කාලසටහන ක්‍රියාත්මකවීමේ අධික්ෂණ
                    පත්‍රිකාව</h6>
                <h1>8න් කීයද?</h1>
                <h6 class="mb-5">Grade: <?php echo $row["class"]; ?> | from <?php echo $start_of_week; ?> to
                    <?php echo $end_of_week; ?></h6>



            </div>

            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">MON</th>
                                <th scope="col">TUE</th>
                                <th scope="col">WED</th>
                                <th scope="col">THU</th>
                                <th scope="col">FRI</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

$query = "SELECT * FROM period_log_g6 WHERE class='$class'";

$statement = $connect->prepare($query);

$statement->execute();

if ($statement->rowCount() > 0) {
    foreach ($statement->fetchAll() as $row) {
        ?>
                            <tr>
                                <th scope="row"><?php echo $row["period"]; ?></th>
                                <td><?php echo $row["mon"]; ?></td>
                                <td><?php echo $row["tue"]; ?></td>
                                <td><?php echo $row["wed"]; ?></td>
                                <td><?php echo $row["thu"]; ?></td>
                                <td><?php echo $row["fri"]; ?></td>
                            </tr>
                            <?php
    }

    
    ?>
                            <tr>
                                <th scope="row">Total:</th>
                                <td><?php echo $count_mon ?>/8</td>
                                <td><?php echo $count_tue ?>/8</td>
                                <td><?php echo $count_wed ?>/8</td>
                                <td><?php echo $count_thu ?>/8</td>
                                <td><?php echo $count_fri ?>/8</td>
                            </tr>
                            <?php
}
?>


                        </tbody>
                    </table>

                </div>


            </div>


            <ul class="mb-2" style="font-size: 16px;">
    <li class="mb-2" style="font-size: inherit;">නියමිත ගුරු භවතා පැමිණ තිබේනම් - ✓</li>
    <li class="mb-2" style="font-size: inherit;">සහන කාලසටහනට ගුරුභවතෙකු පැමිණ තිබේනම් - 0</li>
    <li class="mb-2" style="font-size: inherit;">ඒ අනුව වැඩ කළ කාලච්ඡෙද එකතුව - ✓ + 0</li>
    <li class="mb-2" style="font-size: inherit;">කිසිඳු ගුරුභවතෙකු නොපැමිණි කාලච්ඡේද - ✗</li>
</ul>

<br>

<?php
$classNumber = preg_replace('/[^0-9]/', '', $class);
?>
<a class="btn btn-primary py-3 px-5 mt-2 wow zoomIn" href="project-8n-kiiyada-weeksum.php?grade=<?php echo $classNumber; ?>" data-wow-delay="0.7s">View Week Summary</a>

            <!-- <div class="container mt-5">
                <ul class="nav nav-tabs nav-fill" id="scheduleTabs" role="tablist">
                    <?php
        $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'];
        $current_day = date('D');
        $active_tab = ($current_day === 'Sun' || $current_day === 'Sat') ? 'Fri' : $current_day;
        foreach ($days as $day) {
            $timestamp = strtotime("next $day");
            $day_of_week = date('l', $timestamp);
            $date = date('j', $timestamp);
            $month_number = date('n', $timestamp);
            $active_class = ($day === $active_tab) ? 'active' : '';
        ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $active_class ?>" id="<?= strtolower($day) ?>-tab"
                            data-bs-toggle="tab" data-bs-target="#<?= strtolower($day) ?>" type="button" role="tab"
                            aria-controls="<?= strtolower($day) ?>"
                            aria-selected="<?= ($day === $active_tab) ? 'true' : 'false' ?>">
                            <?= $day ?>, <?= $month_number ?>/<?= $date ?>
                        </button>
                    </li>
                    <?php } ?>
                </ul>
                <div class="tab-content" id="scheduleTabsContent">
                    <?php
        $query = "SELECT mon_reason, tue_reason, wed_reason, thu_reason, fri_reason FROM period_log_g6 WHERE class='$class'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $days_columns = ['mon_reason', 'tue_reason', 'wed_reason', 'thu_reason', 'fri_reason'];

        foreach ($days as $index => $day) {
            $reason = $row[$days_columns[$index]];
            $active_class = ($day === $active_tab) ? 'active' : ''; 
        ?>
                    <div class="tab-pane fade <?= $active_class ?>" id="<?= strtolower($day) ?>" role="tabpanel"
                        aria-labelledby="<?= strtolower($day) ?>-tab">
                        <p><?= $reason ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div> -->


        </div>


    </div>


    <?php include 'footer.php'; ?>

</body>

</html>