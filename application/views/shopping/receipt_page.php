<div class="container">	
	<div class="row">
		<div class="row-center text-center">
			<h3>Here is your receipt!</h3>
		</div>
	<table class="table">
		<th>Product Name</th>
		<th>Quantity</th>
		<th>Total</th>
	<?php
		foreach($_SESSION['product'] as $product)
		{
		?>
			<tr>
				<td>
					<?= $product['name'] ?>
				</td>
				<td>
					<?= $product['quantity'] ?>
				</td>
				<td>
					<?= "$ ".$product['total_price'] ?>
				</td>
			</tr>
			
		<?php
		}
	?>
	<tr>
		<td colspan="2">
		<b>Absolute Total:</b>			
		</td>
		<td>
			<b><?="$ ".$_SESSION['total_amount']; ?></b>
		</td>
	</tr>
	</div>
</div>