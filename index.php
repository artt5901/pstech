<?php
include 'connect.php'
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>วิทยาลัยเทคโนโลยีป่าสักธารา(PS-TECH)</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/ticker-style.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Preloader Start -->

    <!-- Preloader Start -->
    <?php include 'header.php'; ?>
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix pt-25 gray-bg">
            <div class="container">
                <div class="trending-main">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Trending Top -->
                            <div class="slider-active">
                                <?php 
                                $sql2 = "SELECT * FROM news AS news 
							INNER JOIN teacher AS teacher 
								on (news.t_id = teacher.t_id) WHERE n_status = '1' AND current_date <= news.n_ex  ORDER BY news.n_id DESC  limit 0,5";
                                $result2 = mysqli_query($conn, $sql2)
                                    or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                                while ($rs2 = mysqli_fetch_array($result2)) { ?>
                                    <!-- Single -->
                                    <div class="single-slider">
                                        <div class="trending-top mb-30">
                                            <div class="trend-top-img" style="background-image: none;"> 
                                                <img src="" alt="" >
                                                <?php echo '<img src="image/' . $rs2['n_pic'] . '"  alt="" style="background-image: none;">' ?>
                                                <div class="trend-top-cap">
                                                    <h2><a href="news_detail.php?n_id=<?php echo "$rs2[n_id]"; ?>" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms" style="font-size: 20px;"><?php echo "$rs2[n_name]"; ?></a></h2>
                                                    <p data-animation="fadeInUp" data-delay=".1s" data-duration="1000ms">by
                                                        <?php echo "$rs2[t_name]"; ?> - <?php echo "$rs2[n_date]"; ?></p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!-- Whats New Start -->

        <!-- Whats New End -->
        <!--   Weekly2-News start -->

        <!-- End Weekly-News -->
        <!--  Recent Articles start -->

        <!--Recent Articles End -->
        <!-- Start Video Area -->
        <div class="youtube-area video-padding d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="video-items-active">
                            <div class="video-items text-center">
                                <iframe width="1172" height="547" src="https://www.youtube.com/embed/PoGUguJ66Gc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Start Video area-->
        <!--   Weekly3-News start -->
        <div class="weekly3-news-area pt-80 pb-130">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-wrapper">
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-30">
                                        <h3>ข่าวสารทั่วไป</h3>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly3-news-active dot-style d-flex">
                                            <?php $sql3 = "SELECT * FROM news AS news 
							INNER JOIN teacher AS teacher 
								on (news.t_id = teacher.t_id) WHERE n_status = '2' ORDER BY news.n_id DESC";
                                            $result3 = mysqli_query($conn, $sql3)
                                                or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                                            while ($rs3 = mysqli_fetch_array($result3)) { ?>
                                                <div class="weekly3-single">
                                                    <div class="weekly3-img">
                                                        <?php echo '<img src="image/' . $rs3['n_pic'] . '"  alt=""> ' ?>
                                                        <!-- <img src="assets/img/gallery/test1.jpg" alt="" style="height: 215px;"> -->
                                                    </div>
                                                    <div class="weekly3-caption">
                                                        <h4><a href="news_detail.php?n_id=<?php echo "$rs3[n_id]"; ?>"><?php echo "$rs3[n_name]"; ?></a></h4>
                                                        <p> <?php echo "$rs3[n_date]"; ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- banner-last Start -->
        <div class="weekly3-news-area gray-bg pt-80 pb-130">
            <!-- <div class="weekly3-news-area pt-80 pb-130"> -->
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-wrapper">
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-30">
                                        <h3>ข่าวสารกิจกรรม</h3>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly3-news-active dot-style d-flex">
                                            <?php $sql4 = "SELECT * FROM news AS news 
							INNER JOIN teacher AS teacher 
								on (news.t_id = teacher.t_id) WHERE n_status = '3' ORDER BY news.n_id DESC";
                                            $result4 = mysqli_query($conn, $sql4)
                                                or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                                            while ($rs4 = mysqli_fetch_array($result4)) { ?>
                                                <div class="weekly3-single">
                                                    <div class="weekly3-img">
                                                        <?php echo '<img src="image/' . $rs4['n_pic'] . '"  alt=""> ' ?>
                                                        <!-- <img src="assets/img/gallery/test1.jpg" alt="" style="height: 215px;"> -->
                                                    </div>
                                                    <div class="weekly3-caption">
                                                        <h4><a href="news_detail.php?n_id=<?php echo "$rs4[n_id]"; ?>"><?php echo "$rs4[n_name]"; ?></a></h4>
                                                        <p> <?php echo "$rs4[n_date]"; ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-last End -->
    </main>
    <?php include 'footer.php'; ?>
    <!-- Search model Begin -->
    <div class="search-model-box">
        <div class="d-flex align-items-center h-100 justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>




</body>

</html>