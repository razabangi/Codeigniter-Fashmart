<?php $this->load->view('partials/header'); ?>
        <!-- slider-area-start -->
        <div class="slider-area">
            <div id="slider">
                <!-- <img src="/assets/img/banner/banner1.jpg" alt="slider-img" title="#caption1" /> -->
                <?php foreach ($sliders as $slider): ?>
                    <img src="/uploads/media_images/<?php echo $slider['media_img']; ?>" width="1349" height="400" alt="slider-img" title="#caption2" />
                <?php endforeach ?>
            </div>
        </div>
        <!-- slider-area-end -->

        <!-- banner-area-start -->
            <div class="banner-area pt-80 width-short">
                <div class="container-fulied">
                    <div class="row">
                        <div class="col-xl-5 col-lg-8 col-md-6 col-12">
                            <!-- single-banner-start -->
                            <div class="single-banner mb-3">
                                <div class="banner-img">
                                    <a href="/category/<?php echo $get_parent_category['slug']; ?>"><img src="/uploads/category_images/<?php echo $get_parent_category['category_image']; ?>" alt="banner" /></a>
                                </div>
                                <div class="banner-content">
                                    <a href="/category/<?php echo $get_parent_category['slug']; ?>"><?php echo $get_parent_category['title']; ?></a>
                                </div>
                            </div>
                            <!-- single-banner-start -->
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-6 col-12 ">
                            <!-- single-banner-start -->
                            <div class="single-banner mb-30 mb-3">
                                <div class="banner-img">
                                    <a href="/category/<?php echo $get_parent_category_women['slug']; ?>"><img src="/uploads/category_images/<?php echo $get_parent_category_women['category_image']; ?>" alt="banner" /></a>
                                </div>
                                <div class="banner-content">
                                    <a href="/category/<?php echo $get_parent_category_women['slug']; ?>"><?php echo $get_parent_category_women['title']; ?></a>
                                </div>
                            </div>
                            <!-- single-banner-end -->
                            <!-- single-banner-start -->
                            <div class="single-banner mb-3">
                                <div class="banner-img">
                                    <a href="/category/<?php echo $tshirt['slug']; ?>"><img src="/uploads/category_images/<?php echo $tshirt['category_image']; ?>" alt="banner" /></a>
                                </div>
                                <div class="banner-content">
                                    <a href="/category/<?php echo $tshirt['slug']; ?>"><?php echo $tshirt['title']; ?></a>
                                </div>
                            </div>
                            <!-- single-banner-end -->
                        </div>
                        <div class="col-xl-5 col-lg-12 col-md-6 col-12 class-width">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                    <!-- single-banner-start -->
                                    <div class="single-banner mb-28 mb-3">
                                        <div class="banner-img">
                                            <a href="/category/<?php echo $trouser['slug']; ?>"><img src="/uploads/category_images/<?php echo $trouser['category_image']; ?>" alt="banner" /></a>
                                        </div>
                                        <div class="banner-content">
                                            <a href="/category/<?php echo $trouser['slug']; ?>"><?php echo $trouser['title']; ?></a>
                                        </div>
                                    </div>
                                    <!-- single-banner-end -->
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                    <!-- single-banner-start -->
                                    <div class="single-banner mb-28 mb-3">
                                        <div class="banner-img">
                                            <a href="/category/<?php echo $abaya['slug']; ?>"><img src="/uploads/category_images/<?php echo $abaya['category_image']; ?>" alt="banner" /></a>
                                        </div>
                                        <div class="banner-content">
                                            <a href="/category/<?php echo $abaya['slug']; ?>"><?php echo $abaya['title']; ?></a>
                                        </div>
                                    </div>
                                    <!-- single-banner-end -->
                                </div>
                            </div>
                            <!-- single-banner-start -->
                            <div class="single-banner">
                                <div class="banner-img">
                                    <a href="/category/<?php echo $shalwar_kameez['slug']; ?>"><img src="/uploads/category_images/<?php echo $shalwar_kameez['category_image']; ?>" alt="banner" /></a>
                                </div>
                                <div class="banner-content">
                                    <a href="<?php echo $shalwar_kameez['slug']; ?>"><?php echo $shalwar_kameez['title']; ?></a>
                                </div>
                            </div>
                            <!-- single-banner-end -->
                        </div>
                    </div>
                </div>
           </div>
            <!-- banner-area-end -->

        <!-- feature-product-area-start -->
        <div class="feature-product-area ptb-80">	
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title mb-30 text-center">
                            <h2>Featured Products</h2>
                            <p>Grab your product now with excited & shocking price. Enjoy the deals!</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- tab-menu-start -->
                        <div class="tab-menu mb-50 text-center">
                            <ul class="nav">
                                <li><a class="active" href="#Men" data-toggle="tab">Men</a></li>
                                <li><a href="#womens"  data-toggle="tab">womens</a></li>
                                <li><a href="#Sherwani" data-toggle="tab">Sherwani</a></li>
                                <li><a href="#Chino" data-toggle="tab">Chino</a></li>
                            </ul>
                        </div>
                        <!-- tab-menu-end -->
                    </div>
                </div>		
                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane active show" id="Men">
                        <div class="product-active owl-carousel">
                            <!-- product-wrapper-start -->
                            <?php foreach ($show_all_mens_products as $show_all_mens_product): ?> 
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="/product/<?php echo $show_all_mens_product['slug']; ?>">
                                        <?php if ($show_all_mens_product['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $show_all_mens_product['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($show_all_mens_product['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                    </a>
                                    <?php if ($show_all_mens_product['is_featured'] == 1): ?>
                                    <span class="sale">sale</span>
                                    <?php endif ?>
                                    <div class="product-icon">
                                        <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
                                    </div>
                                </div>
                                <div class="product-content pt-20">
                                    <div class="manufacture-product">
                                        <a href="#"><?php echo $brand_array[$show_all_mens_product['brand_id']]; ?></a>
                                        <!-- <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <h2><a href="/product/<?php echo $show_all_mens_product['slug']; ?>"><?php echo $show_all_mens_product['title']; ?></a></h2>
                                    <div class="price">
                                        <ul>
                                            <li class="new-price">Rs: <?php echo number_format($show_all_mens_product['price']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- product-wrapper-end -->
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="womens">
                        <div class="product-active owl-carousel">
                            <!-- product-wrapper-start -->
                            <?php foreach ($show_all_womens_products as $show_all_womens_product): ?> 
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <?php if ($show_all_womens_product['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $show_all_womens_product['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($show_all_womens_product['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                    </a>
                                    <?php if ($show_all_womens_product['is_featured'] == 1): ?>
                                    <span class="sale">sale</span>
                                    <?php endif ?>
                                    <div class="product-icon">
                                        <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
                                    </div>
                                </div>
                                <div class="product-content pt-20">
                                    <div class="manufacture-product">
                                        <a href="#"><?php echo $brand_array[$show_all_womens_product['brand_id']]; ?></a>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h2><a href="/product/<?php echo $show_all_womens_product['slug']; ?>"><?php echo $show_all_womens_product['title']; ?></a></h2>
                                    <div class="price">
                                        <ul>
                                            <li class="new-price">Rs: <?php echo number_format($show_all_womens_product['price']) ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- product-wrapper-end -->
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Sherwani">
                        <div class="product-active owl-carousel">
                            <!-- product-wrapper-start -->
                            <?php foreach ($show_all_sherwani_products as $show_all_sherwani_product): ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                         <?php if ($show_all_sherwani_product['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $show_all_sherwani_product['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($show_all_sherwani_product['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                    </a>
                                    <?php if ($show_all_sherwani_product['is_featured'] == 1): ?>
                                    <span class="sale">sale</span> 
                                    <?php endif ?>
                                    <div class="product-icon">
                                        <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
                                    </div>
                                </div>
                                <div class="product-content pt-20">
                                    <div class="manufacture-product">
                                        <a href="#"><?php echo $brand_array[$show_all_sherwani_product['brand_id']]; ?></a>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h2><a href="/product/<?php echo $show_all_sherwani_product['slug']; ?>"><?php echo $show_all_sherwani_product['title']; ?></a></h2>
                                    <div class="price">
                                        <ul>
                                            <li class="new-price">Rs: <?php echo number_format($show_all_sherwani_product['price']) ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- product-wrapper-end -->
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Chino">
                        <div class="product-active owl-carousel">
                            <!-- product-wrapper-start -->
                            <?php foreach ($show_all_chinos_products as $show_all_chinos_product): ?>
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <?php if ($show_all_chinos_product['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $show_all_chinos_product['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($show_all_chinos_product['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                    </a>
                                    <?php if ($show_all_chinos_product['is_featured'] == 1): ?>
                                    <span class="sale">sale</span>
                                    <?php endif ?>
                                    <div class="product-icon">
                                        <a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
                                    </div>
                                </div>
                                <div class="product-content pt-20">
                                    <div class="manufacture-product">
                                        <a href="#"><?php echo $brand_array[$show_all_chinos_product['brand_id']]; ?></a>
                                        <div class="rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h2><a href="/product/<?php echo $show_all_chinos_product['slug']; ?>"><?php echo $show_all_chinos_product['title']; ?></a></h2>
                                    <div class="price">
                                        <ul>
                                            <li class="new-price">Rs: <?php echo number_format($show_all_chinos_product['price']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- product-wrapper-end -->
                            
                        </div>
                    </div>
                </div>
                <!-- tab-area-end -->
            </div>
       </div>
        <!-- feature-product-area-end -->

        <!-- banner-area-start -->
            <div class="banner-area pt-80">
                <div class="container-fulied">
                    <div class="row">

                            <?php foreach ($small_banners as $small_banner): ?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                    <!-- single-banner-start -->
                                        <div class="single-banner mb-3">
                                            <div class="banner-img">
                                                <a href="#"><img src="/uploads/mini-banner-images/<?php echo $small_banner['image']; ?>" alt="banner" /></a>
                                            </div>
                                            <div class="banner-content-3">
                                                <h2>Enjoy!</h2>
                                                <h2>Summer Collection</h2>
                                                <a href="#">view collection</a>
                                            </div>
                                        </div>
                                    
                                    <!-- single-banner-end -->
                                </div>
                            <?php endforeach ?>
    
                    </div>
                </div>
            </div>
            <!-- banner-area-end -->

        <!-- arrivals-area-start -->
        <div class="arrivals-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-40-2 col-12 mb-3">
                        <div class="section-title-2">
                            <h2>On Sale</h2>
                        </div>
                        <!-- best-sell-active-start -->
                        <div class="best-sell-active owl-carousel">
                            <div class="best-sell-total">
                                <!-- product-wrapper-2-start -->
                                <?php foreach ($show_all_product_with_sale as $product_with_sale): ?>    
                                <div class="product-wrapper-2 mb-20 mb-3">
                                    <div class="product-img-2">
                                        <a href="#">
                                            <?php if ($product_with_sale['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $product_with_sale['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($product_with_sale['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                        </a>
                                    </div>
                                    <div class="product-content-2">
                                        <div class="manufacture-product">
                                            <a href="#"><?php echo $brand_array[$product_with_sale['brand_id']]; ?></a>
                                            <div class="rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2><a href="/product/<?php echo $product_with_sale['slug']; ?>"><?php echo $product_with_sale['title']; ?></a></h2>
                                        <div class="price">
                                            <ul>
                                                <li class="old-price"><?php echo $product_with_sale['special_price']; ?></li>
                                                <li class="new-price"><?php echo $product_with_sale['price']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <!-- product-wrapper-2-end -->
                                
                            </div>
                        </div>
                        <!-- best-sell-active-end -->
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-40-2 col-12 mb-3">
                        <div class="section-title-2">
                            <h2>Latest Arrivals</h2>
                        </div>
                        <!-- best-sell-active-start -->
                        <div class="best-sell-active owl-carousel">
                            <div class="best-sell-total">
                                <!-- product-wrapper-2-start -->
                                <?php foreach ($show_all_new_arrivals as $new_arrivals): ?>     
                                <div class="product-wrapper-2 mb-20 mb-3">
                                    <div class="product-img-2">
                                        <a href="#">
                                            <?php if ($new_arrivals['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $new_arrivals['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($new_arrivals['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                        </a>
                                    </div>
                                    <div class="product-content-2">
                                        <div class="manufacture-product">
                                            <a href="#"><?php echo $brand_array[$new_arrivals['brand_id']]; ?> </a>
                                            <div class="rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2><a href="/product/<?php echo $new_arrivals['slug']; ?>"><?php echo $new_arrivals['title']; ?></a></h2>
                                        <div class="price">
                                            <ul>
                                                <li class="old-price"><?php echo $new_arrivals['price']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <!-- product-wrapper-2-end -->
                               
                            </div>
                        </div>
                        <!-- best-sell-active-end -->
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                        <div class="section-title-2">
                            <h2>Top Viewed</h2>
                        </div>
                        <!-- best-sell-active-start -->
                        <div class="best-sell-active owl-carousel">
                            <div class="best-sell-total">
                                <!-- product-wrapper-2-start -->
                                <?php foreach ($show_all_most_views as $product_with_views): ?>    
                                <div class="product-wrapper-2 mb-20 mb-3">
                                    <div class="product-img-2">
                                        <a href="#">
                                            <?php if ($product_with_views['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $product_with_views['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($product_with_views['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>

                                        </a>
                                    </div>
                                    <div class="product-content-2">
                                        <div class="manufacture-product">
                                            <a href="#"><?php echo $brand_array[$product_with_views['brand_id']]; ?> </a>
                                            <div class="rating">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2><a href="/product/<?php echo $product_with_views['slug']; ?>"><?php echo $product_with_views['title']; ?></a></h2>
                                        <div class="price">
                                            <ul>
                                                <li class="old-price"><?php echo $product_with_views['price']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <!-- product-wrapper-2-end -->
                                
                            </div>
                        </div>
                        <!-- best-sell-active-end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- arrivals-area-end -->
        <!-- banner-area-start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">

                    <?php foreach ($big_banners as $big_banner): ?>    
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <!-- single-banner-start -->
                        <div class="single-banner mb-3">
                            <div class="banner-img">
                                <a href="#"><img src="/uploads/big-banner-images/<?php echo $big_banner['image']; ?>" alt="banner" /></a>
                            </div>
                            <div class="banner-content-2">
                                <h3>New Arrivals</h3>
                                <h2>Exciting Deals</h2>
                                <h2>For Our Customers</h2>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <!-- single-banner-end -->
                    </div>
                    <?php endforeach ?>

                </div>
            </div>
       </div>
        <!-- banner-area-end -->
        <!-- banner-area-2-start -->
        <div class="banner-area-2">
            <div class="container">
                <div class="br-bottom ptb-80">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                            <!-- single-banner-2-start -->
                            <div class="single-banner-2 text-center mb-3">
                                <div class="banner-icon">
                                    <a href="#"><img src="/assets/img/banner/2.png" alt="banner" /></a>
                                </div>
                                <div class="banner-text">
                                    <h2>Free Shipping Worldwide</h2>
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
                                </div>
                            </div>
                            <!-- single-banner-2-end -->
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                            <!-- single-banner-2-start -->
                            <div class="single-banner-2 text-center mb-3">
                                <div class="banner-icon">
                                    <a href="#"><img src="/assets/img/banner/3.png" alt="banner" /></a>
                                </div>
                                <div class="banner-text">
                                    <h2>Money Back Guarantee</h2>
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
                                </div>
                            </div>
                            <!-- single-banner-2-end -->
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                            <!-- single-banner-2-start -->
                            <div class="single-banner-2 text-center">
                                <div class="banner-icon">
                                    <a href="#"><img src="/assets/img/banner/4.png" alt="banner" /></a>
                                </div>
                                <div class="banner-text">
                                    <h2>online support 24/7</h2>
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram</p>
                                </div>
                            </div>
                            <!-- single-banner-2-end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner-area-2-end -->
        
        <!-- newslatter-area-start -->
        <div class="newslatter-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bt-top ptb-80">
                            <div class="newlatter-content text-center">
                                <h6>Special Offers For Subscribers</h6>
                                <h3>Ten Percent Member Discount</h3>
                                <p>Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
                                <form action="#">
                                    <input type="text" placeholder="Enter your email address here..."/>
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newslatter-area-end -->
<?php $this->load->view('partials/footer'); ?>