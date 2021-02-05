<?php
include("include/header.php");
?>

<?php

if($request->getHas("id"))
	$id = $request->get('id');
else
	$id = 1;

$product = $pr->
selectIdd($id, "products.name AS productName, cats.name AS catName, `desc`, price, img");
?>



	<!-- Single Product -->

	<div class="single_product">

		<div class="container">

			<?php if(!empty($product)): ?>
			<div class="row">

				<!-- Images -->
				<!-- <div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="images/single_4.jpg"><img src="< URL; ?>assets/images/single_4.jpg" alt=""></li>
						<li data-image="images/single_2.jpg"><img src="< URL; ?>assets/images/single_2.jpg" alt=""></li>
						<li data-image="images/single_3.jpg"><img src="< URL; ?>assets/images/single_3.jpg" alt=""></li>
					</ul>
				</div> -->

				<!-- Selected Image -->
				<div class="col-lg-6 order-lg-2 order-1">
					<div class="image_selected"><img src="<?= URL; ?>uploads/<?= $product['img'];?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-6 order-3">
					<div class="product_description">
						<div class="product_category"><?= $product['catName'];?></div>
						<div class="product_name"><?= $product['productName'];?></div>
						<div class="product_text"><p><?= $product['desc'];?></p></div>
						<div class="order_info d-flex flex-row">
							<form action="<?= URL;?>handel/add-cart.php" method="POST">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" name="qty" pattern="[1-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

                                    <div class="product_price">$<?= $product['price'];?></div>

								</div>

								<input type="hidden" name="name" value="<?= $product['productName'];?>">
								<input type="hidden" name="id" value="<?= $id;?>">
								<input type="hidden" name="img" value="<?= $product['img'];?>">
								<input type="hidden" name="price" value="<?= $product['price'];?>">
								<div class="button_container">
									<button type="submit" name='submit' class="button cart_button">
										<?php 
										if(isset($_SESSION['cart']) &&  $cart->has($id)){
											
												echo "Change Quantity";
										}
										else 
											echo "Add to Cart";
										?>
										
									</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>

			</div>
			<?php else:?><h2 class="text-center">Product Not Found</h2>
			<?php endif?>

		</div>

	</div>

	<?php
include("include/footer.php");
?>