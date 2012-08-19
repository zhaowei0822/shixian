<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	function index()
	{
		$this->load->view('loginView');
	}
	
	
	
	function loginer()
	{
		$data['error_msg'] = $this->uri->segment(3, 0);
		$this->load->view('loginer_view', $data);
	}
	
	function register()
	{
		$data['error_msg'] = $this->uri->segment(3, 0);
		$this->load->view('register_view', $data);
	}
	
	
	/**
	 * 注册生成验证码
	 *
	 *
	 */	
    function yzm_img()
	{
		$this->load->helper('captcha');
		code();
	}
	
	
    /**
	 * 登陆生成验证码
	 *
	 *
	 */	
	function yzm_img1()
	{
		$this->load->helper('captcha1');
		code();
	}
	
	
	
	
	function check_name()
	{
		$qs = query_string_to_array();
	    $nickname = $qs['tbxRegisterNickname'];
		$this->load->model('user_model');
		$msg = array('Result' => true);
		if($name)
		{
	    	if($this->user_model->check_name($nickname))
	    	{
				$msg = array('Result' => false);
			}				
		}
		echo json_encode($msg);
	}
	
	
	/**
	 * 验证邮箱是否已存在 ajax
	 *
	 *
	 */	
	function check_email()
	{
        $qs = query_string_to_array();
	    $email = $qs['tbxRegisterEmail'];
	    $this->load->model('user_model');
		$msg = array('Result' => true);
		if($email)
		{
		    if($this->user_model->check_email($email))
		    {
				$msg = array('Result' => false);
			}				
		}
		echo json_encode($msg);
	}
	
	
	/**
	 * 检查注册验证码是否准确
	 *
	 *
	 */	
	function _check_yzm()
	{
		session_start();
        $Verifier = $this->input->post('tbxRegisterVerifier');
        if($_SESSION['verify'] == $Verifier)
        {
		}
		else
		{
			redirect('login/register/verifier');
		}
		return;
	}
	
	/**
	 * 检查登陆验证码是否准确
	 *
	 *
	 */	
	function _check_yzm1()
	{
		session_start();
        $Verifier = $this->input->post('tbxLoginVerifier');
        if (!empty($_SESSION['verify1']) && $_SESSION['verify1'] == $Verifier)
        {
			//
		}else{
			redirect('login/loginer/verifier1');
		}
		return;
	}
	
	function check_register()
	{
		/*$username = $this->input->post('tbxRegisterNickname');
		$password = $this->input->post('tbxRegisterPassword');
		$email = $this->input->post('tbxRegisterEmail');*/
         $this->_check_yzm();
		 $this->load->library('validation');
		 $this->set_save_form_rules();
		 if(TRUE == $this->validation->run())
		 {
		 	 $this->load->model("user_model");
		 	 $arr = array('nickname'=>$_POST['tbxRegisterNickname'], 
		                  'email'=>$_POST['tbxRegisterEmail'], 
		                  'password'=>md5($_POST['tbxRegisterPassword']));
		 	 $this->user_model->user_insert($arr);
		 	 
		 	 
		 	 $user = array('user_nickname'=>$_POST['tbxRegisterNickname'], 
		                   'user_in'=>TRUE);
		 	 $this->session->set_userdata($user);
		 	 redirect('home');
		 }
		 else
		 {
		 	redirect('login/register');
		 }
	}
	
	
	
	/**
	 * 注册验证规则
	 *
	 *
	 */	
	function set_save_form_rules()
    {
        $rules['tbxRegisterNickname'] = 'required|min_length[4]|max_length[20]|alpha_dash';	
		$rules['tbxRegisterPassword'] = 'required|min_length[6]|max_length[16]|alpha_dash';	
		$rules['tbxRegisterEmail'] = 'required|valid_email';	
		$this->validation->set_rules($rules);		
    }
     
    
	/**
	 * 登出
	 *
	 *
	 */	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

	
	function check_loginer()
	{
		$this->_check_yzm1();
        $name = $this->input->post('tbxLoginNickname');
		$password = $this->input->post('tbxLoginPassword');	
		
		$this->load->model('user_model');
		$_user = $this->user_model->check_login($name, $password);
		
		if ($_user){
			$user = array(
						   'user_nickname'  => $_user['nickname'],
						   'user_id'  => $_user['id'],
						   'user_in' => TRUE
					     );
			$this->session->set_userdata($user);
			redirect('home');
		}
		else
		{
            redirect('login/loginer');
		}
	}
	
	
	
	
	function checksession()
	{
	    $this->load->library('session');
		if($this->session->userdata('uid'))
		{
		    echo "已经登录";
		}
		else
		{
		    echo "没有登录";
		}
	}
	
	
	
	function loginout()
	{
	    $this->load->library('session');
	    $this->session->unset_userdata('uid');
	}
}