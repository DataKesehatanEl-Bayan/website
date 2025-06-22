<?php
session_start();
include_once 'koneksi.php';
if (!isset($_SESSION['log'])) {
} else {
  header('location:index.php');
}

if (isset($_POST['login'])) {
  $user = mysqli_real_escape_string($koneksi, $_POST['username']);
  $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
  $queryuser = mysqli_query($koneksi, "SELECT * FROM login where username='$user'");
  $cariuser = mysqli_fetch_assoc($queryuser);
  if (password_verify($pass, $cariuser ['password'])) {
    $_SESSION['userid'] = $cariuser ['id'];
    $_SESSION['username'] = $cariuser ['username'];
    $_SESSION['log'] = "login";

    if($cariuser){
      echo '<script>alert("Sampean Berhasil Login sebagai '. $cariuser['username'] .'");window.location="index.php"</script>';
    }else{
      echo '<script>alert("Sampean Salah Nglebetaken Akun !! ");history.go(-1);</script>';
    }
  }else{
      echo '<script>alert("Sampean Salah Nglebetaken Akun !! ");history.go(-1);</script>';
  }
};
?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Kesehatan EL-Bayan Login</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
  <style>
  body {
    background-color:rgb(11, 131, 111) !important; /* Hijau tua */
  }
  
  .btn-login-custom {
    background-color:rgb(11, 131, 125);
    color: #fff;
    border: none;
  }

  .btn-login-custom:hover {
    background-color: rgb(10, 112, 107); /* Lebih gelap saat hover */
  }
</style>

</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center">

  <!-- Content -->

  <body class="min-vh-100 d-flex align-items-center justify-content-center">
  <!-- Header dengan logo dan teks berjalan -->
  <div style="background-color: rgb(9, 110, 94); color: white; padding: 10px; display: flex; align-items: center; position: absolute; top: 0; left: 0; width: 100%;">
    <img src="assets/img/logo.png" alt="Logo" style="height: 50px; margin-right: 15px;" />
    <marquee behavior="scroll" direction="left" scrollamount="6" style="flex: 1;">
      Selamat datang di Sistem Kesehatan EL-Bayan — Silakan login untuk melanjutkan. Diniati Khidmat sebagai rasa terima kasih kita kepada kyai  dan guru-guru kita. 
      Seperti dalam Al-Quran Surat Al-Mujadillah ayat 11 يٰٓاَيُّهَا الَّذِيْنَ اٰمَنُوْٓا اِذَا قِيْلَ لَكُمْ تَفَسَّحُوْا فِى الْمَجٰلِسِ فَافْسَحُوْا يَفْسَحِ اللّٰهُ لَكُمْۚ وَاِذَا قِيْلَ انْشُزُوْا فَانْشُزُوْا يَرْفَعِ اللّٰهُ الَّذِيْنَ اٰمَنُوْا مِنْكُمْۙ وَالَّذِيْنَ اُوْتُوا الْعِلْمَ دَرَجٰتٍۗ وَاللّٰهُ بِمَا تَعْمَلُوْنَ خَبِيْرٌ
 Yang Artinya: Wahai orang-orang yang beriman, apabila dikatakan kepadamu "Berilah kelapangan di dalam majelis-majelis," lapangkanlah, niscaya Allah akan memberi kelapangan untukmu. Apabila dikatakan, "Berdirilah," (kamu) berdirilah. Allah niscaya akan mengangkat orang-orang yang beriman di antaramu dan orang-orang yang diberi ilmu beberapa derajat. Allah Mahateliti terhadap apa yang kamu kerjakan.

    </marquee>
  </div>

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <h2>Kesehatan EL-Bayan. </h2>
              </div>
            
            <form method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Kata Sandi</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control" name="password" placeholder="••••••••••••" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <div class="mb-3">
                <button class="btn btn-login-custom d-grid w-100" type="submit" name="login">Masuk</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <script src="assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>