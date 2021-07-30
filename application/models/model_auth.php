<?php 

class Model_auth extends CI_Model
{
	public function cek_login()
	{
		$username	= set_value('username');
		$password	= set_value('password');

		$result		= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tb_admin');

		if($result->num_rows() > 0)
		{
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function cek_login1()
	{
		$username	= set_value('username');
		$pass		= set_value('password');

		$password	= $pass;

		$result		= $this->db->where('username', $username)
							   ->where('password', $password)
							   ->limit(1)
							   ->get('tb_konsumen');

		if($result->num_rows() > 0)
		{
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function cek_email()
	{
		$email	= set_value('email');
		$result		= $this->db->where('email', $email)
			->limit(1)
			->get('tb_konsumen');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return null;
		}
	}

	public function reset_password($data, $id_konsumen)
	{
		$this->db->where('id_konsumen', $id_konsumen)
			->update('tb_konsumen', $data);
	}
}