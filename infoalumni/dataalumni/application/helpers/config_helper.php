<?php
function web_info($id)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * FROM identitas")->row_array();

	return $q[$id];
}
function get_angkatan($id)
{
    $ci=& get_instance();
    $q=$ci->db->query("SELECT angkatan from profil p, user u where p.id_profil=u.id_user and u.email='$id'")->row_array();

    return $q['angkatan'];
}

function get_role_by_email($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * from user where email='$id'")->row_array();

    return $q['role'];
}
function getuserid($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * FROM user WHERE id_user='$id' ")->row_array();

    return $q['id_user'];
}
function getProfil($id)
{
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * from profil")->row_array();
    return $q[$id];
}
function getId($tabel,$id)
{
	$ci=& get_instance();
    $q = $ci->db->query("select MAX(".$id.") as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf($tmp);
        }
    }
    else
    {
        $kd = "000000001";
    }
    return $kd;
}

function jml_ang($id)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and p.angkatan='$id' and active='1'")->num_rows();

	return $q;
}

function jml_jk($id, $j)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and p.angkatan='$id' and active='1' and p.jk='$j'")->num_rows();

	return $q;
}
	function levelAdmin(){
	$ci=& get_instance();
	if ($ci->session->userdata('role')!='Admin'){
		redirect('User/dashboard');
	}

	}
	function no_akses(){
		$ci=& get_instance();
		if(!$ci->session->userdata('email')){
			redirect('Welcome');
		}
	}

function jml_kerja($id)
{
	$ci=& get_instance();
	$q = $ci->db->query("SELECT * from profil p, pekerjaan k where p.pekerjaan=k.id_pk and p.pekerjaan='$id'")->num_rows();
	return $q;
}

function pekerjaan()
{
    $ci=& get_instance();
    $q = $ci->db->get('pekerjaan')->result();
    return $q;
}

function slug($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
 
    // trim
    $text = trim($text, '-');
 
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
 
    // lowercase
    $text = strtolower($text);
 
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
 
    if (empty($text))
    {
        return 'n-a';
    }
 
    return $text;
}

function warna()
{
    $kar = 'abcdef0123456789';
    $karlength = strlen($kar);
    $random = '';
    for($i= 0; $i<6; $i++)
    {
        $random .=$kar[rand(0,$karlength - 1)];
    }
    return $random;

}

function berita()
{
    $ci=& get_instance();
    $q = $ci->db->get('berita')->result();
    return $q;
}

function user_test()
{
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * from profil p, user u where p.id_profil=u.id_user and u.active='1' group by p.angkatan")->result();
    return $q;
}
function limit_kata($kata)
{
    $words = explode(" ", $kata);
    return implode(" ", array_splice($words,0, 20));

}
function get_id_by_email($id)
{
    $ci=& get_instance();
    $q= $ci->db->query("SELECT * from user where email='$id'")->row_array();

    return $q['id_user'];
}
?>