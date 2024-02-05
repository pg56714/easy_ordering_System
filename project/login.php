<!doctype html>
<html>
<title>北商線上點餐系統</title>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="mod/sweetalert.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="zh-tw" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .t2 {
            color: black;
            font-family: Microsoft JhengHei;
            font-size: 26px;
            text-align: center;
            border-radius: 20px;
        }

        .tt {
            color: black;
            font-family: Microsoft JhengHei;
            font-size: 40px;
            text-shadow: 0px 0px 4px #000000;
        }

        .t3 {
            color: #003377;
            font-family: Microsoft JhengHei;
            font-size: 20px;
            text-align: center;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn4 {
            background-color: #FFFF82;
            font-size: 20px;
        }

        .btn1 {
            background-color: #DFFFDF;
            font-size: 16px;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">北商線上點餐系統</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto"> <!--
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">美食佳餚</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">關於</a></li>
                      -->
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="test.php">註冊帳號</a></li>


                </ul>
            </div>
        </div>
    </nav><br /><br /><br /><br /><br />


    <form name="form" method="post" action="">
        <p class="t2">

            <body style="background-color:#F5F5F5;">
                </br>
                電子郵件：<input type="text" placeholder="輸入電子郵件" class="sm" name="id" required><br><br>

                密碼：<input type="password" placeholder="輸入密碼" class="sm" name="pw" required></br></br>
                <input type="submit" name="button" style="background-color:#66FF66" class="sm" value="登入"></br></br></br>
    </form>
    <?php
    include("connect.php");

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $pw = $_POST["pw"];
    } else {
        $id = NULL;
        $pw = NULL;
    }

    session_cache_limiter('private,must-revalidate');
    session_start();
    //$_SESSION['level']='';


    if ($id == true) {
        if ($pw == true) {
            $tc = "SELECT * FROM `customer` where `email` = '$id' AND `password` = '$pw' ";
            $tc2 = mysqli_query($conn, $tc);
            $tc3 = mysqli_fetch_assoc($tc2);
            $tc4 = mysqli_num_rows($tc2);



            $_SESSION['email'] = $id;

            //if($tc4 > '0'){
            //{$_SESSION['email'] = $tc3['email'];}} 


            //消費者
            if ($_SESSION['email'] == $tc3['email'] and $tc3['name'] != '') {
                echo "<meta http-equiv=REFRESH CONTENT=0.1;url=Product.php> ";
            }

            if ($_SESSION['email'] == 'shop@gmail.com') {
                echo "<meta http-equiv=REFRESH CONTENT=0.1;url=restaurant.html> ";
            }

            if ($_SESSION['email']  != $tc3['email']) {
                echo "<script language=\"javascript\">alert('帳號密碼有誤，請重新輸入');location.href='login.php';</script>";
            }
        }
    }

    ?>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        郵遞區號：100 <br />
                        台北市中正區濟南路一段321號

                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    </i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">北商資訊股份有限公司</h4>
                    <p class="lead mb-0">
                        創立於2021年，致力協助在地攤販與餐廳，建立整合資訊系統。

                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>北商資訊股份有限公司</small></div>
    </div>
</body>

</html>