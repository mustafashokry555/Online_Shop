<?php
include("include/header.php");
?>


<?php

$products = $pr->selectAll('id, name, price, img');



?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= URL; ?>assets/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">All Products</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<?php foreach($cats as $cat) : ?>
									<li><a href="category.php?id=<?= $cat['id'];?>"> <?= $cat['name'];?> </a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">

						<div class="product_grid">
							<div class="product_grid_border"></div>

							

							<?php foreach($products as $product):?>
							<!-- Product Item -->
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img height="115px" src="<?= URL; ?>uploads/<?= $product['img']?>" alt=""></div>
								<div class="product_content">
									<div class="product_price">$<?= $product['price']?></div>
									<div class="product_name"><div><a href="<?=URL;?>product.php?id=<?=$product['id'];?>" tabindex="0"><?= $product['name']?></a></div></div>
								</div>
								<a href="<?=URL;?>product.php?id=<?=$product['id'];?>">
									<div class="product_fav"><i class="fas fa-cart-plus"></i></div>
								</a>
								</div>

							<?php endforeach; ?>



						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>	

	<?php
include("include/footer.php");
?>