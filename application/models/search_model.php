<? php
class Search_model extends CI_Model {

    public function get_results($search_term='default')
    {
        // Use the Active Record class for safer queries.
        $this->db->select('movie_name');
        $this->db->from('movies');
        //$this->db->like('movie_name',$search_term);
		$this->db->where('movie_name',$search_term);
        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
    }

}

?>