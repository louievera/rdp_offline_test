<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unittesting extends CI_Controller
{
	public function index()
	{
		$sess = $_SESSION['product'];
		echo $this->unit->run($sess,'is_array','session');

	}
}
?>