<head>
    <meta charset="utf-8">
    
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Teachers' Portal | Prince of Wales' College</title>

    <!-- Favicon -->
    <link href="https://princeofwales.edu.lk/content/icons/logo-70x70-pwc.png" rel="icon">
    <link rel="icon" href="https://princeofwales.edu.lk/content/icons/logo-70x70-pwc.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="https://princeofwales.edu.lk/content/icons/logo-apple-touch-icon-pwc.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://princeofwales.edu.lk/content/icons/logo-android-chrome-icon-pwc.png">
    <meta name="msapplication-TileImage" content="https://princeofwales.edu.lk/content/icons/logo-70x70-pwc.png">
    <meta name="msapplication-TileColor" content="#800000">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://princeofwales.edu.lk/resources/lib/animate/animate.min.css" rel="stylesheet">
    <link href="https://princeofwales.edu.lk/resources/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://princeofwales.edu.lk/resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="https://princeofwales.edu.lk/resources/css/style.css" rel="stylesheet">


    <!-- PWA -->
    <link rel="manifest" href="manifest.json">


       


    <?php
    include 'database_connection.php';
    ?>


    <style>
        ::selection {
            background-color: #800000;
            color: white;
        }

        .pulse:hover {
            animation: pulse-animation 1s;
        }

        .dropdown-item:hover {
        color: maroon;
    }

        @keyframes pulse-animation {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }



        .img-header {
        width: 35px;
    }

    .h6-header {
        font-size: 17.5px;
    }

    @media (max-width: 375px) {
        .img-header {
            width: 30px; 
        }

        .h6-header {
            font-size: 14px; 
        }
    }




    </style>


</head>

<body>

    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only"></span>
        </div>
        <h3>&nbsp; Loading...</h3>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-1 px-lg-4">
            <img src="/content/img/logo-pwc.png" alt="pwc logo" class="img-header">
            <h6 class="m-0 text-primary h6-header">&nbsp; &nbsp; PRINCE OF WALES' COLLEGE<BR>&nbsp; &nbsp; TEACHERS' PORTAL
            </h6>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                

    </nav>
    <!-- Navbar End -->
