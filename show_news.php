<?php
include 'connect.php'
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ข่าวสารทั้งหมด - วิทยาลัยเทคโนโลยีป่าสักธารา(PS-TECH) </title>
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
        <!-- About US Start -->
        <div class="about-area2 gray-bg pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="about-details-cap mb-50">
                        <h1>ข่าวสารทั้งหมด (PS-TECH NEWS)</h1>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php $sql2 = "SELECT * FROM news AS news 
							INNER JOIN teacher AS teacher 
								on (news.t_id = teacher.t_id) ORDER BY news.n_id DESC";
                        $result2 = mysqli_query($conn, $sql2)
                            or die("3.ไม่สามารถประมวลผลคำสั่งได้") . mysqli_error();
                        while ($rs2 = mysqli_fetch_array($result2)) { ?>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="whats-news-single mb-40 mb-40">
                                    <div class="whates-img">
                                        <?php echo '<img src="image/' . $rs2['n_pic'] . '"  alt="" height: 237px; >' ?>
                                        <!-- <img src="assets/img/gallery/test1.jpg" alt="" style="height: 237px;"> -->
                                    </div>
                                    <div class="whates-caption whates-caption2">
                                        <h4><a href="news_detail.php?n_id=<?php echo "$rs2[n_id]"; ?>"><?php echo "$rs2[n_name]"; ?></a></h4>
                                        <span><?php echo "$rs2[t_name]"; ?> - <?php echo "$rs2[n_date]"; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details2.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details3.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details2.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details3.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details2.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details3.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class="whats-news-single mb-40 mb-40">
                                <div class="whates-img">
                                    <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                </div>
                                <div class="whates-caption whates-caption2">
                                    <h4><a href="#">Secretart for Economic Air
                                            plane that looks like</a></h4>
                                    <span>by Alice cloe - Jun 19, 2020</span>

                                </div>
                            </div>
                        </div> -->

                    </div>
                    <!-- <div class="card-deck">
                            <div class="card">
                                <div class="whats-news-single mb-40 mb-40">
                                    <div class="whates-img">
                                        <img src="assets/img/gallery/whats_news_details1.png" alt="">
                                    </div>
                                    <div class="whates-caption whates-caption2">
                                        <h4><a href="#">Secretart for Economic Air
                                                plane that looks like</a></h4>
                                        <span>by Alice cloe - Jun 19, 2020</span>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                            <div class="whats-news-single mb-40 mb-40">
                                    <div class="whates-img">
                                        <img src="assets/img/gallery/whats_news_details2.png" alt="">
                                    </div>
                                    <div class="whates-caption whates-caption2">
                                        <h4><a href="#">Secretart for Economic Air
                                                plane that looks like</a></h4>
                                        <span>by Alice cloe - Jun 19, 2020</span>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                            <div class="whats-news-single mb-40 mb-40">
                                    <div class="whates-img">
                                        <img src="assets/img/gallery/whats_news_details3.png" alt="">
                                    </div>
                                    <div class="whates-caption whates-caption2">
                                        <h4><a href="#">Secretart for Economic Air
                                                plane that looks like</a></h4>
                                        <span>by Alice cloe - Jun 19, 2020</span>
                                       
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- Trending Tittle 
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="assets/img/trending/trending_top.jpg" alt="">
                            </div>
                            <div class="heading-news mb-30 pt-30">
                                <h3>Here come the moms in space</h3>
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                <p class="about-pera1 mb-25">
                                    My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from.
                                    the refractor telescope uses a convex lens to focus the light on the eyepiece.
                                    The reflector telescope has a concave lens which means it telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.
                                    Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                            </div> 
                            <div class="section-tittle mb-30 pt-30">
                                <h3>Unordered list style?</h3>
                            </div>
                            <div class="about-prea">
                                <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                <p class="about-pera1 mb-25">Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                                <p class="about-pera1 mb-25">
                                    My hero when I was a kid was my mom. Same for everyone I knew. Moms are untouchable. They’re elegant, smart, beautiful, kind…everything we want to be. At 29 years old, my favorite compliment is being told that I look like my mom. Seeing myself in her image, like this daughter up top, makes me so proud of how far I’ve come, and so thankful for where I come from.
                                    the refractor telescope uses a convex lens to focus the light on the eyepiece.
                                    The reflector telescope has a concave lens which means it telescope sits on. The mount is the actual tripod and the wedge is the device that lets you attach the telescope to the mount.
                                    Moms are like…buttons? Moms are like glue. Moms are like pizza crusts. Moms are the ones who make sure things happen—from birth to school lunch.</p>
                            </div>
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                        <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    <!-- From 
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="form-contact contact_form mb-80" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn boxed-btn2">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-4"> -->
                    <!-- Flow Socail 
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">  
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div> 
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                    <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- New Poster 
                        <div class="news-poster d-none d-lg-block">
                            <img src="assets/img/news/news_card.jpg" alt="">
                        </div> 
                    </div> -->
                </div>
            </div>
        </div>
        <!-- About US End -->
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