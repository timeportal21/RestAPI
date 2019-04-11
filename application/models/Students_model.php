<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_model extends CI_Model {

	public function getStudents()
	{
		$query = $this->db->get('students');
		return $query->result_array();

	}

}

/* End of file Students_model.php */
/* Location: ./application/models/Students_model.php */