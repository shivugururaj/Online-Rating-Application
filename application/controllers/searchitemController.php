<? php
class SearchitemController extends CI_Controller {

/* 	function index()
	{
		//$data['main_content'] ='login_form';
		$data['main_content'] ='.php';
		
		$this->load->view('includes/template',$data);
	}
 */
 
 function index()
	{
		//$data['main_content'] ='login_form';
		$data['main_content'] ='searchitem.php';
		
		$this->load->view('includes/template',$data);
	}
	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
	
 
 /* 
    `public function index()
    {
        $this->load->view('searchitem');
    }
  */
    public function execute_search()
    {
        // Retrieve the posted search term.
        $search_term = $this->input->post('search');

        // Use a model to retrieve the results.
        $data['results'] = $this->search_model->get_results($search_term);

        // Pass the results to the view.
        $this->load->view('searchResult',$data);
    }

}
?>