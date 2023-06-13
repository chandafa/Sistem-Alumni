<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Berita extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		levelAdmin();
	}

	function index()
	{
		$data = array(
			'content'=>'admin/berita.php',
			'berita'=>$this->db->get('berita')->result()
			);
		$this->load->view('beritadex', $data);
	}

	function post()
	{
		$data = array(
			'judul' =>$this->input->post('judul'),
			'slug'=>slug($this->input->post('judul')),
			'isi_berita'=>$this->input->post('isi_berita'),
			'tgl_berita'=> date('Y-m-d H:i:s')
			);

		$this->db->insert('berita', $data);
		redirect('Berita');
	}

	function delete($id)
	{
		$this->db->where('id_berita', $id);
		$this->db->delete('berita');
		redirect('Berita');
	}

	function updateBerita()
	{
		$id = $this->input->post('id_berita');
		$data = array(
			'judul' =>$this->input->post('judul'),
			'slug'=>slug($this->input->post('judul')),
			'isi_berita'=>$this->input->post('isi_berita'),
			'tgl_berita'=> date('Y-m-d H:i:s')
			);

		$this->db->where('id_berita', $id);
		$this->db->update('berita', $data);
		redirect('Berita');
	}
}
?>