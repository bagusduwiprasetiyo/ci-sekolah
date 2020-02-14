<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['menu'] = $this->Menu_model->getAllMenu();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		}else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Added!</div>');
					redirect('menu');
		}

				
	}

	public function delete($id)
	{
		$this->Menu_model->deleteMenu($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Deleted!</div>');
					redirect('menu');
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */