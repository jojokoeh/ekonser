<?php
class Login extends CI_Controller {
	public $model = null;
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');		
		$this->load->model('user_model');
		$this->model = $this->user_model;
	}
	
	public function index(){	
		if($this->session->userdata('is_login')){
			redirect('home');
		}
		
		$flash_msg = $this->session->flashdata();
		
		$data = array();
		if(isset($flash_msg['pesan'])){
			$data = $flash_msg;
		}
		$this->load->view('login_view', array('data' => $data));
	}
	
	public function login_proses(){
		
		$txt_user = $this->input->post('txt_user');
		$txt_pswd = $this->input->post('txt_pswd');
		#echo $txt_user."=>".$txt_pswd; exit;
		
		$row = $this->model->cek_user($txt_user, $txt_pswd);
		
		if($row != false){ #user ada
			
			$dtUser = array('id_usr' => $row->id_usr,	
							'nama_usr' => $row->nama_usr,
							'username' => $row->username,
							'wkt_update_usr' => $row->wkt_update_usr,
							'is_login' => true
							);
			$this->session->set_userdata($dtUser);
			redirect('home');				
		}else{
			$flash_msg = array('status' => 'danger', 'pesan' => 'Username atau Password salah!');
			$this->session->set_flashdata($flash_msg);
			redirect('login');
		}
		
	}
	
	public function logout(){
		#$this->session->unset_userdata();
		$array_items = array('id_usr', 'nama_usr', 'username', 'wkt_update_usr', 'is_login');
		$this->session->unset_userdata($array_items);
		redirect('login');
	}
	
	
	
}
?>