<?php
session_start();
if($_SESSION['status']!="sudah_login"){
    header("location:../../login.php");
    die;
}
if ($_SESSION['level'] != "user") {
    header("location:../login.php");
    die;
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Alumni Discussion</title>
        <link rel="stylesheet" href="../css/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../admin/assets/vendors/fontawesome/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/@widgetbot/html-embed"></script>
        <style>
            html,body{
                margin:0px;
                height:100%;
            }
            .box-full > widgetbot{
                height:100%;
                width:100%;
                top:55px;
                right:0px;
                bottom:0px;
                left:0px;
                position:absolute;
                z-index:99;
            }
            nav {
                z-index:10;
                position:absolute;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <ul class="nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Discuss</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Back to Home</a>
                </li>
            </ul>
          </nav>
          <div class="box-full">
          <widgetbot
          server="758938932233895936"
          channel="801337042746736720"
          >
        </widgetbot>
            </div>
</body>
</html>