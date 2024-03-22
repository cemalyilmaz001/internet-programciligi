<?php
// Oturumu başlat
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Mağaza</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      
    </style>

</head>
<body class="d-flex h-100 text-center text-bg-dark">

<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">
        <a class="nav-link fw-bold py-1 px-0" href="/">
          Vize Project
        </a>
      </h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link fw-bold py-1 px-0" href="/">Ana Sayfa</a>
        <a class="nav-link fw-bold py-1 px-0 active"  href="magaza.php">Mağaza</a>
        <?php 
        // Eğer oturum açılmışsa
        if(isset($_SESSION['uye'])) {
          // Örnek olarak oturum kapama bağlantısı ekleyebiliriz
          echo '<a class="nav-link fw-bold py-1 px-0" href="logout.php">Çıkış Yap</a>';
        } else {
          echo '<a class="nav-link fw-bold py-1 px-0" href="kayit.php">Kayıt Ol</a>';
          echo '<a class="nav-link fw-bold py-1 px-0" href="login.php">Giriş Yap</a>';
        }
        ?>
      </nav>
    </div>
  </header>



  <?php

$dosya = "urunler.txt";

if (file_exists($dosya)) {
    $dd = fopen($dosya, "r");
    echo '<div class="container"><div class="row">'; // Container ve ilk satırı aç

    while (!feof($dd)) {
        $veri = trim(fgets($dd, 110));
        $dizi = explode(":", $veri);

        //  count:isim:fiyat:adet
        //  1:x1.png:200:1000
        //  $dizi[0] $dizi[1] $dizi[2] $dizi[3]

        echo '
        <div class="col-sm-4 mt-5">
            <div class="card" style="width: 22rem; display:inline-block !important;">
                <img class="card-img-top" style="width:350px; height:300px;" src="magaza_images/' . $dizi[1] . '" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'. $dizi[2] .'</h5>
                    <p class="card-text">'. $dizi[3] .' TL</p>
                    <a href="#" class="btn btn-primary">Ürüne Git</a>
                </div>
            </div>
        </div>
        ';

    }

    echo '</div></div>'; // Satırı ve container'ı kapat
    fclose($dd);

} else {
    echo "Error Kod=2";
    exit;
}

?>



  <footer class="mt-auto text-white-50" style="position:absolute; bottom:10px !important; left:850px;">
  </footer>
</div>

<script src="js/color-modes.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/poper.min.js"></script>
</body>
</html>