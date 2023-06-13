<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function daftar()
	{
		$email = $this->input->post('email');
		if ($this->db->query("SELECT * from user where email='$email'")->num_rows()===0)
		{
			$this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('re-password', 're-password', 'trim|required|matches[password]');
			if($this->form_validation->run()===FALSE)
			{
				$this->session->set_flashdata('error','Gagal Daftar, cek kembali isian anda !');
				redirect('Welcome');
			}
			else 
			{
				$u = getId('user','id_user');
				$user = array(
					'id_user'=>$u,
					'email' =>$this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'role' => 'Member',
					'active'=>'0'

					);
				$profil = array(
					'id_profil'=>$u,
					'fullname' => $this->input->post('fullname'),
					'angkatan' => $this->input->post('angkatan'),
					'kontak' =>$this->input->post('kontak'),
					'jk'=>$this->input->post('jk'),
					'pekerjaan'=>$this->input->post('pekerjaan'),
					'instansi'=>$this->input->post('instansi'),
					'posisi'=>$this->input->post('posisi'),
					'alamat'=>$this->input->post('alamat'),
					'twitter'=>$this->input->post('twitter'),
					'instagram'=>$this->input->post('instagram'),
					'facebook'=>$this->input->post('facebook')
					);
				$this->db->insert('user', $user);
				$this->db->insert('profil', $profil);
				$this->session->set_flashdata('sukses', 'Anda Berhasil Terdaftar, Silahkan Login dengan email dan password yang telah dibuat!');
				redirect('Welcome');
				
			}
		}

		else 
		{
			$this->session->set_flashdata('error','Email Sudah Terdaftar !');
				redirect('Welcome');
		}
	}

	function uploadFoto()
	{
		$id = get_id_by_email($this->session->userdata('email'));
		$data = array(
			'content'=> 'user/foto.php',
			'profil'=>$this->db->query("SELECT * from profil where id_profil='$id'")->row_array()
			);
		$this->load->view('welcome_message', $data);
	}

	function upload()
	{
		if(!isset($_FILES['gambar']) || $_FILES['gambar']['error'] == UPLOAD_ERR_NO_FILE){
			$this->session->set_flashdata('error', 'Pilih File foto!');
			redirect('User/uploadFoto');
		} else {
		$userid = get_id_by_email($this->session->userdata('email'));
		$foto=$_FILES['gambar']['name'];
			$dir		= "upload/";
			$dir1		= "uploads/";
			if($_FILES['gambar']['name']!=""){
				$file='gambar'; //name pada input type file
				$filename 	= $_FILES['gambar']['name'];
				$dir		= "upload/";
				$dir1		= "uploads/";
				$file		= 'gambar';
				$new_name='uploadfoto'.date('YmdHis'); //name pada input type file
				$tipe 		= $_FILES['gambar']['type'];
				$ukuran 	= $_FILES['gambar']['size'];
				$vdir_upload	= $dir;
				$file_name		= $_FILES[''.$file.'']["name"];
				$vfile_upload	= $vdir_upload.$file;
				$tmp_file		= $_FILES[''.$file.'']["tmp_name"];
				move_uploaded_file ($tmp_file, $dir.$file_name);
				date_default_timezone_get('Asia/Jakarta');
				$source_url=$dir.$file_name;
				$info=getimagesize($source_url);
				if ($ukuran < 300000 and $ukuran > 10000) {	
					$quality=100;
				}
				elseif ($ukuran < 1000000 and $ukuran > 300000) {	
					$quality=70;
				}
				elseif ($ukuran < 1500000 and $ukuran > 1000000) {	
					$quality=50;
				}
				elseif ($ukuran < 2000000 and $ukuran > 1000000) {	
					$quality=40;
				}
				elseif ($ukuran < 2500000 and $ukuran > 2000000) {	
					$quality=30;
				}
				elseif ($ukuran < 3000000 and $ukuran > 2500000) {	
					$quality=20;
				}
				elseif ($ukuran > 3000000) {	
					$quality=10;
				}else{
					$quality=10;
				}
				$gambar = imagecreatefromjpeg($source_url);
				$ext='.jpeg';
				if (imagejpeg($gambar, $dir1.$new_name.$ext, $quality)){
					unlink($source_url);
				}else{
					unlink($source_url);
				}
			}
		
		
		
			//$this->upload->data();
			//$image_data = $this->upload->data();
			$data = array(
			//'id_profil' =>$userid,
			//'nama_profil' =>$this->input->post('nama_profil'),
				'foto' => $new_name.$ext
			);

			$this->db->where('id_profil',$userid);
			$this->db->update('profil', $data);
			$this->session->set_flashdata('sukses', 'Upload Foto Berhasil');
			redirect('User/uploadFoto');
		
		}
	}

	function angkatan($id)
	{
		no_akses();
		levelAdmin();
		$idnya = $id;
		$data = array(
			'content' => 'admin/angkatan.php',
			'ang' => $this->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and  p.angkatan='$id' and u.active='1'")->row_array(),
			'a' => $idnya,
			'k' =>$this->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and  p.angkatan='$id' and u.active='1'")->result()
			);
		$this->load->view('welcome_message', $data);
	}

	function profile($id)
	{
		$idnya = $id;
		no_akses();
		$data = array(
			'content'=> 'user/profile.php',
			'user'=>  $this->db->query("SELECT * from profil p, user u, pekerjaan pk where p.id_profil=u.id_user and p.pekerjaan=pk.id_pk and p.id_profil='$idnya'")->row_array()
			);
		$this->load->view('welcome_message', $data);
	}

	function editProfil()
	{
		$id = get_id_by_email($this->session->userdata('email'));
		$data = array(
			'content'=>'user/editprofil.php',
			'user'=>$this->db->query("SELECT * from user u, profil p, pekerjaan pk where u.id_user=p.id_profil and p.pekerjaan=pk.id_pk and p.id_profil='$id'")->row_array(),
			'pk'=>$this->db->get('pekerjaan')->result()
			);

		$this->load->view('welcome_message', $data);
	}

	function updateProfil()
	{
		$id = get_id_by_email($this->session->userdata('email'));
		$data = array(
			'fullname'=>$this->input->post('fullname'),
			
			'kontak'=>$this->input->post('kontak'),
			'angkatan'=>$this->input->post('angkatan'),
			'alamat'=>$this->input->post('alamat'),
			'pekerjaan'=>$this->input->post('pekerjaan'),
			'instansi'=>$this->input->post('instansi'),
			'posisi'=>$this->input->post('posisi'),
			'twitter'=>$this->input->post('twitter'),
			'instagram'=>$this->input->post('instagram'),
			'facebook'=>$this->input->post('facebook')
			);
		$user = array(
			'email'=>$this->input->post('email')
			);
		$this->db->where('id_profil', $id);
		$this->db->update('profil', $data);

		$this->db->where('id_user', $id);
		$this->db->update('user', $user);

		$this->session->set_flashdata('sukses', 'Update Data Berhasil');
		redirect('User/editProfil');
	}

	function editPassword()
	{
		
		$data = array(
			'content'=>'user/editpassword.php'
			);
		$this->load->view('welcome_message', $data);
	}

	function changePass()
	{
		get_id_by_email($this->session->userdata('email'));
		$data = array(
			'password'=>md5($this->input->post('password'))
			);

		if ($this->input->post('password')===''){
			$this->session->set_flashdata('error', 'Password Tidak Boleh Kosong');
			redirect('User/editPassword');
		} else {
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		$this->session->set_flashdata('sukses','Ganti Password Berhasil');
		redirect('User/editPassword');
	}

	}

	function pekerjaan()
	{
		levelAdmin();
		$data = array(
			'content'=>'user/pekerjaan.php',
			'pk'=>$this->db->get('pekerjaan')->result()
			);

		$this->load->view('welcome_message', $data);
	}

	function addPekerjaan()
	{
		levelAdmin();
		$data=array(
			'jenis_pk' => $this->input->post('jenis_pekerjaan')
			);
		$this->db->insert('pekerjaan', $data);
		redirect('User/pekerjaan');
	}
	function hapusPk($id)
	{
		levelAdmin();
		$this->db->get('pekerjaan');
		$this->db->where('id_pk', $id);
		$this->db->delete('pekerjaan');
		redirect('User/pekerjaan');
	}

	function editPekerjaan()
	{
		levelAdmin();
		$id = $this->input->post('id');
		$data = array(
			'jenis_pk'=> $this->input->post('jenis_pekerjaan')
			);

		$this->db->where('id_pk', $id);
		$this->db->update('pekerjaan', $data);
		redirect('User/pekerjaan');
	}

	function manage()
	{
		levelAdmin();
		$data = array(
			'content'=> 'admin/usermanage.php',
			'ud'=>$this->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and u.active='0'")->result(),
			'ua'=>$this->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and u.active='1'")->result()
			);

		$this->load->view('welcome_message', $data);
	}

	function editPass()
	{
		levelAdmin();
		$idnya = $this->input->post('id');
		$data = array(
			'password'=>md5($this->input->post('password'))
			);

		$this->db->where('id_user', $idnya);
		$this->db->update('user', $data);
		redirect('User/manage');
	}

	function makeAdmin($id)
	{
		levelAdmin();
		$idnya = $id;
		$data = array(
			'role'=>'Admin'
			);
		$this->db->where('id_user', $idnya);
		$this->db->update('user', $data);
		redirect('User/manage');
	}
	function makeMember($id)
	{
		levelAdmin();
		$idnya = $id;
		$data = array(
			'role'=>'Member'
			);
		$this->db->where('id_user', $idnya);
		$this->db->update('user', $data);
		redirect('User/manage');
	}


	function activate($id)
	{
		levelAdmin();
		$data = array(
			'active'=>'1'
			);
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		redirect('User/manage');
	}

	function deactive($id)
	{
		levelAdmin();
		$data = array(
			'active'=>'0'
			);
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		redirect('User/manage');
	}

	function delete($id)
	{
		levelAdmin();
		$this->db->where('id_user', $id);
		$this->db->delete('user');

		$this->db->where('id_profil', $id);
		$this->db->delete('profil');

		redirect('User/manage');
	}

	function dashboard()
	{
		$data = array(
			'content'=> 'user/dashboard.php',
			'berita'=>$this->db->get('berita')->result()
			);
		$this->load->view('welcome_message', $data);
	}

	function iqra($id)
	{
		$data = array(
			'content'=>'user/bacaberita.php',
			'berita'=> $this->db->query("SELECT * from berita where slug='$id'")->row_array()
			);
		$this->load->view('welcome_message', $data);
	}

	function teman()
	{
		no_akses();
		$teman = get_angkatan($this->session->userdata('email'));
		$data = array(
			'content'=>'user/angkatan.php',
			'bff'=>$this->db->query("SELECT * from user u, profil p where u.id_user=p.id_profil and p.angkatan='$teman'")->result()
			);

		$this->load->view('welcome_message', $data);
	}

	function registrasi()
	{
		$data 	= array(
			'content'	=> 'user/registrasi.php',			
			'pk'=>$this->db->query("SELECT * from pekerjaan")->result(),
			'berita'=>$this->db->get('berita')->result()
			);

		$this->load->view('welcome_message', $data);
	}
}
?>