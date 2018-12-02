<?php 
defined('BASEPATH') or die('Some thing error occured');

Class  User extends CI_Controller
{   
        public $data;
        public function __construct()
        {
            parent::__construct();
            $this->data=[];
            $this->load->model(['UserModel'=>'user']);
            $this->userid = $this->session->userdata(US_EXT.'userid'); 
        }
        public function achari()
        {
            $params=[];
            $params['userid']=$this->userid;
            $this->data['orders']=$this->user->ordersList($params);    
            $this->load->view('profile',$this->data);
            
        }

        public function signOut()
        {
            $this->session->sess_destroy();
            redirect(base_url());
        }

        public function myorders()
        {
            $params=[];
            $params['userid']=$this->userid;
            $this->data['orders']=$this->user->ordersList($params);    
            $this->load->view('profile',$this->data);
            
        }
}