<?php
// session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() 
	{
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load Database
		$this->load->database();

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');
	}
	public function index()
	{
		$this->load->view('login_form');
	}

	public function user_login_process() 
	{

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) 
		{
			if(isset($this->session->userdata['logged_in'])){
			$this->load->view('welcome_message');
			}else{
			$this->load->view('login_form');
			}
		}else 
		{
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			if ($result == TRUE) 
			{

				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) 
				{
					$session_data = array(
					'username' => $result[0]->user_name,
					'email' => $result[0]->user_email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('welcome_message');
				}
			}else 
			{
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login_form', $data);
			}
		}
	}

	// Logout from admin page
	public function logout() 
	{

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		// return redirect('login_form',$data);
		$this->load->view('login_form',$data);
	}

}