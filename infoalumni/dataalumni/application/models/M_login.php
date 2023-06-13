<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function ceknum($username,$password)
	{
		$this->db->where('email', $username);
		$this->db->where('password', $password);
		return $this->db->query('SELECT * from user u, profil p where u.id_user=p.id_profil');
	}

	function last_login($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
		//redirect('Admin/dashboard');
	}

	function cek_login($table,$where){     
        return $this->db->get_where($table,$where);
    }  

}
 ?>