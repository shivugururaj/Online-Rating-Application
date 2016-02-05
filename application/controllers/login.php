<?php

class Login extends CI_Controller{
	
	function index()
	{
		//$data['main_content'] ='login_form';
		$data['main_content'] ='index1.html';
		
		$this->load->view('includes/template',$data);
	}
	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }
	
	
	function validate_credentials()
	{
	 $this->load->model('membership_model');	
	 $query= $this->membership_model->validate();
	 if($query) //if validated
	 {
		 $data=array(
		 'username' => $this->input-> post('username'),
		 'is_logged_in' => true
		 );
	 
	 //sessions
	 $this->session->set_userdata($data);
	 redirect('site/members_area'); //site controller, membersarea method 
	  
	 }
	 else	
	 {
		 $this->index();
		 echo 'incorrect';
		 
	 }
	}
	 
	function execute_search()
    {
		 // Retrieve the posted search term.
        $search_term = $this->input->post('movie_name');
		$select_option = $_POST['formCat'];
		$this->load->model('membership_model');
				$data['results'] =	$this->membership_model->get_results($search_term,$select_option);

        // Pass the results to the view.
        $this->load->view('searchResult',$data);
		
		
    }
	
	
	
	function signup(){
		$data['main_content'] ='signup_form';
		$this->load->view('includes/template',$data);
		
	}
	
	function search(){
		$data['main_content'] ='searchitem';
		$this->load->view('includes/template',$data);
		
	}
	
	
	function create_member(){
	//i have set $config['global_xss_filtering'] = TRUE; in config.php to filter other get/post method calls
	
	$this->load->library('form_validation');
	//field name , error message, validation rules
	
	$this->form_validation->set_rules('first_name','First Name','trim|required');
	$this->form_validation->set_rules('last_name','Last Name','trim|required');
	$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email');
	
	$this->form_validation->set_rules('username','Username','trim|required');
	$this->form_validation->set_rules('password','Password','trim|required');
	$this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]');
	
	
	if($this->form_validation->run()==FALSE){
		echo 'Validation unsuccessful';
		$this->signup();
	}
	
	else
	{
		$this->load->model('membership_model');
		if($query = $this->membership_model->create_member())
		{
			$data['main_content']="signup_successful";
			$this->load->view('includes/template',$data);
			
		}
		else
		{
			$this->load->view('signup_form'); 
		}
	}
	
	}
	
		function add_movie(){
		
		$this->load->model('membership_model');
		if($query = $this->membership_model->add_movie())
		{
			$data['main_content']="movie_added";
			$this->load->view('includes/template',$data);
			
		}
		else
		{
			$this->load->view('addMovie'); 
		}
	
	
	}
	
	
	
	}