<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	public function getAllMenu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function deleteMenu($id){
		return $this->db->delete('user_menu', ['id' => $id]);
	}

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */