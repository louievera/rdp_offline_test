<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/myStyle.css">

	<script src="<?=base_url()?>assets/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>
</head>
<div class="container">
	<div id="banner">
		<h1>
			<?php
			$page=$this->uri->segment(2);

				switch($page)
				{
					case "viewCart":
						echo "Shopping Cart";
						break;

					case "receipt":
						echo "Receipt";
						break;

					default:
						echo "Shopping List";
						break;
				}
			?>	
		</h1>	 
	</div>
	<div class="pull-right">
	
	<?php
	if($page == "viewCart" || $page == "receipt")
	{
		echo "<a href='".base_url()."'>Back to Product list</a>";
	}
	else
		echo "<a href='".base_url()."index.php/shopping/viewCart' id='viewCart'>View shopping cart</a>";
	?>
		
	</div>
	
</div>
