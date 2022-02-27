<?php $this->load->view('partials/header'); ?>

	<!-- breadcrumbs-area-start -->
			<div class="breadcrumbs-area" style="padding: 64px 0 130px!important;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-content text-center">
								<h2>shop</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">shop</a></li>
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
						<div class="col-lg-12">
							<!-- page-bar-start -->
							<div class="page-bar">
								<div class="shop-tab">
									<!-- tab-menu-start -->
									<div class="tab-menu-3">
										<ul class="nav">
											<li><a class="active" href="#th" data-toggle="tab"><i class="fa fa-list"></i></a></li>
											<li><a href="#list"  data-toggle="tab"><i class="fa fa-th"></i></a></li>
										</ul>
									</div>
									<!-- tab-menu-end -->
									<!-- toolbar-sorter-start -->
									<div class="toolbar-sorter">
										<select  class="sorter-options" data-role="sorter">
											<option selected="selected" value="Lowest">Sort By: Default</option>
											<option value="Highest">Sort By: Name (A - Z)</option>
											<option value="Product">Sort By: Name (Z - A)</option>
										</select>
									</div>
									<!-- toolbar-sorter-end -->
									<!-- toolbar-sorter-2-start -->
									<div class="toolbar-sorter-2">
										<select  class="sorter-options" data-role="sorter">
											<option selected="selected" value="Lowest">Show: 9</option>
											<option value="Highest">Show: 25</option>
											<option value="Product">Show: 50</option>
										</select>
									</div>
									<!-- toolbar-sorter-2-end -->
								</div>
							</div>
							<!-- page-bar-end -->
						</div>
					</div>
					<div class="row">
						<div class="col-xl-9 col-lg-9 col-md-12 col-12 pull-right">
							<!-- shop-right-area-start -->
							<div class="shop-right-area mb-40-2 mb-30">
								<!-- tab-area-start -->
								<div class="tab-content">
									<div class="tab-pane active" id="th">

										<?php foreach($show_all_products as $products): ?>
										<!-- product-wrapper-start -->
										<div class="product-wrapper product-wrapper-3 mb-40">
											<div class="product-img">
												<a href="/product/<?php echo $products['slug']; ?>">
													<?php if ($products['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $products['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($products['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
												</a>
												<?php if ($products['is_featured'] == 1): ?>
												<span class="sale">sale</span>
												<?php endif ?>
												<div class="product-icon">
													<a href="#" data-toggle="tooltip" title="Add to Cart"><i class="icon ion-bag"></i></a>
													<a href="#" data-toggle="tooltip" title="Compare this Product"><i class="icon ion-android-options"></i></a>
													<a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
												</div>
											</div>
											<div class="product-content">
												<div class="manufacture-product">
													<a href="#"><?php echo $brand_array[$products['brand_id']]; ?></a>
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
												<h2><a href="/product/<?php echo $products['slug']; ?>"><?php echo $products['title']; ?></a></h2>
												<div class="price">
													<ul>
														<li class="new-price">Rs: <?php echo number_format($products['price']); ?></li>
													</ul>
												</div>
												<p><?php echo substr($products['description'],0,150).'...'; ?></p>
											</div>
										</div>
										<?php endforeach; ?>
										<!-- product-wrapper-end -->
									
										
									</div>
									<div class="tab-pane fade" id="list">
										<div class="row">
											<?php foreach ($show_all_products as $products): ?>	
											<div class="col-xl-4 col-lg-4 col-md-6 col-12">
												<!-- product-wrapper-start -->
												<div class="product-wrapper mb-40">
													<div class="product-img">
														<a href="/product/<?php echo $products['slug']; ?>">
															<?php if ($products['product_img'] == 'No image found'): ?>
                                        <img src="/assets/img/product/no-image-found.jpg" class="primary" alt="product">                                        
                                        <?php else: ?>
                                        <img src="/uploads/product_images/<?php echo $products['product_img']; ?>" alt="product" class="primary"/>
                                        <?php endif ?>
                                        <?php foreach ($this->product_gallery->get_gallaries_for_hover($products['id']) as $product_gallery): ?>
                                        <img src="/uploads/product-gallery-images/<?php echo $product_gallery['gallery_images']; ?>" alt="product" class="secondary"/>
                                        <?php endforeach; ?>
														</a>
														<?php if ($products['is_featured'] == 1): ?>
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
															<a href="#"><?php echo $brand_array[$products['brand_id']]; ?></a>
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
														<h2><a href="/product/<?php echo $products['slug']; ?>"><?php echo $products['title']; ?></a></h2>
														<div class="price">
															<ul>
																<li class="new-price">Rs: <?php echo number_format($products['price']) ?></li>
															</ul>
														</div>
													</div>
												</div>
												<!-- product-wrapper-end -->
											</div>
											<?php endforeach ?>
											
										</div>
									</div>
								</div>
								<!-- tab-area-end -->
								<!-- pagination-area-start -->
								<div class="pagination-area">
									<div class="pagination-number">
										<ul>
											<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
										</ul>
									</div>
									<div class="product-count">
										<p>Showing 1 - 12 of 13 items</p>
									</div>
								</div>
								<!-- pagination-area-end -->
							</div>
							<!-- shop-right-area-end -->
						</div>
						<!-- sidebar start -->
							<?php $this->load->view('partials/sidebar'); ?>
						<!-- sidebar end -->
					</div>	
				</div>
			</div>
			<!-- shop-main-area-end -->

<?php $this->load->view('partials/footer'); ?>
