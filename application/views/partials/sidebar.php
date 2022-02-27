<div class="col-xl-3 col-lg-3 col-md-12 col-12">
	<!-- shop-left-area-start -->
	<div class="shop-left-area">
		<!-- single-shop-start -->
		<div class="single-shop mb-40">
			<div class="Categories-title">
				<h3>Categories</h3>
			</div>
			<div class="Categories-list">
				<ul>
					<?php foreach ($show_all_categories as $category): ?>
					<li><a href="/category/<?php echo $category['slug']; ?>"><?php echo $category['title']; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
		<!-- single-shop-end -->
		<!-- single-shop-start -->
		<div class="single-shop mb-40">
			<div class="Categories-title">
				<h3>Price Filter</h3>
			</div>
			<div id="slider-range"></div>
			<input type="text" name="text" id="amount" />
		</div>
		<!-- single-shop-end -->
		<!-- single-shop-start -->
		<div class="single-shop mb-40">
			<div class="Categories-title">
				<h3>Brand</h3>
			</div>
			<div class="Categories-list">
				<ul>
					<?php foreach ($show_all_brands as $brands): ?>
					<li><a href="/brand/<?php echo $brands['slug']; ?>"><?php echo $brands['title']; ?></a></li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
		<!-- single-shop-end -->
		<!-- single-shop-start -->
		<!-- <div class="single-shop mb-40">
			<div class="Categories-title">
				<h3>Size</h3>
			</div>
			<div class="Categories-list">
				<ul>
					<li><a href="#">L (14)</a></li>
					<li><a href="#">M (11)</a></li>
					<li><a href="#">S (12)</a></li>
					<li><a href="#">XL (14)</a></li>
					<li><a href="#">XS (12)</a></li>
					<li><a href="#">XXL (13)</a></li>
				</ul>
			</div>
		</div> -->
		<!-- single-shop-end -->
		<!-- single-shop-start -->
		<!-- <div class="single-shop mb-40">
			<div class="Categories-title">
				<h3>Color</h3>
			</div>
			<div class="Categories-list">
				<ul>
					<li><a href="#">Black (12)</a></li>
					<li><a href="#">Blue (10)</a></li>
					<li><a href="#">Green (14)</a></li>
					<li><a href="#">Grey (14)</a></li>
					<li><a href="#">Red (12)</a></li>
					<li><a href="#">White (13)</a></li>
				</ul>
			</div>
		</div> -->
		<!-- single-shop-end -->
	</div>
	<!-- shop-left-area-end -->
</div>