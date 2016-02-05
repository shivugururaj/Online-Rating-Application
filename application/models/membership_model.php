<?php 
class Membership_model extends CI_model
{
	
	function validate(){
		$this->db-> where('username',$this->input->post('username'));
		$this->db-> where('password',$this->input->post('password'));
		$query = $this->db->get('memberships');
		//$num_rows = $query->num_rows();
		
		if($query->num_rows()==1){	
			return true;			
			} 	
		}

		//search item
		
	function searchVal(){
		$this->db-> where('movie_name',$this->input->post('itemName'));
		
		return $query['records'] = $this->db->get('movies');
		//return $query->result();				
		
		//$num_rows = $query->num_rows();
		
		/* if($query->num_rows()==1){	
				//return true; */
				
			//} 	
		}
		
	
	function create_member(){
		$new_member_insert_data = array('fname' => $this->input->post('first_name'),
		'lname' => $this->input->post('last_name'),
		'email_address' => $this->input->post('email_address'),
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'));
		
		$insert= $this->db->insert('memberships',$new_member_insert_data);
		return $insert;
	}
	
	function add_movie(){
		$new_member_insert_data = array('movie_name' => $this->input->post('movie_name'),
		'director' => $this->input->post('director'),
		'music_director' => $this->input->post('music_director'),
		'description' => $this->input->post('description'),
		'ratings' => $this->input->post('ratings'),
		'lang_id' => $this->input->post('lang_id'));
		
		$insert= $this->db->insert('movies',$new_member_insert_data);
		return $insert;
	}
	
	
	 public function get_results($search_term='default', $select_option = 'default')
    {
        // Use the Active Record class for safer queries.
		
		if($select_option='apartments')
		{
        $this->db->select('aptname');
        $this->db->from($select_option);
        //$this->db->like('movie_name',$search_term);
		//$this->db->where('movies',$select_option);
		$this->db->where('aptname',$search_term);
		
        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
		}
		
		else if($select_option='movies')
		{
        $this->db->select('movie_name');
        $this->db->from($select_option);
        //$this->db->like('movie_name',$search_term);
		//$this->db->where('movies',$select_option);
		$this->db->where('movie_name',$search_term);
		
        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
		}
		
		
		

}

	
	

}
?>