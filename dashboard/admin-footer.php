                <footer class="pt-3 mt-4 text-muted text-center border-top">
                    <div class="container-fluid px-4"></div>
                        <div class="d-flex align-items-center justify-content-between small">
                            <a href="https://princeofwales.edu.lk/" target="_blank"></a>
                                <div class="text-muted">Copyright &copy; Prince of Wales' College, Moratuwa <?php echo date('Y'); ?></div>
                            </a>
                            <a href="https://princeofwales.edu.lk/team" target="_blank"></a>
                                <div class="text-muted">Developed By Cambrians' ICT Society&reg;</div>
                            </a>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
                </div>

            <!-- Seasonal Effects -->
<?php
$currentDate = new DateTime();
$start = new DateTime($currentDate->format('Y') . '-12-01');
$end = new DateTime($currentDate->format('Y') . '-12-31');

if ($currentDate >= $start && $currentDate <= $end) {
    include 'snow.php';
}

$fireworksstart = new DateTime($currentDate->format('Y') . '-01-01');
$fireworksend = new DateTime($currentDate->format('Y') . '-01-03');

if ($currentDate >= $fireworksstart && $currentDate <= $fireworksend) {
    include 'fireworks.php';
}
?>


    	<script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/simple-datatables@latest.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

    </body>

</html>