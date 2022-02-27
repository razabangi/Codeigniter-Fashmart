<?php $get_category_unstich = $this->category->show_category_by_id(22); ?>
<?php $twopieces = $this->category->show_category_by_id(23); ?>
<?php $three_pieces = $this->category->show_category_by_id(24); ?>
<?php $stich = $this->category->show_category_by_id(25); ?>
<?php $kurti = $this->category->show_category_by_id(26); ?>
<?php $shalwar_kameez_women = $this->category->show_category_by_id(27); ?>
<?php $trouser_women = $this->category->show_category_by_id(28); ?>
<?php $muslim_wear = $this->category->show_category_by_id(29); ?>
<?php $dupatta = $this->category->show_category_by_id(31); ?>
<?php $scarf = $this->category->show_category_by_id(32); ?>
<?php $trouser_tights = $this->category->show_category_by_id(33); ?>
<?php $jeans = $this->category->show_category_by_id(34); ?>
<?php $tights = $this->category->show_category_by_id(35); ?>
<?php $shorts = $this->category->show_category_by_id(36); ?>


<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from demo.hasthemes.com/mimosa-preview/mimosa/index-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Oct 2020 17:57:53 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>FashMart | Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/assets/img/logo/favicon1.png">

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="/assets/css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="/assets/css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="/assets/css/owl.carousel.css">
        <!-- magnific-popup css -->
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
		<!-- ionicons.min css -->
        <link rel="stylesheet" href="/assets/css/ionicons.min.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="/assets/css/nivo-slider.css">
		<!-- style css -->
		<link rel="stylesheet" href="/assets/css/style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="/assets/css/responsive.css">
		<!-- modernizr css -->
        <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header-area-start -->
        <header>
            <!-- header-top-area-start -->
            <div class="header-top-area" id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <!-- logo-area-start -->
                            <div class="logo-area">
                                <!-- <a href="<?php echo '/' ?>"><img src="/assets/img/logo/fashmart-logo.png" alt="logo" /></a> -->
                                <a href="<?php echo '/' ?>"><img src="/uploads/logo-images/<?php echo $logo['image']; ?>" alt="logo" /></a>
                            </div>
                            <!-- logo-area-end -->
                        </div>
                        <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                            <!-- menu-area-start -->
                            <div class="menu-area menu-area-center">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="<?php echo '/' ?>">Home</a>
                                            <!-- <ul class="sub-menu">
                                                <li><a href="index-2.html">Home-2</a></li>
                                                <li><a href="index-3.html">Home-3</a></li>
                                                <li><a href="index-4.html">Home-4</a></li>
                                                <li><a href="index-5.html">Home-5</a></li>
                                                <li><a href="index-6.html">Home-6</a></li>
                                                <li><a href="index-7.html">Home-7</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="/category/<?php echo $get_parent_category['slug']; ?>"><?php echo $get_parent_category['title']; ?></a>
                                            <ul class="mega-menu">
                                                <li><a href="/category/<?php echo $tshirt['slug']; ?>"><?php echo $tshirt['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <?php foreach ($this->category->show_category_by(3) as $value): ?>
                                                        <li><a href="/category/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </li>
                                                <li><a href="/category/<?php echo $shirt['slug']; ?>"><?php echo $shirt['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <?php foreach ($this->category->show_category_by(7) as $value): ?>
                                                        <li><a href="/category/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </li>
                                                <li><a href="/category/<?php echo $shalwar_kameez['slug']; ?>"><?php echo $shalwar_kameez['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <?php foreach ($this->category->show_category_by(10) as $value): ?>
                                                        <li><a href="/category/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </li>
                                                <li><a href="/category/<?php echo $trouser_jeans['slug']; ?>"><?php echo $trouser_jeans['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <?php foreach ($this->category->show_category_by(15) as $value): ?>
                                                        <li><a href="/category/<?php echo $value['slug']; ?>"><?php echo $value['title']; ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                       <!--  <li><a href="shop.html">Accessories</a>
                                            <ul class="mega-menu mega-menu-2">
                                                <li><a href="#">suscipit mauris</a>
                                                    <ul class="sub-menu-2">
                                                        <li><a href="shop.html">Integer rhoncus</a></li>
                                                        <li><a href="shop.html">ipsum ametus</a></li>
                                                        <li><a href="shop.html">Morbi vitae</a></li>
                                                        <li><a href="shop.html">semper vulputate</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">viverra lacus</a>
                                                    <ul class="sub-menu-2">
                                                        <li><a href="shop.html">Aliquam acsus</a></li>
                                                        <li><a href="shop.html">Morbi amimi</a></li>
                                                        <li><a href="shop.html">pretium metus</a></li>
                                                        <li><a href="shop.html">suscipit felis</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li> -->
                                        <li><a href="/category/<?php echo $get_parent_category_women['slug']; ?>"><?php echo $get_parent_category_women['title']; ?></a>
                                            <ul class="mega-menu mega-menu-2">
                                                <li><a href="/category/<?php echo $get_category_unstich['slug']; ?>"><?php echo $get_category_unstich['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <li><a href="/category/<?php echo $twopieces['slug']; ?>"><?php echo $twopieces['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $three_pieces['slug']; ?>"><?php echo $three_pieces['title']; ?></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/category/<?php echo $stich['slug']; ?>"><?php echo $stich['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <li><a href="/category/<?php echo $kurti['slug']; ?>"><?php echo $kurti['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $shalwar_kameez_women['slug']; ?>"><?php echo $shalwar_kameez_women['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $trouser_women['slug']; ?>"><?php echo $trouser_women['title']; ?></a></li>                           
                                                    </ul>
                                                </li>
                                                <li><a href="/category/<?php echo $muslim_wear['slug']; ?>"><?php echo $muslim_wear['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <li><a href="/category/<?php echo $abaya['slug']; ?>"><?php echo $abaya['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $dupatta['slug']; ?>"><?php echo $dupatta['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $scarf['slug']; ?>"><?php echo $scarf['title']; ?></a></li>                           
                                                    </ul>
                                                </li>
                                                <li><a href="/category/<?php echo $trouser_tights['slug']; ?>"><?php echo $trouser_tights['title']; ?></a>
                                                    <ul class="sub-menu-2">
                                                        <li><a href="/category/<?php echo $jeans['slug']; ?>"><?php echo $jeans['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $shorts['slug']; ?>"><?php echo $shorts['title']; ?></a></li>
                                                        <li><a href="/category/<?php echo $tights['slug']; ?>"><?php echo $tights['title']; ?></a></li>                           
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo '/brand'; ?>">Brands</a>
                                            <!-- <ul class="sub-menu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="#">Contact Us</a>
                                            <!-- <ul class="sub-menu">
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="register.html">register</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="about.html">about</a></li>
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="404.html">404</a></li>
                                            </ul> -->
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- menu-area-end -->
                        </div>
                        <div class="col-xl-2 col-lg-2 com-md-6 col-6">
                            <!-- header-right-area-start -->
                            <div class="header-right-area header-right-hm7">
                                <ul>
                                    <li><a id="show-search" href="#"><i class="icon ion-ios-search-strong"></i></a>
                                        <div class="search-content" id="hide-search">
                                            <span class="close" id="close-search">
                                                <i class="ion-close"></i>
                                            </span>
                                            <div class="search-text">
                                                <h1>Search</h1>
                                                <form action="#">
                                                    <input type="text" placeholder="search"/>
                                                    <button class="btn" type="button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="cart.html"><i class="icon ion-bag"></i></a>
                                        <span>2</span>
                                        <div class="mini-cart-sub">
                                            <div class="cart-product">
                                                <div class="single-cart">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="/assets/img/product/1.jpg" alt="book" /></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h5><a href="#">Joust Duffle Bag</a></h5>
                                                        <p>1 x £60.00</p>
                                                    </div>
                                                </div>
                                                <div class="single-cart">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="/assets/img/product/3.jpg" alt="book" /></a>
                                                    </div>
                                                    <div class="cart-info">
                                                        <h5><a href="#">Chaz Kangeroo Hoodie</a></h5>
                                                        <p>1 x £52.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-totals">
                                                <h5>Total <span>£12.00</span></h5>
                                            </div>
                                            <div class="cart-bottom">
                                                <a href="checkout.html">Check out</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="#" id="show-cart"><i class="icon ion-drag"></i></a>
                                        <div class="shapping-area" id="hide-cart">
                                            <div class="single-shapping mb-20">
                                                <span>Currency</span>
                                                <ul>
                                                    <li><a href="#">€ Euro</a></li>
                                                    <li><a href="#">£ Pound Sterling</a></li>
                                                    <li><a href="#">$ US Dollar</a></li>
                                                </ul>
                                            </div>
                                            <div class="single-shapping mb-20">
                                                <span>Language</span>
                                                <ul>
                                                    <li><a href="#"><img src="/assets/img/flag/1.jpg" alt="flag" />   English</a></li>
                                                    <li><a href="#"><img src="/assets/img/flag/2.jpg" alt="flag" />   French</a></li>
                                                </ul>
                                            </div>
                                            <div class="single-shapping">
                                                <span>My Account</span>
                                                <ul>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- header-right-area-end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-top-area-end -->
            <!-- mobile-menu-area-start -->
            <div class="mobile-menu-area d-block d-lg-none clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul id="nav">
                                        <li><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index-2.html">Home-2</a></li>
                                                <li><a href="index-3.html">Home-3</a></li>
                                                <li><a href="index-4.html">Home-4</a></li>
                                                <li><a href="index-5.html">Home-5</a></li>
                                                <li><a href="index-6.html">Home-6</a></li>
                                                <li><a href="index-7.html">Home-7</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Men</a>
                                            <ul>
                                                <li><a href="shop.html">finibus iaculis</a></li>
                                                <li><a href="shop.html">Integer rhoncus</a></li>
                                                <li><a href="shop.html">purus elittincidu</a></li>
                                                <li><a href="shop.html">tincidunt est</a></li>
                                                <li><a href="shop.html">Fusce eurhon</a></li>
                                                <li><a href="shop.html">iaculis ipsum</a></li>
                                                <li><a href="shop.html">ligula consectet</a></li>
                                                <li><a href="shop.html">vestibulum egest</a></li>
                                                <li><a href="shop.html">Integer rhoncus</a></li>
                                                <li><a href="shop.html">ipsum ametus</a></li>
                                                <li><a href="shop.html">Morbi vitae</a></li>
                                                <li><a href="shop.html">semper vulputate</a></li>
                                                <li><a href="shop.html">Aliquam acsus</a></li>
                                                <li><a href="shop.html">Morbi amimi</a></li>
                                                <li><a href="shop.html">pretium metus</a></li>
                                                <li><a href="shop.html">suscipit felis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Accessories</a>
                                            <ul>
                                                <li><a href="shop.html">Integer rhoncus</a></li>
                                                <li><a href="shop.html">ipsum ametus</a></li>
                                                <li><a href="shop.html">Morbi vitae</a></li>
                                                <li><a href="shop.html">semper vulputate</a></li>
                                                <li><a href="shop.html">Aliquam acsus</a></li>
                                                <li><a href="shop.html">Morbi amimi</a></li>
                                                <li><a href="shop.html">pretium metus</a></li>
                                                <li><a href="shop.html">suscipit felis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Women</a>
                                            <ul>
                                                <li><a href="shop.html">arcu dignissim</a></li>
                                                <li><a href="shop.html">congue quamm</a></li>
                                                <li><a href="shop.html">necfer mentuma</a></li>
                                                <li><a href="shop.html">ultricies volutpat</a></li>
                                                <li><a href="shop.html">acaliquet orci</a></li>
                                                <li><a href="shop.html">dignissim placera</a></li>
                                                <li><a href="shop.html">risussed trist</a></li>
                                                <li><a href="shop.html">Utsuscipit urna</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">Pages</a>
                                            <ul>
                                                <li><a href="shop.html">Shop</a></li>
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-end -->
        </header>
        <!-- header-area-end -->