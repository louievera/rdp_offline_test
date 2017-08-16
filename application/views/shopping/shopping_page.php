
<?php foreach($products as $product)
			{
		?>
	<div class="container">	
		<div class="row">
			<div class="row-center">
				<div class="col-xs-6">		
					<img class="img-product" src="<?=base_url().$product->image ?>">
				</div>
				<div class="col-xs-6 col-center">
					<div class="form-group">				
						<b><?php echo $product->product_name;
								echo ' $'.$product->price;
						?></b>
						<?= form_open("shopping/setCart/".$product->id); ?>
							<select class="form-control dropdown-double col-space" id="quantity"  name="quantity">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
							<input type="submit" class="btn btn-primary" value="Add to cart">
						</form>					
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>