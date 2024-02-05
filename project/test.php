<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>顧客註冊頁面</title>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="zh-tw" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>北商線上點餐系統</title>
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
        text-align: left;
        border-radius: 8px;
      }

      .btn1 {
        background-color: #DFFFDF;
        font-size: 16px;
    </style>
  </head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">北商線上點餐系統</a>
      <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <!--<ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">美食佳餚</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">關於</a></li>
                      
					    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="test.php">註冊帳號</a></li>

						
                    </ul>
                </div>-->
      </div>
  </nav><br /><br /><br /><br /><br />
  <form action="sendmail.php" method="post">

    <body style="background-color:#F5F5F5;">
      <p class='t2'>姓名:<input type="text" class='t2' name="name" size='10' maxlength="6" required></p>
      <p class='t2'>信箱: <input type="email" class='t2' name="email" maxlength="50" size='35' required></p>
      <p class='t2'>密碼: <input type="text" class='t2' name="password" maxlength="20" size='15' required></p>
      <p class='t2'>手機:<input type="text" class='t2' name="phone" maxlength="10" size='15' required></p>
      <p class='t2'>驗證碼:( 點擊圖片可以更換驗證碼)<br></p>
      <img id="imgcode" src="imgcode.php" onclick="refresh_code()" /><br>
      <p><input type="text" name="vcode" value="" placeholder="輸入上方圖形驗證碼" class="t2 form-control form-control-user reg_vcode" id="reg_vcode"><span class="vcode_hint"></span></br><span class="vcode_hi"></span></p>

      <script type="text/javascript">
        //javascript
        function refresh_code() {
          document.getElementById("imgcode").src = "imgcode.php";
        }
        var vcode_Boolean = false;
        //偵測輸入
        $('.reg_vcode').blur(function() {
          if ((/^[a-zA-Z0-9_-]{4,4}$/).test($(".reg_vcode").val())) { //判定輸入值
            var acode = document.getElementById("reg_vcode").value;
            $.ajax({
              type: "POST",
              url: "ajax.php",
              data: "data=" + acode + "&action=chkvcode",
              cache: false,
              success: function(data) {
                //回傳資料
                if (data == 'OK') {
                  $('.vcode_hint').html(" 輸入正確✔ ").css("color", "green");
                  $('.reg_vcode').css("border", "1px solid green");
                  $('.vcode_hi').html("<input type=submit class=btn1 id=a  name=submit value='註冊'>").css("color", "green");
                  vcode_Boolean = true;

                } else {
                  $('.vcode_hint').html(" × 驗證錯誤").css("color", "red");
                  $('.reg_vcode').css("border", "1px solid red");
                  vcode_Boolean = false;
                }
              }
            });
          } else {
            $('.vcode_hint').html(" × 驗證錯誤").css("color", "red");
            $('.reg_vcode').css("border", "1px solid red");
            vcode_Boolean = false;
          }
        });
        // click
        $('.red_button').click(function() {
          if (vcode_Boolean == true) {
            document.getElementById("reg_form").submit();
          } else {
            alert("請確認資料輸入正確");
          }
        });
      </script>
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
  </form>
</body>

</html>