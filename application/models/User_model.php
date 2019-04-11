<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function read(){

		$query = $this->db->get('tbl_user');
		// $query = $this->db->query("select * from `tbl_user`");
		return $query->result_array();
	}

	public function readWithId($id)
	{
		$this->db->where('user_id',$id);
		$query = $this->db->get('tbl_user')->row_array();
		return $query;
	}

	public function insert($data)
	{
       	$result = $this->db->insert('tbl_user',$data);
       	if($result)
       	{
	      	return "Data is inserted successfully";
      	}
      	else
      	{
      		return "Error has occurred";
      	}
   	}

   	public function getLogin($user, $password)
   	{
   		$this->db->where('user_name', $user);
   		$query = $this->db->get('tbl_user');

   		$user = $query->row();

   		if (!empty($user)) {
            if (password_verify($password, $user->user_password) === true) {
                return $user;
            } else {
                return false;
            }
        }
        return false;
   	}	

   	public function update($id,$data)
   	{
   		$this->user_name    = $data['name']; // please read the below note
      	$this->user_password  = $data['pass'];
      	$this->user_type = $data['type'];

      	$result = $this->db->update('tbl_user',$this,array('user_id' => $id));

      	if($result)

      	{
	      	return "Data is updated successfully";
      	}
      	else
      	{
      		return "Error has occurred";
      	}
  	}
  	
  	public function delete($id)
  	{

  		$result = $this->db->query("delete from `tbl_user` where user_id = $id");

  		if($result)
  		{
  			return "Data is deleted successfully";
  		}
  		else
  		{
  			return "Error has occurred";
  		}
  	}
}
