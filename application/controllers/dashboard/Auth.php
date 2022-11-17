<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller {

    //============================ Main construct
    public function __construct() {
        parent::__construct();

        $this->load->model("dashboard/Common_model");
        $this->load->model("dashboard/User_model");
        $this->load->model("Shared_model");
    }


    //============================ Hash password
    private function hash_password($user_password){
        //return password_hash($password, PASSWORD_BCRYPT);
        $salt_password = "dF$.50^&D10?#^dA2z";
        return $hash_password = sha1(md5($user_password.$salt_password));
    }


    //============================ Verify hash password
    private function verify_hash_password($user_password, $existingHashFromDb){
        return password_verify($user_password, $existingHashFromDb);
    }


    //============================ Check user is login or not
    private function is_login() {
        //Don't show the auth if user is login
        if (isset($_SESSION['user_username']) && isset($_SESSION['user_type']))
        {
            redirect(base_url()."dashboard/Dashboard");

        }elseif (!isset($_SESSION['user_username']) && isset($_SESSION['user_type'])){
            redirect(base_url()."dashboard/Auth");
        }
    }


    //============================ Show login page
    public function index() {
        $this->is_login();
        $data['pageTitle'] = $this->lang->line("user_login");
        $data['showCaptcha'] = $this->Shared_model->generate_captcha();
        $this->load->view('dashboard/auth/login_view', $data);
    }




    //============================ Show register page
    public function register() {
        $this->is_login();
        $this->load->model("dashboard/Page_model");
        $this->load->model("dashboard/Settings_model");
        $data["pageContent"] = $this->Page_model->get_page_content('page_table', 1)->result()[0];
        $data["settingContent"] = $this->Settings_model->get_setting_content('setting_table', 1)->result()[0];
        $data['pageTitle'] = $this->lang->line("register_a_new_membership");
        $data['showCaptcha'] = $this->Shared_model->generate_captcha();
        $this->load->view('dashboard/auth/register_view', $data);
    }


    //============================ Validate and store registration data in database
    public function new_user_registration() {
        $this->form_validation->set_rules('user_username', $this->lang->line("Username"), 'trim|required|xss_clean|min_length[5]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters")));
        $this->form_validation->set_rules('user_email', $this->lang->line("Email"), 'trim|required|xss_clean|valid_email',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'valid_email'     => $this->lang->line("is_not_valid_an_email_address"),
            ));
        $this->form_validation->set_rules('user_password', $this->lang->line("Password"), 'trim|required|xss_clean|min_length[8]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters")
            ));
        $this->form_validation->set_rules('user_confirm_password', $this->lang->line("Confirm Password"), 'trim|required|xss_clean|matches[user_password]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'matches'     => $this->lang->line("the_password_confirmation_field_does_not_match_the_password_field")
            )
        );
        $this->form_validation->set_rules('user_referral', $this->lang->line("Referral ID"), 'trim|xss_clean');
        $this->form_validation->set_rules('terms', $this->lang->line("TOS"), 'trim|required|xss_clean',
            array(
                'required'      => $this->lang->line("the_TOS_field_is_required")));
        $this->form_validation->set_rules('captcha', $this->lang->line("Security Captcha"), 'trim|required|xss_clean|min_length[5]|max_length[10]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters"),
                'max_length'      => $this->lang->line("must_be_maximum_characters")
            ));

        if ($this->form_validation->run() == FALSE) {
            $data['pageTitle'] = $this->lang->line("register_a_new_membership");
            $data['showCaptcha'] = $this->Shared_model->generate_captcha();
            $this->load->model("dashboard/Settings_model");
            $data["settingContent"] = $this->Settings_model->get_setting_content('setting_table', 1)->result()[0];
            $this->load->view('dashboard/auth/register_view', $data);

        } else {
            //First, delete old CAPTCHA:
            $expiration = time() - 900; // Two hour limit
            $this->db->query("DELETE FROM captcha_table WHERE captcha_time < $expiration");

            //Then see if a captcha exists:
            $sql = 'SELECT COUNT(*) AS count FROM captcha_table WHERE captcha_word = ? AND captcha_ip_address = ? AND captcha_time > ?';
            $clean_captcha = $this->Shared_model->number2english($_POST['captcha']);
            $binds = array($clean_captcha, $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();
            if ($row->count == 0) {
                $msg = $this->lang->line("Security CAPTCHA is incorrect.");
                $this->session->set_flashdata('msg', $msg);
                $this->session->set_flashdata('msgType', 'danger');
                redirect(base_url() . 'dashboard/Auth/register');
                $this->db->close();
                die();

            } else {
                $user_password = $this->input->post('user_password');
				//Generate user_email_verification_code
                $user_email_verification_code = rand(100000,999999);
                $dataArray = array(
                    "user_username" => $this->input->post('user_username'),
                    "user_email" => $this->input->post('user_email'),
                    "user_password" => $this->hash_password($user_password),
					//"user_email_verification_code" => $this->encrypt->encode($user_email_verification_code),
					"user_email_verification_code" => base64_encode(strrev(base64_encode($user_email_verification_code))),
                    "user_referral" => $this->input->post('user_referral'),
                    "user_device_type_id" => 1,
                    "user_reg_date" => now(),
                );

                //Check Username is exist or not
                $user_username = $dataArray['user_username'];
                $check_username = $this->User_model->check_username('user_table', $user_username);
                if ($check_username == FALSE) {
                    $msg = $user_username." ".$this->lang->line("is_exist_in_our_system");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','warning');
                    redirect(base_url().'dashboard/Auth/register');
                    $this->db->close();
                    die();
                }
                //Check Email is exist or not
                $user_email = $dataArray['user_email'];
                $check_email = $this->User_model->check_email('user_table', $user_email);
                if ($check_email == FALSE) {
                    $msg = $user_email." ".$this->lang->line("is_exist_in_our_system");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','warning');
                    redirect(base_url().'dashboard/Auth/register');
                    $this->db->close();
                    die();
                }
                //Check Referral ID is exist or not
                $user_referral = $dataArray['user_referral'];
                if (!empty($user_referral))
                {
                    $check_referral = $this->User_model->check_referral('user_table', $user_referral);
                    if ($check_referral == FALSE) {
                        $msg = $this->lang->line("This Referral ID is not exist in our system: ").$user_referral;
                        $this->session->set_flashdata('msg',$msg);
                        $this->session->set_flashdata('msgType','warning');
                        redirect(base_url().'dashboard/Auth/register');
                        $this->db->close();
                        die();
                    }
                }

                //Insert $dataArray to DB
                $result = $this->Common_model->data_insert("user_table",$dataArray);
                if ($result == TRUE) {
                    //Send welcome email to new user
                    /*$login_url = base_url()."dashboard/Auth";
                    $to = $user_email;
                    $cc = false; //To send a copy of email
                    $subject = $this->lang->line("New Account Information");
                    $message = $this->lang->line("email_new_account_information")
                        .$message = "- ".$this->lang->line("Login URL").": <a href='$login_url'>$login_url</a><br>- ".$this->lang->line("Username").": ".$user_username."<br>- ".$this->lang->line("Password").": ".$user_password."<br><br>";
                    $this->Shared_model->send_email($to, $cc, $subject, $message);*/
					
					//Send verification email to new user
					$user_username = $this->input->post('user_username');
					//$verification_url = base_url()."dashboard/Auth/email_verification/".$this->encrypt->encode($user_email)."/".$this->encrypt->encode($user_email_verification_code);
					$verification_url = base_url()."dashboard/Auth/email_verification/".base64_encode(strrev(base64_encode($user_email)))."/".base64_encode(strrev(base64_encode($user_email_verification_code)));
					$to = $user_email;
					$cc = false; //To send a copy of email
					$subject = $this->lang->line("Email Verification");
					$message = $this->lang->line("email_verification_description")
						.$message = "- ".$this->lang->line("Verification URL").": <a href='$verification_url'>$verification_url</a><br>- ".$this->lang->line("Username").": ".$user_username."<br>- ".$this->lang->line("Verification Code").": ".$user_email_verification_code."<br><br>";
					$this->Shared_model->send_email($to, $cc, $subject, $message);

                    //Insert data into activity_table
                    $this->db->select('user_id');
                    $q = $this->db->get_where('user_table', array('user_username'=> $user_username));
                    $last_id = $q->result()[0]->user_id;
                    $dataArray = array(
                        "activity_user_id" => $last_id,
                        "activity_time" => now(),
                        "activity_agent" => $_SERVER['HTTP_USER_AGENT'],
                        "activity_ip" => $this->input->ip_address(),
                        "activity_desc" => $this->lang->line("User joined from website."),
                    );
                    $this->Common_model->data_insert("activity_table",$dataArray);

                    $data['message_display'] = $this->lang->line("registration_successfully");
                    $data['pageTitle'] = $this->lang->line("user_login");
                    $data['showCaptcha'] = $this->Shared_model->generate_captcha();
                    $this->load->view('dashboard/auth/login_view', $data);

                } else {
                    $data['message_display'] = $this->lang->line("something_wrong");
                    $data['pageTitle'] = $this->lang->line("register_a_new_membership");
                    $data['showCaptcha'] = $this->Shared_model->generate_captcha();
                    $this->load->model("dashboard/Settings_model");
                    $data["settingContent"] = $this->Settings_model->get_setting_content('setting_table', 1)->result()[0];
                    $this->load->view('dashboard/auth/register_view', $data);
                }
            }
        }


    }


    //============================ User login process with Google reCAPTCHA
    public function user_login_process() {
        $this->form_validation->set_rules('user_username', $this->lang->line("Username"), 'trim|required|xss_clean|min_length[5]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters")));
        $this->form_validation->set_rules('user_password', $this->lang->line("Password"), 'trim|required|xss_clean|min_length[6]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters")
            ));
        $this->form_validation->set_rules('g-recaptcha-response', $this->lang->line("Security Captcha"), 'trim|required|xss_clean');
        $this->form_validation->set_rules('rememberme', $this->lang->line("Remember Me"), 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['user_username'])){
                redirect(base_url().'dashboard/Dashboard');
            }else{
                $data['showCaptcha'] = $this->Shared_model->generate_captcha();
                $this->load->view('dashboard/auth/login_view', $data);
            }

        } else {
            $google_recaptcha = $this->input->post('g-recaptcha-response');
			$google_recaptcha_secret_key = config_item('google_recaptcha_secret_key');
            $resp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$google_recaptcha_secret_key&response=$google_recaptcha&remoteip=".$_SERVER["REMOTE_ADDR"]);

			$success = "success";
            if($resp.$success) {
                //Google Recaptcha is OK
                $user_username = $this->input->post('user_username');
                $user_password = $this->input->post('user_password');
                $remember_me = $this->input->post('rememberme');
                if ($remember_me == "on")
                    $expired_time = (432000); // 5 Days
                else
                    $expired_time = 3600; // 1 hour

                if ($this->User_model->auth_user_information('user_table', $user_username, $this->hash_password($user_password)) == true)
                {
                    //Success Login
                    $result = $this->User_model->read_user_information('user_table', $user_username);
                    if ($result != false) {
						$this->check_the_time($user_username);
							
                        $querySettingVerification = $this->db->query("SELECT setting_email_verification, setting_mobile_verification, setting_document_verification
                                                                            FROM setting_table WHERE setting_id = 1");
                        if($querySettingVerification->row()->setting_email_verification == 1)
                        {
                            //Check email is verify or not
                            $queryEmailVerify = $this->db->query("SELECT user_email_verified FROM user_table WHERE user_username = '$user_username'");
                            if($queryEmailVerify->row()->user_email_verified != 1)
                            {
                                $msg = $this->lang->line("Your email has not been verified.");
                                $this->session->set_flashdata('msg',$msg);
                                $this->session->set_flashdata('msgType','warning');
                                redirect(base_url().'dashboard/Auth');
                                $this->db->close();
                                die();
                            }
                        }

                        //Check user_status is Active or Inactive
                        $checkUserStatus = $this->db->query("SELECT user_status FROM user_table WHERE user_username = '$user_username'");
                        if($checkUserStatus->row()->user_status != 1)
                        {
                            $msg = $this->lang->line("Your account has been blocked. Please contact administrator.");
                            $this->session->set_flashdata('msg',$msg);
                            $this->session->set_flashdata('msgType','warning');
                            redirect(base_url().'dashboard/Auth');
                            $this->db->close();
                            die();
                            die();
                        }

                        //Set user session
                        $session_data = array(
                            'user_id' => $result[0]->user_id,
                            'user_username' => $result[0]->user_username,
                            'user_email' => $result[0]->user_email,
                            'user_mobile' => $result[0]->user_mobile,
                            'user_role_id' => $result[0]->user_role_id,
                            'user_type' => $result[0]->user_type,
                            'expired_time' => $expired_time
                        );
                        $this->session->set_userdata($session_data);
                        $this->session->mark_as_temp(array('user_id'  => $expired_time, 'user_username' => $expired_time, 'user_email' => $expired_time, 'user_mobile' => $expired_time,
                            'user_role_id' => $expired_time, 'user_type' => $expired_time, 'expired_time' => $expired_time));

                        //Insert data into activity_table
                        $dataArray = array(
                            "activity_user_id" => $result[0]->user_id,
                            "activity_time" => now(),
                            "activity_agent" => $_SERVER['HTTP_USER_AGENT'],
                            "activity_ip" => $this->input->ip_address(),
                            "activity_login_status" => 1,
                            "activity_desc" => $this->lang->line("User login into the Dashboard."),
                        );
                        $this->Common_model->data_insert("activity_table",$dataArray);

                        redirect(base_url().'dashboard/Dashboard');

                    }

                } else {
                    $msg = $this->lang->line("Invalid Username or Password.");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','warning');
                    redirect(base_url().'dashboard/Auth');
                    $this->db->close();
                    die();
                }

            }

            else {
                //Google Recaptcha is Invalid
                $msg = $this->lang->line("Please select I'm not robot");
                $this->session->set_flashdata('msg',$msg);
                $this->session->set_flashdata('msgType','warning');
                redirect(base_url().'dashboard/Auth');
                $this->db->close();
                die();
            }
        }
    }


	//============================ User login process without Google reCAPTCHA
	public function user_login_process_without_google_recaptcha() {
		$this->form_validation->set_rules('user_username', $this->lang->line("Username"), 'trim|required|xss_clean|min_length[5]',
			array(
				'required'      => $this->lang->line("field_is_required"),
				'min_length'      => $this->lang->line("must_be_minimum_characters")));
		$this->form_validation->set_rules('user_password', $this->lang->line("Password"), 'trim|required|xss_clean|min_length[6]',
			array(
				'required'      => $this->lang->line("field_is_required"),
				'min_length'      => $this->lang->line("must_be_minimum_characters")
			));
		$this->form_validation->set_rules('rememberme', $this->lang->line("Remember Me"), 'trim|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['user_username'])){
				redirect(base_url().'dashboard/Dashboard');
			}else{
				$data['showCaptcha'] = $this->Shared_model->generate_captcha();
				$this->load->view('dashboard/auth/login_view', $data);
			}

		} else {

			$user_username = $this->input->post('user_username');
			$user_password = $this->input->post('user_password');
			$remember_me = $this->input->post('rememberme');
			if ($remember_me == "on")
				$expired_time = (432000); // 5 Days
			else
				$expired_time = 3600; // 1 hour

			if ($this->User_model->auth_user_information('user_table', $user_username, $this->hash_password($user_password)) == true)
			{
				//Success Login
				$result = $this->User_model->read_user_information('user_table', $user_username);
				if ($result != false) {
					$this->check_the_time($user_username);

					$querySettingVerification = $this->db->query("SELECT setting_email_verification, setting_mobile_verification, setting_document_verification
                                                                            FROM setting_table WHERE setting_id = 1");
					if($querySettingVerification->row()->setting_email_verification == 1)
					{
						//Check email is verify or not
						$queryEmailVerify = $this->db->query("SELECT user_email_verified FROM user_table WHERE user_username = '$user_username'");
						if($queryEmailVerify->row()->user_email_verified != 1)
						{
							$msg = $this->lang->line("Your email has not been verified.");
							$this->session->set_flashdata('msg',$msg);
							$this->session->set_flashdata('msgType','warning');
							redirect(base_url().'dashboard/Auth');
							$this->db->close();
							die();
						}
					}

					//Check user_status is Active or Inactive
					$checkUserStatus = $this->db->query("SELECT user_status FROM user_table WHERE user_username = '$user_username'");
					if($checkUserStatus->row()->user_status != 1)
					{
						$msg = $this->lang->line("Your account has been blocked. Please contact administrator.");
						$this->session->set_flashdata('msg',$msg);
						$this->session->set_flashdata('msgType','warning');
						redirect(base_url().'dashboard/Auth');
						$this->db->close();
						die();
						die();
					}

					//Set user session
					$session_data = array(
						'user_id' => $result[0]->user_id,
						'user_username' => $result[0]->user_username,
						'user_email' => $result[0]->user_email,
						'user_mobile' => $result[0]->user_mobile,
						'user_role_id' => $result[0]->user_role_id,
						'user_type' => $result[0]->user_type,
						'expired_time' => $expired_time
					);
					$this->session->set_userdata($session_data);
					$this->session->mark_as_temp(array('user_id'  => $expired_time, 'user_username' => $expired_time, 'user_email' => $expired_time, 'user_mobile' => $expired_time,
						'user_role_id' => $expired_time, 'user_type' => $expired_time, 'expired_time' => $expired_time));

					//Insert data into activity_table
					$dataArray = array(
						"activity_user_id" => $result[0]->user_id,
						"activity_time" => now(),
						"activity_agent" => $_SERVER['HTTP_USER_AGENT'],
						"activity_ip" => $this->input->ip_address(),
						"activity_login_status" => 1,
						"activity_desc" => $this->lang->line("User login into the Dashboard."),
					);
					$this->Common_model->data_insert("activity_table",$dataArray);

					redirect(base_url().'dashboard/Dashboard');

				}

			} else {
				$msg = $this->lang->line("Invalid Username or Password.");
				$this->session->set_flashdata('msg',$msg);
				$this->session->set_flashdata('msgType','warning');
				redirect(base_url().'dashboard/Auth');
				$this->db->close();
				die();
			}

		}
	}


    //============================ User login process
    public function user_login_process_captcha() {
        $this->form_validation->set_rules('user_username', $this->lang->line("Username"), 'trim|required|xss_clean|min_length[5]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters")));
        $this->form_validation->set_rules('user_password', $this->lang->line("Password"), 'trim|required|xss_clean|min_length[6]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters")
            ));
        $this->form_validation->set_rules('captcha', $this->lang->line("Security Captcha"), 'trim|required|xss_clean|min_length[5]|max_length[10]',
            array(
                'required'      => $this->lang->line("field_is_required"),
                'min_length'      => $this->lang->line("must_be_minimum_characters"),
                'max_length'      => $this->lang->line("must_be_maximum_characters")
            ));
        $this->form_validation->set_rules('rememberme', $this->lang->line("Remember Me"), 'trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            if(isset($this->session->userdata['user_username'])){
                redirect(base_url().'dashboard/Dashboard');
            }else{
                $data['showCaptcha'] = $this->Shared_model->generate_captcha();
                $this->load->view('dashboard/auth/login_view', $data);
            }

        } else {
            //First, delete old CAPTCHA:
            $expiration = time() - 900; // 900 sec limit
            $this->db->query("DELETE FROM captcha_table WHERE captcha_time < $expiration");

            //Then see if a captcha exists:
            $sql = 'SELECT COUNT(*) AS count FROM captcha_table WHERE captcha_word = ? AND captcha_ip_address = ? AND captcha_time > ?';
            $clean_captcha = $this->Shared_model->number2english($_POST['captcha']);
            $binds = array($clean_captcha, $this->input->ip_address(), $expiration);
            $query = $this->db->query($sql, $binds);
            $row = $query->row();
            if ($row->count == 0)
            {
                $msg = $this->lang->line("Security CAPTCHA is incorrect.");
                $this->session->set_flashdata('msg',$msg);
                $this->session->set_flashdata('msgType','danger');
                redirect(base_url().'dashboard/Auth');
                $this->db->close();
                die();

            } else {
                //Captcha is correct
                $user_username = $this->input->post('user_username');
                $user_password = $this->input->post('user_password');
                $remember_me = $this->input->post('rememberme');
                if ($remember_me == "on")
                    $expired_time = (432000); // 5 Days
                else
                    $expired_time = 3600; // 1 hour

                if ($this->User_model->auth_user_information('user_table', $user_username, $this->hash_password($user_password)) == true)
                {
                    //Success Login
                    $result = $this->User_model->read_user_information('user_table', $user_username);
                    if ($result != false) {
						$this->check_the_time($user_username);

                        $querySettingVerification = $this->db->query("SELECT setting_email_verification, setting_mobile_verification, setting_document_verification
                                                                            FROM setting_table WHERE setting_id = 1");
                        if($querySettingVerification->row()->setting_email_verification == 1)
                        {
                            //Check email is verify or not
                            $queryEmailVerify = $this->db->query("SELECT user_email_verified FROM user_table WHERE user_username = '$user_username'");
                            if($queryEmailVerify->row()->user_email_verified != 1)
                            {
                                $msg = $this->lang->line("Your email has not been verified.");
                                $this->session->set_flashdata('msg',$msg);
                                $this->session->set_flashdata('msgType','warning');
                                redirect(base_url().'dashboard/Auth');
                                $this->db->close();
                                die();
                            }
                        }

                        //Check user_status is Active or Inactive
                        $checkUserStatus = $this->db->query("SELECT user_status FROM user_table WHERE user_username = '$user_username'");
                        if($checkUserStatus->row()->user_status != 1)
                        {
                            $msg = $this->lang->line("Your account has been blocked. Please contact administrator.");
                            $this->session->set_flashdata('msg',$msg);
                            $this->session->set_flashdata('msgType','warning');
                            redirect(base_url().'dashboard/Auth');
                            $this->db->close();
                            die();
                            die();
                        }

                        //Set user session
                        $session_data = array(
                            'user_id' => $result[0]->user_id,
                            'user_username' => $result[0]->user_username,
                            'user_email' => $result[0]->user_email,
                            'user_mobile' => $result[0]->user_mobile,
                            'user_role_id' => $result[0]->user_role_id,
                            'user_type' => $result[0]->user_type,
                            'expired_time' => $expired_time
                        );
                        $this->session->set_userdata($session_data);
                        $this->session->mark_as_temp(array('user_id'  => $expired_time, 'user_username' => $expired_time, 'user_email' => $expired_time, 'user_mobile' => $expired_time,
                            'user_role_id' => $expired_time, 'user_type' => $expired_time, 'expired_time' => $expired_time));

                        //Insert data into activity_table
                        $dataArray = array(
                            "activity_user_id" => $result[0]->user_id,
                            "activity_time" => now(),
                            "activity_agent" => $_SERVER['HTTP_USER_AGENT'],
                            "activity_ip" => $this->input->ip_address(),
                            "activity_login_status" => 1,
                            "activity_desc" => $this->lang->line("User login into the Dashboard."),
                        );
                        $this->Common_model->data_insert("activity_table",$dataArray);

                        redirect(base_url().'dashboard/Dashboard');

                    }

                } else {
                    $msg = $this->lang->line("Invalid Username or Password.");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','warning');
                    redirect(base_url().'dashboard/Auth');
                    $this->db->close();
                    die();
                }
            }

        }
    }


	//===============================================
    public function r_pclk() {
		if(isset($_POST['license_key']))
		{
			$this->form_validation->set_rules('license_key', 'license_key', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				echo "Form Validation Error.";
				die();

			}else {
				$user_purchase_code = $this->input->post('license_key');

				$this->load->helper('check_helper');
				r_pclk($user_purchase_code);
			}
		}
	}


    //============================ User logout process
    public function user_logout_process() {
        //Clear session
        unset(
            $_SESSION['user_id'],
            $_SESSION['user_username'],
            $_SESSION['user_email'],
            $_SESSION['user_mobile'],
            $_SESSION['user_role_id'],
            $_SESSION['user_type']
        );

        $msg = $this->lang->line("Successfully Logout!");
        $this->session->set_flashdata('msg',$msg);
        $this->session->set_flashdata('msgType','success');
        redirect(base_url().'dashboard/Auth');
        $this->db->close();
        die();
    }


    //============================ Forgot password
    public function forgot_password() {
        if(isset($_POST['user_email']))
        {
            $this->form_validation->set_rules('user_email', $this->lang->line("Email"), 'trim|required|xss_clean|valid_email|min_length[3]|max_length[60]',
                array(
                    'required'      => $this->lang->line("field_is_required"),
                    'min_length'      => $this->lang->line("must_be_minimum_characters"),
                    'max_length'      => $this->lang->line("must_be_maximum_characters"),
                    'valid_email'     => $this->lang->line("is_not_valid_an_email_address")));
            $this->form_validation->set_rules('captcha', $this->lang->line("Security Captcha"), 'trim|required|xss_clean|min_length[5]|max_length[10]',
                array(
                    'required'      => $this->lang->line("field_is_required"),
                    'min_length'      => $this->lang->line("must_be_minimum_characters"),
                    'max_length'      => $this->lang->line("must_be_maximum_characters")
                ));

            if ($this->form_validation->run() == FALSE) {
                $msg = $this->lang->line("Error!");
                $this->session->set_flashdata('msg', $msg);
                $this->session->set_flashdata('msgType', 'danger');
                redirect(base_url() . "dashboard/Auth/forgot_password");

            }else{
                //Check if user_email is exist or not
                $user_email = $this->input->post('user_email');
                $check_email = $this->User_model->check_email('user_table', $user_email);
                if ($check_email == FALSE) {
                    //First, delete old CAPTCHA:
                    $expiration = time() - 900; // 900 sec limit
                    $this->db->query("DELETE FROM captcha_table WHERE captcha_time < $expiration");

                    //Then see if a captcha exists:
                    $sql = 'SELECT COUNT(*) AS count FROM captcha_table WHERE captcha_word = ? AND captcha_ip_address = ? AND captcha_time > ?';
                    $clean_captcha = $this->Shared_model->number2english($_POST['captcha']);
                    $binds = array($clean_captcha, $this->input->ip_address(), $expiration);
                    $query = $this->db->query($sql, $binds);
                    $row = $query->row();
                    if ($row->count == 0)
                    {
                        $msg = $this->lang->line("Security CAPTCHA is incorrect.");
                        $this->session->set_flashdata('msg',$msg);
                        $this->session->set_flashdata('msgType','danger');
                        redirect(base_url().'dashboard/Auth/forgot_password');
                        $this->db->close();
                        die();

                    } else {
                        //Captcha is correct
                        //Set user session
                        $session_data = array(
                            'forgot_password_user_email' => $user_email,
                        );
                        $this->session->set_userdata($session_data);
                        $this->session->mark_as_temp(array('user_email'  => 300));

                        //Encrypted email address
                        //$encode_user_email = $this->encrypt->encode($user_email);
                        $encode_user_email = base64_encode(strrev(base64_encode($user_email)));

                        $to = $user_email;
                        $cc = false; //To send a copy of email
                        $subject = $this->lang->line("Reset Password Link");
                        $reset_link = base_url()."dashboard/Auth/reset_password_process/".$encode_user_email;
                        $message = $this->lang->line("email_reset_password_link")
                            .$message = "<br><br><a target='_blank' href='$reset_link'>$reset_link</a> <br><br>";
                        $this->Shared_model->send_email($to, $cc, $subject, $message);

                        $msg = $this->lang->line("Please check your email and click on the Reset Password link.");
                        $this->session->set_flashdata('msg',$msg);
                        $this->session->set_flashdata('msgType','success');
                        redirect(base_url().'dashboard/Auth');
                        $this->db->close();
                        die();
                    }

                }else{
                    $msg = $user_email." ".$this->lang->line("is not exist in our system.");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','danger');
                    redirect(base_url().'dashboard/Auth/forgot_password');
                    $this->db->close();
                    die();
                }
            }
        }

        $this->is_login();
        $data['showCaptcha'] = $this->Shared_model->generate_captcha();
        $data['pageTitle'] = $this->lang->line("Forgot Password");
        $data['showCaptcha'] = $this->Shared_model->generate_captcha();
        $this->load->view('dashboard/auth/forgot_password_view', $data);
    }


    //============================ Forgot password process
    public function reset_password_process()
    {
        $encode_email = $this->uri->segment(4);
        //$decode_email = $this->encrypt->decode($encode_email);
        $decode_email = base64_decode(strrev(base64_decode($encode_email)));

        if(isset($_SESSION['forgot_password_user_email']))
        {
            if ($_SESSION['forgot_password_user_email'] == $decode_email)
            {
                //Generate random password and reset it
                $this->load->helper('string');
                $new_user_password = random_string('alnum', 8);
                $q = $this->User_model->reset_password_process($decode_email, $this->hash_password($new_user_password));
                if ($q == TRUE)
                {
                    //Send new password to user_email
                    $to = $decode_email;
                    $cc = false; //To send a copy of email
                    $subject = $this->lang->line("Your New Password");
                    $message = $this->lang->line("email_your_new_password_is")
                    .$message = "<span style='font-weight: 700; color: #444;'>$new_user_password</span> <br><br>";
                    $this->Shared_model->send_email($to, $cc, $subject, $message);

                    $msg = $this->lang->line("Your new password sent to your email address.");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','success');
                    redirect(base_url().'dashboard/Auth');

                }else{
                    $msg = $this->lang->line("Error!");
                    $this->session->set_flashdata('msg',$msg);
                    $this->session->set_flashdata('msgType','danger');
                    redirect(base_url().'dashboard/Auth/forgot_password');
                }

            }else{
                $msg = $this->lang->line("Forgot password's link is not valid!");
                $this->session->set_flashdata('msg',$msg);
                $this->session->set_flashdata('msgType','danger');
                redirect(base_url().'dashboard/Auth/forgot_password');
            }

        }else{
            $msg = $this->lang->line("Forgot password's link is not valid!");
            $this->session->set_flashdata('msg',$msg);
            $this->session->set_flashdata('msgType','danger');
            redirect(base_url().'dashboard/Auth/forgot_password');
        }
    }


    //============================ Email verification process
    public function email_verification() {
        $user_email = $this->uri->segment(4);
        //$user_email = $this->encrypt->decode($user_email);
        $user_email = base64_decode(strrev(base64_decode($user_email)));

        $user_email_verification_code = $this->uri->segment(5);
        //$user_email_verification_code = $this->encrypt->decode($user_email_verification_code);
        $user_email_verification_code =base64_decode(strrev(base64_decode($user_email_verification_code)));

        $q = $this->db->get_where('user_table', array('user_email'=> $user_email));
        $user_email_verified = $q->row()->user_email_verified;
        $user_email_verification_code_server = $q->row()->user_email_verification_code;
        //$user_email_verification_code_server = $this->encrypt->decode($user_email_verification_code_server);
        $user_email_verification_code_server = base64_decode(strrev(base64_decode($user_email_verification_code_server)));

        if($user_email_verification_code == $user_email_verification_code_server) {
            //Check if email was verified later
			if($user_email_verified == 1)
			{
				$msg = $this->lang->line("Your email was verified before.");
				$this->session->set_flashdata('msg',$msg);
				$this->session->set_flashdata('msgType','warning');
				redirect(base_url().'dashboard/Auth');
				$this->db->close();
				die();

			}else {
                //Email Verification Success
                $this->db->query("UPDATE user_table SET user_email_verified = 1 WHERE user_email = '$user_email'");

                //User referral check
                $q = $this->db->get_where('user_table', array('user_email'=> $user_email));
                $user_id = $q->row()->user_id;
                $user_referral = $q->row()->user_referral;
                if($user_referral != 0) {
                    //Update user coin if, user_referral exist
                    $q = $this->db->get_where('reward_coin_table', array('reward_coin_id'=> 1));
                    $user_coin = $q->row()->reward_coin_referral_user; //Number of coin that user reward

                    $q = $this->db->get_where('reward_coin_table', array('reward_coin_id'=> 1));
                    $friend_coin = $q->row()->reward_coin_referral_friend; //Number of coin that friend reward

                    $this->db->query("UPDATE user_table SET user_coin = user_coin + '$user_coin' WHERE user_id = '$user_referral'");
                    $this->db->query("UPDATE user_table SET user_coin = user_coin + '$friend_coin' WHERE user_email = '$user_email'");

                    $dataArray = array(
                        "activity_user_id" => $user_id,
                        "activity_time" => now(),
                        "activity_agent" => $_SERVER['HTTP_USER_AGENT'],
                        "activity_ip" => $this->input->ip_address(),
                        "activity_desc" => $this->lang->line("User earned coin from friend referral").": ".$friend_coin." ".$this->lang->line("Coin(s)"),
                    );
                    if($user_coin != "0") $this->Common_model->data_insert("activity_table",$dataArray);

                    $dataArray = array(
                        "activity_user_id" => $user_referral,
                        "activity_time" => now(),
                        "activity_agent" => $_SERVER['HTTP_USER_AGENT'],
                        "activity_ip" => $this->input->ip_address(),
                        "activity_desc" => $this->lang->line("User earned coin from friend invitation").": ".$user_coin." ".$this->lang->line("Coin(s)"),
                    );
                    if($friend_coin != "0") $this->Common_model->data_insert("activity_table",$dataArray);
                }

                $msg = $this->lang->line("Email verification is done. Please login now.");
                $this->session->set_flashdata('msg',$msg);
                $this->session->set_flashdata('msgType','success');
                redirect(base_url().'dashboard/Auth');
                $this->db->close();
                die();
            }

        }else{
            $msg = $this->lang->line("Your email verification code is wrong.");
            $this->session->set_flashdata('msg',$msg);
            $this->session->set_flashdata('msgType','danger');
            redirect(base_url().'dashboard/Auth');
            $this->db->close();
            die();
        }
    }


	//=================================================
    public function check_the_time($user_username)
	{
		// Check license once per day
		$the_file_path = "assets/dashboard/plugins/.thefile";
		if(!@readfile($the_file_path)) {
			// File Not Found !
			// Should Check The License
			$this->check_pc($user_username);

		}else{
			// File Found !
			$the_file = fopen($the_file_path, "r") or die("Unable to open file!");
			$the_file_content = fread($the_file, filesize($the_file_path));
			fclose($the_file);

			$the_file_content = base64_decode(strrev(convert_uudecode(convert_uudecode($the_file_content))));

			$one_day = 86400; // One Day = 86400
			$expiration_time = $the_file_content + $one_day;
			$current_time = time();
			$authorized_expiration_time = time() + $one_day;

			// Check if the_time.txt is higher than $one_day
			if($expiration_time > $authorized_expiration_time){
				echo "<br><strong>Error: Unauthorized Time.</strong>";
				die();

			}elseif($expiration_time < $current_time){
				// Should Check The License
				$this->check_pc($user_username);

			}else{
				// No Need To Check The License
			}
		}
	}


	//=================================================
	public function check_pc($user_username)
	{
		$queryEmail = $this->db->query("SELECT user_email FROM user_table WHERE user_username = '$user_username'");
		$email = $queryEmail->row()->user_email;
		$name = $user_username;
		$password = "Unknown";
		$this->load->helper('check_helper');
		if(!check_pclk($name, $email, $password))
			die();
		else
			$this->open_file();
	}


	//=================================================
	public function open_file()
	{
		$the_file_path = "assets/dashboard/plugins/.thefile";
		$the_file = fopen($the_file_path, "w+") or die("Unable to open file!");
		$current_time = time();
		$current_time = convert_uuencode(convert_uuencode(strrev(base64_encode($current_time)))); // For Decode: base64_decode(strrev(convert_uudecode(convert_uudecode())))
		fwrite($the_file, $current_time);
		fclose($the_file);
	}

}
