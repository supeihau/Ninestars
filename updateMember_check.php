<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include ("template.php");
    echo $top ;
    echo $vendorcss;
    echo $maincss;
    echo $sourcejs;
  ?>

  <?php
    $data='';
    include("mysql_connect.inc.php");
    $name = $_POST['name'];

    // 送出查詢的SQL指令
    if ($result = mysqli_query($link, "SELECT * FROM member WHERE member_name='$name';")) {
    while ($row = mysqli_fetch_assoc($result)) {
    $data .= "
    <form id=\"updateMember\" name=\"form\" method=\"post\" action=\"updateMember_finish.php\">
      <h5 class=\"mt-4\">信徒名稱<label for=\"m-name\" class=\"error\"></label></h5>
        <input type=\"text\" class=\"input form-control\" name=\"m-name\" value=\"$row[member_name]\"><br>
      <h5 class=\"mt-4\">email<label for=\"m-email\" class=\"error\"></label></h5>  
        <input type=\"email\" class=\"input form-control\" name=\"m-email\" value=\"$row[member_email]\"><br>
      <h5 class=\"mt-4\">密碼<label for=\"m-pwd\" class=\"error\"></label></h5>
        <input type=\"password\" class=\"input form-control\" name=\"m-pwd\" value=\"$row[member_password]\"><br>
      <input type=\"submit\" name=\"button\" class=\"btn btn-new\" id=\"sub_btn\" value=\"確認\">
    </form>";
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
    }
    mysqli_close($link); // 關閉資料庫連結
  ?>

  <style>
    .error {
      color: #D82424;
      font-weight: normal;
      font-family: "微軟正黑體";
      display: inline;
      padding: 5px;
    }
    .new-product{
      background-color: #eb5d1e;
      color: #fef8f5;
      border-radius: 10px;
      padding-top: 3px;
      padding-bottom: 3px;
      padding-left: 10px;
      padding-right: 10px;
    }
    .btn-new{
      background-color: #eb5d1e;
      color: #fef8f5;
      border-radius: 10px;
      padding-top: 3px;
      padding-bottom: 3px;
      padding-left: 10px;
      padding-right: 10px;
    }
  </style>
</head>

<body>
  <?php
    include ("template.php");
    echo $pageloader ;
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-film mr-2"></i>
            絲扇淒神社
        </a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">首頁</a></li>
          <li><a class="nav-link scrollto" href="index.php">介紹</a></li>
          <li><a class="nav-link scrollto" href="store-page.php">小舖</a></li>
          <li><a class="nav-link scrollto" href="pray.php">求籤</a></li>
          <li><a class="nav-link scrollto" href="fortune.php">解籤</a></li>
          <li><a class="nav-link scrollto" href="wish.php">許願池</a></li>
          <?php
            if (isset($_SESSION['Name'])) {
                if($_SESSION["Name"] == 'admin')
                {
                  echo '<li><a class="nav-link scrollto active" href="manageProduct.php">管理中心</a></li>';
                  echo '<li><a href="logout.php">'.$_SESSION['Name'].'   登出</a></li>';
                }
                else
                {
                  echo '<li><a class="nav-link scrollto" href="manageOrder.php">訂單查詢</a></li>';
                  echo '<li><a href="logout.php">'.$_SESSION['Name'].'   登出</a></li>';
                }
                } else {
                echo '<li><button class="getstarted button1" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="width: 125px; padding-top: 7px;">登入/註冊</button></li>';
                }
            ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!--End Header -->
  
  <!--login-->
  <?php
  include ("login.php");
  ?>
  <!--login end-->
  <main id="main" style="margin-top: 20px;">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center mt-5">
            <h2>修改會員</h2>
          </div>
        </div>
    </section>
    <!-- End Breadcrumbs Section -->

    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-sm-6 justify-content-center text-center">
            <img src="img/update.png">
            <?php echo $data;?>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include ("footer.html");
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php
  include ("template.php");
  echo $vendorjs ;
  echo $mainjs ;
  ?>
  <!--verify-->
  <?php
    include ("verify.html");
  ?>
  <!--verify end-->

  <script>
  $(document).ready(function($) {
    $("#updateMember").validate({
          submitHandler: function(form) {
          //alert("success!");
          form.submit();
        },
        rules: {
          "m-name": {
            required: true
          },
          "m-email": {
            required: true,
            email: true
          },
          "m-pwd": {
            required: true
          }
        },
        messages: {
          "m-name": {
            required: "必填"
          },
          "m-email": {
            required: "必填"
          },
          "m-pwd": {
            required: "必填"
          }
        }
    });
  });
  </script>
</body>

</html>

