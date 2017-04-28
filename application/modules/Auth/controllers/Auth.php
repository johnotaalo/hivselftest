<?php

class Auth extends MY_Controller{
	function __construct(){
		parent::__construct();
	}

	function signin(){
		$this->load->view('Auth/login_v');
	}

	function authenticate(){
		$response = [];
		$status = 200;
		$message = "";
		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['user_email'	=>	$username])->row();
			if ($user) {
				if (password_verify($password, $user->user_password)) {
					$this->session->set_userdata([
						'user_id'	=>	$user->uuid,
						'logged_in'	=>	true
					]);

					$message = "Successfully logged in";
				}else{
					$status = 404;
					$message = "The username or password you entered was wrong. Please try again";
				}
			}else{
				$status = 404;
				$message = "The username or password you entered was wrong. Please try again";
			}
		}else{
			$status = 400;
			$message = "Could not get user input. Please contact administrator";
		}

		if($this->input->is_ajax_request()){
			$this->output->set_status_header($status);
			$response['message'] = $message;
			return $this->output->set_content_type('application/json')->set_output(json_encode($response));
		}else{
			if ($status != 200) {
				$this->session->set_flashdata('error', $message);
				redirect('User/sigin');
			}else{
				redirect('Dashboard', 'refresh');
			}
		}
		return;
	}

	function checkLogin(){
		if (!$this->session->userdata('logged_in')) {
			$this->session->sess_destroy();
			redirect('Auth/signIn', 'refresh');
		}
		return true;
	}


	function signout(){
		$this->session->sess_destroy();
		redirect('Auth/signIn');
	}

	function a3bbef49f67b0f5a650629069b31b1b69(){
		$username = "marekawilly@gmail.com";
		$password = "Willy0714135480";

		$hash = password_hash($password, PASSWORD_BCRYPT);

		$insert_data = [
			'user_firstname'	=>	'Willy',
			'user_lastname'		=>	'Mareka',
			'user_email'		=>	$username,
			'user_password'		=>	$hash
		];

		$this->db->insert('user', $insert_data);

		echo "Success";
	}
}