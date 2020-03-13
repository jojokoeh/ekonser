<?php
class Home extends CI_Controller {
	public $model = null;
	#private $dtUser;
	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('is_login')){
			redirect('login');
		}
		
		$this->nama_usr = $this->session->userdata('nama_usr');
	}
	
	public function index(){		
		
		#echo '<a href="'.site_url('login/logout').'">Logout</a> ['.$this->nama_usr.']<br/>';
		#echo "<h1>Home</h1>";
		$this->load->view('Template');
	}

	
}
?>