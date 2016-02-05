<?php

class GetMovieModel extends CI_Model{

	public function getData($movieid){
	  
	  $query = $this->db->get('movies');
	  return $query->result();
	}
}
?>