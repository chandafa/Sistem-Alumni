<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		no_akses();
		levelAdmin();
	}

	function statistik()
	{
		
		$data = array(
			'content'=>'admin/statistik.php',
			'ang'=>$this->db->query("SELECT * from profil group by angkatan")->result()
			);

		$this->load->view('statistikdex', $data);
	}

	function informasi()
	{
		$data = array(
			'content'=> 'admin/identitas.php',
			'a'=>$this->db->get('identitas')->row_array()

			);

		$this->load->view('welcome_message', $data);
	}

	function dashboard()
	{
		$data = array(
			'content' => 'admin/dashboard.php',
			'angkatan' => $this->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and u.active='1'")->result()
			);

		$this->load->view('welcome_message', $data);
	}

	function update()
	{
		$data = array(
			'nama_web' => $this->input->post('nama_web')
			);
		$this->db->get('identitas');
		$this->db->where('id', 1);
		$this->db->update('identitas', $data);
		redirect('Admin/informasi');
	}

	function angkatan()
	{
		$data = array(
			'content'=>'admin/angkatanlist.php',
			'angkatan' => $this->db->query("SELECT * from profil group by angkatan")->result()
			);
		$this->load->view('welcome_message', $data);
	}

	function pekerjaan()
	{
		$data = array(
			'content'=>'admin/listpekerjaan.php',
			'pk'=> $this->db->query("SELECT * from pekerjaan")->result()
			);
		$this->load->view('welcome_message', $data);
	}

	function dataPekerjaan($id)
	{
		$data = array(
			'content'=>'admin/userpekerjaan.php',
			'pk'=>$this->db->query("SELECT * from pekerjaan where id_pk='$id'")->row_array(),
			'upk'=>$this->db->query("SELECT * from profil where pekerjaan='$id'")->result()
			);
		$this->load->view('welcome_message', $data);
	}
}
 ?>