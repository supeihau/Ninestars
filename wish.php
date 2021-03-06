<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include ("template.php");
        echo $top ;
        echo $vendorcss;
        echo $extracss;
        echo $maincss;
        echo $sourcejs;
    ?>
    <style>
        .error 
        {
            color: #D82424;
            font-weight: normal;
            font-family: "微軟正黑體";
            display: inline;
            padding: 1px;
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
          <li><a class="nav-link scrollto" href="first.php">介紹</a></li>
          <li><a class="nav-link scrollto" href="store-page.php">小舖</a></li>
          <li><a class="nav-link scrollto" href="pray.php">求籤</a></li>
          <li><a class="nav-link scrollto" href="fortune.php">解籤</a></li>
          <li><a class="nav-link scrollto active" href="wish.php">許願池</a></li>
          <?php
            if (isset($_SESSION['Name'])) {
                if($_SESSION["Name"] == 'admin')
                {
                  echo '<li><a class="nav-link scrollto" href="manageProduct.php">管理中心</a></li>';
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
  </header><!-- End Header -->
<!--login-->
<?php
include ("login.php");
?>
<!--login end-->

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg"></div>
    <h3 class="tm-text-primary m-5 text-center">許願池</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12 mb-5 ml-lg-5 justify-content-center text-center">
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5 text-center">願您能在其中得到力量</h2>
                    <p class="tm-mb-30">人生就像一場戲，因為有緣才相聚。

                        相扶到老不容易，是否更該去珍惜。
                        
                        為了小事發脾氣，回頭想想又何必。
                        
                        別人生氣我不氣，氣出病來無人替。
                        
                        我若氣死誰如意，況且傷神又費力。
                        
                        鄰居親朋不要比，兒孫瑣事由他去。
                        
                        吃苦享樂在一起，神仙羨慕好伴侶。 </p>
                    <p class="tm-mb-50 text-right">--《莫生氣》</p>
                    <p class="tm-mb-30">遇到困難不要後退，躺著就行 </p>
                    <p class="tm-mb-50 text-right">--《無名毒雞湯》</p>
                    <ul class="tm-contacts">
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-envelope"></i>
                                Email: 請稍後，我們將幫您轉寄神明們
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                電話: 請稍後，我們將幫您轉接神明們
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                URL: www.437god.com
                            </a>
                        </li>
                    </ul>
                </div>                
            </div>
            <div class="col-lg-6 col-12 mb-5 justify-content-center text-center">
                <h2 class="tm-text-primary mb-5 text-center">許願籤</h2>
                <form id="contact-form" action="wish_finish.php" method="POST" class="tm-contact-form mx-auto">
                    <div class="form-group">
                        <textarea rows="8" name="message" class="form-control rounded-0" placeholder="祈願..." required=></textarea>
                    </div>

                    <div class="form-group tm-text-right">
                        <button type="submit" class="btn btn-primary">寄送</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div> <!-- container-fluid, tm-container-content -->

    <!-- ======= Footer ======= -->
    <?php
    include ("footer.html");
    ?>
    <!-- End Footer -->
    <?php
    include ("template.php");
    echo $mainjs ;
    ?>
    <!--verify-->
    <?php
    include ("verify.html");
    ?>
    <!--verify end-->
    <!--mycart-->
    <?php
        include ("mycart.php");
    ?>
    <!--mycart end-->
</body>
</html>