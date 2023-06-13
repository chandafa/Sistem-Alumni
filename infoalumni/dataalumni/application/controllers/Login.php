<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	function index(){
		$data = array(
			'content'=> 'user/login.php'
			);
		$this->load->view('welcome_message', $data);
		//$error ="";
	}

	function doLogin(){
		if(isset($_POST['submit'])){
		$username = $this->security->sanitize_filename($this->input->post('email'));
		$password = $this->security->sanitize_filename($this->input->post('password'));
		$where = array(
			'email' => $username,
			'password'=> md5($password)
			);

		$cek = $this->M_login->cek_login('user', $where)->num_rows();
		if($cek>0){
			$this->session->set_userdata('email',$username);
			$this->session->set_userdata('role',get_role_by_email($this->session->userdata('email')));
			$this->session->set_userdata('id_user',$rows['id_user']);

			$data = array(
				'last_login' => date('Y-m-d H:i:s')
				);
			$this->M_login->last_login(get_id_by_email($this->session->userdata('email')), $data);
			redirect('Admin/dashboard');
		}
		else{
			$this->session->set_flashdata('error','Gagal Login');
			redirect('Login');
		}
	}
	
	}

	function logOut(){
		$this->session->unset_userdata('email');
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('role');


		redirect('Login');
	}
}
?>