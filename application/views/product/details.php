<?php $this->load->view('partials/header'); ?>
<!-- breadcrumbs-area-start -->
			<div class="breadcrumbs-area" style="padding: 64px 0 130px!important;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-content text-center">
								<h2>product details</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">product details</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-12">
							<!-- zoom-area-start -->
							<div class="zoom-area mb-3">
								<img id="zoompro" src="/uploads/product_images/<?php echo $show_all_products['product_img']; ?>" data-zoom-image="img/zoom/large/1.jpg" alt="zoom"/>
								<div id="gallery" class="mt-30">
									<?php foreach ($this->product_gallery->get_gallaries_for_product($show_all_products['id']) as $product_gallery): ?>	
									<a href="#" data-image="img/zoom/small/1.jpg" data-zoom-image="img/zoom/large/1.jpg">
										<img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="zoom"/>
									  </a>
									<?php endforeach ?>
									  <!-- <a href="#" data-image="img/zoom/small/2.jpg" data-zoom-image="img/zoom/large/2.jpg">
										<img src="img/zoom/thumb/2.jpg" alt="zoom"/>
										</a>
									  <a href="#" data-image="img/zoom/small/3.jpg" data-zoom-image="img/zoom/large/3.jpg">
										<img src="img/zoom/thumb/3.jpg" alt="zoom"/>
									  </a>
									  <a href="#" data-image="img/zoom/small/4.jpg" data-zoom-image="img/zoom/large/4.jpg">
										<img src="img/zoom/thumb/4.jpg" alt="zoom"/>
									  </a> -->
								</div>
							</div>
							<!-- zoom-area-end -->
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-12">
							<!-- zoom-product-details-start -->
							<div class="zoom-product-details">
								<h1><?php echo $show_all_products['title']; ?></h1>
								<div class="main-area mtb-30">
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
									<div class="review-2">
										<a href="#">1 reviews</a>
										<a href="#">Write a review</a>
									</div>
								</div>
								<div class="price">
									<ul>
										<li class="new-price">Rs: <?php echo number_format($show_all_products['price']); ?></li>
									</ul>
									<p><?php echo $show_all_products['description']; ?></p>
								</div>
								<div class="list-unstyled-2">
									<ul>
										<li>Ex Tax: $100.00</li>
										<li>Reward Points: %s 200</li>
									</ul>
								</div>
								<div class="list-unstyled">
									<ul>
										<li>Brands <a href="#"><?php echo $brand_array[$show_all_products['brand_id']]; ?></a></li>
										<li>Product Code: <a href="#"><?php echo $show_all_products['sku']; ?></a></li>
										<li>Reward Points:  <a href="#">400</a></li>
										<?php if ($show_all_products['status'] == 'activate'): ?>
										<li>Availability:  <a href="#">In Stock</a></li>
										<?php else: ?>
										<li>Availability:  <a href="#">Out of Stock</a></li>	
										<?php endif ?>
									</ul>
								</div>
								<!-- <div class="catagory-select mb-30">
									<h3>Available Options</h3>
									<form action="#">
										<label>Select:</label>
										<select  class="sorter-options" data-role="sorter">
											<option selected="selected" value="Lowest">Blue</option>
											<option value="Highest">White</option>
											<option value="Product">Green</option>
										</select>
									</form>
								</div> -->
								<?php if ($show_all_products['status'] == 'activate'): ?>
									<form action="#">
										<div class="quality-button">
											<input class="qty" type="text" value="1"/>
											<input type="button" value="+" data-max="1000"  class="plus" />
											<input type="button" value="-" data-min="1" class="minus" />
										</div>
										<button type="submit">Add to cart</button>
										<div class="product-icon">
											<a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
											<a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
										</div>
									</form>	
								<?php endif ?>
								
							</div>
							<!-- zoom-product-details-end -->
						</div>
					</div>
					<div class="row">
						<!-- products-detalis-area-start -->
						<div class="products-detalis-area pt-80">
							<div class="col-lg-12">
								<!-- tab-menu-start -->
								<div class="tab-menu mb-30 text-center">
									<ul class="nav">
										<li><a class="active" href="#Description" data-toggle="tab">Description</a></li>
										<li><a href="#Reviews"  data-toggle="tab">Reviews (0)</a></li>
										<li><a href="#Tags" data-toggle="tab">Add Tags</a></li>
									</ul>
								</div>
								<!-- tab-menu-end -->
							</div>
							<!-- tab-area-start -->
							<div class="tab-content">
								<div class="tab-pane active" id="Description">
									<div class="col-lg-12">
										<div class="tab-description">
											<p><?php echo $show_all_products['description']; ?></p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="Reviews">
									<div class="col-lg-12">
										<div class="reviews-area">
											<h3>Reviews</h3>
											<p>Be the first to review <?php echo "'".$show_all_products['title']."'"; ?> </p>
											<div class="rating-area mb-10">
												<h4>Your Rating</h4>
												<a href="#"><i class="fa fa-star" ></i></a>
												<a href="#"><i class="fa fa-star" ></i></a>
												<a href="#"><i class="fa fa-star" ></i></a>
												<a href="#"><i class="fa fa-star" ></i></a>
											</div>
											<div class="comment-form mb-10">
												<label>Your Review</label>
												<textarea name="comment" id="comment" cols="20" rows="7"></textarea>
											</div>
											<div class="comment-form-author mb-10">
												<label>Name</label>
												<input type="text" />
											</div>
											<div class="comment-form-email mb-10">
												<label>email</label>
												<input type="text" />
											</div>
											<button type="submit">submit</button>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="Tags">
									<div class="col-lg-12">
										<div class="tab-description">
											<p> Custom Tab Content here. <br />
											Tail sed sausage magna quis commodo swine. Aliquip strip steak esse ex in ham hock fugiat in. Labore velit pork belly eiusmod ut shank doner capicola consectetur landjaeger fugiat excepteur short loin. Pork belly laboris mollit in leberkas qui. Pariatur swine aliqua pork chop venison veniam. Venison sed cow short loin bresaola shoulder cupidatat capicola drumstick dolore magna shankle. </p>
										</div>
									</div>
								</div>
							</div>
							<!-- tab-area-end -->
						</div>
						<!-- products-detalis-area-end -->
					</div>
				</div>
			</div>
			<!-- shop-main-area-end -->
			<!-- arrivals-area-start -->
			<div class="arrivals-area ptb-80">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title mb-30 text-center">
								<h2>Related Products</h2>
								<p> Order online and have your products delivered to your closest store for free </p>
							</div>
						</div>
					</div>	
					<!-- tab-area-start -->
					<div class="tab-content">
                        <div class="product-active owl-carousel">
                            <!-- product-wrapper-start -->
                            <?php foreach ($related_products as $related_product): ?>                         	<div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                        <?php if ($related_product['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $related_product['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($related_product['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
                                    </a>
                                    <?php if ($related_product['is_featured'] == 1): ?>
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
                                        <a href="#"><?php echo $brand_array[$related_product['brand_id']]; ?></a>
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
                                    <h2><a href="#"><?php echo $related_product['title']; ?></a></h2>
                                    <div class="price">
                                        <ul>
                                            <li class="new-price">Rs: <?php echo number_format($related_product['price']); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- product-wrapper-end -->
                            
                        </div>
					</div>
					<!-- tab-area-end -->
				</div>
			</div>
			<!-- arrivals-area-end -->
<?php $this->load->view('partials/footer'); ?>
