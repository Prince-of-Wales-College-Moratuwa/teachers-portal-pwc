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
            SUM(CASE WHEN mon = '✓' OR mon = '🞷' THEN 1 ELSE 0 END) AS count_mon,
            SUM(CASE WHEN tue = '✓' OR tue = '🞷' THEN 1 ELSE 0 END) AS count_tue,
            SUM(CASE WHEN wed = '✓' OR wed = '🞷' THEN 1 ELSE 0 END) AS count_wed,
            SUM(CASE WHEN thu = '✓' OR thu = '🞷' THEN 1 ELSE 0 END) AS count_thu,
            SUM(CASE WHEN fri = '✓' OR fri = '🞷' THEN 1 ELSE 0 END) AS count_fri
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
                <h6 class="mb-2">Grade: <?php echo $row["class"]; ?> | from <?php echo $start_of_week; ?> to
                    <?php echo $end_of_week; ?></h6>

                    <div style="border: 1px solid #ccc; padding: 10px;">
    <ul class="mb-2" style="font-size: 16px; list-style: none; padding-left: 0;">
        <li class="mb-2" style="font-size: inherit; text-align: left;">නියමිත ගුරු භවතා පැමිණ තිබේනම් - ✓</li>
        <li class="mb-2" style="font-size: inherit; text-align: left;">සහන කාලසටහනට ගුරුභවතෙකු පැමිණ තිබේනම් - 🞷</li>
        <li class="mb-2" style="font-size: inherit; text-align: left;">වැඩ කළ කාලච්ඡෙද එකතුව - ✓ + 🞷</li>
        <li class="mb-2" style="font-size: inherit; text-align: left;">කිසිඳු ගුරුභවතෙකු නොපැමිණි කාලච්ඡේද - ✗</li>
    </ul>
</div>




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



            <br>

            <?php
$classNumber = preg_replace('/[^0-9]/', '', $class);
?>

           <?php
if (strpos($class, '12') === false && strpos($class, '13') === false) {
    
    $classNumber = preg_replace('/[^0-9]/', '', $class);
    ?>
    <a class="btn btn-primary py-3 px-5 mt-2 wow zoomIn"
        href="project-8n-kiiyada-weeksum.php?grade=<?php echo $classNumber; ?>" data-wow-delay="0.7s">View Week Summary</a>
<?php
}
?>


        </div>


    </div>


    <?php include 'footer.php'; ?>

</body>

</html>