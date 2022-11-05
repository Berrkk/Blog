<?php
require_once 'admin/pages/inc-fonctions.php';
$cek=$db->prepare("SELECT * FROM `hakkimizda` ORDER BY `id` DESC LIMIT 1 ");
$cek->execute();
$row=$cek->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Blog" />
        <meta name="keywords" content="bilim" />
        <meta name="keywords" content="oyun" />
        <meta name="description" content="kitap" />
        <meta name="description" content="edebiyat" />
        <meta name="description" content="teknoloji" />
        <meta name="keywords" content="haber" />
        <meta name="author" content="" />
        <title>Ay Dergisi Hakkında</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php
        require 'includes/inc-menu.php';
        
        ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Hakkımda</h1>
                            <span class="subheading">Sitenin Amacı ve Hakkımda</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <?=htmlspecialchars_decode($row["aciklama"])?>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <?php
        require 'includes/inc-footer.php';
        
        ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
