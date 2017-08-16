<div class="container">
<?php if(!empty($_SESSION['product']))
{ 
	$total=array();
	foreach($_SESSION['product'] as $product) 
	{ 
	 
	?>			
		<div class="row">
			<div class="row-center">
				<div class="col-xs-4">		
					<img class="img-product" src="<?=base_url().$product['img']; ?>">
				</div>				
				<div class="col-xs-4 col-center">
					<div>				
						<b><?= $product['name']; ?></b>
						<br>
						<?=' $ '.$product['price']." X ".$product['quantity']; ?>

					</div>
				</div>
				<div class="col-xs-4">
					<b>$ <?=$product['total_price']; ?></b>
					<a href="<?=base_url().'index.php/shopping/removeItem/'.$product['id']?>">
						<button class="close">
							<span arial-hidden="true">&times;</span>
						</button>
					</a>
				</div>
			</div>
		</div>
		<?php $total[] = $product['total_price']; ?>
<?php }
$_SESSION['total_amount'] = array_sum($total);
?>
		<div class="row">
			<div class="row-center">
				<div class="col-xs-4 col-xs-offset-8">
					Total: <b>$ 
					<?php 

						echo $totalAmnt = $_SESSION['total_amount'];
					?>						
					</b>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="row-center">
				<div class="col-xs-6 col-xs-offset-7">
					<!--button class="btn btn-primary">Pay</button-->
					
					<form action="<?=base_url()?>index.php/shopping/checkout" method="POST">
						<script
							src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							data-key="pk_test_1oRt16W0p8Ft425Zg700lvzc"
							data-amount="<?= $totalAmnt*100 ?>"
							data-name="Stripe payment page"
							data-description="Widget"
							data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
							data-locale="auto"
							>
						</script>
						</form>
					
				</div>
			</div>
		</div>
	<?php } 
	else
	{
		echo "<h1>Your shopping cart is empty";
	}
	?>
</div>