<?php $this->load->view('partials/header'); ?>

<div style="margin: 0 auto;height:auto;background: lightgrey;overflow: hidden;padding: 0;margin: 0;padding:40px;">
	<div class="row">
		<?php foreach ($show_all_brands as $brands): ?>
			<div class="col-md-4">
				<div style="background: white;height: auto;width: auto;color: #fff;
background-color: #696969;
text-shadow: #ccc 0 1px 0, #c9c9c9 0 2px 0, #bbb 0 3px 0, #b9b9b9 0 4px 0, #aaa 0 5px 0,rgba(0,0,0,.1) 0 6px 1px, rgba(0,0,0,.1) 0 0 5px, rgba(0,0,0,.3) 0 1px 3px, rgba(0,0,0,.15) 0 3px 5px, rgba(0,0,0,.2) 0 5px 10px, rgba(0,0,0,.2) 0 10px 10px, rgba(0,0,0,.1) 0 20px 20px;">
					<a href="/brand/<?php echo $brands['slug']; ?>"><h1 style="padding: 10px;"><?php echo $brands['title']; ?></h1></a>
				</div>
			</div>
		<?php endforeach ?>
		<!-- <div class="col-md-4">
			<div style="background: white;height: auto;width: auto;">
				<h1>raza</h1>
			</div>
		</div>
		<div class="col-md-4">
			<div style="background: white;height: auto;width: auto;">
				<h1>raza</h1>
			</div>
		</div> -->
	</div>
</div>


<?php $this->load->view('partials/footer'); ?>