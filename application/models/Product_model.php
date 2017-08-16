<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
	public function getProducts()
	{
		$query = "SELECT * FROM products";

		$sql = $this->db->query($query);
		return $sql->result();
	}

	public function getSpecificProd($id)
	{
		$query = "SELECT * FROM products WHERE id = '".$id."'";
		$sql = $this->db->query($query);

		return $sql->row();
	}
}
?>