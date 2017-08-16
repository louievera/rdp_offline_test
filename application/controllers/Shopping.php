<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->view('includes/header');
	}

	public function index()
	{
		if(isset($_SESSION['complete']))
		{
			session_destroy();
		}

		$data['products'] = $this->Product_model->getProducts();
		$this->load->view('shopping/shopping_page', $data);
	}

	public function setCart()
	{
		
		$id = $this->uri->segment(3);
		
		$sessionId = $_SESSION['product']["item".$id]["id"];
		$sessionQuantity = $_SESSION['product']["item".$id]["quantity"];
		
		$quantity = isset($sessionId) ? $this->input->post('quantity')+ $sessionQuantity : $this->input->post('quantity');
		
		$product = $this->Product_model->getSpecificProd($id);
		
		$data = array(
			"item".$product->id => array(
						"id" 			=> $product->id,
						"name" 			=> $product->product_name,
						"img" 			=> $product->image,
						"quantity" 		=> $quantity,
						"price" 		=> $product->price,
						"total_price" 	=>$product->price * $quantity
			)				
		);

		$_SESSION['product'] = empty($_SESSION['product']) ? $_SESSION['product'] = $data :	 $_SESSION['product'] = array_merge($_SESSION['product'], $data);

			/*$test = $_SESSION['product']['total_price'];
			$expect = $data['item'.$id]['total_price'] + $quantity;
	$msg = "test";

			$this->unit->run($test,$expecteds);*/
// die;
		echo "<script language='javascript'>alert('added to cart')</script>";
		
		redirect(base_url()."index.php/shopping/viewCart");
	}

	public function viewCart()
	{
		if(isset($_SESSION['complete']))
		{
			session_destroy();
		}

		$this->load->view("shopping/viewcart_page");
	}

	public function checkout()
	{
		require_once('vendor/autoload.php');

		$token=$_POST['stripeToken'];
		try{
			Stripe::setApiKey('sk_test_pZ6nECXPm6mAOzIOnCsSsLRw');

			$charge = Charge::create(array(
				"amount" => $_SESSION['total_amount']*100,
				"currency" => "usd",
				"source" => $token,
				"description" => "Sample charge"
			));
						
			redirect(base_url()."index.php/shopping/receipt");
			
		}
		catch (\Stripe\Error\Card $e)
		{
			$error=$e->getMessage;
			echo $error;
		}
	}

	public function receipt()
	{
		$_SESSION["complete"] = 1;

		$this->load->view("shopping/receipt_page");
	}

	public function removeItem()
	{
		$id = $this->uri->segment(3);
		unset($_SESSION["product"]["item".$id]);
		redirect(base_url()."index.php/shopping/viewCart");
	}

	public function destroy()
	{
		session_destroy();
		redirect('');
	}

}
